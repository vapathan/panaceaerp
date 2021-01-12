<?php
/**
 * Created by PhpStorm.
 * User: Ananyaa
 * Date: 21-Oct-20
 * Time: 10:00 AM
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MainModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('code_generator');
    }

    public function getInjectionList()
    {
        $q = $this->db->select('id, name')
            ->get('injection');

        return $q->result();
    }

    public function getCenterList()
    {
        $q = $this->db->select('*')
            ->get('center');
        return $q->result();
    }

    public function getPatientTypes()
    {
        $q = $this->db->select('type')
            ->get('patient_type');
        return $q->result();
    }

    public function savePurchaseEntry($entry)
    {
        if ($this->db->insert('purchase_entry', $entry)) {

            $this->addInjectionQuantity($entry->injectionId, $entry->quantity);
        }
        return false;
    }


    private function addInjectionQuantity($injectionId, $quantity)
    {
        $this->db->set('availableQuantity', 'availableQuantity+' . $quantity, FALSE);
        $this->db->where('id', $injectionId);

        if ($this->db->update('injection')) {
            return true;
        } else {
            return false;
        }
    }

    private function subInjectionQuantity($injectionId, $quantity, $unit)
    {
        if ($unit == 'IU') {
            $details = $this->getAvlUnitQuantity($injectionId);
            $avlUnitQty = $details->unitQuantity;


            if ($avlUnitQty >= $quantity) {


                $q = $this->db->set('unitQuantity', 'unitQuantity-' . $quantity, false)
                    ->where('id', $injectionId)
                    ->update('injection');

            } else {

                $q = $this->db->set('availableQuantity', 'availableQuantity-1', false)
                    ->set('unitQuantity', 'unitQuantity + unitSize - ' . $quantity, false)
                    ->where('id', $injectionId)
                    ->update('injection');

            }

        } else {

            $this->db->set('availableQuantity', 'availableQuantity-' . $quantity, FALSE);
            $this->db->where('id', $injectionId);

            if ($this->db->update('injection')) {
                return true;
            } else {
                return false;
            }
        }
    }


    private function getAvlUnitQuantity($injectionId)
    {
        $q = $this->db->select('unitQuantity')
            ->where('id', $injectionId)
            ->get('injection');

        return $q->row();
    }


    public function getPurchaseDetails($startDate, $endDate)
    {
        $this->db->select('purchase_entry.*, injection.name as injName');
        $this->db->join('injection', 'injection.id=purchase_entry.injectionId');

        if (isset($startDate) && isset($endDate)) {
            $this->db->where('purchase_entry.date>=', $startDate);
            $this->db->where('purchase_entry.date<=', $endDate);
        }
        $q = $this->db->get('purchase_entry');

        return $q->result();
    }

    public function getSalesDetails($centerId, $startDate, $endDate)
    {
        $this->db->select('sales_entry.*, center.name as centerName, injection.name as injName, patient.name as patientName');
        $this->db->join('center', 'center.id=sales_entry.centerId');
        $this->db->join('injection', 'injection.id=sales_entry.injectionId');
        $this->db->join('patient', 'patient.id=sales_entry.patientId');

        if ($centerId != 0) {
            $this->db->where('sales_entry.centerId', $centerId);
        }
        if (isset($startDate) && isset($endDate)) {
            $this->db->where('sales_entry.date>=', $startDate);
            $this->db->where('sales_entry.date<=', $endDate);
        }
        $q = $this->db->get('sales_entry');

        return $q->result();

    }

    public function calculateCost($injectionId, $unit, $quantity)
    {
        $q = $this->db->select('*')
            ->where('id', $injectionId)
            ->get('injection');

        $injection = $q->row();

        $cost = -1;

        if ($unit == 'Vial') {
            $cost = $quantity * $injection->cost;

        } else if ($unit == 'IU') {
            $cost = $quantity * ($injection->cost / $injection->unitSize);
        }
        return round($cost, 2);

    }

    public function saveSalesEntry($entry)
    {
        $salesOrderId = $this->generateSalesOrderId();

        $entry['patientId'] = $entry['id'];
        $entry['id'] = $salesOrderId;
        unset($entry['patientName']);

        $payment = array('salesOrderId' => $salesOrderId, 'patientId' => $entry['id'], 'date' => $entry['date'], 'amount' => $entry['paidAmount']);

        if ($this->savePayment($payment))
            $this->subInjectionQuantity($entry['injectionId'], $entry['quantity'], $entry['unit']);
        return $this->db->insert('sales_entry', $entry);
    }


    public function savePayment($payment)
    {
        return $this->db->insert('payment', $payment);
    }


    public function saveDuePayment($payment)
    {
        if ($this->savePayment($payment)) {
            $this->db->set('paidAmount', 'paidAmount + ' . $payment['amount'], FALSE);
            $this->db->set('dueAmount', 'dueAmount - ' . $payment['amount'], FALSE);

            if ($this->db->update('sales_entry')) {
                return true;
            }
            return false;
        }
        return false;
    }


    public function savePatient($patient)
    {
        return $this->db->insert('patient', $patient);
    }

    public function getPatients($centerId)
    {
        $this->db->select('patient.*, center.name as centerName');
        $this->db->join('center', 'center.id=patient.centerId');

        if ($centerId != "0") {
            $this->db->where('patient.centerId', $centerId);
        }

        $q = $this->db->get('patient');
        return $q->result();
    }

    private function generateSalesOrderId()
    {
        $q = $this->db->select('id')
            ->limit(1)
            ->order_by('id', 'desc')
            ->get('sales_entry');
        $result = $q->row();
        if ($result) {

            return generatePkCode($result->id, 'S', 7);
        } else {
            return 'S000001';
        }


    }

    public function getAvailableQuantity()
    {
        $q = $this->db->select('name, availableQuantity, unitQuantity')
            ->get('injection');
        return $q->result();
    }

    public function isValidUser($mobile, $password)
    {
        $q = $this->db->select('*')
            ->where('mobile', $mobile)
            ->where('password', $password)
            ->get('user');

        return $q->row();


    }
}





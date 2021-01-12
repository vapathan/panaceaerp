<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('MainModel', 'mainModel');
        $this->load->helper('string');
    }

    public function index()
    {
        $this->load->view('login');
        $this->load->view('footer/footer');
    }

    public function dashboard()
    {
        $injections = $this->mainModel->getAvailableQuantity();
        foreach ($injections as $injection) {
            if ($injection->unitQuantity > 0) {
                $injection->availableQuantity = $injection->availableQuantity . " + " . $injection->unitQuantity . " IU";
            }
        }

        $data = array('injections' => $injections);

        $this->load->view('header/header');
        $this->load->view('dashboard', $data);
        $this->load->view('footer/footer');
    }

    public function purchaseEntry()
    {
        $injections = $this->mainModel->getInjectionList();

        $data = array('injections' => $injections);

        $this->load->view('header/header');
        $this->load->view('purchase_entry', $data);
        $this->load->view('footer/footer_purchase_entry');
    }

    public function purchaseDetails()
    {
        $centers = $this->mainModel->getCenterList();
        $data = array('centers' => $centers);
        $this->load->view('header/header');
        $this->load->view('purchase_details', $data);
        $this->load->view('footer/footer_purchase_details');
    }

    public function salesEntry()
    {
        $injections = $this->mainModel->getInjectionList();
        $centers = $this->mainModel->getCenterList();
        $data = array('injections' => $injections, 'centers' => $centers);
        $this->load->view('header/header');
        $this->load->view('sales_entry', $data);
        $this->load->view('footer/footer_sales_entry');
    }


    public function salesDetails()
    {
        $centers = $this->mainModel->getCenterList();
        $data = array('centers' => $centers);
        $this->load->view('header/header');
        $this->load->view('sales_details', $data);
        $this->load->view('footer/footer_sales_details');
    }

    public function patients()
    {
        $centers = $this->mainModel->getCenterList();
        $patientTypes = $this->mainModel->getPatientTypes();
        $data = array('centers' => $centers, 'patientTypes' => $patientTypes);
        $this->load->view('header/header');
        $this->load->view('patients', $data);
        $this->load->view('footer/footer_patients');
    }


    public function addPatient()
    {


        $this->form_validation->set_rules('name', 'name', 'required|xss_clean|trim|min_length[3]');
        $this->form_validation->set_rules('mobile', 'mobile', 'required|xss_clean|trim|integer|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('id', 'id', 'required|xss_clean|trim');
        $this->form_validation->set_rules('husbandName', 'husbandName', 'required|xss_clean|trim');
        $this->form_validation->set_rules('age', 'Age', 'required|xss_clean|trim|integer');
        $this->form_validation->set_rules('address', 'address', 'required|xss_clean|trim');

        $response = array();

        if ($this->form_validation->run() == TRUE) {

            $patient = $this->input->post();
            if ($this->mainModel->savePatient($patient)) {
                $response['status'] = 'success';
                $response['msg'] = 'Patient added successfully.';
            } else {
                $response['status'] = 'error';
                $response['msg'] = 'Error occured while adding a patient, please try again.';
            }

        } else {
            $response['status'] = 'error';
            $response['msg'] = $this->form_validation->error_array();
        }

        echo json_encode($response);
    }


    public function getPatients()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));

        $centerId = $this->input->post('centerId');


        $data = array();

        $recordsTotal = count($data);
        $recordsFiltered = count($data);

        $patients = $this->mainModel->getPatients($centerId);

        $i = 1;
        foreach ($patients as $patient) {
            $details = array();
            $details[] = $i++;
            $details[] = $patient->id;
            $details[] = $patient->name;
            $details[] = $patient->husbandName;
            $details[] = $patient->patientType;
            $details[] = $patient->centerName;
            $details[] = $patient->age;
            $details[] = $patient->mobile;
            $details[] = $patient->regDate;
            $details[] = $patient->address;

            $data[] = $details;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        );

        echo json_encode($output);
    }


    public function searchPatients()
    {
        $key = $this->input->get('phrase');
        $key = strtolower($key);

        $patients = $this->mainModel->getPatients(0);


        $filteredData = array();
        foreach ($patients as $patient) {


            if (strpos(strtolower($patient->name), $key) !== false) {
                $filteredData[] = $patient;
            }
        }

        echo json_encode($filteredData);

    }

    public function savePurchaseEntries()
    {
        $result = array();
        $purchaseEntries = $this->input->post('data');


        $purchaseEntries = json_decode($purchaseEntries);

        if ($purchaseEntries) {
            foreach ($purchaseEntries as $purchaseEntry) {

                $this->mainModel->savePurchaseEntry($purchaseEntry);
            }
            $result['status'] = 'success';
            $result['msg'] = 'Entries saved successfully.';
        } else {
            $result['status'] = 'error';
            $result['msg'] = 'Please add at least one entry.';
        }


        echo json_encode($result);
    }

    public function getPurchaseDetails()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));

        $data = array();

        $recordsTotal = count($data);
        $recordsFiltered = count($data);

        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $purchaseEntries = $this->mainModel->getPurchaseDetails($startDate, $endDate);
        //print_r($purchaseEntries);
        // exit;

        $i = 1;
        foreach ($purchaseEntries as $entry) {
            $purchaseEntry = array();
            $purchaseEntry[] = $i++;
            $purchaseEntry[] = $entry->injName;
            $purchaseEntry[] = $entry->brand;
            $purchaseEntry[] = $entry->supplier;
            $purchaseEntry[] = $entry->invoiceNumber;
            $purchaseEntry[] = $entry->date;
            $purchaseEntry[] = $entry->mrp;
            $purchaseEntry[] = $entry->quantity;
            $purchaseEntry[] = $entry->discount;

            $data[] = $purchaseEntry;

        }
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        );

        echo json_encode($output);

    }

    public function calculateCost()
    {

        $injectionId = $this->input->post('injectionId');
        $unit = $this->input->post('unit');
        $quantity = $this->input->post('quantity');

        $cost = $this->mainModel->calculateCost($injectionId, $unit, $quantity);

        $result = array();

        if ($cost != -1) {
            $result['status'] = 'success';
            $result['msg'] = $cost;
        } else {
            $result['status'] = 'error';
            $result['msg'] = '';
        }

        echo json_encode($result);
    }

    public function saveSalesEntry()
    {
        $entry = $this->input->post();
        if ($this->mainModel->saveSalesEntry($entry)) {
            $this->session->set_flashdata('msg', 'Entry saved successfully.');
        } else {
            $this->session->set_flashdata('msg', 'Error occurred while saving an entry.');
        }
        return redirect('sales-entry');
    }

    public function getSalesDetails()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));

        $centerId = $this->input->post('centerId');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $salesEntries = $this->mainModel->getSalesDetails($centerId, $startDate, $endDate);

        $data = array();

        $recordsTotal = count($data);
        $recordsFiltered = count($data);
        $i = 1;
        foreach ($salesEntries as $salesEntry) {
            $entry = array();
            $entry[] = $i++;
            $entry[] = $salesEntry->patientName;
            $entry[] = $salesEntry->centerName;
            $entry[] = $salesEntry->injName;
            $entry[] = $salesEntry->unit;
            $entry[] = $salesEntry->quantity;
            $entry[] = $salesEntry->cost;
            $entry[] = $salesEntry->paidAmount;
            $entry[] = $salesEntry->dueAmount;
            $action = '';
            if ($salesEntry->dueAmount > 0) {
                $action = '<a href="javascript:void(0);"  class="btn-link payment"><i class="fa fa-money-check text-dark"></i></a>';
            }
            $entry[] = $action;

            $entry[] = $salesEntry->patientId;
            $entry[] = $salesEntry->id;

            $data[] = $entry;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        );

        echo json_encode($output);
    }

    public function collectPayment()
    {
        $payment = $this->input->post();
        $result = array();
        if (isset($payment)) {

            if ($this->mainModel->saveDuePayment($payment)) {
                $result['status'] = 'success';
                $result['msg'] = 'Payment details saved successfully';
            } else {
                $result['status'] = 'error';
                $result['msg'] = 'Error occurred while saving payment details. Please try again.';
            }

        } else {
            $result['status'] = 'error';
            $result['msg'] = 'Error occurred while saving payment details. Please try again.';
        }

        echo json_encode($result);
    }


}

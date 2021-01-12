<?php
/**
 * Created by PhpStorm.
 * User: Ananyaa
 * Date: 23-Oct-20
 * Time: 3:24 PM
 */

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MainModel', 'mainModel');
    }

    public function loginUser()
    {
        if ($this->session->has_userdata('mobile') && $this->session->has_userdata('name')) {
            return redirect(base_url('dashboard'));
        }

        $mobile = $this->input->post('mobile');
        $password = $this->input->post('password');

        if (isset($mobile) && isset($password)) {
            $user = $this->mainModel->isValidUser($mobile, $password);
            if ($user != null) {


                $data = array(
                    'mobile' => $user->mobile,
                    'name' => $user->name
                );

                $this->session->set_userdata($data);
                return redirect(base_url('dashboard'));


            } else {
                $this->session->set_flashdata('error', 'Invalid user.');
                $this->load->view('login');
                $this->load->view('footer/footer');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid user.');
            $this->load->view('login');
            $this->load->view('footer/footer');
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        return redirect(base_url(''));
    }
}
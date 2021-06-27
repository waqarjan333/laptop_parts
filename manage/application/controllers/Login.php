<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        
    }

    function index()
    { 
        $this->load->library('form_validation');   
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run()){
            $where = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
            );
            $data = $this->db->get_where('user', $where)->row_array();
            if($data){
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid Login Credentials');
            } 
        } else {
            $this->load->view('login');
        }
    }
}

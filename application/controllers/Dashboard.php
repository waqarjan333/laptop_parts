<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Dashboard extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    { 
        $data['home'] = $this->db->get_where('home', array('id'=>1))->row_array();
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }

    function send_mail(){
        $this->load->library('email');
 
        //SMTP & mail configuration
        $config = array(
                    'protocol' => 'smtp', 
                    'smtp_host' => 'ssl://smtp.gmail.com', 
                    // 'smtp_host' => 'smtp.gmail.com', 
                    'smtp_port' => 465, 
                    'smtp_user' => 'info@ntofy.com', 
                    'smtp_pass' => '*@6E49Ttj%Bx', 
                    'mailtype' => 'html', 
                    'charset' => 'iso-8859-1'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
         
        //Email content
        $htmlContent = '<h1>Sending email via Gmail SMTP server</h1>';
        $htmlContent .= '<p>This email has sent via Gmail SMTP server from CodeIgniter application.</p>';
         
        $this->email->to('mrscorpio189@gmail.com');
        $this->email->from('info@ntofy.com','Ntofy');
        $this->email->subject('How to send email via Gmail SMTP server in CodeIgniter');
        $this->email->message($htmlContent);
         
        //Send email
        $this->email->send(); 
    }

}

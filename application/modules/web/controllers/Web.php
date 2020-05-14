<?php
class Web extends MX_Controller 
{

function __construct() {
parent::__construct();
$this->load->library('form_validation');
$this->form_validation->CI =& $this;
}


function index()
{
    $data['username'] = $this->input->post('username',TRUE);
    // $data['view_file'] = 'view';
    $this->load->module('templates');
    $this->templates->login($data);
}

function submit_login()
{
    $submit = $this->input->post('submit',TRUE);

    if ($submit == 'Submit') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim|callback_username_check');
        $this->form_validation->set_rules('pword','Password','required|trim');

        if ($this->form_validation->run() == TRUE) {
            $this->_in_you_go();
        }else{
            $this->index();
        }
    }
}

function logout()
{
  
   unset($_SESSION['is_admin']);
   redirect(base_url());
}

function _in_you_go()
{
    // set session variable
    $this->session->set_userdata('is_admin','1');  
    redirect('dashboard/home');
}


function username_check($str) 
{
    $error_msg = 'The Username field is required';

    if ($str=='') {
        $this->form_validation->set_message('username_check',$error_msg);
        return false;
    }
    $this->load->module('site_security');

    $error_msg = 'You did not enter a correct email/password';
    $pword = $this->input->post('pword',TRUE);

    $result = $this->site_security->_check_admin_login_details($str,$pword);

    if ($result==FALSE) {
        $this->form_validation->set_message('username_check',$error_msg);
        return false;
    }else{
        return TRUE;
    }
}

}
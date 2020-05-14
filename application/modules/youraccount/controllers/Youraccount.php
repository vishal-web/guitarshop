<?php
class Youraccount extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');

}

function test() {
    $name = "Vishal";
    $this->load->module('site_security');
    $hashed_name = $this->site_security->_hash_string($name);
    echo $name."<br>";
    echo $hashed_name;
    echo '<hr>';

    $hashed_name_length = strlen($hashed_name);
    $start_point = $hashed_name_length-6;
    $last_six_chars = substr($hashed_name, $start_point, 6);
    echo $last_six_chars;
}

function logout()
{
   $this->load->module('site_cookies');
   unset($_SESSION['user_id']);
   $this->site_cookies->_destroy_cookie();
   redirect(base_url());
}

function welcome()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();

    $data['flash'] = $this->session->flashdata('account');
    $data['view_file'] = 'welcome';
    $this->load->module('templates');
    $this->templates->public_template($data);
}

function login()
{
    $data['username'] = $this->input->post('username',TRUE);
    // $data['view_file'] = 'view';
    $this->load->module('templates');
    $this->templates->login($data);
}


function submit_login()
{
    $this->form_validation->CI =& $this;
    $submit = $this->input->post('submit',TRUE);

    if ($submit == 'Submit') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim|callback_username_check');
        $this->form_validation->set_rules('pword','Password','required|trim');

        if ($this->form_validation->run() == TRUE) {
            $col1 = 'username';
            $value1 = $this->input->post('username',TRUE);
            $col2 = 'email';
            $value2 = $this->input->post('username',TRUE);
            $query = $this->store_accounts->get_with_double_condition($col1, $value1,$col2, $value2);

            foreach ($query->result() as $row) {
                $user_id = $row->id;
            }

            $remember_me = $this->input->post('remember',TRUE);
            if ($remember_me=='Remember Me') {
                $login_type='longterm';
            }else{
                $login_type ='shortterm';
            }

            $data['last_login'] = time();
            $this->load->module('store_accounts');
            $this->store_accounts->_update($user_id,$data);

            // send them to the private area 
            $this->_in_you_go($user_id,$login_type);
        }else{
            $this->login();
        }
    }
}

function _in_you_go($user_id,$login_type)
{
    // NOTE login type can be longterm and shortterm
    if ($login_type=='longterm') {
        // set cookie varibale
        $this->load->module('site_cookies');
        $this->site_cookies->_set_cookie($user_id);   
    }else{
        // set session variable
        $this->session->set_userdata('user_id',$user_id);
    }    

    // attempt to update the cart and divert to the cart
    $this->_attempt_cart_divert($user_id);
    redirect('youraccount/welcome');
}

function _attempt_cart_divert($user_id)
{

    $this->load->module('store_basket');
    $customer_session_id = $this->session->session_id;
    $col1 = 'session_id';
    $val1 = $customer_session_id;
    $col2 = 'shopper_id';
    $val2 = 0;
    $query = $this->store_basket->get_with_double_condition($col1,$val1,$col2,$val2);
    $num_rows = $query->num_rows();
    
    if ($num_rows>0) {
        $mysql_query = "update store_basket set shopper_id = $user_id where session_id = '$customer_session_id'";
        $query = $this->store_basket->_custom_query($mysql_query);
        redirect('cart'); 
    }
}

function submit()
{
    $submit = $this->input->post('submit',TRUE);

    if ($submit == 'Submit') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|is_unique[store_accounts.username]');
        $this->form_validation->set_rules('firstname','Firstname','required');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|max_length[30]');
        $this->form_validation->set_rules('pword','Password','required|trim|min_length[5]|max_length[30]');
        $this->form_validation->set_rules('repeat_pword','Repeat Password','required|matches[pword]');

        if ($this->form_validation->run() == TRUE) {
            // get the variables

            $this->_proccess_create_account();

            echo '<h2>Account Created</h1>';
            echo '<h3>Now Please Sign In</h3>';
            die();
            $pword = $this->input->post('pword',TRUE);
            $this->load->module('site_security');
            $data['pword'] = $this->site_security->_hash_string($pword);
            // update account detail
            $this->_update($update_id,$data);

            $msg = 'The Account Password was Successfully Updated';
            $value = '<div class="alert alert-success">'.$msg.'</div>';
            $this->session->set_flashdata('account',$value);
            redirect('store_accounts/create/'.$update_id);
        }else{
            $this->start();
        }
    }
}

function _proccess_create_account()
{
    $this->load->module('store_accounts');
    $data = $this->fetch_data_from_post();
    unset($data['repeat_pword']);

    $pword = $data['pword'];
    $this->load->module('site_security');
    $data['pword'] = $this->site_security->_hash_string($pword);
    $this->store_accounts->_insert($data);
}

function start()
{
    $data = $this->fetch_data_from_post();

    $data['flash'] = $this->session->flashdata('account');
    $data['view_file'] = 'start';
    $this->load->module('templates');
    $this->templates->public_template($data);
}

function fetch_data_from_post(){
    $data['username']   = $this->input->post('username',TRUE);
    $data['email']      = $this->input->post('email',TRUE);
    $data['firstname']  = $this->input->post('firstname',TRUE);
    $data['lastname']   = $this->input->post('lastname',TRUE);
    $data['pword']      = $this->input->post('pword',TRUE);
    $data['repeat_pword']      = $this->input->post('repeat_pword',TRUE);

    if (!isset($data)) {
        $data = "";
    }
    return $data;
}

function username_check($str) 
{
    $error_msg = 'The Username field is required';

    if ($str=='') {
        $this->form_validation->set_message('username_check',$error_msg);
        return false;
    }
    $this->load->module('site_security');
    $this->load->module('store_accounts');
    
    $error_msg = 'You did not enter a correct email/password';

    $col1 = 'username';
    $value1 = $str;
    $col2 = 'email';
    $value2 = $str;
    $query = $this->store_accounts->get_with_double_condition($col1, $value1,$col2, $value2);
    $num_rows = $query->num_rows();


    if ($num_rows<1) {
        $this->form_validation->set_message('username_check',$error_msg);
        return false;
    }

    $pword = $this->input->post('pword',TRUE);
    foreach ($query->result() as $row) {
        $pword_on_table = $row->pword;
    }

    $result = $this->site_security->_verify_hash($pword,$pword_on_table);
    if ($result==TRUE) {
        return TRUE;
    }else{
        $this->form_validation->set_message('username_check',$error_msg);
        return false;
    }
}

}
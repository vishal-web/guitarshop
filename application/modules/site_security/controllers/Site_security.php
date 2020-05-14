<?php
class Site_security extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

function _check_admin_login_details($username,$password)
{
    $target_username = "admin";
    $target_pass = "password";

    if (($username==$target_username) && ($password==$target_pass)) {
        return TRUE;
    }else{
        return FALSE;
    }
}

function _make_sure_logged_in()
{
    // make the customer is logged in
    $user_id = $this->_get_user_id();
    if (!is_numeric($user_id)) {
        redirect('youraccount/login');
    }
}

function _get_user_id()
{
    // attempt to get the user id

    // checking the session varibales
    $user_id = $this->session->userdata('user_id');
    if (!is_numeric($user_id)) {
        $this->load->module('site_cookies');
        $user_id = $this->site_cookies->_attempt_get_user_id();
    }

    return $user_id;
}
function generate_random_string($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function _hash_string($str) 
{
	$hashed_string = password_hash($str, PASSWORD_BCRYPT, ['cost'=>'12']);
	return $hashed_string;
}	

function _verify_hash($plan_text, $hashed_string)
{
	$result= password_verify($plan_text, $hashed_string);
	return $result;
}

function _encrypt_string($string)
{
    $this->load->library('encryption');
    $encrypted_string = $this->encryption->encrypt($string);
    return $encrypted_string;
}

function _decrypt_string($string)
{
    $this->load->library('encryption');
    $decrypted_string = $this->encryption->decrypt($string);
    return $decrypted_string;
}
function _make_sure_is_admin() 
{
    $is_admin = $this->session->userdata('is_admin');
    if ($is_admin==1) {
        return TRUE;
    }else{   
        redirect('Site_security/not_allowed');
    }
}

function not_allowed() 
{
    echo "You are not allowed to be here";
}

}
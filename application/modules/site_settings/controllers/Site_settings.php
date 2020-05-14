<?php
class Site_settings extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function _get_our_map_code()
{
	$map_code = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1750.9238055900728!2d77.27285221255138!3d28.634328997925508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfcb21f8fd4fb%3A0x684e8a5d3a4c7a08!2sI590%2C+Dak+Khana+Rd%2C+Guru+Ramdas+Nagar+Extension%2C+Ramesh+Park%2C+Laxmi+Nagar%2C+New+Delhi%2C+Delhi+110092!5e0!3m2!1sen!2sin!4v1508900946420" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>'; 
	return $map_code;
}

function _get_our_name()
{
	$name = "Shophiya"; 
	return $name;
}

function _get_our_address()
{
	$address = "795 Folsom Ave, Suite 600<br>";
	$address.= "San Francisco, CA 94107";
	return $address;

}

function _get_our_telnum()
{
	$telnum = "(123) 456-7890";
	return $telnum;
}

function _get_paypal_email()
{
	$email = "vishalkumar8507@gmail.com";
	return $email;
}

function _get_currency_code()
{
	$currency_code = "EUR";
	return $currency_code;
}

function _get_support_team()
{
	$name = "Customer Support";
	return $name;
}

function _get_welcome_msg($customer_id)
{
	$this->load->module('enquiries');
	$customer_name = 	$this->enquiries->_get_customer_name($update_id,$optional_data=NULL);

	$msg = "Hello ".$customer_name." <br><br>";
	$msg.= "Thank you for creating account with ShoppingCart. If you have any questions";
	$msg.= " about any of our products and services then please do get in touch.";
	$msg.= " We are here seven days a week and we would happy to help you.<br><br>";
	$msg.= " Regards,<br><br>";
	$msg.= " Vishal (......)";
	return $msg;
}

function _get_cookie_name()
{
	$cookie_name = 'addharchod';
	return $cookie_name;
}

function _get_currency_symbol() {
	$symbol = "&pound;";
	return $symbol;
}

function _get_item_segments()
{		
	// return the segements for items pages;
    $segments = "musical/instrument/";
    return $segments;
}

function _get_items_segments()
{	
	// return the segements for category pages;
    $segments = 'music/instruments/';
    return $segments;
}


function _get_page_not_found_msg()
{
	$msg = "<h1>Hi Man What you are Doing Here this Place Does Not Belong to You</h1>";
	$msg .="<h3>Go  Back and Check Out Some Cool Things ...</h3>";
	return $msg;
}

}
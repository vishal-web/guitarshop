<?php
class Musical extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function instrument()
{		
	$item_url = $this->uri->segment(3);


	if (!isset($item_url)) {
		$referal_url = $_SERVER['HTTP_REFERER'];
		redirect($referal_url);
	}

	$this->load->module('store_items');
	$item_id = $this->store_items->_get_item_id_from_item_url($item_url);
	
	$this->store_items->view($item_id);
}

}
<?php
class Custom_pagination extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function _genrate_pagination($data)
{	
	// NOTE: for this work, data must contain these variables.
	// $template, $target_base_url, $total_url, $total_rows, $offset_segment, $limit

	$template = $data['template'];
	$target_base_url = $data['target_base_url'];
	$total_rows = $data['total_rows'];
	$offset_segment = $data['offset_segment'];
	$limit = $data['limit'];

    
    if ($template == 'public_template') {
    	$setting = $this->get_settings_for_public_template();
    }elseif ($template == 'admin') {
    	$setting = $this->get_settings_for_admin_template();
    }

    $this->load->library('pagination');
    
    $config['base_url'] = $target_base_url; 
    $config['total_rows'] = $total_rows; 
    $config['uri_segement'] = $offset_segment; 

	$config['per_page'] 		= $limit;
	$config['num_links'] 		= $setting['num_links'];

	$config['full_tag_open'] 	= $setting['full_tag_open'];
	$config['full_tag_close'] 	= $setting['full_tag_close'];

	$config['first_link'] 		= $setting['first_link'];
	$config['first_tag_open'] 	= $setting['first_tag_open'];
	$config['first_tag_close'] 	= $setting['first_tag_close'];

	$config['last_link'] 		= $setting['last_link'];
	$config['last_tag_open'] 	= $setting['last_tag_open'];
	$config['last_tag_close'] 	= $setting['last_tag_close'];

	$config['next_link'] 		= $setting['next_link'];
	$config['next_tag_open'] 	= $setting['next_tag_open'];
	$config['next_tag_close'] 	= $setting['next_tag_close'];

	$config['prev_link'] 		= $setting['prev_link'];
	$config['prev_tag_open'] 	= $setting['prev_tag_open'];
	$config['prev_tag_close'] 	= $setting['prev_tag_close'];
	
	$config['cur_tag_open'] 	= $setting['cur_tag_open'];
	$config['cur_tag_close'] 	= $setting['cur_tag_close'];

	$config['num_tag_open'] 	= $setting['num_tag_open'];
	$config['num_tag_close'] 	= $setting['num_tag_close'];

    $this->pagination->initialize($config);
    $pagination =  $this->pagination->create_links();
    return $pagination;
}

function get_showing_statement($data)
{
	$offset = $data['offset']; 
	$limit = $data['limit']; 
	$total_rows = $data['total_rows']; 

	$value1 = $offset+1;
	$value2 = $offset+$limit;
	$value3 = $total_rows;
	if ($value2>$value3) {
		$value2=$value3;
	}
	$statement = "Showing ".$value1." to ".$value2." of ".$value3." results";
	return $statement;
}

function get_settings_for_public_template()
{
	$setting['num_links'] = 10;

	$setting['full_tag_open'] = '<nav aria-label="Page navigation"><ul class="pagination">';
	$setting['full_tag_close'] = '</ul></nav>';

	$setting['first_link'] = 'First';
	$setting['first_tag_open'] = '<li>';
	$setting['first_tag_close'] = '</li>';

	$setting['last_link'] = 'Last';
	$setting['last_tag_open'] = '<li>';
	$setting['last_tag_close'] = '</li>';

	$setting['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
	$setting['prev_tag_open'] = '<li>';
	$setting['prev_tag_close'] = '</li>';

	$setting['next_link'] = '<span aria-hidden="true">&raquo;</span>';
	$setting['next_tag_open'] = '<li>';
	$setting['next_tag_close'] = '</li>';



	$setting['cur_tag_open'] = '<li class="active"><a href="#" aria-label="Previous">';
	$setting['cur_tag_close'] = '</a></li>';	

	$setting['num_tag_open'] = '<li>';
	$setting['num_tag_close'] = '</li>';
	return $setting;
}

						
function get_settings_for_admin_template()
{
	$setting['num_links'] = 10;

	$setting['full_tag_open'] = '<div class="pagination pagination"><ul>';
	$setting['full_tag_close'] = '</ul></div>';

	$setting['first_link'] = 'First';
	$setting['first_tag_open'] = '<li>';
	$setting['first_tag_close'] = '</li>';

	$setting['last_link'] = 'Last';
	$setting['last_tag_open'] = '<li>';
	$setting['last_tag_close'] = '</li>';

	$setting['prev_link'] = 'Prev';
	$setting['prev_tag_open'] = '<li>';
	$setting['prev_tag_close'] = '</li>';

	$setting['next_link'] = 'Next';
	$setting['next_tag_open'] = '<li>';
	$setting['next_tag_close'] = '</li>';

	$setting['cur_tag_open'] = '<li class="active"><a href="#" aria-label="Previous">';
	$setting['cur_tag_close'] = '</a></li>';	

	$setting['num_tag_open'] = '<li>';
	$setting['num_tag_close'] = '</li>';
	return $setting;
}

}
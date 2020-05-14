<?php
class Contactus extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function index()
{
    $this->load->module('site_settings');
    $data = $this->fetch_data_from_post();

    $data['our_address'] = $this->site_settings->_get_our_address();
    $data['our_telnum'] = $this->site_settings->_get_our_telnum();
    $data['our_name'] = $this->site_settings->_get_our_name();
    $data['our_map_code'] = $this->site_settings->_get_our_map_code();

    $data['form_location'] = base_url().'contactus/submit';
    
    $data['headline'] = 'Contactus';
    $data['view_file'] = 'contactus';
    $data['flash'] = "";
    $this->load->module('templates');
    $this->templates->public_template($data);
}
function thankyou()
{
    $data['view_file'] = 'thankyou';
    $data['flash'] = "";
    $this->load->module('templates');
    $this->templates->public_template($data);
}

function submit()
{   
    $submit = $this->input->post('submit');
    // if (isset($_SERVER['HTTP_REFERER'])) {
    //     $refer_url = $_SERVER['HTTP_REFERER'];
    // }else{
    //     $refer_url = base_url().'contactus';
    // }

    // $target_refer_url = base_url().'contactus';
    // $name = trim($this->input->post('name',TRUE));

    // if ($name!='') {
    //     $this->_blacklist_user();
    // }

    if ($submit == 'Submit') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('yourname','your name','required|max_length[60]');
        $this->form_validation->set_rules('email','email','required|valid_email');
        $this->form_validation->set_rules('telnum','telephone no','required|numeric');
        $this->form_validation->set_rules('message','message','required');

        if ($this->form_validation->run() == TRUE) {
            $posted_data = $this->fetch_data_from_post();
            $this->load->module('site_security');
            $this->load->module('enquiries');

            $data['code'] = $this->site_security->generate_random_string(8);
            $data['date_created'] = time();
            $data['sent_to'] = 0;
            $data['subject'] = 'Contact Form';
            $data['message'] = $this->build_msg($posted_data);
            $data['sent_by'] = 0;
            $data['opened'] = 0;
            $data['urgent'] = 0;
            // insert new item
            $this->enquiries->_insert($data);
            redirect('contactus/thankyou');
        
        }else{
            $this->index();
        }
    }
}

function build_msg($posted_data)
{
    $yourname = ucfirst($posted_data['yourname']);
    $msg = $yourname.' submitted the following infromation:<br><br>';
    $msg.= ' Name :'.$yourname.'<br>';
    $msg.= ' Email :'.$posted_data['email'].'<br>';
    $msg.= ' Telephone Number :'.$posted_data['telnum'].'<br>';
    $msg.= ' Message :'.$posted_data['message'].'<br>';
    return $msg;
}

function fetch_data_from_post()
{
    $data['yourname'] = $this->input->post('yourname',TRUE);
    $data['email'] = $this->input->post('email',TRUE);
    $data['telnum'] = $this->input->post('telnum',TRUE);
    $data['message'] = $this->input->post('message',TRUE);
    return $data;
}

function _blacklist_user()
{
    $this->load->module('blacklist');
    $data['ip_address'] = $this->input->ip_address();
    $data['date_created'] = time();
    $this->_insert($data);
}

}
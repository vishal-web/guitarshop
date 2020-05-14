<?php
class Yourmessages extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function messagesent()
{
    $data['headline'] = "Message Sent";
    $data['view_file'] = "messagesent";
    $this->load->module('templates');
    $this->templates->public_template($data);
}

function create() 
{   $this->load->module('timedate');
    $this->load->module('site_security');
    $this->load->module('enquiries');
    $this->load->module('store_accounts');

    $customer_id = $this->site_security->_get_user_id();
    $code = $this->uri->segment(3);

    $submit = $this->input->post('submit',TRUE);
    $data = $this->fetch_data_from_post();
    
    if ($submit == 'Cancel') {
        redirect('youraccount/welcome');
    }
    if ($submit == 'Submit') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject','Subject','required|max_length[250]');
        $this->form_validation->set_rules('message','Message','required');
        if ($this->form_validation->run() == TRUE) {

            if ((!is_numeric($customer_id)) OR ($customer_id==0)) {
                $token = $this->input->post('token',TRUE);
                $customer_id = $this->store_accounts->_get_customer_id_from_token($token);
                $not_logged_in = TRUE;
            }

            $data['opened']         = 0;
            $data['sent_to']        = 0;
            $data['sent_by']        = $customer_id;
            $data['date_created']   = time();
            $data['code']  = $this->site_security->generate_random_string(8);
            
            if ($data['urgent']!=1) {
                $data['urgent'] = 0;
            }
            // send new message

            if ($customer_id>0) {
                $this->enquiries->_insert($data);
                $msg = 'The message was successfully sent';
                $value = '<div class="alert alert-success">'.$msg.'</div>';
                $this->session->set_flashdata('item',$value);
            }
            
            if (isset($not_logged_in)) {
                $target_url = base_url().'yourmessages/messagesent';
            }else{
                $target_url = base_url().'youraccount/welcome';
            }

            redirect($target_url);
        }
    }elseif ($code!="") {
        $data = $this->enquiries->_attempt_get_data_from_code($customer_id,$code);
        $data['message'] = "<br>---------------------------------------------------<br>".$data['message'];
    }

    $this->site_security->_make_sure_logged_in();

    if ($code=="") {
        $data['headline'] = 'Compose New Message';
    }else{
        $data['headline'] = 'Reply To Message';
    }

    $data['message'] = $this->_format_msg($data['message']);
    $data['code'] = $code;
    $data['token'] = $this->store_accounts->_generate_token($customer_id);
    $data['flash'] = $this->session->flashdata('page');
    // $data['view_mouie']s= 'enqiuiried';
    $data['view_file'] = 'create';
    $this->load->module('templates');
    $this->templates->public_template($data);
}

function _format_msg($msg)
{
$replace='
';
    $msg = str_replace('<br>', $replace, $msg);
    $msg = strip_tags($msg);
    return $msg;
}

function view()
{
    $this->load->module('timedate');
    $this->load->module('enquiries');
    $this->load->module('site_security');
    $this->site_security->_make_sure_logged_in();
  
    $code = $this->uri->segment(3);
    $col1 = 'sent_to';
    $value1 = $this->site_security->_get_user_id();
    $col2 = 'code';
    $value2 = $code;

    $query  = $this->enquiries->get_with_double_condition($col1,$value1,$col2,$value2);
    $num_rows = $query->num_rows();

    if ($num_rows<1) {
        redirect('site_security/not_allowed');
    }

    foreach ($query->result() as $row) {
        $update_id = $row->id;
        $data['subject']        = $row->subject;
        $data['message']        = nl2br($row->message);
        $date_created           = $row->date_created;
        $data['opened']         = $row->opened;
        $data['sent_to']        = $row->sent_to;
        $data['sent_by']        = $row->sent_by;
    }

    $data['date_created'] = $this->timedate->get_nice_date($date_created,'full');
    $data['code'] = $code;
    $this->enquiries->_set_to_opened($update_id);
   
    $data['headline'] = 'Enquiry ID  '.$update_id;

    $data['query'] = $this->enquiries->get_where($update_id);
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = 'view';
    $this->load->module('templates');
    $this->templates->public_template($data);
}

function fetch_data_from_post() 
{
    $data['subject']        = $this->input->post('subject',TRUE);
    $data['message']        = $this->input->post('message',TRUE);
    $data['urgent']        = $this->input->post('urgent',TRUE);
    return $data;
}


}
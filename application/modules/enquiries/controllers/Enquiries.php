<?php
class Enquiries extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function submit_ranking() 
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit',TRUE);
    if ($submit='Cancel') {
        redirect('enquiries/inbox');
    }
    $data['ranking'] = $this->input->post('ranking',TRUE);
    $update_id = $this->uri->segment(3);

    $this->_update($update_id,$data);
    $msg = 'The Enquiry Ranking is successfully updated';
    $value = '<div class="alert alert-success">'.$msg.'</div>';
    $this->session->set_flashdata('item',$value);
    redirect('enquiries/view/'.$update_id);
}

function _attempt_get_data_from_code($customer_id,$code)
{
    // make sure customer is allowed to view/respond
    $query = $this->get_where_custom('code',$code);
    $num_rows = $query->num_rows();

    foreach ($query->result() as $row) {
        $data['date_created'] = $row->date_created;
        $data['sent_to'] = $row->sent_to;
        $data['subject'] = $row->subject;
        $data['message'] = $row->message;
        $data['sent_by'] = $row->sent_by;
        $data['opened'] = $row->opened;
        $data['urgent'] = $row->urgent;
    }
    if (($num_rows<1) OR ($customer_id!=$data['sent_to'])) {
        redirect('site_security/not_allowed');
    }

    return $data;
}

function fix()
{
    $this->load->module('site_security');    
    $query = $this->get('id');
    foreach ($query->result() as $row) {
        $data['code'] = $this->site_security->generate_random_string(8);
        $this->_update($row->id,$data);
    }
    echo 'Finished';
}

function _draw_customer_inbox($customer_id)
{
    $folder_type = 'inbox';
    $data['query'] =$this->_fetch_customer_enquiries($folder_type,$customer_id);
    $data['folder_type'] = ucfirst($folder_type);

    $data['flash'] = $this->session->flashdata('item');
    $this->load->view('customer_inbox',$data);
}


function make_enquiry()
{
    $data['message'] = 'Thining About Buying';
    $data['sent_to'] = 0;
    $data['sent_by'] = 2;
    $data['date_created'] = time();
    $data['subject'] = 'Is this Value for Money';

    for ($i=0; $i <500 ; $i++) { 
        $this->_insert($data);
    }

    $query = $this->get('subject');
    $num_rows = $query->num_rows();
    echo '<h1>Total No of Equiries '.$num_rows.'</h1>';

}

function _fetch_customers_as_options()
{
    $options[''] = "Please Select Customer..";
    $this->load->module('store_accounts');
    $query = $this->store_accounts->get('lastname');
    foreach ($query->result() as $row) {
        $customer_name = $row->firstname." ".$row->lastname;
        $company_length = strlen($row->company);
        if ($company_length>2) {
            $customer_name.=' from '.$row->company;
        }

        $customer_name = trim($customer_name);

        if ($customer_name!="") {
            $options[$row->id] = $customer_name;
        }
    }

    return $options;
}

function create()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit',TRUE);

    $this->load->module('timedate');
    if ($submit == 'Cancel') {
        redirect('enquiries/inbox');
    }
    if ($submit == 'Submit') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('subject','Subject','required|max_length[250]');
        $this->form_validation->set_rules('message','Message','required');
        $this->form_validation->set_rules('sent_to','Recipent','required');
        if ($this->form_validation->run() == TRUE) {
        
            $data = $this->fetch_data_from_post();
            $data['date_created']   = time();
            $data['code'] = $this->site_security->generate_random_string(8);

            // send new message
            $this->_insert($data);
            
            
            $msg = 'The message was successfully sent';
            $value = '<div class="alert alert-success">'.$msg.'</div>';
            $this->session->set_flashdata('item',$value);
            redirect('enquiries/inbox');
        }
    }

    if (is_numeric($update_id) && $submit != 'Submit') {
        $data = $this->fetch_data_from_db($update_id);
        $data['message'] = "<br><br>---------------------------------------------------<br>The orginal message is shown bellow.<br><br>".$data['message'];
    }else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = 'Compose New Message';
    }else{
        $data['headline'] = 'Reply To Message';
    }

    $data['options'] = $this->_fetch_customers_as_options();

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('page');
    // $data['view_mouie']s= 'enqiuiried';
    $data['view_file'] = 'create';
    $this->load->module('templates');
    $this->templates->admin($data);
}


function fetch_data_from_post() 
{
    $data['subject']        = $this->input->post('subject',TRUE);
    $data['message']        = $this->input->post('message',TRUE);
    $data['sent_to']        = $this->input->post('sent_to',TRUE);
    return $data;
}

function fetch_data_from_db($update_id) 
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $query = $this->get_where($update_id);
    foreach($query->result() as $row) {
        $data['subject']        = $row->subject;
        $data['message']        = $row->message;
        $data['date_created']   = $row->date_created;
        $data['opened']         = $row->opened;
        $data['sent_to']        = $row->sent_to;
        $data['sent_by']        = $row->sent_by;
        $data['urgent']         = $row->urgent;
    }

    if (!isset($data)) {
        $data = '';
    }

    return $data;
}

function view()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $this->_set_to_opened($update_id);
    $options['']  = 'Select.....';
    $options['1'] = 'One Star';
    $options['2'] = 'Two Star';
    $options['3'] = 'Three Star';
    $options['4'] = 'Four Star';
    $options['5'] = 'Five Star';
   
    // set the options for ranking
    $data['options'] = $options;

    $data['query'] = $this->get_where($update_id);
    $data['headline'] = 'Enquiry ID  '.$update_id;
    $data['update_id'] = $update_id;

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = 'view';
    $this->load->module('templates');
    $this->templates->admin($data);
}

function _set_to_opened($update_id)
{
    $data['opened'] = 1;
    $this->_update($update_id,$data);
}

function inbox() 
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $folder_type = 'inbox';
    $data['query'] =$this->_fetch_enquiries($folder_type);
    $data['folder_type'] = ucfirst($folder_type);

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = 'view_enquiries';
    $this->load->module('templates');
    $this->templates->admin($data);
}


function _fetch_enquiries($folder_type)
{
    $mysql_query = "select enquiries.*, store_accounts.username, store_accounts.firstname,store_accounts.company, store_accounts.lastname from enquiries left join store_accounts on store_accounts.id = enquiries.sent_by where enquiries.sent_to = 0 order by date_created desc";
    $query = $this->_custom_query($mysql_query);
    return $query;
}

function _fetch_customer_enquiries($folder_type,$customer_id)
{
    $mysql_query = "select enquiries.*, store_accounts.username, store_accounts.firstname,store_accounts.company, store_accounts.lastname from enquiries left join store_accounts on store_accounts.id = enquiries.sent_to where enquiries.sent_to=$customer_id order by date_created desc";
    $query = $this->_custom_query($mysql_query);

    return $query;    
}

function get($order_by)
{
    $this->load->model('mdl_enquiries');
    $query = $this->mdl_enquiries->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_enquiries');
    $query = $this->mdl_enquiries->get_with_limit($limit, $offset, $order_by);
    return $query;
}


function get_with_double_condition($col1, $value1,$col2, $value2) 
{
    $this->load->model('mdl_enquiries');
    $query = $this->mdl_enquiries->get_with_double_condition($col1, $value1,$col2, $value2);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_enquiries');
    $query = $this->mdl_enquiries->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_enquiries');
    $query = $this->mdl_enquiries->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_enquiries');
    $this->mdl_enquiries->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_enquiries');
    $this->mdl_enquiries->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_enquiries');
    $this->mdl_enquiries->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_enquiries');
    $count = $this->mdl_enquiries->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_enquiries');
    $max_id = $this->mdl_enquiries->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_enquiries');
    $query = $this->mdl_enquiries->_custom_query($mysql_query);
    return $query;
}

}
<?php
class Store_order_status extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

function _get_dropdown_options()
{   
    $options['0'] = 'Order Submitted';
    $query = $this->get('status_title');
    foreach ($query->result() as $row) {
        $options[$row->id] = $row->status_title;
    }
    return $options;
}

function _get_status_title($update_id)
{
    $query = $this->get_where($update_id);
    foreach ($query->result() as $row) {
        $status_title = $row->status_title;
    }

    if (!isset($status_title)) {
        $status_title = 'Unknown';
    }
    return $status_title;
}

function _draw_left_nav_links()
{
    // Here sos is store_order_status
    $data['query_sos'] = $this->get('status_title');
    $this->load->view('left_nav_links',$data);
}

function _make_sure_delete_allowed($update_id)
{
    // RETURN true or false;

    // do not allow IF customer has item in his basket or (in shopper_track)
    $mysql_query = "select * from store_order where order_status = $update_id";
    $query = $this->_custom_query($mysql_query);
    $num_rows = $query->num_rows();
    if ($num_rows > 0) {
        return FALSE; // delete not allowed since has items in basket
    }else {
        return TRUE; // Everything is cool now delete this order_status
    } 
}

function _process_delete($update_id)
{
    // attempt delete page blogs
    $allowed = $this->_make_sure_delete_allowed($update_id);
    if ($allowed == FALSE) {
        $msg = 'You are not allowed to delete this status option, since there is atleast one order with this status';
        $value = '<div class="alert alert-danger"><span>'.$msg.'</span></div>';
        $this->session->set_flashdata('item',$value);
        redirect('store_order_status/manage');
    }
    $this->_delete($update_id);
}

function delete($update_id)
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);

    if ($submit == 'Cancel') {
        redirect('store_order_status/create/'.$update_id);
    }elseif ($submit == 'Yes - Delete Order Status Option') {
        $this->_process_delete($update_id);

        $msg = 'The Order Status Option was Successfully Deleted';
        $value = '<div class="alert alert-success"><span>'.$msg.'</span></div>';
        $this->session->set_flashdata('item',$value);

        redirect('store_order_status/manage');
    }
}

function deleteconf($update_id)
{   
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data = $this->fetch_data_from_db($update_id);

    $data['headline'] = 'Delete Order Status Option';
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');      
    $data['view_file'] = 'deleteconf';
    $this->load->module('templates');
    $this->templates->admin($data);
}


function _get_customer_name($update_id,$optional_data=NULL)
{
    if (!isset($optional_data)) {
        $data = $this->fetch_data_from_db($update_id);
    }else{
        $data['firstname']  = $optional_data['firstname'];
        $data['status_title']   = $optional_data['status_title'];
        $data['company']    = $optional_data['company'];
    }

    if ($data=="") {
        $customer_name=="Unknown";
    }else{
        $firstname  = trim(ucfirst($data['firstname']));
        $status_title   = trim(ucfirst($data['status_title']));
        $company    = trim(ucfirst($data['company']));

        $company_legth = strlen($company);
        if ($company_legth>2) {
            $customer_name = $company;
        }else{   
            $customer_name = $firstname.' '.$status_title;
        }
    }

    return $customer_name;
}

function autogen()
{
    $table = 'store_basket';
    $mysql_query = "show columns from $table";
    $query = $this->_custom_query($mysql_query);
    foreach($query->result() as $row) {
        $column_name = $row->Field;
        if ($column_name!="id") {
            echo '$data[\''.$column_name.'\'] = $this->input->post(\''.$column_name.'\',TRUE);<br>';
        }
    }
    echo "<hr>";

    foreach($query->result() as $row) {
        $column_name = $row->Field;
        if ($column_name!="id") {
            echo '$data[\''.$column_name.'\'] = $row->'.$column_name.';<br>';
        }
    }

    echo "<hr>";
    foreach($query->result() as $row) {
        $column_name = $row->Field;
        if ($column_name!="id") {
            $var = ' <div class="control-group">
                  <label class="control-label" for="typeahead">'.ucfirst($column_name).'</label>
                  <div class="controls">
                    <input type="text" class="span6" name="'.$column_name.'" value="<?= '.$column_name.'?>">
                  </div>
                </div>';

            echo htmlentities($var);
            echo "<br>";
        }
    }

                   
}


function create() 
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit',TRUE);
    if ($submit == 'Cancel') {
        redirect('store_order_status/manage');
    }
    if ($submit == 'Submit') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('status_title','Status Title','required');
        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();
            
            // get the variables
            if (is_numeric($update_id)) {
                // update account detail
                $this->_update($update_id,$data);

                $msg = 'The status tiltle was Successfully Updated';
                $value = '<div class="alert alert-success"><span>'.$msg.'</span></div>';
                $this->session->set_flashdata('item',$value);
                redirect('store_order_status/create/'.$update_id);
            }else {
                
                // insert new item
                $this->_insert($data);  
                $update_id = $this->get_max();
                
                $msg = 'The order status option was Successfully Added';
                $value = '<div class="alert alert-success"><span>'.$msg.'</span></div>';
                $this->session->set_flashdata('item',$value);
                redirect('store_order_status/create/'.$update_id);
            }
        }
    }

    if (is_numeric($update_id) && $submit != 'Submit') {
        $data = $this->fetch_data_from_db($update_id);
    }else {
        $data = $this->fetch_data_from_post();
    }

    if (is_numeric($update_id)) {
        $data['headline'] = 'Update Order Status Option';
    }else {
        $data['headline'] = 'Add New Order Status Option';
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = 'store_order_status';
    $data['view_file'] = 'create';
    $this->load->module('templates');
    $this->templates->admin($data);
}

function fetch_data_from_post()
{
    $data['status_title']   = $this->input->post('status_title',TRUE);
    return $data;
}

function fetch_data_from_db($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $query = $this->get_where($update_id);
    foreach($query->result() as $row) {
        $data['status_title'] = $row->status_title;
    }

    if (!isset($data)) {
        $data = '';
    }
    return $data;
}

function manage() 
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['flash'] = $this->session->flashdata('item');

    $data['query'] = $this->get('status_title');
    $data['view_file'] = 'manage';
    $this->load->module('templates');
    $this->templates->admin($data);
}

function get($order_by)
{
    $this->load->model('mdl_store_order_status');
    $query = $this->mdl_store_order_status->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_order_status');
    $query = $this->mdl_store_order_status->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_order_status');
    $query = $this->mdl_store_order_status->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_store_order_status');
    $query = $this->mdl_store_order_status->get_where_custom($col, $value);
    return $query;
}

function get_with_double_condition($col1, $value1,$col2, $value2) 
{
    $this->load->model('mdl_store_order_status');
    $query = $this->mdl_store_order_status->get_with_double_condition($col1, $value1,$col2, $value2);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_store_order_status');
    $this->mdl_store_order_status->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_order_status');
    $this->mdl_store_order_status->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_order_status');
    $this->mdl_store_order_status->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_store_order_status');
    $count = $this->mdl_store_order_status->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_store_order_status');
    $max_id = $this->mdl_store_order_status->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_store_order_status');
    $query = $this->mdl_store_order_status->_custom_query($mysql_query);
    return $query;
}

}
<?php
class Item_galleries extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function _get_parent_title($parent_id)
{
    $parent_module_name = 'store_items';
    $this->load->module($parent_module_name);
    $parent_title = $this->$parent_module_name->_get_title($parent_id);
    return $parent_title;
}

function _get_entity_name($type)
{
    if ($type=='singular') {
        $entity_name = 'picture';
    }else{
        $entity_name = 'pictures';
    }

    return $entity_name;
}

function _get_update_group_headline($parent_id)
{
    $parent_title = ucfirst($this->_get_parent_title($parent_id));
    $entity_name = ucfirst($this->_get_entity_name('plural'));
    $headline = 'Update '.$entity_name.' for '.$parent_title;
    return $headline;
}

function update_group($parent_id)
{
    // update manage the records belonging to a parent
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['parent_id'] = $parent_id;
    $data['headline'] ='Manage Item Galleries';
    $data['sub_headline'] = $this->_get_update_group_headline($parent_id);
    $data['flash'] = $this->session->flashdata('item');

    $data['query'] = $this->get_where_custom('parent_id',$parent_id);
    $data['num_rows'] = $data['query']->num_rows();

    $entity_name = ucfirst($this->_get_entity_name('plural'));
    $data['entity_name'] = $entity_name; 
    $data['parent_title'] = $this->_get_parent_title($parent_id);

    $data['view_file'] = 'update_group';
    $this->load->module('templates');
    $this->templates->admin($data);
}

function _process_delete($update_id)
{
    $data = $this->fetch_data_from_db($update_id);

    $picture = $data['picture'];
    $picture_path = './item_galleries_pics/'.$picture;
    
    if (file_exists($picture_path)) {
        unlink($picture_path);
    }

    // attempt delete item items
    $this->_delete($update_id);
}

function delete($update_id)
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);

    if ($submit == 'Cancel') {
        redirect('item_galleries/view/'.$update_id);
    }elseif ($submit == 'Yes - Delete') {
        $parent_id = $this->_get_parent_id($update_id);
        $this->_process_delete($update_id);

        $entity_name = $this->_get_entity_name('singular');
        $msg = 'The '.$entity_name.' was Successfully Delete';
        $value = '<div class="alert alert-success">'.$msg.'</div>';
        $this->session->set_flashdata('item',$value);

        redirect('item_galleries/update_group/'.$parent_id);
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
    $entity_name = $this->_get_entity_name('singular');

    $data['headline'] = 'Delete '.ucfirst($entity_name);
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');      
    $data['view_file'] = 'deleteconf';
    $this->load->module('templates');
    $this->templates->admin($data);

}

function submit_create()
{
    // form has been submitted, try to create a new record 
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['parent_id'] = $this->input->post('parent_id',TRUE);

    $this->_insert($data);
    $max_id = $this->get_max();
    redirect('item_galleries/view/'.$max_id);
}


function _draw_img_btn($update_id)
{
    // draw upload image btn
    $data = $this->fetch_data_from_db($update_id);
    $picture = $data['picture'];
    if ($picture=='') {
        $data['got_pic'] = FALSE;
        $data['btn_style'] = '';
        $data['btn_info'] = 'No pictures has been uploaded so far.';
    }else{
        $data['got_pic'] = TRUE;
        $data['btn_style'] = " style = 'clear: both; margin-top : 24px;'";
        $data['btn_info'] = 'The picture is being used for this is shown below';
        $data['pic_path'] = base_url().'item_galleries_pics/'.$picture;
    }

    $this->load->view('img_btn',$data);
}

function submit($update_id)
{
    // update the record that has been submitted via view
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit',TRUE);
    
    if ($submit=='Cancel') {
        $parent_id = $this->_get_parent_id($update_id);
        redirect('item_galleries/update_group/'.$parent_id);
    }elseif ($submit=='Submit') { 
        $this->_update($update_id,$data);
        redirect('item_galleries/view/'.$update_id);  
    }
}

function upload_image($parent_id) 
{
    if (!is_numeric($parent_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $parent_id = $this->uri->segment(3);
    
    $data['headline'] = 'Upload Image';
    $data['parent_id'] = $parent_id;
    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = 'store_items';
    $data['view_file'] = 'upload_image';
    $this->load->module('templates');
    $this->templates->admin($data);
}


function do_upload($parent_id) 
{   
    if (!is_numeric($parent_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit',TRUE);

    if ($submit == 'Cancel') {
        redirect('item_galleries/update_group/'.$parent_id);
    }

    $config['upload_path'] = './item_galleries_pics/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']  = '1500';
    $config['max_width']  = '1920';
    $config['max_height']  = '1600';
    
    $this->load->library('upload', $config);
    
    if (!$this->upload->do_upload()){
        $data['error'] = array('error' => $this->upload->display_errors());
        $data['headline'] = 'Upload Error';
        $data['parent_id'] = $parent_id;
        $data['flash'] = $this->session->flashdata('item');      
        $data['view_file'] = 'upload_image';
        $this->load->module('templates');
        $this->templates->admin($data);
    }else{
        $data = array('upload_data' => $this->upload->data());

        $upload_data = $data['upload_data'];
        $file_name = $upload_data['file_name'];
        unset($data);
        $data['parent_id'] = $parent_id;
        $data['picture'] = $file_name;
        $this->_insert($data);
        
        redirect('item_galleries/update_group/'.$parent_id);
    }
}


function _get_parent_id($update_id)
{
    $data = $this->fetch_data_from_db($update_id);
    $parent_id = $data['parent_id'];
    return $parent_id;
}

function fetch_data_from_post() 
{
    $data['parent_id']      = $this->input->post('parent_id',TRUE);
    return $data;
}

function fetch_data_from_db($update_id) 
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $query = $this->get_where($update_id);
    foreach($query->result() as $row) {
        $data['parent_id']      = $row->parent_id;
        $data['picture']      = $row->picture;
    }

    if (!isset($data)) {
        $data = '';
    }

    return $data;
}


function get($order_by)
{
    $this->load->model('mdl_item_galleries');
    $query = $this->mdl_item_galleries->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_item_galleries');
    $query = $this->mdl_item_galleries->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_item_galleries');
    $query = $this->mdl_item_galleries->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_item_galleries');
    $query = $this->mdl_item_galleries->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_item_galleries');
    $this->mdl_item_galleries->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_item_galleries');
    $this->mdl_item_galleries->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_item_galleries');
    $this->mdl_item_galleries->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_item_galleries');
    $count = $this->mdl_item_galleries->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_item_galleries');
    $max_id = $this->mdl_item_galleries->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_item_galleries');
    $query = $this->mdl_item_galleries->_custom_query($mysql_query);
    return $query;
}

}
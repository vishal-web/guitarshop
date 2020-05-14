<?php
class Store_items extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->library('form_validation');
    $this->form_validation->CI =& $this;
}

function _get_title($update_id)
{
    $data = $this->fetch_data_from_db($update_id);
    $item_itle = $data['item_title'];
    return $item_itle;
}

function _get_all_items_for_dropdown() 
{
    // NOTE: This gets used on homepage_blocks
    $mysql_query = "select * from store_items order by item_title";
    $query = $this->_custom_query($mysql_query);
    foreach ($query->result() as $row) {
        $items[$row->id] = $row->item_title;
    }

    if (!isset($items)) {
        $items = "";
    }
    return $items;
}


function _get_item_title($update_id)
{
    $data = $this->fetch_data_from_db($update_id);
    $item_title =  $data['item_title'];
    return $item_title;
}

function _get_item_id_from_item_url($item_url)
{   
    $query = $this->get_where_custom('item_url',$item_url);
    foreach ($query->result() as $row) {
        $item_id = $row->id;
    }

    if (!isset($item_id)) {
        $item_id = "0";
    }

    return $item_id;
}   

function view($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }
    $this->load->module('site_settings');
    

    // fetch the item details
    $data = $this->fetch_data_from_db($update_id);
    $data['update_id'] = $update_id;
    $data['item_price_desc'] = number_format($data['item_price']);
    $data['item_price_desc'] = str_replace('.00', '', $data['item_price_desc']);

    $query_item_gallery_pics = $this->_get_gallery_pics($update_id);
    $num_rows = $query_item_gallery_pics->num_rows();
    if ($num_rows>0) {
        // we have at least one gallery picture
        $data['use_angularjs'] = TRUE;
        
        // build the array of all gallery pics
        $count = 0;
        foreach ($query_item_gallery_pics->result() as $row) {
            $gallery_pics[$count] = base_url().'item_galleries_pics/'.$row->picture;
            $count++;
        }   
        $data['use_angularjs'] = TRUE;

        $data['gallery_pics'] = $gallery_pics;
        $data['view_file'] = "view_gallery_version";

    }else{
        // load a normal page
        $data['view_file'] = "view";
    }

    // create breadcrumbs array
    $breadcrumbs_data['template'] = 'public_template';
    $breadcrumbs_data['current_page_title'] = $data['item_title'];
    $breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs($update_id);
    $data['breadcrumbs_data'] = $breadcrumbs_data;
    
    $data['currency_symbol'] = $this->site_settings->_get_currency_symbol();

    $data['use_featherlight'] = TRUE;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_module'] = 'store_items';
    $this->load->module('templates');
    $this->templates->public_template($data);
}

function _generate_breadcrumbs($update_id)
{
    $homepage_url = base_url();
    $breadcrumbs_array[$homepage_url] = 'Home';
    
    // figure out what the sub category if for this item
    $sub_cat_id = $this->_get_sub_cat_id($update_id);
    
    // get the sub cat title 
    $this->load->module('store_categories');
    $sub_cat_title = $this->store_categories->_get_cat_title($sub_cat_id);
    
    // get the sub cat url
    $sub_cat_url = $this->store_categories->_get_full_cat_url($sub_cat_id);

    $breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
    return $breadcrumbs_array;
}

function _get_sub_cat_id($update_id)
{   

    if (isset($_SERVER['HTTP_REFERER'])) {
        $refer_url = $_SERVER['HTTP_REFERER'];
    }else{
        $refer_url = '';
    }

    $this->load->module('site_settings');
    $this->load->module('store_categories');

    $item_segments = $this->site_settings->_get_items_segments();
    $ditch_this = base_url().$item_segments;
    $cat_url = str_replace($ditch_this, '', $refer_url);
    
    $sub_cat_id = $this->store_categories->_get_cat_id_from_cat_url($cat_url);
    if ($sub_cat_id>0) {
        return $sub_cat_id;
    }else{
        $sub_cat_id = $this->_get_best_sub_cat_id($update_id);
        return $sub_cat_id;
    }
}

function _get_best_sub_cat_id($update_id) 
{
    $this->load->module('store_cat_assign');
    
    // figure out sub cat id has most of the items
    $query = $this->store_cat_assign->get_where_custom('item_id',$update_id);
    foreach ($query->result() as $row) {
        $potential_sub_cats[] = $row->cat_id;
    } 

    // how many sub cats does this item appear in..?
    $num_sub_cat_for_item = count($potential_sub_cats);

    if ($num_sub_cat_for_item == 1) {
        // The item Only appers in one sub category
        $sub_cat_id = $potential_sub_cats[0];
        return $sub_cat_id;
    }else{
        // we have more than one sub cat START
        foreach ($potential_sub_cats as $key => $value) {
            $sub_cat_id = $value;
            $num_items_in_sub_cat = $this->store_cat_assign->count_where('cat_id',$sub_cat_id);
            $num_items_count[$sub_cat_id] = $num_items_in_sub_cat; 
        }

        // which key of this array has paired with highest items....?
        $sub_cat_id = $this->_get_key_of_highest_value($num_items_count);
        return $sub_cat_id;
        // we have more than one sub cat END
    }
    
}

function _get_key_of_highest_value($target_array) 
{
    foreach ($target_array as $key => $value) {
        if (!isset($key_with_highest_value)) {
            $key_with_highest_value = $key;
        }elseif ($value>$target_array[$key_with_highest_value]) {
            $key_with_highest_value = $key; 
        }
    }
    return $key_with_highest_value;
}

function _process_delete($update_id)
{
    // attempt delete item colors
    $this->load->module('store_item_colors');
    $this->store_item_colors->_delete_for_item($update_id);

    // attempt delete item sizes
    $this->load->module('store_item_sizes');
    $this->store_item_sizes->_delete_for_item($update_id);

    $data = $this->fetch_data_from_db($update_id);
    $small_pic = $data['small_pic'];
    $big_pic = $data['big_pic'];

    $big_pic_path = './big_pics/'.$big_pic;
    $small_pic_path = './small_pics/'.$small_pic;

    // remove images
    if (file_exists($big_pic_path)) {
        unlink($big_pic_path);
    }
    if (file_exists($small_pic_path)) {
        unlink($small_pic_path);
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
        redirect('store_items/create/'.$update_id);
    }elseif ($submit == 'Yes - Delete Item') {
        $this->_process_delete($update_id);

        $msg = 'The item was Successfully Delete';
        $value = '<div class="alert alert-success">'.$msg.'</div>';
        $this->session->set_flashdata('item',$value);

        redirect('store_items/manage');
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

    $data['headline'] = 'Delete Item';
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');      
    $data['view_file'] = 'deleteconf';
    $this->load->module('templates');
    $this->templates->admin($data);

}

function delete_image($update_id) 
{   
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data = $this->fetch_data_from_db($update_id);
    $small_pic = $data['small_pic'];
    $big_pic = $data['big_pic'];

    $big_pic_path = './big_pics/'.$big_pic;
    $small_pic_path = './small_pics/'.$small_pic;

    // remove images
    if (file_exists($big_pic_path)) {
        unlink($big_pic_path);
    }
    if (file_exists($small_pic_path)) {
        unlink($small_pic_path);
    }

    // update the database
    unset($data);
    $data['small_pic'] = "";
    $data['big_pic'] = "";
    $this->_update($update_id,$data);

    $msg = 'The item image was Successfully Deleted';
    $value = '<div class="alert alert-danger">'.$msg.'</div>';
    $this->session->set_flashdata('item',$value);
    redirect('store_items/create/'.$update_id);
}

function _generate_thumbnail($file_name) 
{   
  
    $config['image_library'] = 'gd2';
    $config['source_image'] = './big_pics/'.$file_name;
    $config['new_image'] = './small_pics/'.$file_name;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;

    $this->load->library('image_lib', $config);
  
    $this->image_lib->resize();   
}

function do_upload($update_id) 
{   
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit',TRUE);

    if ($submit == 'Cancel') {
        redirect('store_items/create/'.$update_id);
    }

    $config['upload_path'] = './big_pics/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']  = '1500';
    $config['max_width']  = '1600';
    $config['max_height']  = '1600';
    
    $this->load->library('upload', $config);
    
    if (!$this->upload->do_upload()){
        $data['error'] = array('error' => $this->upload->display_errors());
        $data['headline'] = 'Upload Error';
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');      
        $data['view_file'] = 'upload_image';
        $this->load->module('templates');
        $this->templates->admin($data);
    }else{
        $data = array('upload_data' => $this->upload->data());

        $upload_data = $data['upload_data'];
        $file_name = $upload_data['file_name'];

        $update_data['small_pic'] = $file_name;
        $update_data['big_pic'] = $file_name;
        $this->_update($update_id,$update_data);
        $this->_generate_thumbnail($file_name);

        $data['headline'] = 'Upload Success';
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');      
        $data['view_file'] = 'upload_success';
        $this->load->module('templates');
        $this->templates->admin($data);
    }
}

function upload_image($update_id) 
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    
    $data['headline'] = 'Upload Image';
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = 'store_items';
    $data['view_file'] = 'upload_image';
    $this->load->module('templates');
    $this->templates->admin($data);
}

function manage() 
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['flash'] = $this->session->flashdata('item');
    
    $data['query'] = $this->get('item_title');
    $data['view_file'] = 'manage';
    $this->load->module('templates');
    $this->templates->admin($data);
}

function _got_gallery_pic($update_id)
{
    $this->load->module('item_galleries');
    $query = $this->item_galleries->get_where_custom('parent_id',$update_id);
    $num_rows = $query->num_rows();

    if ($num_rows>0) {
        return FALSE; // we have at least one picture in the gallery pictures;
    }else{
        return TRUE;
    }
}

function _get_gallery_pics($update_id)
{
    $this->load->module('item_galleries');
    $query = $this->item_galleries->get_where_custom('parent_id',$update_id);
    return $query;
}


function create() 
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit',TRUE);
    if ($submit == 'Cancel') {
        redirect('store_items/manage');
    }
    if ($submit == 'Submit') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_title','Item title','required|callback_item_check');
        $this->form_validation->set_rules('item_price','Item Price','required|numeric');
        $this->form_validation->set_rules('was_price','Was Price','numeric');
        $this->form_validation->set_rules('item_description','Item Description','required');
        $this->form_validation->set_rules('status','Status','required|numeric');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();
            $data['item_url'] = url_title($data['item_title']);
            // get the variables
            if (is_numeric($update_id)) {
                // update item detail
                $this->_update($update_id,$data);

                $msg = 'The item details was Successfully Updated';
                $value = '<div class="alert alert-success">'.$msg.'</div>';
                $this->session->set_flashdata('item',$value);
                redirect('store_items/create/'.$update_id);
            }else {
                // insert new item
                $this->_insert($data);
                $update_id = $this->get_max();
                
                $msg = 'The item was Successfully Added';
                $value = '<div class="alert alert-success">'.$msg.'</div>';
                $this->session->set_flashdata('item',$value);
                redirect('store_items/create/'.$update_id);
            }
        }
    }

    if (is_numeric($update_id) && $submit != 'Submit') {
        $data = $this->fetch_data_from_db($update_id);
    }else {
        $data = $this->fetch_data_from_post();
        $data['big_pic'] = "";
    }

    if (is_numeric($update_id)) {
        $data['headline'] = 'Update Items Details';
    }else {
        $data['headline'] = 'Add New Items';
    }

    $data['got_gallery_pic'] = $this->_got_gallery_pic($update_id);
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');

    $data['view_file'] = 'create';
    $this->load->module('templates');
    $this->templates->admin($data);
}

function fetch_data_from_post() 
{
    $data['item_title']     = $this->input->post('item_title',TRUE);
    $data['item_price']     = $this->input->post('item_price',TRUE);
    $data['was_price']      = $this->input->post('was_price',TRUE);
    $data['status']      = $this->input->post('status',TRUE);
    $data['item_description'] = $this->input->post('item_description',TRUE);

    return $data;
}

function fetch_data_from_db($update_id) 
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $query = $this->get_where($update_id);
    foreach($query->result() as $row) {
        $data['item_title']     = $row->item_title;
        $data['item_price']     = $row->item_price;
        $data['was_price']      = $row->was_price;
        $data['item_url']       = $row->item_url;
        $data['big_pic'] = $row->big_pic;
        $data['small_pic'] = $row->small_pic;
        $data['status'] = $row->status;
        $data['big_pic'] = $row->big_pic;
        $data['item_description'] = $row->item_description;
    }

    if (!isset($data)) {
        $data = '';
    }

    return $data;
}

function item_check($str) 
{
    $item_url = url_title($str);
    $update_id = $this->uri->segment(3);
    $mysql_query = 'select * from store_items where item_title = "$str" and item_url = "$item_url"';
    
    if (is_numeric($update_id)) {
        $mysql_query .= " and id != $update_id";
    }

    $query = $this->_custom_query($mysql_query);
    $num_rows = $query->num_rows();


    if ($num_rows > 0) {
        $this->form_validation->set_message('item_check','The item title that you submitted is not avaliable');
        return false;
    }else{
        return true;
    }
}

function get($order_by)
{
    $this->load->model('mdl_store_items');
    $query = $this->mdl_store_items->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_items');
    $query = $this->mdl_store_items->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_items');
    $query = $this->mdl_store_items->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_store_items');
    $query = $this->mdl_store_items->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_store_items');
    $this->mdl_store_items->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_items');
    $this->mdl_store_items->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_store_items');
    $this->mdl_store_items->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_store_items');
    $count = $this->mdl_store_items->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_store_items');
    $max_id = $this->mdl_store_items->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_store_items');
    $query = $this->mdl_store_items->_custom_query($mysql_query);
    return $query;
}

}
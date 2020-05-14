<?php
class Homepage_offers extends MX_Controller 
{

function __construct() {
    parent::__construct();
}

function _draw_offers($blocks_data)
{
    // block data must contains these variables $block_id,$theme,$item_segments,$curreny_symbol
    $block_id       = $blocks_data['block_id'];
    $theme          = $blocks_data['theme'];
    $item_segments  = $blocks_data['item_segments'];
    $currency_symbol = $blocks_data['currency_symbol'];

    $mysql_query = "
    select store_items.* from homepage_offers 
    inner join store_items on store_items.id = homepage_offers.item_id
    inner join homepage_blocks on homepage_blocks.id = homepage_offers.block_id
    where homepage_offers.block_id = $block_id";

    $query = $this->_custom_query($mysql_query);
    $num_rows = $query->num_rows();
    if ($num_rows>0) {
        $data['query']=$query;
        $data['theme']=$theme;
        $data['currency_symbol']=$currency_symbol;
        $data['item_segments']=$item_segments;
        $this->load->view('offers',$data);
    }
}

function _delete_for_item($block_id)
{
    $mysql_query = "delete  from homepage_offers where block_id = $block_id";
    $query = $this->_custom_query($mysql_query);
}

function delete($update_id) 
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $query = $this->get_where($update_id);
    $block_id = $query->row()->block_id;

    $this->_delete($update_id);

    $msg = 'The offer items was successfully Deleted';
    $value = '<div class="alert alert-success">'.$msg.'</div>';
    $this->session->set_flashdata('item',$value);

    redirect('homepage_offers/update/'.$block_id);
}

function submit($update_id)
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    $item_id = trim($this->input->post('item_id', TRUE));
    if ($submit == 'Finished') {
        redirect('homepage_blocks/create/'.$update_id);
    }elseif ($submit == 'Submit') {
        if ($item_id!="") {
            $data['item_id'] = $item_id;
            $data['block_id'] = $update_id;
            $this->_insert($data);
            $msg = 'The new Item id is successfully added';
            $value = '<div class="alert alert-danger">'.$msg.'</div>';
            $this->session->set_flashdata('item',$value);

        }
    }
    redirect('homepage_offers/update/'.$update_id);
}

function update($update_id) 
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }
    
    $this->load->module('store_items');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    // get all items in dropdown
    $store_items = $this->store_items->_get_all_items_for_dropdown();

    $update_id = $this->uri->segment(3);

    // get items which is already assigned
    $query = $this->get_where_custom('block_id',$update_id);
    foreach ($query->result() as $row) {
        $item_title = $this->store_items->_get_item_title($row->item_id);
        $assigned_items[$row->item_id] = $item_title;
    }

    if (!isset($assigned_items)) {
        $assigned_items = '';
    }else{
        $store_items = array_diff($store_items, $assigned_items);
    }

    $data['options'] = $store_items;

    // fetch exsiting offer options
    $data['query'] = $this->get_where_custom('block_id',$update_id);
    $data['num_rows'] = $data['query']->num_rows();

    $data['headline'] = 'Update Homepage Offer';
    $data['update_id'] = $update_id;
    $data['item_id'] = '';
    
    $data['flash'] = $this->session->flashdata('item');
    // $data['view_module'] = 'store_items';
    $data['view_file'] = 'update';
    $this->load->module('templates');
    $this->templates->admin($data);
}

function get($order_by)
{
    $this->load->model('mdl_homepage_offers');
    $query = $this->mdl_homepage_offers->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_homepage_offers');
    $query = $this->mdl_homepage_offers->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_homepage_offers');
    $query = $this->mdl_homepage_offers->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_homepage_offers');
    $query = $this->mdl_homepage_offers->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_homepage_offers');
    $this->mdl_homepage_offers->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_homepage_offers');
    $this->mdl_homepage_offers->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_homepage_offers');
    $this->mdl_homepage_offers->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_homepage_offers');
    $count = $this->mdl_homepage_offers->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_homepage_offers');
    $max_id = $this->mdl_homepage_offers->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_homepage_offers');
    $query = $this->mdl_homepage_offers->_custom_query($mysql_query);
    return $query;
}

}
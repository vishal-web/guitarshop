<?php
class Homepage_blocks extends MX_Controller 
{

function __construct() {
parent::__construct();
$this->load->helper('text');
}


function _process_delete($update_id)
{
    // delete any items that are associated with this offer blocks
    $mysql_query = "delete from homepage_offers where block_id = $update_id";
    $query = $this->_custom_query($mysql_query);
    $this->_delete($update_id);
}

function delete($update_id)
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);

    if ($submit == 'Cancel') {
        redirect('homepage_blocks/create/'.$update_id);
    }elseif ($submit == 'Yes - Delete Offer Block') {
        $this->_process_delete($update_id);

        $msg = 'The Offer Block was Successfully Delete';
        $value = '<div class="alert alert-success">'.$msg.'</div>';
        $this->session->set_flashdata('item',$value);

        redirect('homepage_blocks/manage');
    }
}

function deleteconf($update_id)
{   
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }elseif ($update_id < 3) { // prevent them deleted 
        redirect('site_security/not_allowed');
    }

    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data = $this->fetch_data_from_db($update_id);

    $data['headline'] = 'Delete Entire Offer Block';
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('blog');      
    $data['view_file'] = 'deleteconf';
    $this->load->module('templates');
    $this->templates->admin($data);
}


function _draw_sortable_list()
{   
    $mysql_query = "select * from homepage_blocks  order by priority";
    $data['query'] = $this->_custom_query($mysql_query);
    $this->load->view('sortable_list',$data);
}
function _draw_blocks()
{
    // draw homepage offer blocks
    $data['query'] = $this->get('priority');
    $num_rows = $data['query']->num_rows();
    if ($num_rows>0){
        $this->load->view('homepage_blocks',$data);
    }
}
function test()
{
    $users['Lue'] = '100';
    $users['Abhi'] = '30';
    $users['Gidha'] = '70';
    $users['Uash'] = '700';
    $users['Yesr'] = '80';

    echo "<h1>Find Out The Oldest User</h1>";
    echo $this->_get_oldest_users($users);
}

function _get_oldest_users($target_array)
{   
    foreach ($target_array as $key => $value) {
        if (!isset($find)) {
            $find = $key;
        }elseif ($value > $target_array[$find]) {
            $find = $key;
        }
    }
    return $find;
}

function view($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    // load modules 
    $this->load->module('custom_pagination');
    $this->load->module('site_settings');

    // fetch homepage offer details
    $data = $this->fetch_data_from_db($update_id);

    // count the items that belongs to this homepage offer items
    $use_limit = FALSE;
    $mysql_query = $this->_genrate_mysql_query($update_id,$use_limit);
    $query = $this->_custom_query($mysql_query);
    $total_rows = $query->num_rows();

    // fetch the items for this page
    $use_limit = TRUE;
    $mysql_query = $this->_genrate_mysql_query($update_id,$use_limit);

    //$template, $target_base_url, $offset_segment, $limit, $total_rows
    $pagination_data['template'] = 'public_template';
    $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
    $pagination_data['total_rows'] = $total_rows;
    $pagination_data['offset_segment'] = 4;
    $pagination_data['limit'] = $this->get_limit();
    $data['custom_pagination'] = $this->custom_pagination->_genrate_pagination($pagination_data);

    $pagination_data['offset'] = $this->get_offset();
    $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data);

    $data['item_segments'] = $this->site_settings->_get_item_segments();
    $data['currency_symbol'] = $this->site_settings->_get_currency_symbol();
    $data['query'] = $this->_custom_query($mysql_query);
   
    $data['update_id'] = $update_id;
    $data['view_file'] = 'view';
  
    $data['flash'] = "";
    $data['view_module'] = 'homepage_blocks';
    $this->load->module('templates');
    $this->templates->public_template($data);
}

function get_target_pagination_base_url()
{
    $first_bit = $this->uri->segment(1);
    $second_bit = $this->uri->segment(2);
    $third_bit = $this->uri->segment(3);

    $target_url = base_url().$first_bit.'/'.$second_bit.'/'.$third_bit;
    return $target_url;
}

function _genrate_mysql_query($update_id,$use_limit) 
{
    // NOTE use_limit can be TRUE or FALSE
    $mysql_query = "
    SELECT
    store_items.*
    FROM
    store_cat_assign
    INNER JOIN store_items ON store_items.id = store_cat_assign.item_id
    WHERE store_items.status = '1' and store_cat_assign.cat_id = $update_id";

    if ($use_limit == TRUE) {
        $limit = $this->get_limit();
        $offset = $this->get_offset();

        $mysql_query .= " limit ".$offset.", ".$limit;
    }
    return $mysql_query;
}

function get_limit() 
{
    $limit = 10;
    return $limit;
}

function get_offset() 
{
    $offset = $this->uri->segment('4');
    if (!is_numeric($offset)) {
        $offset = '0';
    }
    return $offset;
}


function sort()
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $number = $this->input->post('number',TRUE);
    for ($i=1; $i <=$number; $i++) { 
        $update_id = $_POST['order'.$i];
        $data['priority'] = $i;
        $this->_update($update_id, $data);
    }

    // $data['posted_info'] = $info;
    // $update_id = 1;
    // $this->_update($update_id, $data);
}



function _get_block_title($update_id)
{
    $data = $this->fetch_data_from_db($update_id);
    $block_title =  $data['block_title'];
    return $block_title;
}



function fetch_data_from_post() 
{
    $data['block_title']     = $this->input->post('block_title',TRUE);

    return $data;
}

function fetch_data_from_db($update_id) 
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $query = $this->get_where($update_id);
    foreach($query->result() as $row) {
        $data['block_title']     = $row->block_title;
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

    $data['sort_this'] = TRUE;
    $data['view_file'] = 'manage';
    $this->load->module('templates');
    $this->templates->admin($data);
}

function create() 
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit',TRUE);
    if ($submit == 'Cancel') {
        redirect('homepage_blocks/manage');
    }
    if ($submit == 'Submit') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('block_title','Homepage Offer title','required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();
            // get the variables
            if (is_numeric($update_id)) {
                // update item detail
                $this->_update($update_id,$data);

                $msg = 'The Homepage Offer details was Successfully Updated';
                $value = '<div class="alert alert-success">'.$msg.'</div>';
                $this->session->set_flashdata('homepage_offer',$value);
                redirect('homepage_blocks/create/'.$update_id);
            }else {

                // insert new Homepage Offer
                $this->_insert($data);
                $update_id = $this->get_max();
                
                $msg = 'The Homepage Offer was Successfully Added';
                $value = '<div class="alert alert-success">'.$msg.'</div>';
                $this->session->set_flashdata('homepage_offer',$value);
                redirect('homepage_blocks/create/'.$update_id);
            }
        }
    }

    if (is_numeric($update_id) && $submit != 'Submit') {
        $data = $this->fetch_data_from_db($update_id);
    }else {
        $data = $this->fetch_data_from_post();
    }

    if (is_numeric($update_id)) {
        $block_title = $this->_get_block_title($update_id);
        $data['headline'] = 'Update '.$block_title;
    }else {
        $data['headline'] = 'Create New Homepage Offer';
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('homepage_offer');
    // $data['view_module'] = 'homepage_blocks';
    $data['view_file'] = 'create';
    $this->load->module('templates');
    $this->templates->admin($data);
}

function get($order_by)
{
    $this->load->model('mdl_homepage_blocks');
    $query = $this->mdl_homepage_blocks->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_homepage_blocks');
    $query = $this->mdl_homepage_blocks->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_homepage_blocks');
    $query = $this->mdl_homepage_blocks->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_homepage_blocks');
    $query = $this->mdl_homepage_blocks->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_homepage_blocks');
    $this->mdl_homepage_blocks->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_homepage_blocks');
    $this->mdl_homepage_blocks->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_homepage_blocks');
    $this->mdl_homepage_blocks->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_homepage_blocks');
    $count = $this->mdl_homepage_blocks->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_homepage_blocks');
    $max_id = $this->mdl_homepage_blocks->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_homepage_blocks');
    $query = $this->mdl_homepage_blocks->_custom_query($mysql_query);
    return $query;
}

}
<?php
class Yourorders extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function _get_order_status_options()
{
    $this->load->module('store_order_status');
    $options = $this->store_order_status->_get_dropdown_options();
    return $options;
}

function browse()
{
    $this->load->module('custom_pagination');
    $this->load->module('site_security');
    $this->load->module('site_settings');
    $this->load->module('shipping');
    $this->load->module('site_settings');
    $this->load->module('store_orders');
    $this->site_security->_make_sure_logged_in();

    $shopper_id = $this->site_security->_get_user_id();
    
    // count the order that belongs to this customer.
    $use_limit = FALSE;
    $mysql_query = $this->_genrate_mysql_query($shopper_id,$use_limit);
    $query = $this->store_orders->_custom_query($mysql_query);
    $total_rows = $query->num_rows();


    // fetch the order for this page
    $use_limit = TRUE;
    $mysql_query = $this->_genrate_mysql_query($shopper_id,$use_limit);
    $data['query'] = $this->store_orders->_custom_query($mysql_query);
    $data['num_rows'] = $data['query']->num_rows();    

    //generate pagination
    $pagination_data['template'] = 'public_template';
    $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
    $pagination_data['total_rows'] = $total_rows;
    $pagination_data['offset_segment'] = 3;
    $pagination_data['limit'] = $this->get_limit();
    $data['custom_pagination'] = $this->custom_pagination->_genrate_pagination($pagination_data);

    $pagination_data['offset'] = $this->get_offset();
    $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data);
    $data['order_status_title'] = $this->_get_order_status_options();
    $data['currency_symbol'] = $this->site_settings->_get_currency_symbol();
    $data['shipping'] = $this->shipping->_get_shipping();

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = 'browse';
    $this->load->module('templates');
    $this->templates->public_template($data);
}

function _genrate_mysql_query($shopper_id,$use_limit) 
{

    $mysql_query_for_nice = "
        SELECT
            store_orders.*, store_shoppertrack.item_title,
            store_shoppertrack.item_color,
            store_shoppertrack.item_size,
            store_shoppertrack.price,
            store_shoppertrack.item_qty,
            store_shoppertrack.date_added,
            store_items.small_pic,
            store_order_status.status_title
        FROM
            store_orders
        INNER JOIN store_shoppertrack ON store_shoppertrack.session_id = store_orders.session_id
        AND store_shoppertrack.shopper_id = store_orders.shopper_id
        INNER JOIN store_items ON store_items.id = store_shoppertrack.item_id
        INNER JOIN store_order_status ON store_order_status.id = store_orders.order_status
        WHERE store_orders.shopper_id = $shopper_id ORDER BY store_orders.date_created desc
    ";

    $mysql_query = "select * from store_orders where store_orders.shopper_id = $shopper_id order by date_created desc";



    if ($use_limit == TRUE) {
        $limit = $this->get_limit();
        $offset = $this->get_offset();

        $mysql_query .= " limit ".$offset.", ".$limit;
    }
    return $mysql_query;
}

function get_limit() 
{
    $limit = 20;
    return $limit;
}

function get_offset() 
{
    $offset = $this->uri->segment('3');
    if (!is_numeric($offset)) {
        $offset = '0';
    }
    return $offset;
}


function get_target_pagination_base_url()
{
    $first_bit = $this->uri->segment(1);
    $second_bit = $this->uri->segment(2);

    $target_url = base_url().$first_bit.'/'.$second_bit;
    return $target_url;
}

function view()
{
    $this->load->module('cart');
    $this->load->module('site_security');
    $this->load->module('site_settings');
    $this->load->module('store_order_status');
    $this->load->module('site_settings');
    $this->load->module('store_orders');
    $this->load->module('timedate');
    $this->site_security->_make_sure_logged_in();

    $order_ref = $this->uri->segment(3);
    $shopper_id = $this->site_security->_get_user_id();

    $col1 = 'order_ref';
    $value1 = $order_ref;
    $col2 = 'shopper_id';
    $value2 = $shopper_id;
    $query = $this->store_orders->get_with_double_condition($col1, $value1,$col2, $value2);
    $num_rows = $query->num_rows();
    if ($num_rows<1) {
        redirect('site_security/not_allowed');
    }
    foreach ($query->result() as $row) {
        $date_created = $row->date_created;
        $order_status = $row->order_status;
        $session_id = $row->session_id;
    }

    $data['date_created'] =$this->timedate->get_nice_date($date_created,'full');
    if ($order_status==0) {
        $data['order_status_title'] = 'Order Submitted';
    }else{
        $data['order_status_title'] = $this->store_order_status->_get_status_title($order_status);
    }
    $data['order_ref'] = $order_ref;
    $data['num_rows'] = $num_rows;
    
    $table = 'store_shoppertrack';
    $data['query_cc'] = $this->cart->_fetch_cart_contents($session_id, $shopper_id,$table);
    
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = 'view';
    $this->load->module('templates');
    $this->templates->public_template($data);
}

}
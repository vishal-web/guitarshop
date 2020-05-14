<?php
class Blog extends MX_Controller 
{

function __construct() { 
    parent::__construct();
    $this->load->helper('text');
}

function article()
{
    $this->load->module('timedate');
    $article_url = $this->uri->segment(3);
    if (!isset($article_url)) {
        redirect(base_url());
    }

    $query = $this->get_where_custom('page_url',$article_url);
    $num_rows = $query->num_rows();
    if ($num_rows<1) {
        redirect(base_url());
    }

    foreach ($query->result() as $row) {
        $data['blog_title'] = $row->page_title;
        $page_url = $row->page_url;
        $data['author'] = $row->author;
        $data['blog_content'] = $row->page_content;
        $big_pic = $row->big_pic;
        
        $data['date_published'] = $this->timedate->get_nice_date($row->date_published,'mini');
    }

    if ($big_pic!='') {
        $data['big_pic_path'] = base_url().'blog_pics/big_pics/'.$big_pic;
    }else{
        $data['big_pic_path'] = '';
    }


    $data['view_file'] = 'browse';
    $this->load->module('templates');
    $this->templates->public_template($data);
}

function _draw_feed_hp()
{
    // hp stands for home page
    $mysql_query = "select * from blog order by date_published desc limit 0,3";
    $data['query'] = $this->_custom_query($mysql_query);
    $this->load->view('feed_hp', $data);
}

function delete_image($update_id) 
{   
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data = $this->fetch_data_from_db($update_id);
    $small_pic  = $data['small_pic'];
    $big_pic    = $data['big_pic'];

    $big_pic_path = './blog_pics/big_pics/'.$big_pic;
    $small_pic_path = './blog_pics/small_pics/'.$small_pic;

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

    $msg = 'The blog image was Successfully Deleted';
    $value = '<div class="alert alert-danger">'.$msg.'</div>';
    $this->session->set_flashdata('blog',$value);
    redirect('blog/create/'.$update_id);
}

function _generate_thumbnail($file_name, $thumbnail_name) 
{   
  
    $config['image_library'] = 'gd2';
    $config['source_image'] = './blog_pics/big_pics/'.$file_name;
    $config['new_image'] = './blog_pics/small_pics/'.$thumbnail_name;
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

    $check_image = $this->fetch_data_from_db($update_id);
    if ($check_image['big_pic'] !="") {
        redirect('blog/upload_image/'.$update_id);
    }

    $submit = $this->input->post('submit',TRUE);

    if ($submit == 'Cancel') {
        redirect('blog/create/'.$update_id);
    }

    $config['upload_path'] = './blog_pics/big_pics/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']  = '1500';
    $config['max_width']  = '2024';
    $config['max_height']  = '1768';
    $config['file_name']  = $this->site_security->generate_random_string(16);
    
    $this->load->library('upload', $config);
    
    if (!$this->upload->do_upload()){
        $data['error'] = array('error' => $this->upload->display_errors());
        $data['headline'] = 'Upload Error';
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('blog');      
        $data['view_file'] = 'upload_image';
        $this->load->module('templates');
        $this->templates->admin($data);
    }else{
        $data = array('upload_data' => $this->upload->data());

        $upload_data = $data['upload_data'];
        $file_name = $upload_data['file_name'];

        // recreate file name for thumbnail
        $file_ext = $upload_data['file_ext'];
        $raw_name = $upload_data['raw_name'];

        $thumbnail_name = $raw_name."_thumb".$file_ext;

        $update_data['small_pic'] = $thumbnail_name;
        $update_data['big_pic'] = $file_name;
        $this->_update($update_id,$update_data);

        $this->_generate_thumbnail($file_name, $thumbnail_name);

        $data['headline'] = 'Upload Success';
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('blog');      
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

    $check_image = $this->fetch_data_from_db($update_id);
    if ($check_image['big_pic'] !="") {
        redirect('blog/create/'.$update_id);
    }

    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    
    $data['headline'] = 'Upload Image';
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('blog');
    // $data['view_module'] = 'blog';
    $data['view_file'] = 'upload_image';
    $this->load->module('templates');
    $this->templates->admin($data);
}
function _process_delete($update_id)
{

    // attempt delete page blogs
    $this->_delete($update_id);
}

function delete($update_id)
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);

    if ($submit == 'Cancel') {
        redirect('blog/create/'.$update_id);
    }elseif ($submit == 'Yes - Delete Blog Entry') {
        $this->_process_delete($update_id);

        $msg = 'The blog entry was Successfully Deleted';
        $value = '<div class="alert alert-success">'.$msg.'</div>';
        $this->session->set_flashdata('page',$value);

        redirect('blog/manage');
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

    $data['headline'] = 'Delete Blog Entry';
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('blog');      
    $data['view_file'] = 'deleteconf';
    $this->load->module('templates');
    $this->templates->admin($data);

}


function manage() 
{
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['flash'] = $this->session->flashdata('page');

    $data['query'] = $this->get('date_published desc');
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

    $this->load->module('timedate');
    if ($submit == 'Cancel') {
        redirect('blog/manage');
    }
    if ($submit == 'Submit') {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date_published','Date Published','required');
        $this->form_validation->set_rules('page_title','Blog Entry title','required|max_length[250]');
        $this->form_validation->set_rules('page_headline','Blog Entry Headline','required|max_length[250]');
        $this->form_validation->set_rules('page_content','Blog Entry Content','required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();
            $data['page_url'] = url_title($data['page_title']);
            // convert date published into time stamp
            $data['date_published'] = $this->timedate->make_timestamp_from_datepicker_us($data['date_published']);
           
            // get the variables
            if (is_numeric($update_id)) {
                // update page detail
                $this->_update($update_id,$data);

                $msg = 'The blog entry details was Successfully Updated';
                $value = '<div class="alert alert-success">'.$msg.'</div>';
                $this->session->set_flashdata('page',$value);
                redirect('blog/create/'.$update_id);
            }else {
                // insert new page
                $this->_insert($data);
                $update_id = $this->get_max();
                
                $msg = 'The blog entry was Successfully Added';
                $value = '<div class="alert alert-success">'.$msg.'</div>';
                $this->session->set_flashdata('page',$value);
                redirect('blog/create/'.$update_id);
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
        $data['headline'] = 'Update Blog Entry Details';
    }else {
        $data['headline'] = 'Create New Blog Entry';
    }

    if ($data['date_published'] > 0) {
        // it must be a unix timestamp so conbert this into datepicker
        $data['date_published']= $this->timedate->get_nice_date($data['date_published'], 'datepicker');
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('page');
    // $data['view_module'] = 'blog';
    $data['view_file'] = 'create';
    $this->load->module('templates');
    $this->templates->admin($data);
}

function fetch_data_from_post() 
{
    $data['page_title']     = $this->input->post('page_title',TRUE);
    $data['page_content']   = $this->input->post('page_content',TRUE);
    $data['page_headline']       = $this->input->post('page_headline',TRUE);
    $data['page_keywords']    = $this->input->post('page_keywords',TRUE);
    $data['page_description'] = $this->input->post('page_description',TRUE);
    $data['date_published'] = $this->input->post('date_published',TRUE);
    $data['author'] = $this->input->post('author',TRUE);

    return $data;
}

function fetch_data_from_db($update_id) 
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $query = $this->get_where($update_id);
    foreach($query->result() as $row) {
        $data['page_title']     = $row->page_title;
        $data['page_url']       = $row->page_url;
        $data['page_content']   = $row->page_content;
        $data['page_headline']  = $row->page_headline;
        $data['page_keywords']  = $row->page_keywords;
        $data['page_description'] = $row->page_description;
        $data['date_published'] = $row->date_published;
        $data['author']         = $row->author;
        $data['big_pic']        = $row->big_pic;
        $data['small_pic']      = $row->small_pic;
    }

    if (!isset($data)) {
        $data = '';
    }

    return $data;
}


function get($order_by)
{
    $this->load->model('mdl_blog');
    $query = $this->mdl_blog->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_blog');
    $query = $this->mdl_blog->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_blog');
    $query = $this->mdl_blog->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_blog');
    $query = $this->mdl_blog->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_blog');
    $this->mdl_blog->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_blog');
    $this->mdl_blog->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_blog');
    $this->mdl_blog->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_blog');
    $count = $this->mdl_blog->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_blog');
    $max_id = $this->mdl_blog->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_blog');
    $query = $this->mdl_blog->_custom_query($mysql_query);
    return $query;
}

}
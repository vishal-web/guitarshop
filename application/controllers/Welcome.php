<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	
function test() {

    $submit = $this->input->post('submit');
    if ($submit=='Submit') {
        $this->form_validation->set_rules('username','Username','required|is_unique[store_items.item_title]');
        if($this->form_validation->run()==TRUE){
            echo "WellDone";
        }else{
            echo validation_errors();
        }
    }
    echo form_open('youraccount/test');
    echo form_input('username');
    echo form_submit('submit','Submit');
    echo form_close();
}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('grocery_CRUD');	
		$this->load->model('adminmodel');
	}
	
	function _main_output($output = null)
	{
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('login');
		} else {
			$output->profil = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$output->webtitle="Keanggotaan";
			$this->load->view('page',$output);	
		}
	}
	
	function index() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('login');
		} else {
			/*$crud = new grocery_CRUD();
			$crud->set_table('member');
			//$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id');
			$crud->set_subject('Member');
			$crud->set_field_upload('member_image','assets/uploads/avatar');
			$crud->set_relation('member_type_id','mst_member_type','member_type_name');
			$output = $crud->render();
			$this->_main_output($output); */
			
			$this->load->view('page');	
		}
	}
	
	function tipe() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_member_type');
			$crud->columns('member_type_name','loan_limit','member_periode','reborrow_limit','last_update');
			$crud->set_subject('Tipe Keanggotaan');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	

}
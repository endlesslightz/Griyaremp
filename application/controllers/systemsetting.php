<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Systemsetting extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('grocery_CRUD');	
		$this->load->model('adminmodel');
	}
	
	function _main_output($output = null)
	{
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$output->profil = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$output->webtitle="Edit Sistem";
			$this->load->view('backend/main',$output);	
		}
	}
	

	function index() {
			if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
			echo "dssa";
		} else {
		
			$crud = new grocery_CRUD();
			$crud->set_table('setting');
			//$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id','kopi', 'last_update');
			$crud->set_subject('Konfigurasi Sistem');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function content() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('content');
			//$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id','kopi', 'last_update');
			$crud->set_subject('Konten');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function system_log() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('system_log');
			//$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id','kopi', 'last_update');
			$crud->set_subject('Log Sistem');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	
}
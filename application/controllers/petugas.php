<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Petugas extends CI_Controller {

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
			$output->webtitle="Petugas";
			$this->load->view('backend/main',$output);	
		}
	}
	
	function delete_selection()
	{
	   $id_array = array();
	   $selection = $this->input->post("selection", TRUE);
	   $id_array = explode("|", $selection);

	   foreach($id_array as $item):
		  if($item != ''):
		  //DELETE ROW
		  $this->db->where('customerNumber', $item);
		  $this->db->delete('customers');
		  endif;
	   endforeach;
	}

	function index() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('petugas');
			//$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id','kopi', 'last_update');
			$crud->set_subject('Petugas');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function shift() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('shift');
			//$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id','kopi', 'last_update');
			//$crud->set_relation('id_petugas','petugas','nama');
			$crud->set_subject('Shift');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function shift_petugas() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('shift_petugas');
			//$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id','kopi', 'last_update');
			$crud->set_relation('id_petugas','petugas','nama');
			$crud->set_relation('id_shift','shift','nama_shift');
			$crud->set_subject('Shift Petugas');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function logbook() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('logbook');
			$crud->set_relation('id_petugas','petugas','nama');
			$crud->set_subject('Logbook');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function jenis_pekerjaan() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('jenis_pekerjaan');
			$crud->set_relation('id_petugas','petugas','nama');
			$crud->set_subject('Jenis Pekerjaan');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	

}
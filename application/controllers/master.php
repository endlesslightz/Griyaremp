<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

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
			$output->webtitle="Master File";
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

	function gmd() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_gmd');
			$crud->columns('gmd_code','gmd_name','last_update');
			$crud->set_subject('gmd');			
			$crud->set_field_upload('icon_image','assets/uploads/icon_gmd');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function publisher() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_publisher');
			//$crud->columns('member_type_name','loan_limit','member_periode','reborrow_limit','last_update');
			$crud->set_subject('Penerbit');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function supplier() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_supplier');
			$crud->set_subject('Agen');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function author() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_author');
			$crud->set_subject('Pengarang');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function topic() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_topic');
			$crud->set_subject('Subyek');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function location() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_location');
			$crud->set_subject('Lokasi');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function place() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_place');
			$crud->set_subject('Tempat');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function item_status() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_item_status');
			$crud->set_subject('Status Eksemplar');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function coll_type() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_coll_type');
			$crud->set_subject('Tipe Koleksi');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function language() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_language');
			$crud->set_subject('Bahasa');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function label() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_label');
			$crud->set_subject('Label');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	function frequency() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_frequency');
			$crud->set_subject('Kala Terbit');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	

}
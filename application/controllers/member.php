<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

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
			$this->load->view('main',$output);	
		}
	}
	
	function index() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('tb_anggota');
			$crud->set_subject('Member');
			$crud->columns('nama','alamat','no_telepon','no_telepon','tanggal_daftar','sponsor');
			$output = $crud->render();
			$this->_main_output($output);
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
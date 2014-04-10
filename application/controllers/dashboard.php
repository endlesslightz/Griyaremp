<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('adminmodel');	
	}
	
	function index()
	{
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('login');
		} else {
			$output->profil = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			//print_r($output->profil); die();
			$output->title = '|| Dashboard Administrator ||';
			$this->load->view('dashboard',$output);	
		}
	}
	
}
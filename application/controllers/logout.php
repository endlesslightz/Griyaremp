<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	public function __construct() {
        parent::__construct();
	}
	
	function index()
	{
		$this->session->sess_destroy();
		redirect('backend/login');
	}
}
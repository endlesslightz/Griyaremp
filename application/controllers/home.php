<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('membermodel');	
	}
	
	function index()
	{
			//print_r($output->profil); die();
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil_search']  = $this->membermodel->daftarjudul($data['keyword']);
			$data['hasil_search2']  = $this->membermodel->daftarjudullaris();
			$data['hasil_search3']  = $this->membermodel->getgmd();
			$data['hasil_search4']  = $this->membermodel->getcoltype();
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('frontend/main',$data);	
		
	}
	
	function daftar_judul() {
	
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil_search']  = $this->membermodel->daftarjudul($data['keyword']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('frontend/main',$data);
		}
		
		function detail() {
	
			$data['id'] = $this->input->get('id');
			$data['hasil_search']  = $this->membermodel->detail($data['id']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('frontend/detail',$data);
		}
		
		function cari() {
	
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil_search']  = $this->membermodel->cari($data['keyword']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$data['hasil_search3']  = $this->membermodel->getgmd();
			$data['hasil_search4']  = $this->membermodel->getcoltype();
			$this->load->view('frontend/cari',$data);
		}
		
		
	
		
		function adv_search()
    {
		$data['keyword_judul'] = $this->input->post('keyword_judul');
		$data['keyword_pengarang'] = $this->input->post('keyword_pengarang');
		$data['keyword_isbn'] = $this->input->post('keyword_isbn');
		$data['keyword_gmd'] = $this->input->post('keyword_gmd');
		$data['keyword_tipe'] = $this->input->post('keyword_tipe');

			$data['hasil_search'] = $this->membermodel->adv_search($data['keyword_judul'], $data['keyword_pengarang'], $data['keyword_isbn'], $data['keyword_gmd'], $data['keyword_tipe']);
			$data['hasil_search3']  = $this->membermodel->getgmd();
			$data['hasil_search4']  = $this->membermodel->getcoltype();
		$data['data_kategori'] = $this->membermodel->list_kategori();
		$this->load->view('frontend/cari_adv',$data);	
		
    }
		
}
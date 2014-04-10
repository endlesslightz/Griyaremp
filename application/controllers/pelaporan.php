<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelaporan extends CI_Controller {

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
			$output->webtitle="Pelaporan";
			$this->load->view('backend/main',$output);	
		}
	}
	
		
	function index() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/laporan', $data);
		}
	}
	
	function statistik_koleksi() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$data['hasil_search']  = $this->adminmodel->laporan_koleksi1();
			$data['hasil_search2']  = $this->adminmodel->laporan_koleksi2();
			$data['hasil_search3']  = $this->adminmodel->laporan_koleksi3();
			$data['hasil_search4']  = $this->adminmodel->laporan_koleksi4();
			$data['hasil_search5']  = $this->adminmodel->laporan_koleksi5();
			$data['hasil_search6']  = $this->adminmodel->laporan_koleksi6();
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/statistik_koleksi', $data);
		}
		}
		
		function laporan_anggota() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$data['hasil_search']  = $this->adminmodel->laporan_anggota();
			$data['hasil_search2']  = $this->adminmodel->laporan_anggota2();
			$data['hasil_search3']  = $this->adminmodel->laporan_anggota3();
			$data['hasil_search4']  = $this->adminmodel->laporan_anggota4();
			$data['hasil_search5']  = $this->adminmodel->laporan_anggota5();
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/laporan_anggota', $data);
		}
		}
		
		function laporan_pinjaman() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$data['hasil_search']  = $this->adminmodel->laporan_pinjaman();
			$data['hasil_search2']  = $this->adminmodel->laporan_pinjaman2();
			$data['hasil_search3']  = $this->adminmodel->laporan_pinjaman3();
			$data['hasil_search4']  = $this->adminmodel->laporan_pinjaman4();
			$data['hasil_search5']  = $this->adminmodel->laporan_pinjaman5();
			$data['hasil_search51']  = $this->adminmodel->laporan_pinjaman51();
			$data['hasil_search6']  = $this->adminmodel->laporan_pinjaman6();
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/laporan_pinjaman', $data);
		}
		}
	
	function lain() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/laporan_lain', $data);
		}
	}
	
	function daftar_judul() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil_search']  = $this->adminmodel->daftarjudul($data['keyword']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/daftar_judul', $data);
			}
		}
		
		function daftar_item() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil_search']  = $this->adminmodel->daftaritem($data['keyword']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/daftar_item', $data);
			}
		}
	
		function daftar_anggota() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil_search']  = $this->adminmodel->daftaranggota($data['keyword']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/daftar_anggota', $data);
			}
		}
		
		function aktivitas_staf() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['hasil_search']  = $this->adminmodel->aktivitasstaf();
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/aktivitas_staf', $data);
			}
		}
		
		function daftar_peminjaman_ang() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil_search']  = $this->adminmodel->daftarpeminjamananggota($data['keyword']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/daftar_peminjaman_ang', $data);
			}
		}
	
	function sejarah_peminjaman() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil_search']  = $this->adminmodel->sejarah($data['keyword']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/sejarah_peminjaman', $data);
			}
		}
	function keterlambatan() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil_search']  = $this->adminmodel->keterlambatan($data['keyword']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/keterlambatan', $data);
			}
		}
		
			function keterlambatan2() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil_search']  = $this->adminmodel->keterlambatan2($data['keyword']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/pelaporan/keterlambatan', $data);
			}
		}
	
			function grafik_menurut_media(){
                    $data=array();
                    foreach($this->adminmodel->laporan_pinjaman2()->result_array() as $row)
					$data[]=(int) $row['hasil'];
                    $this->load->view('backend/pelaporan/grafik_menurut_media', array('data'=>$data));
                }

                function grafik_laporan_anggota(){
                    $data=array();
                    foreach($this->adminmodel->laporan_anggota3()->result_array() as $row)
                            //print_r($row);
                            $data[]=(int) $row['hasil'];
                    //print_r($data);
                    $this->load->view('backend/pelaporan/grafik_laporan_anggota', array('data'=>$data));
                }
				
				function grafik_gmd(){
                    $data=array();
                    foreach($this->adminmodel->laporan_koleksi6()->result_array() as $row)
					$data[]=(int) $row['total_titles'];
					
                    $this->load->view('backend/pelaporan/statistik_koleksi_2', array('data'=>$data));
                }
	
}
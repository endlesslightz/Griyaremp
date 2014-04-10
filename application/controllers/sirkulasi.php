<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sirkulasi extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('grocery_CRUD');	
		$this->load->model('adminmodel');
	}
	
	function _main_output($output = null, $judul)
	{
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$output->profil = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$output->webtitle="Sirkulasi - ".$judul." ";
			$this->load->view('backend/main',$output);	
		}
	}
	
		
	function index() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
		$data['keyword'] = $this->input->post('keyword');
		if($this->input->post('udahcari')){
			$data['udahcari'] = true;
			$data['hasil_search']  = $this->adminmodel->search($data['keyword']);
			$data['temp_idmember']=$this->adminmodel->get_member_by_id($data['keyword']);
			$this->session->set_userdata('membersesi', $data['keyword'] );
		}
		else{
			$data['udahcari'] = false;		
		}
		$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
		$this->load->view('backend/sirkulasi/transaksi', $data);
		}
	}
	
	function pinjaman() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->input->post('keyword');
			$data['keyword_member'] = $this->input->post('keyword_member');
		if($this->input->post('udahcaribuku')){
			$data['udahcaribuku'] = true;
			$data['hasil_search']  = $this->adminmodel->searchbuku($data['keyword']);
			$data['cekstatus']  = $this->adminmodel->cek_buku($data['keyword']);	
			if ($data['cekstatus']==0) {$data['status'] = true;}
			else {$data['status'] = false;}
		}
		else{
			$data['udahcaribuku'] = false;
			}
			
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/sirkulasi/transaksi_pinjaman', $data);
			}
		}
		
		function tambah_pinjaman() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
		if($this->input->post('udahcari')){
			$data['keyword'] = $this->input->post('member_id');
			$data['item_code'] = $this->input->post('item_code');
			$data['member_id'] = $this->input->post('member_id');
			$data['loan_date'] = $this->input->post('loan_date');
			$data['due_date'] = $this->input->post('due_date');
			$data['renewed'] = $this->input->post('renewed');
			$data['loan_rules_id'] = $this->input->post('loan_rules_id');
			$data['actual'] = $this->input->post('actual');
			$data['is_lent'] = $this->input->post('is_lent');
			$data['is_return'] = $this->input->post('is_return');
			$data['return_date'] = $this->input->post('return_date');
			$this->adminmodel->tambah_pinjaman($data['item_code'],$data['member_id'] ,$data['loan_date'] ,$data['due_date'] ,$data['renewed'] ,$data['loan_rules_id'] ,$data['actual'],$data['is_lent'] ,$data['is_return'] ,$data['return_date'] );
			$data['hasil_search']  = $this->adminmodel->searchbuku($data['keyword']);
			$data['udahcari'] = true;
			$data['temp_idmember']=$this->adminmodel->get_member_by_id($data['keyword']);
			$this->session->set_userdata('membersesi', $data['keyword'] );
		}
			}
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->session->set_flashdata('message', 'Buku berhasil dimasukkan ke data pinjaman pada member ID = '.$this->session->userdata('membersesi').'' ); 
			redirect(site_url('backend/sirkulasi/berandapinjaman/'.$this->session->userdata('user_id')));
		}
		
		
		function berandapinjaman() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
		$data['keyword'] = $this->uri->segment(4);
			$data['udahcari'] = true;
			$data['hasil_search']  = $this->adminmodel->search($data['keyword']);
			$data['temp_idmember']=$this->adminmodel->get_member_by_id($data['keyword']);
			$this->session->set_userdata('membersesi', $data['keyword'] );

		$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
		$this->load->view('backend/sirkulasi/transaksi', $data);
		}
	}
		
		
		
		function reservasi() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->input->post('keyword');
			$data['keyword_member'] = $this->input->post('keyword_member');
		if($this->input->post('udahcaribuku')){
			$data['udahcaribuku'] = true;
			$data['hasil_search']  = $this->adminmodel->searchbuku($data['keyword']);
		}
		else{
			$data['udahcaribuku'] = false;
			}
			
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/sirkulasi/transaksi_reservasi', $data);
			}
		}
		
		function tambah_reservasi() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
		if($this->input->post('udahcari')){
			$data['keyword'] = $this->input->post('member_id');
			$data['item_code'] = $this->input->post('item_code');
			$data['member_id'] = $this->input->post('member_id');
			$data['loan_date'] = $this->input->post('loan_date');
			$data['due_date'] = $this->input->post('due_date');
			$data['renewed'] = $this->input->post('renewed');
			$data['loan_rules_id'] = $this->input->post('loan_rules_id');
			$data['actual'] = $this->input->post('actual');
			$data['is_lent'] = $this->input->post('is_lent');
			$data['is_return'] = $this->input->post('is_return');
			$data['return_date'] = $this->input->post('return_date');
			
			
			$this->adminmodel->tambah_pinjaman($data['item_code'],$data['member_id'] ,$data['loan_date'] ,$data['due_date'] ,$data['renewed'] ,$data['loan_rules_id'] ,$data['actual'],$data['is_lent'] ,$data['is_return'] ,$data['return_date'] );
			
			$data['hasil_search']  = $this->adminmodel->searchbuku($data['keyword']);
			$data['udahcari'] = true;
			$data['temp_idmember']=$this->adminmodel->get_member_by_id($data['keyword']);
			$this->session->set_userdata('membersesi', $data['keyword'] );
		}
			}
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/sirkulasi/transaksi', $data);
			
		}
		
		function pinjaman_skrg() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] =$this->session->userdata('membersesi');
			$data['profilmember'] = $this->adminmodel->get_member_by_id($data['keyword']);
			$data['hasil_search']  = $this->adminmodel->pinjamskrg($data['keyword'] );
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/sirkulasi/transaksi_pinjaman_sekarang', $data);
			}
		}
		
			function perpanjangan() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$this->adminmodel->perpanjang($this->uri->segment(4),$this->uri->segment(5));
			$data['keyword'] =$this->session->userdata('membersesi');
			$data['profilmember'] = $this->adminmodel->get_member_by_id($data['keyword']);
			$data['hasil_search']  = $this->adminmodel->pinjamskrg($data['keyword'] );
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));	
			$this->session->set_flashdata('message', 'Perpanjangan masa peminjaman berhasil!' ); 
			$this->load->view('backend/sirkulasi/transaksi_pinjaman_sekarang', $data);
			}
		}
		
		function transaksi_sejarah() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->session->userdata('membersesi');
			$data['profilmember'] = $this->adminmodel->get_member_by_id($data['keyword']);
			$data['hasil_search']  = $this->adminmodel->transaksi_sejarah($data['keyword']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/sirkulasi/transaksi_sejarah', $data);
			}
		}

			function pengembalian() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->input->post('keyword');
		if($this->input->post('udahcari')){
			$data['udahcari'] = true;
			$data['hasil_search']  = $this->adminmodel->kembalibuku($data['keyword']);
			//$data['hasil_search2']  = $this->adminmodel->searchbuku2($data['hasil_search']->biblio_id);
		}
		else{
			$data['udahcari'] = false;		
			}$data['indexing'] = 'Sirkulasi';
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
				$this->load->view('backend/sirkulasi/pengembalian', $data);
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
			$this->load->view('backend/sirkulasi/sejarah_peminjaman', $data);
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
			$this->load->view('backend/sirkulasi/keterlambatan', $data);
			}
		}
		
		function lihat_reservasi() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {	
			$data['keyword'] = $this->input->post('keyword');
			$data['hasil_search']  = $this->adminmodel->lihat_reservasi($data['keyword']);
			$data['profil'] = $this->adminmodel->get_user_by_id($this->session->userdata('user_id'));
			$this->load->view('backend/sirkulasi/reservasi', $data);
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

	function non_buku() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('pelayanan');
			$crud->set_relation('id_jenis_pelayanan','pelayanan_jenis','nama_pelayanan');
			$crud->set_relation('id_petugas','petugas','nama');
			//$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id','kopi', 'last_update');
			$crud->set_subject('Pelayanan Non Buku');
			$output = $crud->render();
			$judul = "Pelayanan Non-Buku";
			$this->_main_output($output, $judul);
		}
	}
	
		function jenis_pelayanan() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('pelayanan_jenis');
			//$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id','kopi', 'last_update');
			$crud->set_subject('Pelayanan Jenis');
			$output = $crud->render();
			$judul = "Pelayanan Bacaan";
			$this->_main_output($output, $judul);
		}
	}
	
		function jenis_pelayanan_non() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('pelayanan_jenis_non');
			//$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id','kopi', 'last_update');
			$crud->set_subject('Pelayanan Jenis Non-Buku');
			$output = $crud->render();
			$judul = "Pelayanan Non-Bacaan";
			$this->_main_output($output, $judul);
		}
	}
	
	function loan_rules() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('mst_loan_rules');
			$crud->set_relation('member_type_id','mst_member_type','member_type_name');
			$crud->set_relation('coll_type_id','mst_coll_type','coll_type_name');
			//$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id','kopi', 'last_update');
			$crud->set_subject('Aturan Peminjaman');
			$output = $crud->render();
			$judul = "Aturan Peminjaman";
			$this->_main_output($output, $judul);
		}
	}
	
	
	
}
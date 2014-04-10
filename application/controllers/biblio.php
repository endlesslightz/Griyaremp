<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biblio extends CI_Controller {

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
			$output->webtitle="Bibliografi";
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
	
	public function _callback_kopi($value, $row) {
		$id = $row->biblio_id;
		$value = $this->db->query("Select * from item where biblio_id = $id ")->num_rows();
		if ($value == '0') { $value = 'Tidak ada'; }
		return $value;
	}

	function index() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('biblio');
			$crud->columns('title','publish_year','isbn_issn','image','author','topic','publisher_id','language_id','kopi', 'last_update');
			$crud->set_subject('Biblio');
			$crud->set_relation_n_n('author','biblio_author','mst_author','biblio_id','author_id','author_name','');
			$crud->set_relation_n_n('topic','biblio_topic','mst_topic','biblio_id','topic_id','topic','');
			$crud->set_relation('publisher_id','mst_publisher','publisher_name');
			$crud->set_relation('language_id','mst_language','language_name');
			$crud->set_field_upload('image','assets/uploads/cover');
			$crud->callback_column('kopi',array($this,'_callback_kopi'));
			//$crud->fields('name','pass');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	public function _callback_klasifikasi($value, $row) {
		$id = $row->biblio_id;
		$value = $this->db->query("Select * from biblio where biblio_id = $id ")->row_array();
		return $value['classification'];
	}
	
	function eksemplar() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('item');
			$crud->columns('item_code','biblio_id','coll_type_id','location_id','klasifikasi','last_update');
			$crud->set_relation('biblio_id','biblio','title');
			//$crud->set_relation('biblio_id','biblio','classification');
			$crud->callback_column('klasifikasi',array($this,'_callback_klasifikasi'));
			$crud->set_relation('coll_type_id','mst_coll_type','coll_type_name');
			$crud->set_relation('location_id','mst_location','location_name');
			$crud->set_subject('Eksemplar');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	
	public function _callback_koleksi_keluar($value, $row) {
		$id = strtoupper($row->item_code);
		$value = $this->db->query("SELECT * FROM biblio, item WHERE item.biblio_id = biblio.biblio_id and item_code = '$id' ")->row_array();
		return $value['title'];
	}
	
	function koleksi_keluar() {
		if ($this->session->userdata('user_id') == '') {
			$this->session->set_flashdata('error','<p class="error-message">Session expired ! Silahkan login kembali. </p>');
			redirect('backend/login');
		} else {
			$crud = new grocery_CRUD();
			$crud->set_table('loan');
			$crud->columns('item_code','member_id','judul','loan_date','due_date');
			$crud->callback_column('judul',array($this,'_callback_koleksi_keluar'));
			$crud->set_subject('Koleksi Keluar');
			$output = $crud->render();
			$this->_main_output($output);
		}
	}
	

}
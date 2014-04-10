<?php
class Adminmodel extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
	/*auth*/
	function auth() {
        $this->db->where('username',$this->input->post('username'));
		$this->db->where('passwd',md5($this->input->post('password')));
		return $this->db->get('user')->num_rows();
    }
	
	function get_user_by_uname($username) {
        $this->db->where('username',$username);
		return $this->db->get('user')->row_array();
    }
	
	function get_user_by_id($id) {
        $this->db->where('user_id',$id);
		return $this->db->get('user')->row_array();
    }
	
	function get_member_by_id($id) {
        $this->db->where('member_id',$id);
		return $this->db->get('member')->row_array();
    }
	/**/
	function search($keyword){
         $query = $this->db->query("SELECT * FROM `member` INNER JOIN mst_member_type using (member_type_id) where member_id='".$keyword."'");
        return $query;
    }
	
	}
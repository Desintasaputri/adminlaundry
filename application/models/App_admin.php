<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_Admin extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

		function insert($data){
		$query = $this->db->insert('data_pelanggan',$data);
		if($query)
			return true;
		return false;
	}

	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get();
	}
		function get_data(){
		$query = $this->db->query("SELECT * FROM data_pelanggan");
		return $query->result_array();
	}

	public function hapus ($id_pelanggan)
	{
		$query=$this->db->delete("id_pelanggan",$id_pelanggan);

		if ($query) {
			return true;

		}else {
			return false;
			
		}
	

}}
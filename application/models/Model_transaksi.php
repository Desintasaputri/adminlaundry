<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transakasi extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

		function insert($data){
		$query = $this->db->insert('transaksi',$data);
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
		$query = $this->db->query("SELECT * FROM transaksi");
		return $query->result_array();
	}

	public function hapus ($id_pelanggan)
	{
		$query=$this->db->delete("transaksi",$id_pelanggan);

		if ($query) {
			return true;

		}else {
			return false;
			
		}
	

}}
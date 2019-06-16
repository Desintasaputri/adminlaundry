<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App_Admin extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function insert($table = '', $data= ''){
		$this->db->insert($table,$data);
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function update($table = null, $data = null, $where = null)
	{
		$this->db->update($table, $data, $where);
	}
	public function duatable($idnya = null) {
		if($idnya == null){
			 $this->db->select('transaksi.kode_transaksi,data_pelanggan.nama_pelanggan,
			 					transaksi.status_order,tb_status.id_status,tb_status.status');
			 $this->db->from('transaksi');
			 $this->db->join('data_pelanggan','transaksi.id_pelanggan=data_pelanggan.id_pelanggan');
			 $this->db->join('tb_status','transaksi.status_order=tb_status.id_status');
			 $query = $this->db->get();
			 return $query->result();
		} else {
		  	$this->db->select('transaksi.kode_transaksi,data_pelanggan.nama_pelanggan,
		 						transaksi.status_order,tb_status.id_status,tb_status.status');
			 $this->db->from('transaksi');
			 $this->db->join('data_pelanggan','transaksi.id_pelanggan=data_pelanggan.id_pelanggan');
			 $this->db->join('tb_status','transaksi.status_order=tb_status.id_status');
			 $this->db->where('transaksi.kode_transaksi',$idnya);
			 $query = $this->db->get();
			 return $query->result();
		}
}
	function get_all($table)
	{
		$this->db->from($table);

		return $this->db->get();
	}
	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function getidpelanggan($id){
		$query = $this->db->query("SELECT data_pelanggan.id_pelanggan,data_pelanggan.nama_pelanggan,data_pelanggan.alamat_pelanggan,data_pelanggan.telpon_pelanggan from data_pelanggan WHERE data_pelanggan.id_pelanggan = '$id' ");
		return $query->result();
	}
	function getidpegawai($id){
		$query = $this->db->query("SELECT data_pegawai.id_pegawai,data_pegawai.nama_pegawai,data_pegawai.alamat_pegawai,data_pegawai.telpon_pegawai,data_pegawai.jabatan from data_pegawai WHERE data_pegawai.id_pegawai = '$id' ");
		return $query->result();
	}
	function getidpengeluaran($id){
		$query = $this->db->query("SELECT pengeluaran.kode_pengeluaran,pengeluaran.jenis_pengeluaran,pengeluaran.qty_pengeluaran,pengeluaran.nominal,pengeluaran.tanggal_pengeluaran,pengeluaran.notes_pengeluaran from pengeluaran WHERE pengeluaran.kode_pengeluaran = '$id' ");
		return $query->result();
	}

	function getALL(){
		$this->db->select('*');
		$this->db->from('data_pelanggan');
		$query = $this->db->get();
		return $query->result();
	}
	function getALL1(){
		$this->db->select('*');
		$this->db->from('data_pegawai');
		$query = $this->db->get();
		return $query->result();
	}
	function getALL2(){
		$this->db->select('*');
		$this->db->from('pengeluaran');
		$query = $this->db->get();
		return $query->result();
	}
	
	function hapus_data($where,$table){
	$this->db->where($where);
	$this->db->delete($table);
}

function edit_data($where,$table){		
	return $this->db->get_where($table,$where);
}
}
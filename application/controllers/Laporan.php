<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','form_validation'));
		$this->load->model('app_admin');
	}
	public function index()
	{
		$data['data'] = $this->app_admin->get_all('pengeluaran');
		$this->template->admin('admin/isi_datalaporan',$data);
	}
	public function pemasuk()
	{
		$data['data'] = $this->app_admin->get_all('transaksi');
		$this->template->admin('admin/isi_datalaporanpemasukan',$data);
	}
}
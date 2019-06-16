<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
	}

    public function index()
    {

    	$data['data'] = $this->app_admin->get_all('transaksi');
    	$this->template->admin('admin/data_transaksi', $data);
    }


	public function tambah_transaksi()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') 
		{
			//insert


			$laundry = array (
				'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
				'tanggal_transaksi' => $this->input->post('tanggal_transaksi', TRUE),
				'tanggal_selesai' => $this->input->post('tanggal_selesai', TRUE),
				'status_bayar' => $this->input->post('status_bayar', TRUE),
				'total' => $this->input->post('total', TRUE),

			);
				$this->app_admin->insert($laundry);

				$this->session->set_flashdata('success', 'Data Transaksi Telah Berhasil di tambahkan');
				redirect(current_url());

			}
		$data['kode_transaksi'] = $this->input->post('kode_transaksi', TRUE);

		$data['id_pelanggan'] = $this->input->post('id_pelanggan', TRUE);

		$data['tanggal_transaksi'] = $this->input->post('tanggal_transaksi', TRUE);
		$data['tanggal_selesai'] = $this->input->post('tanggal_selesai', TRUE);
		$data['status_bayar'] = $this->input->post('status_bayar', TRUE);
		$data['total'] = $this->input->post('total', TRUE);

		$data['header_tambahtransaksi'] = "Tambah Transaksi Baru";

		$this->template->admin('admin/form_tambahtransaksi', $data);
	}

	public function hapus ($id_pelanggan)
    {
    	$id['id_pelanggan']= $this->uri->segment(3);

     	$this->app_admin->hapus($id);

        //redirect
        redirect('Transaksi/');
 
    
    }
	 
	 
	 }
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
	}

    public function index()
    {

    	$data['data'] = $this->app_admin->get_all('data_pelanggan');
    	$this->template->admin('admin/data_pelanggan', $data);
    }


	public function tambah_pegawai()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') 
		{
			//insert


			$laundry = array (
				'nama_pegawai' => $this->input->post('nama_pegawai', TRUE),
				'alamat_pegawai' => $this->input->post('alamat_pegawai', TRUE),
				'telpon_pegawai' => $this->input->post('telpon_pegawai', TRUE),
				'username_pegawai' => $this->input->post('username_pegawai', TRUE),
				'password_pegawai' => $this->input->post('password_pegawai', TRUE),

			);
				$this->Model_pegawai->insert($laundry);

				$this->session->set_flashdata('success', 'Data Pelanggan Telah Berhasil di tambahkan');
				redirect(current_url());

			}

		$data['nama_pegawai'] = $this->input->post('nama_pegawai', TRUE);
		$data['alamat_pegawai'] = $this->input->post('alamat_pegawai', TRUE);
		$data['telpon_pegawai'] = $this->input->post('telpon_pegawai', TRUE);
		$data['username_pegawai'] = $this->input->post('username_pegawai', TRUE);
		$data['password_pelanggan'] = $this->input->post('password_pelanggan', TRUE);

		$data['header_tambahpegawai'] = "Tambah Customer Baru";

		$this->template->admin('admin/form_tambahpegawai', $data);
	}

	function hapus ($id_pelanggan)
    {
     $this->App_admin-> hapus ($id_pelanggan);

        //redirect
        redirect('Pelanggan');
 
    
    }
	 
	 
	 }
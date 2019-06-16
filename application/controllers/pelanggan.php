<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {

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


	public function tambah_pelanggan()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') 
		{
			//insert


			$laundry = array (
				'nama_pelanggan' => $this->input->post('nama_pelanggan', TRUE),
				'alamat_pelanggan' => $this->input->post('alamat_pelanggan', TRUE),
				'telpon_pelanggan' => $this->input->post('telpon_pelanggan', TRUE),
				'username_pelanggan' => $this->input->post('username_pelanggan', TRUE),
				'password_pelanggan' => $this->input->post('password_pelanggan', TRUE),

			);
				$this->app_admin->insert($laundry);

				$this->session->set_flashdata('success', 'Data Pelanggan Telah Berhasil di tambahkan');
				redirect(current_url());

			}

		$data['nama_pelanggan'] = $this->input->post('nama_pelanggan', TRUE);
		$data['alamat_pelanggan'] = $this->input->post('alamat_pelanggan', TRUE);
		$data['telpon_pelanggan'] = $this->input->post('telpon_pelanggan', TRUE);
		$data['username_pelanggan'] = $this->input->post('username_pelanggan', TRUE);
		$data['password_pelanggan'] = $this->input->post('password_pelanggan', TRUE);

		$data['header_tambahpelanggan'] = "Tambah Customer Baru";

		$this->template->admin('admin/form_tambahpelanggan', $data);
	}

	public function hapus ($id_pelanggan)
    {
    	$id['id_pelanggan']= $this->uri->segment(3);

     	$this->app_admin->hapus($id);

        //redirect
        redirect('Pelanggan/');
 
    
    }
	 
	 
	 }
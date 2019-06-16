<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
	}

    public function index()
    {

    	$data['data'] = $this->app_admin->get_all('tb_mobil');
    	$this->template->admin('admin/isi_datamobil', $data);
    }


	public function tambah_mobil()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') 
		{

			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg|';
			$config['max_size'] = '2048';
			$config['file_name'] = 'gambar'.date('Y_m_d_H_i_s');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto')) 
			{

				$gbr = $this->upload->data(); 
			//insert

			$this->load->helper('date');

			$mobil = array (
				'nama_mobil' => $this->input->post('nama_mobil', TRUE),
				'merk_mobil' => $this->input->post('merk_mobil', TRUE),
				'deskripsi_mobil' => $this->input->post('deskripsi_mobil', TRUE),
				'tahun_mobil' => $this->input->post('tahun_mobil', TRUE),
				'kapasitas_mobil' => $this->input->post('kapasitas_mobil', TRUE),
				'harga_sewa' => $this->input->post('harga_sewa', TRUE),
				'warna_mobil' => $this->input->post('warna_mobil', TRUE),
				'transmisi_mobil' => $this->input->post('transmisi_mobil', TRUE),
				'plat_mobil' => $this->input->post('plat_mobil', TRUE),
				'status_sewa' => $this->input->post('status_sewa', TRUE),
				'gambar' => $gbr['file_name'],
				'status_mobil' => $this->input->post('status_mobil', TRUE),
				'fasilitas_mobil' => $this->input->post('fasilitas_mobil', TRUE),









			);
				$this->db->set('ditambahkan', 'NOW()', FALSE);
				$this->app_admin->insert('tb_mobil', $mobil);

				$this->session->set_flashdata('success', 'Mobil Telah Berhasil di tambahkan');
				redirect(current_url());

			} else {

				$this->session->set_flashdata('alert', 'Cek Kembali Foto Anda !');
				// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
			}


		}

		$data['nama_mobil'] = $this->input->post('nama_mobil', TRUE);
		$data['merk_mobil'] = $this->input->post('merk_mobil', TRUE);
		$data['kapasitas_mobil'] = $this->input->post('kapasitas_mobil', TRUE);
		$data['warna_mobil'] = $this->input->post('warna_mobil', TRUE);
		$data['tahun_mobil'] = $this->input->post('tahun_mobil', TRUE);
		$data['harga_sewa'] = $this->input->post('harga_sewa', TRUE);
		$data['plat_mobil'] = $this->input->post('plat_mobil', TRUE);
		$data['transmisi_mobil'] = $this->input->post('transmisi_mobil', TRUE);
		$data['status_mobil'] = $this->input->post('status_mobil', TRUE);
		$data['status_sewa'] = $this->input->post('status_sewa', TRUE);
		$data['deskripsi_mobil'] = $this->input->post('deskripsi_mobil', TRUE);
		$data['fasilitas'] = $this->input->post('fasilitas', TRUE);


		$data['header_tambahmobil'] = "Tambah Mobil Baru";

		$this->template->admin('admin/form_tambahmobil', $data);
	}
}
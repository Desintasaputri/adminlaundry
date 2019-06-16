<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_order extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
	}

    public function index()
    {

    	$data['data'] = $this->app_admin->duatable();
    	$this->template->admin('admin/data_order', $data);
    }
 	

	public function tambah_order()
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

			$order = array (
				'kode_transaksi' => $this->input->post('kode_transaksi', TRUE),
				'nama_pelanggan' => $this->input->post('id_pelanggan', TRUE),
				'status_order' => $this->input->post('status_order', TRUE),
				








			);
				$this->db->set('ditambahkan', 'NOW()', FALSE);
				$this->app_admin->insert('transaki', $order);

				$this->session->set_flashdata('success', 'Status Order telah di ganti');
				redirect(current_url());

			} else {

				$this->session->set_flashdata('alert', 'Cek Kembali  !');
				// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
			}


		}
				// 'kode_transaksi' => $this->input->post('kode_transaksi', TRUE),
				// 'nama_pelanggan' => $this->input->post('id_pelanggan', TRUE),
				// 'status_order' => $this->input->post('status_order', TRUE),
		

		$data['header_tambahmobil'] = "Tambah List Order";

		$this->template->admin('admin/form_tambahlistorder', $data);
	}

	public function update_order($idnya){
		$table = 'tb_status';
		$data['data'] = $this->app_admin->duatable($idnya);
		$data['status'] = $this->app_admin->get_all($table)->result();
		 $this->template->admin('admin/form_list_order', $data);
	}

		public function uhuy(){
		$data['data'] = $this->app_admin->duatable($idnya);
		$table = 'tb_status';
		$data['status'] = $this->app_admin->get_all($table)->result();
		 // $this->template->admin('admin/form_list_order', $data);
		var_dump($data['status']);
	}

	public function update_order1()
	{
		$kode_transaksi = $this->input->post('kode_transaksi');
	// $id_pelanggan = $this->input->post('id_pelanggan');
	$status_order = $this->input->post('status_order');
	
 
	$data = array(
		
		// 'id_pelanggan' => $id_pelanggan,
		'status_order' => $status_order
	);
 
	$where = array(
		'kode_transaksi' => $kode_transaksi
	);
 
	$this->app_admin->update_data($where,$data,'transaksi');
	redirect('list_order/index');
	}

	// public function update_order_action(){
	// 	$kode_transaksi = $this->input->post('kode_transaksi');
	// $nama = $this->input->post('nama');
	// $alamat = $this->input->post('alamat');
	// $pekerjaan = $this->input->post('pekerjaan');
 
	// $data = array(
	// 	'nama' => $nama,
	// 	'alamat' => $alamat,
	// 	'pekerjaan' => $pekerjaan
	// );
 
	// $where = array(
	// 	'id' => $id
	// );
 
	// $this->m_data->update_data($where,$data,'user');
	// redirect('crud/index');
		
	// }

	
}
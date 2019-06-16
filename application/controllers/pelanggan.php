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
public function aksi_tambahdata()
    {
    	
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		
		$alamat_pelanggan = $this->input->post('alamat_pelanggan');
		$telpon_pelanggan = $this->input->post('telpon_pelanggan');
		
		$data = array(
			
			'nama_pelanggan' => $nama_pelanggan,
			
			'alamat_pelanggan' => $alamat_pelanggan,
			'telpon_pelanggan' => $telpon_pelanggan,
			);
		$this->app_admin->input_data($data,'data_pelanggan');
		redirect('pelanggan/index');
    }
public function tambah_data()
	{
		if ($this->input->post('submit', TRUE) == 'Submit') 
		{

			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg|';
			$config['max_size'] = '2048';
			$config['file_name'] = 'gambar'.date('Y_m_d_H_i_s');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('id_pelanggan')) 
			{

				$gbr = $this->upload->data(); 

			//insert

			$this->load->helper('date');

			$pelanggan = array (
				// 'kode_pengeluaran' => $this->input->post('kode_pengeluaran', TRUE),
				'id_pelanggan' => $this->input->post('id_pelanggan', TRUE),
				'nama_pelanggan' => $this->input->post('nama_pelanggan', TRUE),
				'alamat_pelanggan' => $this->input->post('alamat_pelanggan', TRUE),
				'telpon_pelanggan' => $this->input->post('telpon_pelanggan', TRUE),
				




			);
				$this->db->set('ditambahkan', 'NOW()', FALSE);
				$this->app_admin->insert('data_pelanggan', $pelanggan);

				$this->session->set_flashdata('success', 'Data Telah Berhasil di tambahkan');
				redirect(current_url());

			} else {

				$this->session->set_flashdata('alert', 'Cek Kembali Foto Anda !');
				// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
			}


		}

		$data['id_pelanggan'] = $this->input->post('id_pelanggan', TRUE);
		$data['nama_pelanggan'] = $this->input->post('nama_pelanggan', TRUE);
		$data['alamat_pelanggan'] = $this->input->post('alamat_pelanggan', TRUE);
		$data['telpon_pelanggan'] = $this->input->post('telpon_pelanggan', TRUE);
		

		$data['cek']= $this->app_admin->getAll();
		$data['header_tambahmobil'] = "Tambah Data";

		$this->template->admin('admin/form_tambah_pelanggan', $data);
	}
	function hapus($id_pelanggan){
		$where = array('id_pelanggan' => $id_pelanggan);
		$this->app_admin->hapus_data($where,'data_pelanggan');
		redirect('pelanggan/index');
	}
	function edit($id_pelanggan){
		$where = array('id_pelanggan' => $id_pelanggan);
		$data['data_pelanggan'] = $this->app_admin->edit_data($where,'data_pelanggan')->result();
		$this->load->view('admin/v_edit_pelanggan',$data);
	}
	public function update_pelanggan($id)
	{
		$id_pelanggan = $this->uri->segment(3);

		if ($this->input->post('submit', TRUE) == 'Submit') 
		{

			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'jpg|png|jpeg|';
			$config['max_size'] = '2048';
			$config['file_name'] = 'gambar'.date('Y_m_d_H_i_s');

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->load->helper('date');


			//insert

			$pelanggan = array (
				'nama_pelanggan' => $this->input->post('nama_pelanggan', TRUE),
				'alamat_pelanggan' => $this->input->post('alamat_pelanggan', TRUE),
				'telpon_pelanggan' => $this->input->post('telpon_pelanggan', TRUE),
				
			);

// //cek gambar apakah kosong ?

// 			if($this->upload->do_upload('foto') == NULL){



// 				$this->app_admin->update('tb_mobil', $mobil, array('id_mobil' => $id_mobil));


// 			}else{
// 				    $error = array('error' => $this->upload->display_errors());
// 				    $this->session->set_flashdata('error',$error['error']);
// 				    redirect(current_url());
// 				};
	//proses upload

				if ($this->upload->do_upload('foto')) 
				{

					$gbr = $this->upload->data(); 


					// $this->load->helper("file");
					// delete_files('./assets/upload'.$this->input->post('gambar_lama', TRUE));

					// $path = './assets/upload'.$this->input->post('gambar_lama', TRUE);
					// unlink($path);
					unlink('./assets/upload/'.$this->input->post('gambar_lama', TRUE));
					$mobil['gambar'] = $gbr['file_name'];



				} else {

		  			// $this->db->set('last_update', 'NOW()', FALSE);
					$this->app_admin->update('data_pelanggan', $pelanggan, array('id_pelanggan' => $id_pelanggan));

					// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
				}
				

//check gambar

		  // $this->db->set('last_update', 'NOW()', FALSE);
		  $this->app_admin->update('data_pelanggan', $pelanggan, array('id_pelanggan' => $id_pelanggan));

		  $this->session->set_flashdata('success', 'Data Pelanggan Telah Berhasil di ubah');
		  redirect(current_url());

		}

		$pelanggan = $this->app_admin->getidpelanggan($id);
		foreach ($pelanggan as $pelang) {
			$data['id_pelanggan'] = $pelang->id_pelanggan;
			$data['nama_pelanggan'] = $pelang->nama_pelanggan;
			$data['alamat_pelanggan'] = $pelang->alamat_pelanggan;
			$data['telpon_pelanggan'] = $pelang->telpon_pelanggan;
			
		}

		$data['header_tambahmobil'] = "Update  Pelanggan";
		$data['cek']= $this->app_admin->getAll();

		$this->template->admin('admin/form_updatepelanggan', $data);
	}

}
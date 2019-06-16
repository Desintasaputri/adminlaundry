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

    	$data['data'] = $this->app_admin->get_all('data_pegawai');
    	$this->template->admin('admin/data_pegawai', $data);
    }
public function aksi_tambahdata()
    {
    	
		$nama_pegawai = $this->input->post('nama_pegawai');
		
		$alamat_pegawai = $this->input->post('alamat_pegawai');
		$telpon_pegawai = $this->input->post('telpon_pegawai');
		$jabatan = $this->input->post('jabatan');
 
		$data = array(
			
			'nama_pegawai' => $nama_pegawai,
			
			'alamat_pegawai' => $alamat_pegawai,
			'telpon_pegawai' => $telpon_pegawai,'jabatan' => $jabatan,
			);
		$this->app_admin->input_data($data,'data_pegawai');
		redirect('pegawai/index');
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

			if ($this->upload->do_upload('id_pegawai')) 
			{

				$gbr = $this->upload->data(); 

			//insert

			$this->load->helper('date');

			$pegawai = array (
				// 'kode_pengeluaran' => $this->input->post('kode_pengeluaran', TRUE),
				'id_pegawai' => $this->input->post('id_pegawai', TRUE),
				'nama_pegawai' => $this->input->post('nama_pegawai', TRUE),
				'alamat_pegawai' => $this->input->post('alamat_pegawai', TRUE),
				'telpon_pegawai' => $this->input->post('telpon_pegawai', TRUE),
				'jabatan' => $this->input->post('jabatan', TRUE),






			);
				$this->db->set('ditambahkan', 'NOW()', FALSE);
				$this->app_admin->insert('data_pegawai', $pegawai);

				$this->session->set_flashdata('success', 'Data Telah Berhasil di tambahkan');
				redirect(current_url());

			} else {

				$this->session->set_flashdata('alert', 'Cek Kembali Foto Anda !');
				// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
			}


		}

		$data['id_pegawai'] = $this->input->post('id_pegawai', TRUE);
		$data['nama_pegawai'] = $this->input->post('nama_pegawai', TRUE);
		$data['alamat_pegawai'] = $this->input->post('alamat_pegawai', TRUE);
		$data['telpon_pegawai'] = $this->input->post('telpon_pegawai', TRUE);
		$data['jabatan'] = $this->input->post('jabatan', TRUE);

		$data['cek']= $this->app_admin->getAll();
		$data['header_tambahmobil'] = "Tambah Data";

		$this->template->admin('admin/form_tambah_pegawai', $data);
	}

	
	function hapus($id_pegawai){
		$where = array('id_pegawai' => $id_pegawai);
		$this->app_admin->hapus_data($where,'data_pegawai');
		redirect('pegawai/index');
	}
function edit($id_pegawai){
		$where = array('id_pegawai' => $id_pegawai);
		$data['data_pegawai'] = $this->app_admin->edit_data($where,'data_pegawai')->result();
		$this->load->view('admin/v_edit_pegawai',$data);
	}
	public function update_pegawai($id)
	{
		$id_pegawai = $this->uri->segment(3);

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

			$pegawai = array (
				'nama_pegawai' => $this->input->post('nama_pegawai', TRUE),
				'alamat_pegawai' => $this->input->post('alamat_pegawai', TRUE),
				'telpon_pegawai' => $this->input->post('telpon_pegawai', TRUE),
				'jabatan' => $this->input->post('jabatan', TRUE),
				
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
					$this->app_admin->update('data_pegawai', $pegawai, array('id_pegawai' => $id_pegawai));

					// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
				}
				

//check gambar

		  // $this->db->set('last_update', 'NOW()', FALSE);
		  $this->app_admin->update('data_pegawai', $pegawai, array('id_pegawai' => $id_pegawai));

		  $this->session->set_flashdata('success', 'Data Pegawai Telah Berhasil di ubah');
		  redirect(current_url());

		}

		$pegawai = $this->app_admin->getidpegawai($id);
		foreach ($pegawai as $pegaw) {
			$data['id_pegawai'] = $pegaw->id_pegawai;
			$data['nama_pegawai'] = $pegaw->nama_pegawai;
			$data['alamat_pegawai'] = $pegaw->alamat_pegawai;
			$data['telpon_pegawai'] = $pegaw->telpon_pegawai;
			$data['jabatan'] = $pegaw->jabatan;
		}

		$data['header_tambahmobil'] = "Update  Pegawai";
		$data['cek']= $this->app_admin->getALL1();

		$this->template->admin('admin/form_updatepegawai', $data);
	}

}
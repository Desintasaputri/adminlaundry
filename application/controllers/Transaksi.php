<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
	}

    public function index()
    {

    	$data['data'] = $this->app_admin->get_all('transaksi');
    	$this->template->admin('admin/transaksi', $data);
    }
public function aksi_tambahdata()
    {
    	
		
		$tanggal_jemput = $this->input->post('tanggal_jemput');
		$jam_jemput = $this->input->post('jam_jemput');
		$notes_transaksi = $this->input->post('notes_transaksi');
		$data = array(
			
			
			'tanggal_jemput'=>$tanggal_jemput,
			'jam_jemput'=>$jam_jemput,
			'notes_transaksi'=>$notes_transaksi,
			);
		$this->app_admin->input_data($data,'transaksi');
		redirect('transaksi/index');
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

			if ($this->upload->do_upload('kode_transaksi')) 
			{

				$gbr = $this->upload->data(); 

			//insert

			$this->load->helper('date');

			$transaksi = array (
				// 'kode_pengeluaran' => $this->input->post('kode_pengeluaran', TRUE),
				'tanggal_jemput' => $this->input->post('tanggal_jemput', TRUE),
				'jam_jemput' => $this->input->post('jam_jemput', TRUE),
				'notes_transaksi' => $this->input->post('notes_transaksi', TRUE),



			);
				$this->db->set('ditambahkan', 'NOW()', FALSE);
				$this->app_admin->insert('transaksi', $transaksi);

				$this->session->set_flashdata('success', 'Data Telah Berhasil di tambahkan');
				redirect(current_url());

			} else {

				$this->session->set_flashdata('alert', 'Cek Kembali Foto Anda !');
				// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
			}


		}

		
		$data['tanggal_jemput'] = $this->input->post('tanggal_jemput', TRUE);
		$data['jam_jemput'] = $this->input->post('jam_jempu', TRUE);
		$data['notes_transaksi'] = $this->input->post('notes_transaksi', TRUE);
		

		$data['cek']= $this->app_admin->getAll();
		$data['header_tambahmobil'] = "Tambah Data";

		$this->template->admin('admin/form_tambah_transaksi', $data);
	}

	
	function hapus($kode_transaksi){
		$where = array('kode_transaksi' => $kode_transaksi);
		$this->app_admin->hapus_data($where,'transaksi');
		redirect('transaksi/index');
	}
function edit($kode_transaksi){
		$where = array('kode_transaksi' => $kode_transaksi);
		$data['transaksi'] = $this->app_admin->edit_data($where,'transaksi')->result();
		$this->load->view('admin/v_edit_transaksi',$data);
	}
	public function update_transaksi($id)
	{ 
		$kode_transaksi = $this->uri->segment(3);

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

			$transaksi = array (
				
				'tanggal_jemput' => $this->input->post('tanggal_jemput', TRUE),
				'jam_jemput' => $this->input->post('jam_jemput', TRUE),
				'notes_transaksi' => $this->input->post('notes_transaksi', TRUE),
				
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
					$this->app_admin->update('transaksi', $transaksi, array('kode_transaksi' => $kode_transaksi));

					// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
				}
				

//check gambar

		  // $this->db->set('last_update', 'NOW()', FALSE);
		  $this->app_admin->update('transaksi', $transaksi, array('kode_transaksi' => $kode_transaksi));

		  $this->session->set_flashdata('success', 'Data Transaksi Telah Berhasil di ubah');
		  redirect(current_url());

		}

		$transaksi = $this->app_admin->getidtransaksi($id);
		foreach ($transaksi as $tran) {
			
			$data['tanggal_jemput'] = $tran->tanggal_jemput;
			$data['jam_jemput'] = $tran->jam_jemput;
			
			$data['notes_transaksi'] = $tran->notes_transaksi;
			
		}

		$data['header_tambahmobil'] = "Update  Transaksi";
		$data['cek']= $this->app_admin->getALL3();

		$this->template->admin('admin/form_updatetransaksi', $data);
	}

}
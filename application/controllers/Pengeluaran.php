<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation'));
		$this->load->model('app_admin');
	}

    public function index()
    {

    	$data['data'] = $this->app_admin->get_all('pengeluaran');
    	$this->template->admin('admin/isi_datapengeluaran', $data);
    }


    public function aksi_tambahdata()
    {
    	$jenis_pengeluaran = $this->input->post('jenis_pengeluaran');
		$qty_pengeluaran = $this->input->post('qty_pengeluaran');
		$nominal = $this->input->post('nominal');
		$tanggal_pengeluaran = $this->input->post('tanggal_pengeluaran');
		$notes_pengeluaran = $this->input->post('notes_pengeluaran');
 
		$data = array(
			'jenis_pengeluaran' => $jenis_pengeluaran,
			'qty_pengeluaran' => $qty_pengeluaran,
			'nominal' => $nominal,
			'tanggal_pengeluaran' => $tanggal_pengeluaran,'notes_pengeluaran' => $notes_pengeluaran,
			);
		$this->app_admin->input_data($data,'pengeluaran');
		redirect('pengeluaran/index');
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

			if ($this->upload->do_upload('jenis_pengeluaran')) 
			{

				$gbr = $this->upload->data(); 

			//insert

			$this->load->helper('date');

			$pengeluaran = array (
				// 'kode_pengeluaran' => $this->input->post('kode_pengeluaran', TRUE),
				'jenis_pengeluaran' => $this->input->post('jenis_pengeluaran', TRUE),
				'qty_pengeluaran' => $this->input->post('qty_pengeluaran', TRUE),
				'nominal' => $this->input->post('nominal', TRUE),
				'tanggal_pengeluaran' => $this->input->post('tanggal_pengeluaran', TRUE),
				'notes_pengeluaran' => $this->input->post('notes_pengeluaran', TRUE),






			);
				$this->db->set('ditambahkan', 'NOW()', FALSE);
				$this->app_admin->insert('pengeluaran', $pengeluaran);

				$this->session->set_flashdata('success', 'Data Telah Berhasil di tambahkan');
				redirect(current_url());

			} else {

				$this->session->set_flashdata('alert', 'Cek Kembali Foto Anda !');
				// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
			}


		}

		$data['jenis_pengeluaran'] = $this->input->post('jenis_pengeluaran', TRUE);
		$data['qty_pengeluaran'] = $this->input->post('qty_pengeluaran', TRUE);
		$data['nominal'] = $this->input->post('nominal', TRUE);
		$data['tanggal_pengeluaran'] = $this->input->post('tanggal_pengeluaran', TRUE);
		$data['notes_pengeluaran'] = $this->input->post('notes_pengeluaran', TRUE);
		

		$data['cek']= $this->app_admin->getAll();
		$data['header_tambahmobil'] = "Tambah Data";

		$this->template->admin('admin/form_tambahdata', $data);
	}
	function hapus($kode_pengeluaran){
		$where = array('kode_pengeluaran' => $kode_pengeluaran);
		$this->app_admin->hapus_data($where,'pengeluaran');
		redirect('pengeluaran/index');
	}
	function edit($kode_pengeluaran){
		$where = array('kode_pengeluaran' => $kode_pengeluaran);
		$data['pengeluaran'] = $this->app_admin->edit_data($where,'pengeluaran')->result();
		$this->load->view('admin/v_edit_pengeluaran',$data);
	}
	public function update_pengeluaran($id)
	{
		$kode_pengeluaran = $this->uri->segment(3);

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

			$pengeluaran = array (
				'jenis_pengeluaran' => $this->input->post('jenis_pengeluaran', TRUE),
				'qty_pengeluaran' => $this->input->post('qty_pengeluaran', TRUE),
				'nominal' => $this->input->post('nominal', TRUE),
				'tanggal_pengeluaran' => $this->input->post('tanggal_pengeluaran', TRUE),
				'notes_pengeluaran' => $this->input->post('notes_pengeluaran', TRUE),
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
					$this->app_admin->update('pengeluaran', $pengeluaran, array('kode_pengeluaran' => $kode_pengeluaran));

					// echo $this->upload->display_errors('<p style="color:#fff">', '</p>');
				}
				

//check gambar

		  // $this->db->set('last_update', 'NOW()', FALSE);
		  $this->app_admin->update('pengeluaran', $pengeluaran, array('kode_pengeluaran' => $kode_pengeluaran));

		  $this->session->set_flashdata('success', 'Data Pengeluaran Telah Berhasil di ubah');
		  redirect(current_url());

		}

		$pengeluaran = $this->app_admin->getidpengeluaran($id);
		foreach ($pengeluaran as $peng) {
			$data['kode_pengeluaran'] = $peng->kode_pengeluaran;
			$data['jenis_pengeluaran'] = $peng->jenis_pengeluaran;
			$data['qty_pengeluaran'] = $peng->qty_pengeluaran;
			$data['nominal'] = $peng->nominal;
			$data['tanggal_pengeluaran'] = $peng->tanggal_pengeluaran;
			$data['notes_pengeluaran'] = $peng->notes_pengeluaran;
		}

		$data['header_tambahmobil'] = "Update Pengeluaran";
		$data['cek']= $this->app_admin->getAll2();

		$this->template->admin('admin/form_updatepengeluaran', $data);
	}

}


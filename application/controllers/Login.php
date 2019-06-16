
<?php 
defined('BASEPATH') OR exit('No Direct Script Access allowed');

class Login extends CI_Controller{

	function __construct()
	{
		parent::__construct();		
		$this->load->model('app_admin');
	}

	function index()
	{
				// echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);

		if ($this->input->post('submit', TRUE) == 'Submit') 
		{
			$user = $this->input->post('username_pegawai', TRUE);
			$pass = $this->input->post('password_pegawai', TRUE);

			$cek = $this->app_admin->get_where('data_pegawai', array('username_pegawai' => $user ));

			if ($cek->num_rows() > 0) {
				$data = $cek->row();

				if (password_verify($pass, $data->password_pegawai))
			    {
			    	$datauser = array (
			    		'id_pegawai' => $data->id_pegawai,
			    		'username_pegawai' => $data->username_pegawai,
			    		'nama_pegawai' => $data->nama_pegawai,
			    		'jabatan' => $data->jabatan,
			    		'login' => TRUE
			    	);

			    	$this->session->set_userdata($datauser);

			    	redirect('admin');
				} else {
					$this->session->set_flashdata('alert', "Password yang anda masukkan salah");
				}
				

			} else {
					$this->session->set_flashdata('alert', "Username yang anda masukkan salah");


			}
			
		}
		if($this->session->userdata('login') == TRUE)
		{
			redirect('admin');
		}

		$this->load->view('admin/login');

	}
	public function logout()
	{
		$this->session->sess_destroy(); 
		redirect('login');
	}

}
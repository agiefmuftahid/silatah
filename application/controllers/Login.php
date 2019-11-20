<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('Mlogin');
    }
	public function index()
	{
		$session = $this->session->userdata('login');
		if($session == 'Kemahasiswaan'){
    		redirect('Kemahasiswaan/lihatKegiatan');
		}
		elseif($session == 'Akademik'){
    		redirect('Akademik/lihatBuku');
		}
		elseif($session == 'Sumberdaya'){
    		redirect('Sumberdaya/lihatAlokasi');
		}
		else{
			$this->load->view('login');
		}
	}
	public function cek_Login(){
		if(isset($_POST['login']))
		{
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);
			$cek = $this->Mlogin->proseslogin($username,$password);
			$hasil = count($cek);
			if($hasil > 0)
			{
				$pelogin = $this->db->get_where('user', array( 'username' => $username, 'password' => $password))->row();
				if($pelogin->level == 1)
				{
					$this->session->set_userdata(array(
		                'login'         => "Kemahasiswaan",
		                'username'      => $cek[0]['username'],
		            ));
    				redirect('Kemahasiswaan/lihatKegiatan');
				}
				else if($pelogin->level == 2)
				{
					$this->session->set_userdata(array(
		                'login'         => "Akademik",
		                'username'      => $cek[0]['username'],
		            ));
    				redirect('Akademik/lihatBuku');
				}
				else if($pelogin->level == 3)
				{
					$this->session->set_userdata(array(
		                'login'         => "Sumberdaya",
		                'username'      => $cek[0]['username'],
		            ));
    				redirect('Sumberdaya/lihatAlokasi');
				}

				//redirect('welcome/beranda');
			}
			else
			{
				$this->load->view('login');
				$this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert"> Username atau Password salah</div>');
				redirect('login');
			}
		}
	}
	public function logout(){
        $this->session->sess_destroy();
        redirect('login','refresh');
    }
}

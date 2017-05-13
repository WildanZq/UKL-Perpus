<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('login_m');
  }

  function index()
  {
    $this->load->view('login_view');
  }

  public function masuk() {
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if ($this->login_m->cek_petugas() == TRUE) {
					redirect('anggota');
				} else {
					$data['notif'] = 'Login Gagal';
					$this->load->view('login_view', $data);
				}
			} else {
				$data['notif'] = validation_errors();
				$this->load->view('login_view', $data);
			}
		}
	}

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }

}

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
    if ($this->session->userdata('logged_in') == TRUE) {
      redirect('transaksi');
    }
    $this->load->view('login_view');
  }

  public function masuk() {
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if ($this->login_m->cek_petugas() == TRUE) {
					redirect('transaksi');
				} else {
          $this->session->set_flashdata('notif', 'Username atau Password salah');
					redirect('login');
				}
			} else {
        $this->session->set_flashdata('notif', validation_errors());
				redirect('login');
			}
		}
	}

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }

}

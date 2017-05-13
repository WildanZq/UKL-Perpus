<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anggota extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('anggota_m');
  }

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['panggilview']='anggota_view';
			$data['anggota'] = $this->anggota_m->lihat();
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function tambah()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['panggilview']='anggota_tambah_view';
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function tambah_anggota() {
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('nis', 'NIS', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
				$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
				$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required|numeric');

				if ($this->form_validation->run() == TRUE) {
					if ($this->anggota_m->upload() == TRUE) {
						$this->session->set_flashdata('notif', 'Pendaftaran Berhasil');
						redirect('anggota');
					} else {
						$this->session->set_flashdata('notif', 'Pendaftaran Gagal');
						redirect('anggota/tambah');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('anggota/tambah');
				}
			} else {
				redirect('anggota');
			}
		} else {
			redirect('login');
		}
	}

	public function hapus($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->anggota_m->delete($id) == TRUE) {
				$this->session->set_flashdata('notif', 'Hapus Data Berhasil');
				redirect('anggota');
			} else {
				$this->session->set_flashdata('notif','Hapus Data Gagal');
				redirect('anggota');
			}
		} else {
			redirect('login');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('nis', 'NIS', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
				$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
				$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required|numeric');

				if ($this->form_validation->run() == TRUE) {
					if ($this->anggota_m->edit($id) == TRUE) {
						$this->session->set_flashdata('notif', 'Edit data Berhasil');
						redirect('anggota');
					} else {
						$this->session->set_flashdata('notif', 'Edit data Gagal');
						redirect('anggota');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('anggota');
				}
			} else {
				redirect('anggota');
			}
		} else {
			redirect('login');
		}
	}

}

/* End of file anggota.php */
/* Location: ./application/controllers/anggota.php */

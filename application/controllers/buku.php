<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
		$this->load->model('buku_m');
  }

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['buku'] = $this->buku_m->lihat();
			$data['panggilview']='buku_view';
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}
	public function tambah()
	{
		$data['panggilview']='buku_tambah_view';
		$this->load->view('template_view',$data);
	}

	public function hapus($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->buku_m->delete($id) == TRUE) {
				$this->session->set_flashdata('notif', 'Hapus Data Berhasil');
				redirect('buku');
			} else {
				$this->session->set_flashdata('notif','Hapus Data Gagal');
				redirect('buku');
			}
		} else {
			redirect('login');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('barcode', 'Barcode', 'trim|required');
				$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
				$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
				$this->form_validation->set_rules('penulis', 'Penulis', 'trim|required');
				$this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');
				$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
				$this->form_validation->set_rules('dipinjam', 'Dipinjam', 'trim|required|numeric');

				if ($this->form_validation->run() == TRUE) {
					if ($this->buku_m->edit($id) == TRUE) {
						$this->session->set_flashdata('notif', 'Edit data Berhasil');
						redirect('buku');
					} else {
						$this->session->set_flashdata('notif', 'Edit data Gagal');
						redirect('buku');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('buku');
				}
			} else {
				redirect('buku');
			}
		} else {
			redirect('login');
		}
	}


}

/* End of file buku.php */
/* Location: ./application/controllers/buku.php */

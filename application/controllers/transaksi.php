<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
		$this->load->model('transaksi_m');
  }

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['peminjaman'] = $this->transaksi_m->lihat();
			$data['panggilview']='transaksi_view';
			if (!empty($this->session->flashdata('search'))) {
				$sc = $this->session->flashdata('search');
				$data['peminjaman'] = $this->transaksi_m->search($sc);
			}
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function search()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('search','Search','trim|required');

			if ($this->form_validation->run() == TRUE) {
				$this->session->set_flashdata('search', $this->input->post('search'));
				redirect('transaksi');
			} else {
				redirect('transaksi');
			}
		} else {
			redirect('transaksi');
		}
	}

	public function tambah()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['buku'] = $this->transaksi_m->buku();
			$data['anggota'] = $this->transaksi_m->anggota();
			$data['panggilview']='transaksi_tambah_view';
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
		}
	}

	public function tambah_transaksi()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('peminjam', 'Peminjam', 'trim|required');
				$this->form_validation->set_rules('buku1', 'Buku', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					if ($this->transaksi_m->tambah() == TRUE) {
						$this->session->set_flashdata('notif', 'Peminjaman Berhasil');
						redirect('transaksi');
					} else {
						$this->session->set_flashdata('notif', 'Peminjaman Gagal');
						redirect('transaksi/tambah');
					}
				} else {
					$this->session->set_flashdata('notif', validation_errors());
					redirect('transaksi/tambah');
				}
			} else {
				redirect('transaksi');
			}
		} else {
			redirect('login');
		}
	}

	public function kembali()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$id = $this->uri->segment(3);
			if ($this->uri->segment(4) == '') {
				$denda = $this->uri->segment(4);
			} else {
				$denda = 0;
			}

			if ($this->transaksi_m->kembali($id, $denda) == TRUE) {
				$this->session->set_flashdata('notif', 'Pengembalian Berhasil');
				redirect('transaksi');
			} else {
				$this->session->set_flashdata('notif', 'Pengembalian Gagal');
				redirect('transaksi');
			}
		} else {
			redirect('login');
		}
	}

}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */

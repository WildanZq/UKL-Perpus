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
			$this->load->view('template_view',$data);
		} else {
			redirect('login');
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

	}

}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */

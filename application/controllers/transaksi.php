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

}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */

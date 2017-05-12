<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function index()
	{
		$data['panggilview']='transaksi_view';
		$this->load->view('template_view',$data);
	}

}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */
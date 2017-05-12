<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function index()
	{
		$data['panggilview']='buku_view';
		$this->load->view('template_view',$data);
	}
	public function tambah()
	{
		$data['panggilview']='buku_tambah_view';
		$this->load->view('template_view',$data);
	}


}

/* End of file buku.php */
/* Location: ./application/controllers/buku.php */

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	public function index()
	{
		$data['panggilview']='petugas_view';
		$this->load->view('template_view',$data);	
	}
	public function tambah()
	{
		$data['viewnyatambah']='petugas_tambah_view';
		$this->load->view('template_tambah_view',$data);
	}

}

/* End of file petugas.php */
/* Location: ./application/controllers/petugas.php */
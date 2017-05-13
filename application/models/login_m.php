<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function cek_petugas()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $query = $this->db->where('USERNAME',$username)
                      ->where('PASSWORD',$password)
                      ->get('petugas');

    if ($query->num_rows() > 0) {
      $nama = array_shift($query->result_array());
      $data = array('nama' => $nama['NAMA'], 'logged_in' => TRUE );
      $this->session->set_userdata($data);

      return TRUE;
    } else {
      return FALSE;
    }
  }

}

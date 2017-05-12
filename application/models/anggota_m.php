<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class anggota_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function lihat() {
    return $this->db->order_by('ID_USER', 'ASC')->get('anggota')->result();
  }

  public function upload()
  {
    $data = array('ID_USER' => NULL,
                  'NIS' => $this->input->post('nis'),
                  'NAMA' => $this->input->post('nama'),
                  'KELAS' => $this->input->post('kelas'),
                  'JK' => $this->input->post('jk'),
                  'NO_HP' => $this->input->post('no_hp')
                );
    $this->db->insert('anggota', $data);
    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

  public function edit($id)
  {
    $data = array('NIS' => $this->input->post('nis'),
                  'NAMA' => $this->input->post('nama'),
                  'KELAS' => $this->input->post('kelas'),
                  'JK' => $this->input->post('jk'),
                  'NO_HP' => $this->input->post('no_hp')
                );
    $this->db->where('ID_USER',$id)->update('anggota', $data);
    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

  public function detil($id) {
		return $this->db->get_where('anggota',array('ID_USER'=>$id));
	}

  public function delete($id)
  {
    return $this->db->delete('anggota', array('ID_USER'=>$id));
  }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buku_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function lihat() {
    return $this->db->order_by('KD_BUKU', 'ASC')->get('buku')->result();
  }

  public function edit($id)
  {
    $data = array('BARCODE' => $this->input->post('barcode'),
                  'JUDUL' => $this->input->post('judul'),
                  'KATEGORI' => $this->input->post('kategori'),
                  'PENULIS' => $this->input->post('penulis'),
                  'PENERBIT' => $this->input->post('penerbit'),
                  'JUMLAH' => $this->input->post('jumlah'),
                  'DIPINJAM' => $this->input->post('dipinjam')
                );
    $this->db->where('KD_BUKU',$id)->update('buku', $data);
    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

  public function delete($id)
  {
    return $this->db->delete('buku', array('KD_BUKU'=>$id));
  }

}

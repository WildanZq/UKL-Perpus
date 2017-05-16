<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi_m extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function lihat() {
    $this->db->select('*');
    $this->db->from('pinjam');
    $this->db->join('detail_pinjam', 'detail_pinjam.NO_PINJAM=pinjam.NO_PINJAM');
    $this->db->join('buku', 'buku.KD_BUKU=detail_pinjam.KD_BUKU');
    $this->db->join('petugas', 'pinjam.ID_PETUGAS=petugas.ID_PETUGAS');
    $this->db->join('anggota', 'anggota.ID_USER=pinjam.ID_USER');
    $this->db->where('pinjam.STATUS', 'Belum Kembali');
    $this->db->order_by('pinjam.TANGGAL','desc');

    return $this->db->get()->result();
  }

  public function buku()
  {
    $this->db->from('buku');
    $this->db->where('DIPINJAM != JUMLAH');
    return $this->db->get()->result();
  }

  public function anggota()
  {
    return $this->db->get('anggota')->result();
  }

  public function tambah()
  {
    $pinjam = array('ID_PETUGAS' => $this->session->userdata('id'),
                  'ID_USER' => $this->input->post('peminjam'),
                  'TANGGAL' => date('Y-m-d'),
                  'STATUS' => 'Belum Kembali'
                );
    $this->db->insert('pinjam', $pinjam);
    $no_pinjam = $this->db->insert_id();
    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;

    if ($r==TRUE) {
      $det = array('ID_DIPINJAM' => NULL,
                    'NO_PINJAM' => $no_pinjam,
                    'KD_BUKU' => $this->input->post('buku1')
                  );
      $this->db->insert('detail_pinjam', $det);
      $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;

      if ($r==FALSE) {
        $this->db->delete('pinjam', array('NO_PINJAM'=>$no_pinjam));
      } else {
        $dipinjam = $this->db->get_where('buku',array('KD_BUKU' => $this->input->post('buku1')));
        $dipinjam+=1;
        $this->db->where('KD_BUKU',$this->input->post('buku1'))->set('DIPINJAM', $dipinjam)->update('buku');
        $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;

        if ($r==FALSE) {
          $this->db->delete('pinjam', array('NO_PINJAM'=>$no_pinjam));
          $this->db->delete('detail_pinjam', array('NO_PINJAM'=>$no_pinjam));
        }
      }
    }

    return $r;
  }

}

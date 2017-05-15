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
    return $this->db->get('buku')->result();
  }

  public function anggota()
  {
    return $this->db->get('anggota')->result();
  }

}

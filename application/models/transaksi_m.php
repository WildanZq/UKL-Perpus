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
    $this->db->where('detail_pinjam.STATUS', 'Belum kembali');
    $this->db->order_by('pinjam.TANGGAL','desc');

    return $this->db->get()->result();
  }

  public function search($sc)
  {
    $this->db->select('*');
    $this->db->from('pinjam');
    $this->db->join('detail_pinjam', 'detail_pinjam.NO_PINJAM=pinjam.NO_PINJAM');
    $this->db->join('buku', 'buku.KD_BUKU=detail_pinjam.KD_BUKU');
    $this->db->join('petugas', 'pinjam.ID_PETUGAS=petugas.ID_PETUGAS');
    $this->db->join('anggota', 'anggota.ID_USER=pinjam.ID_USER');
    $this->db->where('detail_pinjam.STATUS', 'Belum kembali');
    $this->db->where('pinjam.TANGGAL',$sc)->or_like('anggota.NAMA',$sc)->or_like('buku.JUDUL',$sc)->or_like('buku.BARCODE',$sc);
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
                  'TANGGAL' => date('Y-m-d')
                );
    $this->db->insert('pinjam', $pinjam);
    $no_pinjam = $this->db->insert_id();
    // $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;

    if ($this->input->post('buku2') != '') {
      $jml_buku = 2;
      if ($this->input->post('buku3') != '') {
        $jml_buku = 3;
      }
    } else { $jml_buku = 1; }

    for ($i=1; $i <= $jml_buku; $i++) {
      $det = array('NO_PINJAM' => $no_pinjam,
                    'KD_BUKU' => $this->input->post('buku'.$i),
                    'STATUS' => 'Belum kembali'
                  );
      $this->db->insert('detail_pinjam', $det);
      // $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;

      $dipinjam = $this->db->select('DIPINJAM')->where('KD_BUKU', $this->input->post('buku'.$i))->get('buku')->result_array();
      $dipinjam = array_shift($dipinjam)['DIPINJAM'] + 1;

      $this->db->where('KD_BUKU',$this->input->post('buku'.$i))->set('DIPINJAM', $dipinjam)->update('buku');
      // $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    }

    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

  public function kembali($id, $denda)
  {
    if ($denda == 0) {
      $status = 'Tepat waktu';
    } else {
      $status = 'Terlambat';
    }

    $data = array('TANGGAL_KEMBALI' => date("Y-m-d"),
                  'ID_PETUGAS_KEMBALI' => $this->session->userdata('id'),
                  'DENDA' => $denda,
                  'STATUS' => $status
                );
    $this->db->where('ID_DIPINJAM',$id)->update('detail_pinjam',$data);

    $kd_buku = $this->db->select('KD_BUKU')->where('ID_DIPINJAM', $id)->get('detail_pinjam')->result_array();
    $kd_buku = array_shift($kd_buku)['KD_BUKU'];

    $dipinjam = $this->db->select('DIPINJAM')->where('KD_BUKU', $kd_buku)->get('buku')->result_array();
    $dipinjam = array_shift($dipinjam)['DIPINJAM'] - 1;
    $this->db->where('KD_BUKU',$kd_buku)->set('DIPINJAM', $dipinjam)->update('buku');

    $this->db->affected_rows() > 0 ? $r=TRUE : $r=FALSE;
    return $r;
  }

}

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tabel Peminjaman</h1>
                    <a href="<?php echo base_url(); ?>index.php/transaksi/tambah" style="float: right;margin-top: -60px" class="btn btn-primary">Tambah Peminjaman</a>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nama Peminjam</th>
                                        <th>Judul Buku</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Denda</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($peminjaman as $pinjam): ?><tr>
                                      <td><?php echo $pinjam->NAMA; ?></td>
                                      <td><?php echo $pinjam->JUDUL; ?></td>
                                      <td><?php $tanggal = date_create($pinjam->TANGGAL);echo date_format($tanggal,"d M Y"); ?></td>
                                      <td><?php $deadline = strtotime("+7 day",strtotime($pinjam->TANGGAL));
                                      if(strtotime(date("Y-m-d")) > $deadline) {
                                        $today = time();
                                        $diff = $today - $deadline;
                                        echo 'Rp '.floor($diff / 86400)*500;
                                      } else { echo '0'; } ?></td>
                                      <td>
                                        <a href='<?php echo base_url(); ?>index.php/transaksi/kembali/<?php echo $pinjam->NO_PINJAM; ?>' type='button' class='btn btn-success'>Kembali</a>
                                      </td>
                                    </tr>
                                  <?php endforeach; ?></tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>

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
                                        <th>Denda / Deadline</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Nama Peminjam</th>
                                        <th>Barcode</th>
                                        <th>Judul Buku</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($peminjaman as $pinjam): ?><tr>
                                    <td><?php
                                    $deadline = strtotime("+7 day",strtotime($pinjam->TANGGAL));
                                    $today = time();
                                    if(strtotime(date("Y-m-d")) > $deadline) {
                                      $diff = $today - $deadline;
                                      echo 'Rp '.floor($diff / 86400)*500;
                                    } else if(strtotime(date("Y-m-d")) < $deadline) {
                                      $diff = $deadline - $today;
                                      echo (floor($diff / 86400)+1).' Hari lagi ';
                                    } else {
                                      echo 'Hari ini deadline';
                                    } ?></td>
                                    <td><?php $tanggal = date_create($pinjam->TANGGAL);echo date_format($tanggal,"d M Y"); ?></td>
                                    <td><?php echo $pinjam->NAMA; ?></td>
                                    <td><?php echo $pinjam->BARCODE; ?></td>
                                    <td><?php echo $pinjam->JUDUL; ?></td>
                                    <td>
                                      <a href='<?php echo base_url(); ?>index.php/transaksi/kembali/<?php echo $pinjam->NO_PINJAM; ?>' type='button' class='btn btn-success'>Kembali</a>
                                      <a href='<?php echo base_url(); ?>index.php/transaksi/hilang/<?php echo $pinjam->NO_PINJAM; ?>' type='button' class='btn btn-danger'>Hilang</a>
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

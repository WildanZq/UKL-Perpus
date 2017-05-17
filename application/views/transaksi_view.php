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
                          <?php
                          $notif = $this->session->flashdata('notif');
                          if (!empty($notif))
                            echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
                          ?>
                          <form method="post" action="<?php echo base_url(); ?>index.php/transaksi/search">
                          <div class="row" style="margin-bottom:15px;">
                            <div class="col-lg-4" style="float:right">
                              <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search..." name="search">
                                <span class="input-group-btn">
                                  <label for="#sc" class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                  </label>
                                  <input id="sc" type="submit" name="submit" style="display:none">
                                </span>
                              </div>
                            </div>
                          </div>
                          </form>
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
                                    $denda = 0;
                                    if(strtotime(date("Y-m-d")) > $deadline) {
                                      $diff = $today - $deadline;
                                      $denda = floor($diff / 86400)*500;
                                      echo 'Rp '.$denda;
                                    } else if(strtotime(date("Y-m-d")) < $deadline) {
                                      $diff = $deadline - $today;
                                      echo (floor($diff / 86400)+1).' Hari lagi';
                                    } else {
                                      echo 'Hari ini deadline';
                                    } ?></td>
                                    <td><?php $tanggal = date_create($pinjam->TANGGAL);echo date_format($tanggal,"d M Y"); ?></td>
                                    <td><?php echo $pinjam->NAMA; ?></td>
                                    <td><?php echo $pinjam->BARCODE; ?></td>
                                    <td><?php echo $pinjam->JUDUL; ?></td>
                                    <td>
                                      <a href='<?php echo base_url(); ?>index.php/transaksi/kembali/<?php echo $pinjam->ID_DIPINJAM; ?>/<?php echo $denda; ?>' type='button' class='btn btn-success'>Kembali</a>
                                      <a href='<?php echo base_url(); ?>index.php/transaksi/hilang/<?php echo $pinjam->ID_DIPINJAM; ?>' type='button' class='btn btn-danger'>Hilang</a>
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

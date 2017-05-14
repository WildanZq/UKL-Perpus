<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tabel Transaksi</h1>
                    <button style="float: right;margin-top: -60px" class="btn btn-primary">Tambah Transaksi</button>
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
                                  <?php foreach ($peminjaman as $pinjam): ?>
                                    <tr>
                                      <td><?php echo $pinjam->NAMA; ?></td>
                                      <td><?php echo $pinjam->JUDUL; ?></td>
                                      <td><?php echo $pinjam->TANGGAL; ?></td>
                                      <td><?php echo $pinjam->DENDA; ?></td>
                                      <td>
                                        <a href='".base_url()."index.php/transaksi/kembali/$pinjam->NO_PINJAM' type='button' class='btn btn-success'>Kembali</a>
                                      </td>
                                    </tr>
                                  <?php endforeach; ?>
                                </tbody>
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

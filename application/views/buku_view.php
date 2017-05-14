<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Tabel Buku</h1>
                                       <a href="<?php echo base_url(); ?>index.php/buku/tambah"><button style="float: right;margin-top: -60px" class="btn btn-primary">Tambah Buku</button></a>
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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Penulis</th>
                                        <th>Penerbit</th>
                                        <th>Jumlah</th>
                                        <th>Dipinjam</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($buku as $book) {
                                      echo "
                                        <tr>
                                          <td>$book->BARCODE</td>
                                          <td>$book->JUDUL</td>
                                          <td>$book->KATEGORI</td>
                                          <td>$book->PENULIS</td>
                                          <td>$book->PENERBIT</td>
                                          <td>$book->JUMLAH</td>
                                          <td>$book->DIPINJAM</td>
                                          <td>
                                            <button class='btn btn-info' data-toggle='modal' data-target='#modal$book->KD_BUKU'>Edit</button>
                                            <a href='".base_url()."index.php/buku/hapus/$book->KD_BUKU' type='button' class='btn btn-danger'>Delete</a>
                                          </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class='modal fade' id='modal$book->KD_BUKU' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                  <form role='form' action='".base_url()."index.php/buku/edit/".$book->KD_BUKU."' method='post'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                        <h4 class='modal-title' id='myModalLabel'>Edit Data Buku</h4>
                                                    </div>
                                                    <div class='modal-body'>";?>
                                                      <div class="form-group">
                                                        <label>Barcode</label>
                                                        <input class="form-control" type="text" name="barcode" required value="<?php echo $book->BARCODE; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Judul</label>
                                                        <input class="form-control" type="text" name="judul" required value="<?php echo $book->JUDUL; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Kategori</label>
                                                        <select class="form-control" name="kategori" required>
                                                          <option value="Fiksi">Fiksi</option>
                                                          <option value="Sains" <?php if($book->KATEGORI=='Sains'){echo 'selected';} ?>>Sains</option>
                                                          <option value="Agama" <?php if($book->KATEGORI=='Agama'){echo 'selected';} ?>>Agama</option>
                                                          <option value="Bahasa" <?php if($book->KATEGORI=='Bahasa'){echo 'selected';} ?>>Bahasa</option>
                                                          <option value="Komik" <?php if($book->KATEGORI=='Komik'){echo 'selected';} ?>>Komik</option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Penulis</label>
                                                        <input class="form-control" type="text" name="penulis" required value="<?php echo $book->PENULIS; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Penerbit</label>
                                                        <input class="form-control" type="text" name="penerbit" required value="<?php echo $book->PENERBIT; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Jumlah</label>
                                                        <input class="form-control" type="number" name="jumlah" min="0" required value="<?php echo $book->JUMLAH; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Dipinjam</label>
                                                        <input class="form-control" type="number" name="dipinjam" min="0" required value="<?php echo $book->DIPINJAM; ?>">
                                                      </div>
                                                    <?php echo "</div>
                                                    <div class='modal-footer'>
                                                    <input type='submit' class='btn btn-info' value='Edit' name='submit'>
                                                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                      ";
                                    }
                                  ?>
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

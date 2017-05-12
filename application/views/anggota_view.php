<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tabel Anggota</h1>
                                      <a href="<?php echo base_url(); ?>index.php/anggota/tambah"> <button style="float: right;margin-top: -55px" class="btn btn-primary">Tambah Anggota</button></a>
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
                              <?php
                              $notif = $this->session->flashdata('notif');
                              if (!empty($notif))
                                echo "<div class='alert alert-info'>$notif</div>";
                              ?>
                                <thead>
                                    <tr>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nomor HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                  <?php
                                    foreach ($anggota as $user) {
                                      echo "
                                        <tr>
                                          <td>$user->NIS</td>
                                          <td>$user->NAMA</td>
                                          <td>$user->KELAS</td>
                                          <td>$user->JK</td>
                                          <td>$user->NO_HP</td>
                                          <td>
                                            <button class='btn btn-info' data-toggle='modal' data-target='#modal$user->ID_USER'>Edit</button>
                                            <a href='".base_url()."index.php/anggota/hapus/$user->ID_USER' type='button' class='btn btn-danger'>Delete</a>
                                          </td>
                                        <tr>

                                        <!-- Modal -->
                                        <div class='modal fade' id='modal$user->ID_USER' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                  <form role='form' action='".base_url()."index.php/anggota/edit/".$user->ID_USER."' method='post'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                        <h4 class='modal-title' id='myModalLabel'>Edit Data Anggota</h4>
                                                    </div>
                                                    <div class='modal-body'>";?>
                                                      <div class="form-group">
                                                        <label>NIS</label>
                                                        <input class="form-control" type="text" name="nis" required value="<?php echo $user->NIS; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Nama</label>
                                                        <input class="form-control" type="text" name="nama" required value="<?php echo $user->NAMA; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Kelas</label>
                                                        <input class="form-control" type="text" name="kelas" required value="<?php echo $user->KELAS; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Jenis Kelamin</label>
                                                        <select class="form-control" name="jk" required>
                                                          <option value="L">L</option>
                                                          <option value="P" <?php if($user->JK=='P'){echo 'selected';} ?>>P</option>
                                                        </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label>Nomor HP</label>
                                                        <input class="form-control" type="number" name="no_hp" min="0" required value="<?php echo $user->NO_HP; ?>">
                                                      </div>
                                                    <?php echo "</div>
                                                    <div class='modal-footer'>
                                                    <input type='submit' class='btn btn-info' value='Edit' name='submit'>
                                                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                                                    </div>
                                                </div>
                                            </form>
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

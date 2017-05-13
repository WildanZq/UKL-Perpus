
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Form Penambahan Anggota</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <?php
                                  $notif = $this->session->flashdata('notif');
                                  if (!empty($notif))
                                    echo "<div class='alert alert-danger'>$notif</div>";
                                  ?>
                                    <form role="form" action="<?php echo base_url(); ?>index.php/anggota/tambah_anggota" method="post">
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input class="form-control" type="text" name="nis" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" type="text" name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <input class="form-control" type="text" name="kelas" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="jk" required>
                                              <option value="L">Laki-laki</option>
                                              <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor HP</label>
                                            <input class="form-control" type="number" name="no_hp" min="0" required>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Tambah" name="submit">
                                        <input type="reset" class="btn btn-default" value="Reset">
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">




                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

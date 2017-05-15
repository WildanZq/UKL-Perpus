
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Form Peminjaman</h2>
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
                                    <form role="form" action="<?php echo base_url(); ?>index.php/transaksi/tambah_transaksi" method="post">
                                        <div class="form-group">
                                            <label>Peminjam</label>
                                            <select class="form-control" name="peminjam">
                                              <option value="">---</option>
                                              <?php foreach ($anggota as $user): ?>
                                                <option value="<?php echo $user->ID_USER; ?>"><?php echo $user->NIS." - ".$user->NAMA; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Buku</label>
                                            <select class="form-control" name="buku1" id="buku1">
                                              <option value="">---</option>
                                              <?php foreach ($buku as $book): ?>
                                                <option value="<?php echo $book->KD_BUKU; ?>"><?php echo $book->BARCODE." - ".$book->JUDUL; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group" id="buku2c" style="display:none">
                                            <label>Buku 2</label>
                                            <select class="form-control" name="buku2" id="buku2">
                                              <option value="">---</option>
                                              <?php foreach ($buku as $book): ?>
                                                <option value="<?php echo $book->KD_BUKU; ?>"><?php echo $book->BARCODE." - ".$book->JUDUL; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group" id="buku3c" style="display:none">
                                            <label>Buku 3</label>
                                            <select class="form-control" name="buku3" id="buku3">
                                              <option value="">---</option>
                                              <?php foreach ($buku as $book): ?>
                                                <option value="<?php echo $book->KD_BUKU; ?>"><?php echo $book->BARCODE." - ".$book->JUDUL; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Tambah" name="submit">
                                        <input type="reset" class="btn btn-default" value="Reset">
                                    </form>
                                    <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
                                    <script>
                                      $('#buku1').on('change', function() {
                                        if(this.value != '')
                                          $('#buku2c').css('display','block');
                                        if(this.value == '') {
                                          $('#buku2c').css('display','none');
                                          $('#buku2').prop('selectedIndex',0);
                                          $('#buku3c').css('display','none');
                                          $('#buku3').prop('selectedIndex',0);
                                        }
                                      });
                                      $('#buku2').on('change', function() {
                                        if(this.value != '')
                                          $('#buku3c').css('display','block');
                                        if(this.value == '') {
                                          $('#buku3c').css('display','none');
                                          $('#buku3').prop('selectedIndex',0);
                                        }
                                      });
                                    </script>
                                </div>
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

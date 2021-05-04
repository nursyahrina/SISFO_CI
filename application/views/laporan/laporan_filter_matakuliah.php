                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Laporan Data KRS</h4>
                        </div>
                        <div class="card-body">
                            <form name="form_filter_matakuliah" action="<?php echo base_url() . 'matakuliah/laporan_filter' ?>" method="post" class="w-50 user needs-validation mx-3 mb-4" novalidate>
                                <div class="form-group">
                                    <label class="control-label text-primary">Semester</label>
                                    <select class="form-control" name="semester" required autofocus>
                                        <option value="all">Semua Semester</option>
                                        <?php
                                        for ($x = 1; $x <= 8; $x++) {
                                        ?>
                                            <option value="<?php echo $x ?>">
                                                <?php echo 'Semester ' . $x ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih semester mata kuliah!
                                    </div>
                                </div>
                                <button type="submit" class="flex-fill btn btn-primary btn-user px-4">Cari</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
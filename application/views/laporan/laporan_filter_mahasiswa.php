                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Laporan Data Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            <form name="form_filter_mahasiswa" action="<?php echo base_url() . 'mahasiswa/laporan_filter' ?>" method="post" class="w-50 user needs-validation mx-3 mb-4" novalidate>
                                <div class="form-group">
                                    <label class="control-label text-primary">Angkatan</label>
                                    <select class="form-control" name="angkatan" required autofocus>
                                        <option value="all">Semua Angkatan</option>
                                        <?php
                                        foreach ($data_angkatan as $angkatan) {
                                        ?>
                                            <option value="<?php echo $angkatan->angkatan ?>">
                                                <?php echo $angkatan->angkatan ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Isikan Angkatan dengan 4 digit angka tahun masuk!
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
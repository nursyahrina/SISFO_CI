                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Laporan Data KRS</h4>
                        </div>
                        <div class="card-body">
                            <form name="form_filter_krs" action="<?php echo base_url() . 'krs/laporan_filter' ?>" method="post" class="w-50 user needs-validation mx-3 mb-4" novalidate>
                                <div class="form-group">
                                    <label class="control-label text-primary">Mahasiswa</label>
                                    <select class="form-control" name="nim" required autofocus>
                                        <option value=""></option>
                                        <?php
                                        foreach ($data_mahasiswa as $mahasiswa) {
                                        ?>
                                            <option value="<?php echo $mahasiswa->nim ?>">
                                                <?php echo $mahasiswa->nim . ' ' . $mahasiswa->namamahasiswa ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih identitas mahasiswa!
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label text-primary">Semester</label>
                                    <select class="form-control" name="ta" required autofocus>
                                        <option value=""></option>
                                        <?php
                                        foreach ($data_tahun_akademik as $tahun_akademik) {
                                        ?>
                                            <option value="<?php echo $tahun_akademik->ta ?>">
                                                <?php echo $tahun_akademik->ta ?>
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
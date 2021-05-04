                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Laporan Data Matakuliah</h4>
                        </div>
                        <div class="card-body">
                            <form name="form_filter_mahasiswa" action="<?php echo base_url() . 'matakuliah/laporan_filter' ?>" method="post" class="w-50 user needs-validation mx-3 mb-4" novalidate>
                                <div class="form-group">
                                    <label class="control-label text-primary">Semester</label>
                                    <select class="form-control" name="semester" required autofocus>
                                        <option value="all">Semua Semester</option>
                                        <?php
                                        for ($x = 1; $x <= 8; $x++) {
                                        ?>
                                            <option value="<?php echo $x ?>" <?php if (set_value('semester') == $x) {
                                                                                    echo 'selected';
                                                                                } ?>>
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

                            <div class="d-flex m-3">
                                <a target="new" href="<?php echo base_url() . 'matakuliah/print/' . set_value('semester') ?>" class="btn btn-warning shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a target="new" href="<?php echo base_url() . 'matakuliah/cetak_pdf/' . set_value('semester') ?>" class="btn btn-danger shadow-sm mx-2"><i class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>Kode</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>SKS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_matakuliah as $matakuliah) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <td><?php echo $matakuliah->kode_mk ?></td>
                                                <td><?php echo $matakuliah->nama_mk ?></td>
                                                <td><?php echo $matakuliah->sks ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
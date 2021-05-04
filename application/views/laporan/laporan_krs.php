                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Laporan Data KRS</h4>
                        </div>
                        <div class="card-body">
                            <form name="form_filter_dosen" action="<?php echo base_url() . 'krs/laporan_filter' ?>" method="post" class="w-50 user needs-validation mx-3 mb-4" novalidate>
                                <div class="form-group">
                                    <label class="control-label text-primary">Mahasiswa</label>
                                    <select class="form-control" name="nim" required autofocus>
                                        <option value=""></option>
                                        <?php
                                        foreach ($data_mahasiswa as $mahasiswa) {
                                        ?>
                                            <option value="<?php echo $mahasiswa->nim ?>" <?php if (set_value('nim') == $mahasiswa->nim) {
                                                                                                echo 'selected';
                                                                                            } ?>>
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
                                            <option value="<?php echo $tahun_akademik->ta ?>" <?php if (set_value('ta') == $tahun_akademik->ta) {
                                                                                                    echo 'selected';
                                                                                                } ?>>
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

                            <div class="d-flex m-3">
                                <a target="new" href="<?php echo base_url() . 'krs/print/' . set_value('nim') . '/' . set_value('ta') ?>" class="btn btn-warning shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a target="new" href="<?php echo base_url() . 'krs/cetak_pdf/' . set_value('nim') . '/' . set_value('ta') ?>" class="btn btn-danger shadow-sm mx-2"><i class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>TA</th>
                                            <th>Mahasiswa</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Dosen Pengampu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_krs as $krs) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <td><?php echo $krs->ta ?></td>
                                                <td>
                                                    <span class="row px-3 text-primary text-xs"><?php echo $krs->nim ?></span>
                                                    <span class="row px-3"><?php echo $krs->namamahasiswa ?></span>
                                                </td>
                                                <td>
                                                    <span class="row px-3 text-primary text-xs"><?php echo $krs->mk ?></span>
                                                    <span class="row px-3"><?php echo $krs->nama_mk ?></span>
                                                </td>
                                                <td><?php echo $krs->sks ?></td>
                                                <td>
                                                    <span class="row px-3 text-primary text-xs"><?php echo $krs->nidn ?></span>
                                                    <span class="row px-3"><?php echo $krs->nama_dosen ?></span>
                                                </td>
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
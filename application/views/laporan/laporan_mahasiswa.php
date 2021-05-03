                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Laporan Data Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            <form name="form_filter_pelanggan" action="<?php echo base_url() . 'mahasiswa/laporan_filter' ?>" method="post" class="w-50 user needs-validation mx-3 mb-4" novalidate>
                                <div class="form-group">
                                    <label class="control-label text-primary">Angkatan</label>
                                    <select class="form-control" name="angkatan" required autofocus>
                                        <option value="all">Semua Angkatan</option>
                                        <?php
                                        foreach ($data_angkatan as $angkatan) {
                                        ?>
                                            <option value="<?php echo $angkatan->angkatan ?>" <?php if (set_value('angkatan') == $angkatan->angkatan) {
                                                                                                    echo 'selected';
                                                                                                } ?>>
                                                <?php echo $angkatan->angkatan ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button type="submit" class="flex-fill btn btn-primary btn-user px-4">Cari</button>
                            </form>

                            <div class="d-flex m-3">
                                <a target="blank" href="<?php echo base_url() . 'mahasiswa/print/' . set_value('angkatan') ?>" class="btn btn-warning shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a target="blank" href="<?php echo base_url() . 'mahasiswa/cetak_pdf/' . set_value('angkatan') ?>" class="btn btn-danger shadow-sm mx-2"><i class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    foreach ($data_mahasiswa as $mahasiswa) {
                                    ?>
                                        <tr>
                                            <th><?php echo $no++ ?></th>
                                            <td><?php echo $mahasiswa->nim ?></td>
                                            <td><?php echo $mahasiswa->namamahasiswa ?></td>
                                            <td><?php echo $mahasiswa->jeniskelamin ?></td>
                                            <td><?php echo $mahasiswa->alamat ?></td>
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
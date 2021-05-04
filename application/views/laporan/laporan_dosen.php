                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Laporan Data Dosen</h4>
                        </div>
                        <div class="card-body">
                            <form name="form_filter_dosen" action="<?php echo base_url() . 'dosen/laporan_filter' ?>" method="post" class="w-50 user needs-validation mx-3 mb-4" novalidate>
                                <div class="form-group">
                                    <label class="control-label text-primary">Tahun Lahir</label>
                                    <div class="form-group w-50">
                                        <label class="control-label text-primary">dari</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">19</span>
                                            </div>
                                            <input type="number" class="form-control" name="dari" value="<?php echo set_value('dari') ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group w-50">
                                        <label class="control-label text-primary">sampai</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">19</span>
                                            </div>
                                            <input type="number" class="form-control" name="sampai" value="<?php echo set_value('sampai') ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="flex-fill btn btn-primary btn-user px-4">Cari</button>
                            </form>

                            <div class="d-flex m-3">
                                <a target="blank" href="<?php echo base_url() . 'dosen/print/' . set_value('dari') . '/' . set_value('sampai') ?>" class="btn btn-warning shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a target="blank" href="<?php echo base_url() . 'dosen/cetak_pdf/' . set_value('dari') . '/' . set_value('sampai') ?>" class="btn btn-danger shadow-sm mx-2"><i class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_dosen as $dosen) {
                                        ?>
                                            <tr>
                                                <th><?php echo $no++ ?></th>
                                                <td><?php echo $dosen->nidn ?></td>
                                                <td><?php echo $dosen->nama_dosen ?></td>
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
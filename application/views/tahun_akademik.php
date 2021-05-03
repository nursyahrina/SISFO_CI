                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Tahun Akademik</h4>
                            <div class="d-flex">
                                <a href="<?php echo base_url().'ta/print' ?>" class="btn btn-warning shadow-sm"><i
                                class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a href="<?php echo base_url().'ta/cetak_pdf' ?>" class="btn btn-danger shadow-sm mx-2"><i
                                class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a>
                                <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addTahunAkademik"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>Tahun Akademik</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>Tahun Akademik</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($data_tahun_akademik as $tahun_akademik) {
                                        ?>
                                        <tr>
                                            <th><?php echo $no++ ?></th>
                                            <td><?php echo $tahun_akademik->ta ?></td>
                                            <td><?php echo $tahun_akademik->detail_ta ?></td>
                                            <td class="action-icons">
                                                <a hhref="#" data-toggle="modal" data-target="#editTahunAkademik<?php echo $tahun_akademik->ta ?>"> 
                                                    <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                </a> | 
                                                <a href="<?php echo base_url().'ta/delete/'.$tahun_akademik->ta?>"> 
                                                    <i title="hapus" class="fas fa-trash-alt text-lg text-danger"></i>
                                                </a>
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

            <!-- Modal for adding new data -->
            <div class="modal fade" id="addTahunAkademik" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddTahunAkademik" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddTahunAkademikLabel">Input Data Tahun Akademik</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_add_tahunakademik" action="<?php echo base_url().'ta/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">TA</label>
                                    <input type="text" class="form-control" placeholder="Tahun Akademik" autofocus name="ta" pattern="\d{5}" required>
                                    <div class="invalid-feedback">
                                        Isikan tahun akademik dengan 5 digit angka!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Detail TA</label>
                                    <input type="text" class="form-control"  placeholder='Detail Tahun Akademik' name="detail_ta" pattern="[A-Za-z0-9/ ]{1,20}" required>
                                    <div class="invalid-feedback">
                                        Isikan detail tahun akademik dengan kombinasi huruf dan angka! (maks. 20 karakter)
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex">
                                <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                <button type="submit" class="flex-fill btn btn-primary btn-user">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for editing existing data -->
            <?php
                foreach ($data_tahun_akademik as $tahun_akademik) {
            ?>
            <div class="modal fade" id="editTahunAkademik<?php echo $tahun_akademik->ta ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditTahunAkademik" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditTahunAkademikLabel">Ubah Data Tahun Akademik</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_edit_tahunakademik" action="<?php echo base_url().'ta/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">TA</label>
                                    <input type="text" class="form-control" placeholder="Tahun Akademik" autofocus name="ta" pattern="\d{5}" value="<?php echo $tahun_akademik->ta ?>" readonly>
                                    <div class="invalid-feedback">
                                        Isikan tahun akademik dengan 5 digit angka!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Detail TA</label>
                                    <input type="text" class="form-control"  placeholder='Detail Tahun Akademik' name="detail_ta" pattern="[A-Za-z0-9/ ]{1,20}" value="<?php echo $tahun_akademik->detail_ta ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan detail tahun akademik dengan kombinasi huruf dan angka! (maks. 20 karakter)
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex">
                                <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                <button type="submit" class="flex-fill btn btn-primary btn-user">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
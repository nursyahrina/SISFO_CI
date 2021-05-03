                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Dosen</h4>
                            <div class="d-flex">
                                <a href="<?php echo base_url().'dosen/print' ?>" class="btn btn-warning shadow-sm"><i
                                class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a href="<?php echo base_url().'dosen/cetak_pdf' ?>" class="btn btn-danger shadow-sm mx-2"><i
                                class="fas fa-file fa-sm text-white-50"></i> Cetak PDF</a>
                                <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addDosen"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>NIDN</th>
                                            <th>Nama Dosen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($data_dosen as $dosen) {
                                        ?>
                                        <tr>
                                            <th><?php echo $no++ ?></th>
                                            <td><?php echo $dosen->nidn ?></td>
                                            <td><?php echo $dosen->nama_dosen ?></td>
                                            <td class="action-icons">
                                                <a href="#" data-toggle="modal" data-target="#editDosen<?php echo $dosen->nidn ?>"> 
                                                    <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                </a> | 
                                                <a href="<?php echo base_url().'dosen/delete/'.$dosen->nidn?>"> 
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
            <div class="modal fade" id="addDosen" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddDosen" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddDosenLabel">Input Data Dosen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_add_dosen" action="<?php echo base_url().'dosen/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">NIDN</label>
                                    <input type="text" class="form-control" placeholder="NIDN Dosen" autofocus name="nidn" pattern="\d{10}" required>
                                    <div class="invalid-feedback">
                                        Isikan NIDN dengan 10 digit angka!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Nama Dosen</label>
                                    <input type="text" class="form-control"  placeholder='Nama Dosen' name="nama_dosen" pattern="[A-Za-z ]{1,25}" required>
                                    <div class="invalid-feedback">
                                        Isikan nama dosen dengan huruf! (maks. 25 huruf)
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
                foreach ($data_dosen as $dosen) {
            ?>
            <div class="modal fade" id="editDosen<?php echo $dosen->nidn ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditDosen" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditDosenLabel">Ubah Data Dosen</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_edit_dosen" action="<?php echo base_url().'dosen/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">NIDN</label>
                                    <input type="text" class="form-control" placeholder="NIDN Dosen" autofocus name="nidn" pattern="\d{10}" value="<?php echo $dosen->nidn ?>" readonly>
                                    <div class="invalid-feedback">
                                        Isikan NIDN dengan 10 digit angka!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Nama Dosen</label>
                                    <input type="text" class="form-control"  placeholder='Nama Dosen' name="nama_dosen" pattern="[A-Za-z ]{1,25}" value="<?php echo $dosen->nama_dosen ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan nama dosen dengan huruf! (maks. 25 huruf)
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
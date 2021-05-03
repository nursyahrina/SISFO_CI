                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Mata Kuliah</h4>
                            <div class="d-flex">
                                <a href="#" class="btn btn-warning shadow-sm" data-toggle="modal" data-target="#cetakMatakuliah"><i
                                class="fas fa-print fa-sm text-white-50" ></i> Print</a>
                                <a href="#" class="btn btn-danger shadow-sm mx-2" data-toggle="modal" data-target="#cetakPDFMatakuliah"><i
                                class="fas fa-file fa-sm text-white-50" ></i> Cetak PDF</a>
                                <a href="#' ?>" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addMatakuliah"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>Kode</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>Kode</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
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
                                            <td class="action-icons">
                                                <a href="#" data-toggle="modal" data-target="#editMatakuliah<?php echo $matakuliah->kode_mk ?>"> 
                                                    <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                </a> | 
                                                <a href="<?php echo base_url().'matakuliah/delete/'.$matakuliah->kode_mk?>"> 
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
            <div class="modal fade" id="addMatakuliah" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddMatakuliah" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddMatakuliahLabel">Input Data Matakuliah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_add_matakuliah" action="<?php echo base_url().'matakuliah/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">Kode MK</label>
                                    <input type="text" class="form-control" placeholder="Kode Mata Kuliah" autofocus name="kode_mk" pattern="[A-Z0-9]{7}" required>
                                    <div class="invalid-feedback">
                                        Isikan kode mata kuliah dengan kombinasi huruf kapital dan angka! (maks. 7 karakter)
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control"  placeholder='Nama Mata Kuliah' name="nama_mk" pattern="[A-Za-z0-9. ]{1,25}" required>
                                    <div class="invalid-feedback">
                                        Isikan nama mata kuliah dengan kombinasi huruf dan angka! (maks. 25 karakter)
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">SKS</label>
                                    <input type="number" class="form-control"  placeholder='Beban SKS' name="sks" min="1" max="4" required>
                                    <div class="invalid-feedback">
                                        Isikan beban sks dengan angka! [1-4]
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
                foreach ($data_matakuliah as $matakuliah) {
            ?>
            <div class="modal fade" id="editMatakuliah<?php echo $matakuliah->kode_mk ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditMatakuliah" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditMatakuliahLabel">Ubah Data Matakuliah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_edit_matakuliah" action="<?php echo base_url().'matakuliah/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">Kode MK</label>
                                    <input type="text" class="form-control" placeholder="Kode Mata Kuliah" autofocus name="kode_mk" pattern="[A-Z0-9]{7}" value="<?php echo $matakuliah->kode_mk ?>" readonly>
                                    <div class="invalid-feedback">
                                        Isikan kode mata kuliah dengan kombinasi huruf kapital dan angka! (maks. 7 karakter)
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control"  placeholder='Nama Mata Kuliah' name="nama_mk" pattern="[A-Za-z0-9. ]{1,25}" value="<?php echo $matakuliah->nama_mk ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan nama mata kuliah dengan kombinasi huruf dan angka! (maks. 25 karakter)
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">SKS</label>
                                    <input type="number" class="form-control"  placeholder='Beban SKS' name="sks" min="1" max="4" value="<?php echo $matakuliah->sks ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan beban sks dengan angka! [1-4]
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

            <!-- Modal for export PDF -->
            <div class="modal fade" id="cetakMatakuliah" data-keyboard="false" tabindex="-1" aria-labelledby="filterCetakMatakuliah" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="filterCetakMatakuliahLabel">Print Data Mata Kuliah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_cetak_mahasiswa" action="<?php echo base_url().'matakuliah/print' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">Semester</label>
                                    <select class="form-control" name="semester" required autofocus>
                                        <option value="all">Semua Semester</option>
                                        <?php
                                            for ($x = 1; $x <= 8; $x++) {
                                        ?>
                                        <option value="<?php echo $x ?>">
                                            <?php echo 'Semester '.$x ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih semester mata kuliah!
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex">
                                <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                <button type="submit" class="flex-fill btn btn-primary btn-user">Print</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for export PDF -->
            <div class="modal fade" id="cetakPDFMatakuliah" data-keyboard="false" tabindex="-1" aria-labelledby="filterCetakMatakuliah" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="filterCetakMatakuliahLabel">Cetak PDF Data Mata Kuliah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_cetak_mahasiswa" action="<?php echo base_url().'matakuliah/cetak_pdf' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">Semester</label>
                                    <select class="form-control" name="semester" required autofocus>
                                        <option value="all">Semua Semester</option>
                                        <?php
                                            for ($x = 1; $x <= 8; $x++) {
                                        ?>
                                        <option value="<?php echo $x ?>">
                                            <?php echo 'Semester '.$x ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih semester mata kuliah!
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex">
                                <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                <button type="submit" class="flex-fill btn btn-primary btn-user">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
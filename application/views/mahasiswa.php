                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data Mahasiswa</h4>
                            <div class="d-flex">
                                <a href="#" class="btn btn-warning shadow-sm" data-toggle="modal" data-target="#cetakMahasiswa"><i
                                class="fas fa-print fa-sm text-white-50"></i> Print</a>
                                <a href="#" class="btn btn-danger shadow-sm mx-2" data-toggle="modal" data-target="#cetakPDFMahasiswa"><i
                                class="fas fa-file fa-sm text-white-50" ></i> Cetak PDF</a>
                                <a href="#" class="btn btn-primary shadow-sm mx-2" data-toggle="modal" data-target="#addMahasiswa"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
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
                                            <td class="action-icons">
                                                <a href="#" data-toggle="modal" data-target="#editMahasiswa<?php echo $mahasiswa->nim ?>"> 
                                                    <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                </a> | 
                                                <a href="<?php echo base_url().'mahasiswa/delete/'.$mahasiswa->nim?>"> 
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
            <div class="modal fade" id="addMahasiswa" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddMahasiswa" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddMahasiswaLabel">Input Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_add_mahasiswa" action="<?php echo base_url().'mahasiswa/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">NIM</label>
                                    <input type="text" class="form-control" placeholder="NIM Mahasiswa" autofocus name="nim" pattern="\d{10}" required>
                                    <div class="invalid-feedback">
                                        Isikan NIM dengan 10 digit angka!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" title="Isikan Nama Mahasiswa dengan Huruf" placeholder='Nama Mahasiswa'  name="namamahasiswa" pattern="[A-Za-z ]{1,25}" required>
                                    <div class="invalid-feedback">
                                        Isikan nama mahasiswa dengan huruf! (maks. 25 huruf)
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Jenis Kelamin</label>
                                    <select class="form-control" name="jeniskelamin" pattern="[A-Za-z]{1,10}" required>
                                        <option value=""></option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih jenis kelamin mahasiswa!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Alamat</label>
                                    <input type="text"  class="form-control" placeholder='Alamat Mahasiswa' name="alamat"  required>
                                    <div class="invalid-feedback">
                                        Isikan alamat mahasiswa!
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
                foreach ($data_mahasiswa as $mahasiswa) {
            ?>
            <div class="modal fade" id="editMahasiswa<?php echo $mahasiswa->nim ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditMahasiswa" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditMahasiswaLabel">Ubah Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_edit_mahasiswa" action="<?php echo base_url().'mahasiswa/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">NIM</label>
                                    <input type="text" class="form-control" placeholder="NIM Mahasiswa" autofocus name="nim" pattern="\d{10}" value="<?php echo $mahasiswa->nim ?>" readonly>
                                    <div class="invalid-feedback">
                                        Isikan NIM dengan 10 digit angka!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" title="Isikan Nama Mahasiswa dengan Huruf" placeholder='Nama Mahasiswa'  name="namamahasiswa" pattern="[A-Za-z ]{1,25}" value="<?php echo $mahasiswa->namamahasiswa ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan nama mahasiswa dengan huruf! (maks. 25 huruf)
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Jenis Kelamin</label>
                                    <select class="form-control" name="jeniskelamin" pattern="[A-Za-z]{1,10}" required>
                                        <option value=""></option>
                                        <option value="Laki-Laki" <?php if ($mahasiswa->jeniskelamin === 'Laki-Laki') { echo "selected"; } ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php if ($mahasiswa->jeniskelamin === 'Perempuan') { echo "selected"; } ?>>Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih jenis kelamin mahasiswa!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Alamat</label>
                                    <input type="text"  class="form-control" placeholder='Alamat Mahasiswa' name="alamat"  value="<?php echo $mahasiswa->alamat ?>" required>
                                    <div class="invalid-feedback">
                                        Isikan alamat mahasiswa!
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

            <!-- Modal for print data -->
            <div class="modal fade" id="cetakMahasiswa" data-keyboard="false" tabindex="-1" aria-labelledby="filterCetakMahasiswa" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="filterCetakMahasiswaLabel">Print Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_cetak_mahasiswa" action="<?php echo base_url().'mahasiswa/print' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
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
            <div class="modal fade" id="cetakPDFMahasiswa" data-keyboard="false" tabindex="-1" aria-labelledby="filterCetakMahasiswa" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="filterCetakMahasiswaLabel">Cetak PDF Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_cetak_mahasiswa" action="<?php echo base_url().'mahasiswa/cetak_pdf' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
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
                            </div>
                            <div class="modal-footer d-flex">
                                <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                <button type="submit" class="flex-fill btn btn-primary btn-user">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            

            
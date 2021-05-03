                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h4 class="my-auto font-weight-bold text-primary">Data KRS</h4>
                            <div class="d-flex">
                                <a href="#" class="btn btn-warning shadow-sm" data-toggle="modal" data-target="#cetakKRS"><i
                                class="fas fa-print fa-sm text-white-50" ></i> Print</a>
                                <a href="#" class="btn btn-danger shadow-sm mx-2" data-toggle="modal" data-target="#cetakPDFKRS"><i
                                class="fas fa-file fa-sm text-white-50" ></i> Cetak PDF</a>
                                <a href="#" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#addKRS"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>TA</th>
                                            <th>Mahasiswa</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Dosen Pengampu</th>
                                            <th class="actions">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="text-primary">
                                            <th>No.</th>
                                            <th>TA</th>
                                            <th>Mahasiswa</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Dosen Pengampu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
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
                                            <td class="action-icons">
                                                <a href="#" data-toggle="modal" data-target="#editKRS<?php echo $no-1 ?>"> 
                                                    <i title="ubah" class="fas fa-edit text-lg text-warning"></i>
                                                </a> | 
                                                <a href="<?php echo base_url().'krs/delete/'.$krs->ta.'/'.$krs->nim.'/'.$krs->mk?>"> 
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
            <div class="modal fade" id="addKRS" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formAddKRS" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddKRSLabel">Input Data KRS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_add_krs" action="<?php echo base_url().'krs/add' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">TA</label>
                                    <select class="form-control" name="ta" pattern="/d{5}" required>
                                        <option value=""></option>
                                        <?php
                                            foreach ($data_tahun_akademik as $tahun_akademik) {
                                        ?>
                                        <option value="<?php echo $tahun_akademik->ta ?>" 
                                            <?php
                                                if ($tahun_akademik->ta != $data_tahun_akademik[count($data_tahun_akademik)-1]->ta) {
                                                    echo 'disabled style="color: #c4c4c4"';
                                                }
                                            ?>
                                            >
                                            <?php echo $tahun_akademik->ta ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih tahun ajaran!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Mahasiswa</label>
                                    <select class="form-control" name="nim" pattern="/d{10}" required>
                                        <option value=""></option>
                                        <?php
                                            foreach ($data_mahasiswa as $mahasiswa) {
                                        ?>
                                        <option value="<?php echo $mahasiswa->nim ?>">
                                            <?php echo $mahasiswa->nim.' '.$mahasiswa->namamahasiswa ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih identitas mahasiswa!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Mata Kuliah</label>
                                    <select class="form-control" name="mk" pattern="[A-Za-z0-9. ]{1,25}" required>
                                        <option value=""></option>
                                        <?php
                                            foreach ($data_matakuliah as $matakuliah) {
                                        ?>
                                        <option value="<?php echo $matakuliah->kode_mk ?>">
                                            <?php echo $matakuliah->kode_mk.' '.$matakuliah->nama_mk ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih mata kuliah!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Dosen</label>
                                    <select class="form-control" name="nidn" pattern="/d{10}" required>
                                        <option value=""></option>
                                        <?php
                                            foreach ($data_dosen as $dosen) {
                                        ?>
                                        <option value="<?php echo $dosen->nidn ?>">
                                            <?php echo $dosen->nidn.' '.$dosen->nama_dosen ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih identitas dosen!
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
                $no = 1;
                foreach ($data_krs as $krs) {
            ?>
            <div class="modal fade" id="editKRS<?php echo $no ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="formEditKRS" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formEditKRSLabel">Ubah Data KRS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_edit_matakuliah" action="<?php echo base_url().'krs/edit' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">TA</label>
                                    <input class="form-control" name="ta" pattern="/d{5}" value="<?php echo $krs->ta ?>" readonly>
                                    <div class="invalid-feedback">
                                        Pilih tahun ajaran!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Mahasiswa</label>
                                    <input class="form-control" name="nim" pattern="/d{10}" value="<?php
                                            foreach ($data_mahasiswa as $mahasiswa) {
                                                if ($mahasiswa->nim === $krs->nim) { echo $krs->nim.' '.$mahasiswa->namamahasiswa; }
                                            } 
                                            ?>" readonly>
                                    <div class="invalid-feedback">
                                        Pilih identitas mahasiswa!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Mata Kuliah</label>
                                    <input class="form-control" name="mk" pattern="[A-Za-z0-9. ]{1,25}" value="<?php
                                            foreach ($data_matakuliah as $matakuliah) {
                                                if ($matakuliah->kode_mk === $krs->mk) { echo $krs->mk.' '.$matakuliah->nama_mk; }
                                            } 
                                            ?>" readonly>
                                    <div class="invalid-feedback">
                                        Pilih mata kuliah!
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="control-label text-primary">Dosen</label>
                                    <select class="form-control" name="nidn" pattern="/d{10}" required>
                                        <option value=""></option>
                                        <?php
                                            foreach ($data_dosen as $dosen) {
                                        ?>
                                        <option value="<?php echo $dosen->nidn ?>" <?php if ($dosen->nidn === $krs->nidn) { echo "selected"; } ?>>
                                            <?php echo $dosen->nidn.' '.$dosen->nama_dosen ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih identitas dosen!
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
                $no++;
                }
            ?>

            <!-- Modal for print -->
            <div class="modal fade" id="cetakKRS" data-keyboard="false" tabindex="-1" aria-labelledby="filterCetakKRS" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="filterCetakKRSLabel">Print Data KRS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_cetak_mahasiswa" action="<?php echo base_url().'krs/print' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">Mahasiswa</label>
                                    <select class="form-control" name="nim" required autofocus>
                                        <option value=""></option>
                                        <?php
                                            foreach ($data_mahasiswa as $mahasiswa) {
                                        ?>
                                        <option value="<?php echo $mahasiswa->nim ?>">
                                            <?php echo $mahasiswa->nim.' '.$mahasiswa->namamahasiswa ?>
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
            <div class="modal fade" id="cetakPDFKRS" data-keyboard="false" tabindex="-1" aria-labelledby="filterCetakKRS" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="filterCetakKRSLabel">Cetak PDF Data KRS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form name="form_cetak_mahasiswa" action="<?php echo base_url().'krs/cetak_pdf' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                                <div class="form-group">
                                    <label class="control-label text-primary">Mahasiswa</label>
                                    <select class="form-control" name="nim" required autofocus>
                                        <option value=""></option>
                                        <?php
                                            foreach ($data_mahasiswa as $mahasiswa) {
                                        ?>
                                        <option value="<?php echo $mahasiswa->nim ?>">
                                            <?php echo $mahasiswa->nim.' '.$mahasiswa->namamahasiswa ?>
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
                            </div>
                            <div class="modal-footer d-flex">
                                <button type="button" class="flex-fill btn btn-secondary btn-user" data-dismiss="modal">Batal</button>
                                <button type="submit" class="flex-fill btn btn-primary btn-user">Cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
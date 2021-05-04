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
                                            <input type="number" class="form-control" name="dari" required>
                                        </div>
                                    </div>
                                    <div class="form-group w-50">
                                        <label class="control-label text-primary">sampai</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">19</span>
                                            </div>
                                            <input type="number" class="form-control" name="sampai" required>
                                        </div>
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
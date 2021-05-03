<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url().'dashboard' ?>">
                <div class="sidebar-brand-icon">
                    <img class="logo" src="<?php echo base_url().'assets/img/undraw_profile.svg' ?>">
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url().'dashboard' ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Data Mahasiswa -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'mahasiswa' ?>">
                    <i class="fas fa-users icon-nav"></i>
                    <span>Mahasiswa</span>
                </a>
            </li>

            <!-- Nav Item - Data Dosen -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'dosen' ?>">
                    <i class="fas fa-chalkboard-teacher icon-nav"></i>
                    <span>Dosen</span>
                </a>
            </li>

            <!-- Nav Item - Data Mata Kuliah -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'matakuliah' ?>">
                    <i class="fas fa-book icon-nav"></i>
                    <span>Mata Kuliah</span>
                </a>
            </li>

            <!-- Nav Item - Data KRS -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'krs' ?>">
                    <i class="fas fa-clipboard-list icon-nav"></i>
                    <span>KRS</span>
                </a>
            </li>

            <!-- Nav Item - Data TA -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'ta' ?>">
                    <i class="fas fa-calendar icon-nav"></i>
                    <span>Tahun Akademik</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Account
            </div>

            <!-- Nav Item - Data Mahasiswa -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt icon-nav"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <!-- Web Page Logo -->
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url().'dashboard' ?>">
                                <img class="logo"
                                    src="<?php echo base_url().'assets/img/logo_itp.png' ?>">
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Web Page Title -->
                        <li class="nav-item mx-1">
                            <a class="nav-link" href="#">
                                <div class="text-lg text-primary font-weight-bold">Sistem Informasi Akademik Institut Teknologi Padang</div>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="logoutModalLabel">Anda yakin akan keluar?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3 mb-4">Pilih tombol "Logout" di bawah jika anda siap untuk mengakhiri sesi ini.</div>
                            <div class="modal-footer d-flex m-3">
                                <button class="flex-fill btn btn-secondary p-2 rounded-pill" type="button" data-dismiss="modal">Batal</button>
                                <a class="flex-fill btn btn-primary p-2 rounded-pill" href="<?php echo base_url().'welcome/logout'?>">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
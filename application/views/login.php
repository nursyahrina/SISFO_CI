<body class="bg-gradient-primary">

    <?php
    if (isset($_GET['pesan'])) {
        if($_GET['pesan'] == "gagal") {
            echo "<div class='alert alert-danger'>Login gagal! Username dan password salah.</div>";
        } else if($_GET['pesan'] == "logout") {
            echo "<div class='alert alert-danger'>Anda telah logout.</div>";
        } else if($_GET['pesan'] == "belumlogin") {
            echo "<div class='alert alertsuccess'>Silahkan login dulu.</div>";
        }
    }
    ?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 w-50 my-5 mx-auto">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <img class="w-25 mb-4" src="<?php echo base_url().'assets/img/logo_itp.png' ?>">
                                <h1 class="h4 text-gray-900 mb-5">SISFO Akademik<br>Institut Teknologi Padang</h1>
                            </div>
                            <form name="form_login" action="<?php echo base_url().'welcome/login' ?>" method="post" class="my-5 mx-auto user needs-validation" novalidate>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" autofocus placeholder="Username" required>
                                    <div class="invalid-feedback">
                                        Isikan Username Anda!
                                    </div>
                                    <?php echo form_error('username') ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                                    <div class="invalid-feedback">
                                        Isikan Password Anda!
                                    </div>
                                    <?php echo form_error('password') ?>
                                </div>
                                <hr>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-user w-100">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
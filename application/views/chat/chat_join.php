<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between bg-primary">
            <h4 class="my-auto font-weight-bold text-light">Join Chat</h4>
        </div>
        <div class="card-body m-0 p-0 pb-5">
            <div id="wrapper" class="d-flex flex-column bg-light pb-5">
                <div id="menu" class="d-flex justify-content-between">
                    <p class="welcome">Welcome, <b><?php echo $nama_user; ?></b>!</p>
                </div>
                <a class="w-25 rounded-pill py-5 mx-auto my-5 btn btn-outline-primary" href="<?php echo base_url() . 'chat/join' ?>" role="button">Start Chat Session</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<body class="bg-gradient-primary">

    <div class="container py-5 mt-5">
    	<div class="alert-container">
			<div class="alert alert-light text-dark alert-dismissible fade show w-75 m-auto" role="alert" >
				<h3 class="alert-heading my-2 text-danger font-weight-bold">Hapus Data <?php echo ($datatype === 'ta') ? 'Tahun Akademik' : ($datatype === 'krs' ? 'KRS' : ucfirst($datatype)) ?> Gagal!</h3>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick=location.href="<?php echo base_url().$datatype.'/form_add'?>">
					<span aria-hidden="true">&times;</span>
				</button>
				<p class="lead">Data <?php echo ($datatype === 'ta') ? 'tahun akademik' : $datatype ?> gagal dihapus dari database.</p>
				<hr>
				<p class="mb-0">Data yang anda masukkan sudah ada di dalam database, atau coba periksa kembali koneksi database anda.</p>
				<img class="illustration" src="<?php echo base_url().'assets/img/undraw_cancel.svg' ?>">
			</div>	
		</div>
	</div>
</div>
<!-- End of Main Content -->
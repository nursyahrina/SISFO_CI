<body class="bg-gradient-primary">

    <div class="container py-5 mt-5">
    	<div class="alert-container">
	    	<div class="alert alert-light -dark alert-dismissible fade show w-75 m-auto" role="alert">
				<h3 class="alert-heading my-2 text-success font-weight-bold "><?php echo $operation ?> Data <?php echo ($datatype === 'ta') ? 'Tahun Akademik' : ($datatype === 'krs' ? 'KRS' : ucfirst($datatype)) ?> Berhasil!</h3>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick=location.href="<?php echo base_url().$datatype ?>">
				<span aria-hidden="true">&times;</span>
				</button>
				<hr>
				<p class="lead">Data <?php echo ($datatype === 'ta') ? 'tahun akademik' : $datatype ?> berhasil disimpan ke dalam database.</p>
				<img class="illustration" src="<?php echo base_url().'assets/img/undraw_Checklist.svg' ?>">
			</div>
		</div>
	</div>
</div>
<!-- End of Main Content -->
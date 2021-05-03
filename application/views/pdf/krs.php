<!DOCTYPE html>
<html><head>
    <title></title>
    <style>
    body {
    	width: 90%;
    	margin: auto;
    }

    table {
		border: 1px solid #ddd;
		width: 100%;
		margin-top: 16px;
		margin-bottom: 16px;
		border-collapse: collapse;
		text-align: left;
	}

	td, th {
		border: 1px solid #ddd;
		padding: 12px;
	}

	table th {
		font-weight: bold;
		text-align: left;
	}

	.center {
		text-align: center;
	}

	#no, #sks {
		width: 30px;
	}

	</style>
</head><body>
	<h5>Institut Teknologi Padang</h5>
	<h1>Kartu Rencana Studi</h1>
	<?php if (count($data_krs) > 0) { ?>
	<p>NIM: <?php echo $data_krs[0]->nim ?><br>
	   Nama: <?php echo $data_krs[0]->namamahasiswa ?><br>
	   Tahun Akademik: Semester <?php echo $data_krs[0]->detail_ta ?><br></p>
    <table>
		<tr>
			<th class="center" id="no">No.</th>
            <th class="center">Kode MK</th>
            <th>Mata Kuliah</th>
            <th class="center" id="sks">SKS</th>
            <th class="center">NIDN Dosen</th>
            <th>Dosen Pengampu</th>
		</tr>
		<?php
            $no = 1; $count_sks = 0;
            foreach ($data_krs as $krs) {
            	$count_sks += $krs->sks;
        ?>
        <tr>
            <th class="center"><?php echo $no++ ?></th>
            <td class="center"><?php echo $krs->kode_mk ?></td>
            <td>
                <?php echo $krs->nama_mk ?>
            </td>
            <td class="center"><?php echo $krs->sks ?></td>
            <td class="center">
                <?php echo $krs->nidn ?>
            </td>
            <td>
                <?php echo $krs->nama_dosen ?>
            </td>
		</tr>
		<?php 
			}
		?>
	</table>
	<h4>Total SKS: <?php echo $count_sks ?></h4>
	<?php } else {
		echo "<p>Data yang Anda minta tidak tersedia</p>";
	} ?>
</body></html>
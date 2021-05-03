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
		margin-top: 20px;
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

	#no {
		width: 30px;
	}
	</style>
</head><body>
	<h5>Institut Teknologi Padang</h5>
	<h1>Data Mata Kuliah</h1>
	<?php if ($semester != 'all')  {
		echo '<p>Semester: '.$semester.'</p>';
	} ?>
    <table>
		<tr>
			<th class="center" id="no">No.</th>
            <th class="center">Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
		</tr>
		<?php
            $no = 1;
            foreach ($data_matakuliah as $matakuliah) {
        ?>
        <tr>
            <th class="center"><?php echo $no++ ?></th>
            <td class="center"><?php echo $matakuliah->kode_mk ?></td>
            <td><?php echo $matakuliah->nama_mk ?></td>
            <td><?php echo $matakuliah->sks ?></td>
		</tr>
		<?php 
			}
		?>
	</table>
</body></html>
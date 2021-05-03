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
	<h1>Data Mahasiswa</h1>
	<?php if ($angkatan != 'all')  {
		echo '<p>Angkatan: '.$angkatan.'</p>';
	} ?>
    <table>
		<tr>
			<th class="center" id="no">No.</th>
            <th class="center">NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
		</tr>
		<?php
            $no = 1;
            foreach ($data_mahasiswa as $mahasiswa) {
        ?>
        <tr>
            <th class="center"><?php echo $no++ ?></th>
            <td class="center"><?php echo $mahasiswa->nim ?></td>
            <td><?php echo $mahasiswa->namamahasiswa ?></td>
            <td><?php echo $mahasiswa->jeniskelamin ?></td>
            <td><?php echo $mahasiswa->alamat ?></td>
		</tr>
		<?php 
			}
		?>
	</table>
</body></html>
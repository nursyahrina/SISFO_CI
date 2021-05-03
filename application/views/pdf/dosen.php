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
	<h1>Data Dosen</h1>
    <table>
		<tr>
			<th class="center" id="no">No.</th>
            <th class="center">NIDN</th>
            <th>Nama Dosen</th>
		</tr>
		<?php
            $no = 1;
            foreach ($data_dosen as $dosen) {
        ?>
        <tr>
            <th class="center"><?php echo $no++ ?></th>
            <td class="center"><?php echo $dosen->nidn ?></td>
            <td><?php echo $dosen->nama_dosen?></td>
		</tr>
		<?php 
			}
		?>
	</table>
</body></html>
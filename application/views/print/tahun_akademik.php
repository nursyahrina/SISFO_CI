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
	<h1>Data Tahun Akademik</h1>
    <table>
		<tr>
			<th class="center" id="no">No.</th>
            <th class="center">Tahun Akademik</th>
            <th>Detail</th>
		</tr>
		<?php
            $no = 1;
            foreach ($data_tahun_akademik as $tahun_akademik) {
        ?>
        <tr>
            <th class="center"><?php echo $no++ ?></th>
            <td class="center"><?php echo $tahun_akademik->ta ?></td>
            <td><?php echo $tahun_akademik->detail_ta ?></td>
		</tr>
		<?php 
			}
		?>
	</table>
	<script type="text/javascript">
		window.print();
	</script>
</body></html>
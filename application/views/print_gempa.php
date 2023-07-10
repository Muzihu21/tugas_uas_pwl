<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<center>
    <h1> DATA BARANG</h1>
</center>
<table class="table bg-white rounded shadow-sm  table-hover">
<tr>
<th>NO</th>
<th>WILAYAH</th>
<th>SKALA RITHCER</th>
<th>WAKTU</th>
<th>TANGGAL</th>
<th>KORBAN</th>
<th>KEDALAMAN</th>
</tr>
<?php
$no= 1;
foreach($bencana as $bcn): ?>
<tr>
<td><?php echo $no++ ?></td>
<td><?php echo $bcn->wilayah ?></td>
<td><?php echo $bcn->skala_ritcher ?></td>
<td><?php echo $bcn->waktu ?></td>
<td><?php echo $bcn->tanggal ?></td>
<td><?php echo $bcn->korban ?></td>
<td><?php echo $bcn->kedalaman ?></td>
</tr>
<?php endforeach; ?>
</table>
<!-- script dibawah ini untuk menampilkan jendela print -->
<script type="text/javascript">
window.print()
</script>
</body>
</html>

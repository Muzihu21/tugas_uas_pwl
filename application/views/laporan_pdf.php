<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<table>
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
<td><?php echo $bcn->skala_ritcher?></td>
<td><?php echo $bcn->waktu ?></td>
<td><?php echo $bcn->tanggal ?></td>
<td><?php echo $bcn->korban ?></td>
<td><?php echo $bcn->kedalaman ?></td>
</tr>
<?php endforeach; ?>
</table>
</body>
</html>
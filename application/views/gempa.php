<div class="content-wrapper">
<div>
<center>
<section class="content-header row my-4">
 <h1>
 Input Data Bencana
 </h1>
 </section>
</center>
</div>
<section class="content">
    <h3> Data Gempa Bumi</h3>
    <button type="button" data-bs-target="#myModal" data-bs-toggle="modal" class="btn btn-primary">
              <i class="fas fa-plus-circle"></i> Tambah
            </button>
<a class="btn btn-warning" href=" <?php echo base_url('baba/cetak') ?>"> <i class="fa fa-print"></i> Print</a>
<a class="btn btn-danger" href=" <?php echo base_url('baba/laporan_pdf') ?>"> <i class="fa fa-print"></i> Export PDF</a>
<a class="btn btn-success" href=" <?php echo base_url('baba/excel') ?>"> <i class= "fa fa-file-excel"></i> Export Excel</a>

<div class="row my-5">
     <div class="col ">
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
        <tr>
        <th>NO</th>
        <th>WILAYAH</th>
        <th>SKALA RITHCER</th>
        <th>WAKTU</th>
        <th>TANGGAL</th>
        <th>Detail</th>
        <th>Hapus</th>
        <th>Edit</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
        foreach($bencana as $bcn) : ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $bcn->wilayah ?></td>
        <td><?php echo $bcn->skala_ritcher ?></td>
        <td><?php echo $bcn->waktu ?></td>
        <td><?php echo $bcn->tanggal ?></td>
        <td><?php echo anchor('baba/detail/'.$bcn->id,'<div class="btn btn-success 
        btn-sm"><i class="fa fa-search-plus"></i></div>')?></td>
        <td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo 
        anchor('baba/hapus/'.$bcn->id,'<div class="btn btn-danger btn-sm"><i
        class="fa fa-trash"></i></div>')?></td>
        <td><?php echo anchor('baba/edit/'.$bcn->id,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
    </tr>
<?php endforeach; ?>
        </tbody>
</table>
</section>
<!-- Modal -->
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
    <div class="modal-header">
        <h4 class="modal-title">FORM INPUT DATA BENCANA</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <div class="modal-body">
    <?php echo form_open_multipart('baba/tambah_aksi'); ?>
    <div class="form-group">
        <label>Wilayah</label>
        <input type="text" name="wilayah" class="form-control">
    </div>
    <div class="form-group">
        <label>Skala Ritcher</label>
        <input type="text" name="skala_ritcher" class="form-control">
    </div>
    <div class="form-group">
        <label>Waktu</label>
        <input type="text" name="waktu" class="form-control">
    </div>
    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control">
    </div>
    <div class="form-group">
        <label>Korban</label>
        <input type="text" name="korban" class="form-control">
    </div>
    <div class="form-group">
        <label>Kedalaman</label>
        <input type="text" name="kedalaman" class="form-control">
    </div>
    <div class="modal-footer">
            <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Save</button>
            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Reset</button>
    </div>
    <?php echo form_close(); ?>
    </div>
    </div>
    </div>
   </div>
 </div>

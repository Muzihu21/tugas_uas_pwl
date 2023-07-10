<div class="content-wrapper">
    <section class="content">
        <?php foreach($bencana as $bcn) {?>

        <form action="<?php echo base_url().'baba/update';?>"
        method="post">
       
            <div class="form-group">
                <label>Wilayah</label>
                <input type="hidden" name="id" class="form-control"
                value="<?php echo $bcn->id?>">
                <input type="text" name="wilayah" class="form-control"
                value="<?php echo $bcn->wilayah?>">
            </div>
            <div class="form-group">
                <label>Skala Ritcher</label>
                <input type="text" name="skala_ritcher" class="form-control"
                value="<?php echo $bcn->skala_ritcher?>">
            </div>
            <div class="form-group">
                <label>Waktu</label>
                <input type="text" name="waktu" class="form-control"
                value="<?php echo $bcn->waktu?>">
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control"
                value="<?php echo $bcn->tanggal?>">
            </div>
            <div class="form-group">
                <label>Korban</label>
                <input type="text" name="korban" class="form-control"
                value="<?php echo $bcn->korban?>">
            </div>
            <div class="form-group">
                <label>Kedalaman</label>
                <input type="text" name="kedalaman" class="form-control"
                value="<?php echo $bcn->kedalaman?>">
            </div>
            <div>
            <button type ="reset" class="btn btn-danger">Reset</button>
            <button type ="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    <?php } ?>
    </section>
</div>
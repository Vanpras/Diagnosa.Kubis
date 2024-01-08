<?php
$row = $db->get_row("SELECT * FROM bayes_aturan WHERE ID='$_GET[ID]'");
?>
<div class="page-header">
<br><br><br><br>
    <h1>Ubah Aturan</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST)
            include 'aksi.php' ?>
            <form method="post" action="?m=aturan_ubah&ID=<?= $row->ID ?>">
            <div class="form-group">
                <label>Penyakit</label>
                <select class="form-control" name="kode_penyakit">
                    <option value=""></option>
                    <?= get_penyakit_option($row->kode_penyakit) ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="kode_gejala">
                    <option value=""></option>
                    <?= get_gejala_option($row->kode_gejala) ?>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="nilai" value="<?= $row->nilai ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><i class="bi bi-download"></i>
                    Simpan</button>
                <a class="btn btn-danger" href="?m=aturan"><i class="bi bi-arrow-left-short"></i>
                    Kembali</a>
            </div>
        </form>
    </div>
</div>
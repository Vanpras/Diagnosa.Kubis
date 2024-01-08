<?php
$row = $db->get_row("SELECT * FROM bayes_penyakit WHERE kode_penyakit='$_GET[ID]'");
?>
<div class="page-header">
<br><br><br><br>
    <h1>Ubah Penyakit</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST)
            include 'aksi.php' ?>
            <form method="post" action="?m=penyakit_ubah&amp;ID=<?= $row->kode_penyakit ?>">
            <div class="form-group">
                <label>Kode</label>
                <input class="form-control" type="text" name="kode_penyakit" readonly="readonly"
                    value="<?= $row->kode_penyakit ?>" />
            </div>
            <div class="form-group">
                <label>Nama Alternatif</label>
                <input class="form-control" type="text" name="nama_penyakit" value="<?= $row->nama_penyakit ?>" />
            </div>
            <div class="form-group">
                <label>Bobot</label>
                <input class="form-control" type="text" name="bobot" value="<?= $row->bobot ?>" />
            </div>
            <div class="form-group">
                <label>Deskripsi Penyakit</label>
                <textarea class="form-control" name="deskripsi"><?= $row->deskripsi ?></textarea>
            </div>
            <div class="form-group">
                <label>Solusi </label>
                <textarea class="form-control" name="keterangan"><?= $row->keterangan ?></textarea>
            </div>
            <div class="page-header">
                <button class="btn btn-primary"><i class="bi bi-download"></i>
                    Simpan</button>
                <a class="btn btn-danger" href="?m=penyakit"><i class="bi bi-arrow-left-short"></i>
                    Kembali</a>
            </div>
        </form>
    </div>
</div>
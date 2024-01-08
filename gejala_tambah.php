<div class="page-header">
<br><br><br><br>
    <h1>Tambah Gejala</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST)
            include 'aksi.php' ?>
            <form method="post" action="?m=gejala_tambah">
                <div class="form-group">
                    <label>Kode</label>
                    <input class="form-control" type="text" name="kode_gejala" value="<?= $_POST["kode_gejala"] ?>" />
            </div>
            <div class="form-group">
                <label>Nama Gejala</label>
                <input class="form-control" type="text" name="nama_gejala" value="<?= $_POST["nama_gejala"] ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><i class="bi bi-download"></i>
                    Simpan</button>
                <a class="btn btn-danger" href="?m=gejala"><i class="bi bi-arrow-left-short"></i>
                    Kembali</a>
            </div>
        </form>
    </div>
</div>
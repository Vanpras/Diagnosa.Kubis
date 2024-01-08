<div class="page-header">
<br><br><br><br>
    <h1>Tambah Aturan</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST)
            include 'aksi.php' ?>
            <form method="post" action="?m=aturan_tambah">
                <div class="form-group">
                    <label>Diagnosa</label>
                    <select class="form-control" name="kode_penyakit">
                        <option value=""></option>
                    <?= get_penyakit_option($_POST['kode_penyakit']) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Gejala</label>
                <select class="form-control" name="kode_gejala">
                    <option value=""></option>
                    <?= get_gejala_option($_POST['kode_gejala']) ?>
                </select>
            </div>
            <div class="form-group">
                <label>Nilai</label>
                <input class="form-control" type="text" name="nilai" value="<?= $_POST["nilai"] ?>" />
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
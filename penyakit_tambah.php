<div class="page-header">
<br><br><br><br>
    <h1>Tambah Penyakit</h1>
</div>
<style>
    .navbar {
        z-index: 1;
    }
</style>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST)
            include 'aksi.php' ?>
            <form method="post" action="?m=penyakit_tambah">
            <div class="form-group">
                <label>Kode</label>
                <input class="form-control" type="text" name="kode_penyakit" value="<?= $_POST["kode_penyakit"] ?>"/>
            </div>
            <div class="form-group">
                <label>Nama Penyakit </label>
                <input class="form-control" type="text" name="nama_penyakit" value="<?= $_POST["nama_penyakit"] ?>"/>
            </div>
            <div class="form-group">
                <label>Jumlah Penyakit</label>
                <textarea class="form-control" name="jumlah_penyakit"><?= $_POST["jumlah_penyakit"] ?></textarea>
            </div>
            <div class="form-group">
                <label>Jumlah Data</label>
                <textarea class="form-control" name="jumlah_data"><?= $_POST["jumlah_data"] ?></textarea>
            </div>
            <div class="form-group">
                <label>Bobot</label>
                <input class="form-control" type="text" name="bobot" value="<?= $_POST["bobot"] ?>" />
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea class="form-control" name="deskripsi"><?= $_POST["deskripsi"] ?></textarea>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan"><?= $_POST["keterangan"] ?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><i class="bi bi-download"></i>
                    Simpan</button>
                <a class="btn btn-danger" href="?m=penyakit"><i class="bi bi-arrow-left-short"></i>
                    Kembali</a>
            </div>
        </form>
    </div>
</div>
<?php
include "koneksi.php";

if(isset($_POST['Simpan']))
{
    mysqli_query($koneksi, "insert into bayes_penyakit set
    kode_penyakit = '$_POST [kode_penyakit]',
    nama_penyakit = '$_POST [nama_penyakit]',
    bobot = '$_POST [bobot]',
    keterangan = '$_POST [keterangan]',
    deskripsi = '$_POST [deskripsi]',
    jumlah_data = '$_POST [jumlah_data]',
    jumlah_penyakit = '$_POST [jumlah_penyakit]'");
}
?>


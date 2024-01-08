<div class="page-header">
    <h1>Ubah Password</h1>
</div>
<div class="row">
    <div class="col-sm-5">
        <form method="post" action="password_simpan.php">
            <div class="mb-3">
                <label class="form-label">Masukkan Password Lama</label>
                <input type="password" class="form-control" name="pass_lama" required>
            </div>
            <br>
            <div class="mb-3">
                <label class="form-label">Masukkan Password Baru</label>
                <input type="password" class="form-control" name="pass_baru" required>
            </div>
            <br>
            <div class="mb-3">
                <label class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" name="konfirmasi_pass" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary"><i class="bi bi-download"></i>
                Simpan</button>
            <a class="btn btn-danger" type="reset" href="?m=password"><i class="bi bi-arrow-left-short"></i>
                Batal</a>
        </form>
        </form>
    </div>
</div>
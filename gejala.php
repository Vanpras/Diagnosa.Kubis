<div class="page-header">
<br><br><br><br>
    <h1 align="center">Gejala Kubis</h1>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="gejala" />
            <div class="form-group">
                <button class="btn btn-success"><i class="bi bi-arrow-clockwise"></i>
                    Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-danger" href="?m=gejala_tambah"><i class="bi bi-plus"></i>
                    Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=gejala&q=<?= $_GET['gejala'] ?>" target="_blank"><i
                        class="bi bi-printer"></i>
                    Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-info">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Gejala</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT * FROM bayes_gejala 
        WHERE kode_gejala LIKE '%$q%' OR nama_gejala LIKE '%$q%'
        ORDER BY kode_gejala");
            $no = 0;
            foreach ($rows as $row): ?>
                <tr>
                    <td><?= $row->kode_gejala ?></td>
                    <td><?= $row->nama_gejala ?></td>
                    <td class="nw">
                        <a class="btn btn-xs btn-warning" href="?m=gejala_ubah&amp;ID=<?= $row->kode_gejala ?>"><i
                                class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-xs btn-info" href="aksi.php?act=gejala_hapus&amp;ID=<?= $row->kode_gejala ?>"
                            onclick="return confirm('Hapus data?')"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach;
            ?>
        </table>
    </div>
</div>
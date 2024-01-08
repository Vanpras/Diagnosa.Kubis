<div class="page-header">
<br><br><br><br>
    <h1 align="center">Penyakit Kubis</h1>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="penyakit" />
            <div class="form-group">
                <button class="btn btn-success"><i class="bi bi-arrow-clockwise"></i>
                    Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-danger" href="?m=penyakit_tambah"><i class="bi bi-plus"></i>
                    Tambah</a>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=penyakit&q=<?= $_GET['penyakit'] ?>" target="_blank"><i
                        class="bi bi-printer"></i>
                    Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-info">
            <thead>
                <tr class="nw">
                    <th>Kode</th>
                    <th>Nama Penyakit</th>
                    <th>Jumlah Penyakit</th>
                    <th>Jumlah Data</th>
                    <th>Bobot</th>
                    <th>Deskripsi</th>
                    <th>Solusi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT * FROM bayes_penyakit 
            WHERE kode_penyakit LIKE '%$q%' OR nama_penyakit LIKE '%$q%' OR keterangan LIKE '%$q%' 
            ORDER BY kode_penyakit");
            $no = 0;

            foreach ($rows as $row): ?>
                <tr>
                    <td><?= $row->kode_penyakit ?></td>
                    <td><?= $row->nama_penyakit ?></td>
                    <td><?= $row->jumlah_penyakit ?></td>
                    <td><?= $row->Jumlah_data ?></td>
                    <td><?= $row->bobot ?></td>
                    <td><?= $row->deskripsi ?></td>
                    <td><?= $row->keterangan ?></td>
                    <td class="nw">
                        <a class="btn btn-xs btn-warning" href="?m=penyakit_ubah&amp;ID=<?= $row->kode_penyakit ?>"><i
                                class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-xs btn-info" href="aksi.php?act=penyakit_hapus&amp;ID=<?= $row->kode_penyakit ?>"
                            onclick="return confirm('Hapus data?')"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach;
            ?>
        </table>
    </div>
</div>
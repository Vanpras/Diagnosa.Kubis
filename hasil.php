<?php
$selected = (array) $_POST["selected"];
$rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM bayes_gejala WHERE kode_gejala IN ('" . implode("','", $selected) . "')");
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 align="center" class="panel-title">Gejala Terpilih</h3>
    </div>
    <table class="table table-bordered table-hover table-">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Gejala</th>
            </tr>
        </thead>
    <style>
        p{
            text-indent: 0px;
        }
    </style>
        <?php
        $no = 1;
        foreach ($rows as $row):
            $gejala[$row->kode_gejala] = $row->nama_gejala;
            ?>
            <tr>
                <td>
                    <?= $no++ ?>
                </td>
                <td><?= $row->nama_gejala ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php
$rows = $db->get_results("SELECT * FROM bayes_penyakit ORDER BY kode_penyakit");
foreach ($rows as $row) {
    $penyakit[$row->kode_penyakit] = $row;
}

$data = get_data($selected);
$bayes = bayes($data, $penyakit);

?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 align="center" class="panel-title">Hasil Analisa</h3>
    </div>
    <table class="table table-bordered table-hover table-primary">
        <thead>
            <tr>
                <th>Nama Penyakit</th>
                <th>Jumlah Penyakit</th>
                <th>Jumlah Data</th>
                <th>Bobot Penyakit</th>
                <th>Gejala Dipilih</th>
                <th>Bobot Aturan</th>
                <th>Perkalian</th>
                <th>Hasil</th>
                <th>Deskripsi Gejala</th>
                <th>Solusi</th>
            </tr>
        </thead>
        <?php foreach ($data as $key => $val): ?>
            <tr>
                <td align="center" rowspan="<?= count($val) ?>"><?= $penyakit[$key]->nama_penyakit ?></td>
                <td align="center" rowspan="<?= count($val) ?>"><?= $penyakit[$key]->jumlah_penyakit ?></td>
                <td align="center" rowspan="<?= count($val) ?>"><?= $penyakit[$key]->Jumlah_data ?></td>
                <td align="center" rowspan="<?= count($val) ?>"><?= $penyakit[$key]->bobot ?></td>
                <td>
                    <?= $gejala[key($val)] ?>
                </td>
                <td>
                    <?= current($val) ?>
                </td>
                <td align="center" rowspan="<?= count($val) ?>">
                    <?= round($bayes['kali'][$key], 4) ?>
                </td>
                <td align="center" rowspan="<?= count($val) ?>">
                    <?= round($bayes['hasil'][$key], 4) ?>
                </td>
                <td align="justify" rowspan="<?= count($val) ?>"><?= $penyakit[$key]->deskripsi ?></td>
                <td align="justify" rowspan="<?= count($val) ?>"><?= $penyakit[$key]->keterangan ?></td>
            </tr>
            <?php
            unset($val[key($val)]);
            foreach ($val as $k => $v): ?>
                <tr>
                    <td>
                        <?= $gejala[$k] ?>
                    </td>
                    <td>
                        <?= $v ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endforeach ?>
        <tr>
            <td align="center" colspan="4">Total</td>
            <td colspan="2">
                <?= round($bayes['total'], 4) ?>
            </td>
        </tr>
    </table>
    <div class="panel-body">
        <p>
            <?php
            arsort($bayes['hasil']);
            ?>
            Hasil terbesar didapatkan oleh penyakit =
            <strong><?= $penyakit[key($bayes['hasil'])]->nama_penyakit ?></strong> dengan Nilai = <strong>
                <?= round(current($bayes['hasil']), 4) ?>
            </strong>
            <br>
            Solusinya yaitu
            <strong><?= $penyakit[key($bayes['hasil'])]->keterangan ?>
            </strong>
        </p>
        <p>
            <a class="btn btn-primary" href="?m=konsultasi"><i class="bi bi-arrow-repeat"></i>
                Konsultasi Lagi</a>
            <a class="btn btn-default" href="cetak.php?m=hasil&<?= http_build_query(array('selected' => $selected)) ?>"
                target="_blank"><i class="bi bi-printer"></i>
                Cetak</a>
        </p>
    </div>
</div>
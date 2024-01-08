<h1>Hasil Diagnosa</h1>
<?php
$selected = (array) $_GET["selected"];
$rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM bayes_gejala WHERE kode_gejala IN ('" . implode("','", $selected) . "')");
?>
<h3>Gejala Terpilih</h3>
<table class="table table-bordered table-hover table-info">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Gejala</th>
        </tr>
    </thead>
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
<?php
$rows = $db->get_results("SELECT * FROM bayes_penyakit ORDER BY kode_penyakit");
foreach ($rows as $row) {
    $penyakit[$row->kode_penyakit] = $row;
}

$data = get_data($selected);
$bayes = bayes($data, $penyakit);

?>
<h3>Hasil Analisa</h3>
<table class="table table-bordered table-hover table-info">
    <thead>
        <tr>
            <th>Nama Penyakit</th>
            <th>Bobot Penyakit</th>
            <th>Gejala Dipilih</th>
            <th>Bobot Aturan</th>
            <th>Perkalian</th>
            <th>Hasil</th>
            <th>Deskripsi Penyakit</th>
            <th>Solusi</th>
        </tr>
    </thead>
    <?php foreach ($data as $key => $val): ?>
        <tr>
            <td align="center" rowspan="<?= count($val) ?>"><?= $penyakit[$key]->nama_penyakit ?></td>
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
            <td rowspan="<?= count($val) ?>"><?= $penyakit[$key]->keterangan ?></td>
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
<?php
arsort($bayes['hasil']);
?>
<p>Hasil Terbesar Didapatkan oleh Penyakit = <strong><?= $penyakit[key($bayes['hasil'])]->nama_penyakit ?></strong> dengan Nilai = <strong> <?= round(current($bayes['hasil']), 4) ?></strong>
<p>Solusinya yaitu <strong> <?= $penyakit[key($bayes['hasil'])]->keterangan ?> </strong>
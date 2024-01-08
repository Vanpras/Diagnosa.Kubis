<h1>Gejala Kubis</h1>
<table>
    <thead>
        <tr class="nw">
            <th>Kode</th>
            <th>Nama Gejala</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['gejala']);
    $rows = $db->get_results("SELECT * FROM bayes_gejala 
        WHERE kode_gejala LIKE '%$q%' OR nama_gejala LIKE '%$q%' 
        ORDER BY kode_gejala");
    $no = 0;

    foreach ($rows as $row): ?>
        <tr>
            <td><?= $row->kode_gejala ?></td>
            <td><?= $row->nama_gejala ?></td>
        </tr>
    <?php endforeach ?>
</table>
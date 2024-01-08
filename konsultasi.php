<div class="page-header">
<br><br><br><br>
    <h1 align="center">Konsultasi</h1>
</div>
<?php
$success = false;
if ($_POST) {
    if (isset($_POST["selected"])) {
        $success = true;
        include 'hasil.php';
    } else {
        print_msg('Pilih minimal 1 gejala');
    }
}
if (!$success): ?>
    <form action="?m=konsultasi" method="post">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 align="center" class="panel-title">Pilih Gejala</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-info">
                    <thead>
                        <tr>
                            <td><input type="checkbox" id="checkAll"></td>
                            <td>No</td>
                            <td>Nama Gejala</td>
                        </tr>
                    </thead>
                    <?php
                    $rows = $db->get_results("SELECT * FROM bayes_gejala ORDER BY kode_gejala");
                    $no = 0;
                    foreach ($rows as $row): ?>
                        <tr>
                            <td><input type="checkbox" name="selected[]" value="<?= $row->kode_gejala ?>" /></td>
                            <td>
                                <?= ++$no ?>
                            </td>
                            <td><?= $row->nama_gejala ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="panel-footer">
                <button class="btn btn-primary" name="submit"><i class="bi bi-check-lg"></i>
                    Submit Diagnosa</button>
            </div>
        </div>
    </form>
    <script>
        $(function () {
            $("#checkAll").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        });
    </script>
<?php endif ?>
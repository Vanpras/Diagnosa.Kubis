<?php
require_once 'functions.php';
$demo = false;
if ($mod == 'login') {
    $user = esc_field($_POST["user"]);
    $pass = esc_field($_POST["pass"]);
    $row = $db->get_row("SELECT * FROM bayes_admin WHERE user='$user' AND pass='$pass'");
    if ($row) {
        echo "<script>
                alert('Selamat Datang di Sistem Pakar Diagnosa Kubis');
            </script>";
        $_SESSION["login"] = $row->user;
        redirect_js("index.php");
    } else {
        print_msg("Username atau password yang anda masukkan salah");
    }
} else if ($mod == 'password') {
    $pass1 = $_POST['pass1'];

    $row = $db->get_row("SELECT * FROM bayes_admin WHERE user='$_SESSION[login]' AND pass='$pass1'");
} else if ($act == 'logout') {
    session_destroy();
    header("location:index.php?m=login");
} else if ($mod == 'penyakit_tambah') {
    $kode_penyakit = $_POST['kode_penyakit'];
    $nama_penyakit = $_POST['nama_penyakit'];
    $jumlah_penyakit = $_POST['jumlah_penyakit'];
    $jumlah_data = $_POST['jumlah_data'];
    $bobot = $_POST['bobot'];
    $deskripsi = $_POST['deskripsi'];
    $keterangan = $_POST['keterangan'];

    if (!$kode_penyakit || !$nama_penyakit || !$bobot)
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else if ($db->get_results("SELECT * FROM bayes_penyakit WHERE kode_penyakit='$kode_penyakit'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO bayes_penyakit (kode_penyakit, nama_penyakit, jumlah_penyakit, jumlah_data, bobot, deskripsi, keterangan) VALUES ('$kode_penyakit', '$nama_penyakit', '$jumlah_penyakit', '$jumlah_data', '$bobot', '$deskripsi', '$keterangan')");
        redirect_js("index.php?m=penyakit");
    }
} else if ($mod == 'penyakit_ubah') {
    $nama_penyakit = $_POST['nama_penyakit'];
    $bobot = $_POST['bobot'];
    $keterangan = $_POST['keterangan'];

    if (!$nama_penyakit || !$bobot)
        print_msg("Field tidak boleh kosong!");
    else {
        $db->query("UPDATE bayes_penyakit SET nama_penyakit='$nama_penyakit', bobot='$bobot', keterangan='$keterangan' WHERE kode_penyakit='$_GET[ID]'");
        redirect_js("index.php?m=penyakit");
    }
} else if ($act == 'penyakit_hapus') {
    $db->query("DELETE FROM bayes_penyakit WHERE kode_penyakit='$_GET[ID]'");
    header("location:index.php?m=penyakit ");
}

/** GEJALA */
if ($mod == 'gejala_tambah') {
    $kode_gejala = $_POST['kode_gejala'];
    $nama_gejala = $_POST['nama_gejala'];

    if (!$kode_gejala || !$nama_gejala)
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM bayes_gejala WHERE kode_gejala='$kode_gejala'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO bayes_gejala (kode_gejala, nama_gejala) VALUES ('$kode_gejala', '$nama_gejala')");
        redirect_js("index.php?m=gejala");
    }
} else if ($mod == 'gejala_ubah') {
    $nama_gejala = $_POST['nama_gejala'];

    if (!$nama_gejala)
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE bayes_gejala SET nama_gejala='$nama_gejala' WHERE kode_gejala='$_GET[ID]'");
        redirect_js("index.php?m=gejala");
    }
} else if ($act == 'gejala_hapus') {
    $db->query("DELETE FROM bayes_gejala WHERE kode_gejala='$_GET[ID]'");
    header("location:index.php?m=gejala");
} else if ($mod == 'aturan_tambah') {
    $kode_penyakit = $_POST['kode_penyakit'];
    $kode_gejala = $_POST['kode_gejala'];
    $nilai = $_POST['nilai'];
    $kombinasi_ada = $db->get_row("SELECT * FROM bayes_aturan WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$kode_gejala'");
    if (!$kode_penyakit || !$kode_gejala || !$nilai)
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($kombinasi_ada)
        print_msg("Kombinasi diagnosa dan gejala sudah ada!");
    else {
        $db->query("INSERT INTO bayes_aturan (kode_penyakit, kode_gejala, nilai) VALUES ('$kode_penyakit', '$kode_gejala', '$nilai')");
        redirect_js("index.php?m=aturan");
    }
} else if ($mod == 'aturan_ubah') {
    $kode_penyakit = $_POST['kode_penyakit'];
    $kode_gejala = $_POST['kode_gejala'];
    $nilai = $_POST['nilai'];
    $kombinasi_ada = $db->get_row("SELECT * FROM bayes_aturan WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$kode_gejala' AND ID<>'$_GET[ID]'");
    if (!$kode_penyakit || !$kode_gejala || !$nilai)
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($kombinasi_ada)
        print_msg("Kombinasi penyakit dan gejala sudah ada!");
    else {
        $db->query("UPDATE bayes_aturan SET kode_penyakit='$kode_penyakit', kode_gejala='$kode_gejala', nilai='$nilai' WHERE ID='$_GET[ID]'");
        redirect_js("index.php?m=aturan");
    }
    header("location:index.php?m=aturan");
} else if ($act == 'aturan_hapus') {
    $db->query("DELETE FROM bayes_aturan WHERE ID='$_GET[ID]'");
    header("location:index.php?m=aturan");
}

?>
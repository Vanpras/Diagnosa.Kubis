<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="favicon.ico" />
  <title>Diagnosa Penyakit Tanaman Kubis</title>
  <link href="css/darkly-bootstrap.min.css" rel="stylesheet" />
  <link href="css/general.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="css/bg.css">
</head>
<style>
  body{
    width: 100%;
    height: 100vh;
    background-image: url(bg1.jpeg);
    background-position: center;
    background-size: cover;
    background-blend-mode: overlay;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
          aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
        </button>
        <?php if ($_SESSION['login']): ?>
          <nav class="nav nav-pills flex-column flex-sm-row" style="padding:7px; text-align:center;">
            <a class="btn btn-info" href="?m=penyakit"><i class="bi bi-eyedropper"></i>
              Penyakit</a>
            <a class="btn btn-info" href="?m=gejala"><i class="bi bi-thermometer-half"></i>
              Gejala</a>
            <a class="btn btn-info" href="?m=aturan"><i class="bi bi-sliders"></i>
              Aturan</a>
            <a class="btn btn-info" href="aksi.php?act=logout"><i class="bi bi-box-arrow-left"></i>
              Logout</a>
          </nav>
        <?php else: ?>
          <nav class="nav nav-pills flex-column flex-sm-row" style="padding:7px; text-align: center;">
            <a class="btn btn-info" href="?m=beranda"><i class="bi bi-house-door-fill"></i>
              Beranda</a>
            <a class="btn btn-info" href="?m=konsultasi"><i class="bi bi-diagram-2"></i>
              Konsultasi</a>
            <a class="btn btn-info" href="?m=login"><i class="bi bi-box-arrow-in-right"></i>
              Login</a>
          <?php endif ?>
          </ul>
      </div>
  </nav>
  <div class="container">
    <?php
    if (file_exists($mod . '.php')) {
      if ($_SESSION['login'] || $mod == 'login' || $mod == 'konsultasi' || $mod == 'thumbs') {
        include $mod . '.php';
      } else {
        redirect_js('index.php?m=login');
      }
    } else {
      include 'home.php';
    }
    ?>

</html>
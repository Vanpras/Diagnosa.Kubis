<div class="page-header">
  <br><br><br><br>
  <h1><u>Login</u></h1>
</div>
<div class="row">
  <div class="col-md-4">
    <?php if ($_POST)
      include 'aksi.php'; ?>
    <form class="form-signin" action="?m=login" method="post">
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Username" name="user" autofocus required />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required />
        <p class="help-block"></p>
      </div>
      <button class="btn btn-primary" type="submit"><i class="bi bi-box-arrow-in-right"></i>
        Masuk</button>
    </form>
  </div>
</div>
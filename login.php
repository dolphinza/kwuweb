<?php
  session_start();
  include "config.php";
  if(isset($_POST["email"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $q = $con->query("SELECT * FROM akun WHERE email='$email' AND password='$password'");
    if($q->num_rows > 0) {
      $data = $q->fetch_array();
      $_SESSION["nama"] = $data["nama"];
      echo "<script>alert('Success login!');window.location.href='akun.php';</script>";
    } else {
      echo "<script>alert('Gagal login!');window.location.href='login.php';</script>";
    }
  }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Card</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="bootstrap/css/login.css">
</head>

<body>
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2>LOGIN</h2>
        <div class="underline-title"></div>
      </div>
      <form method="post" class="form">
        <label for="user-email" style="padding-top:13px">
            &nbsp;Email
          </label>
        <input id="user-email" class="form-content" type="email" name="email" autocomplete="on" required />
        <div class="form-border"></div>
        <label for="user-password" style="padding-top:22px">&nbsp;Password
          </label>
        <input id="user-password" class="form-content" type="password" name="password" required />
        <div class="form-border"></div>
        <a href="#">
          <legend id="forgot-pass">Forgot password?</legend>
        </a>
        <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
        <a href="#" id="signup">Don't have account yet?</a>
      </form>
    </div>
  </div>
</body>

</html>
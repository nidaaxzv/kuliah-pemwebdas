<?php
session_start();

if(isset($_COOKIE['login'])) {
  if($_COOKIE['login'] == 'true') {
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: data.php");
  exit;
}

require 'functionss.php';

if (isset($_POST["login"])) {

  $user = $_POST["username"];
  $pw = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$user'");

  if( mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if( password_verify($pw, $row["pw"])) {
      //set session
      $_SESSION["login"] = true;
      header("Location: data.php");
      exit;
      if(isset($_POST['remember'])) {
        setcookie('login', 'true', time() + 60);
      } 
     
      
      }
  }
  $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                  <span class="fw-bolder">Layanan Legalisir</span>
              </div><!-- End Logo -->
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                    <p class="text-center small">Silakan login menggunakan akun yang sudah ada.</p>
                  </div>

                  <form action="" method="POST" class="row g-3">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>                      
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Silakan masukkan username Anda.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Silakan masukkan password Anda!</div>
                    </div>

                    <?php if (isset($error)) :?>
                  <p style="color: red; font-style: italic;">Username / Password salah</p>
               <?php endif; ?>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Ingat saya</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
                    </div>
                    </form>
                    <div class="row">
                    <small>Belum punya akun? <a href="regist.php" class="text-decoration-none">Registrasi </a></small>
                </div>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</body>

</html>
<?php

$error = array();

require "../app/views/others/mail.php";

 $con = mysqli_connect("localhost", "root", "", "neust");



$mode = "enter_email";

if (isset($_GET['mode'])) {
  $mode = $_GET['mode'];
}

if (count($_POST) > 0) {

  switch ($mode) {
    case 'enter_email':

      $email = $_POST['email'];
      // echo $email;
      //validate email
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Please enter a valid email";
      } elseif (!valid_email($email)) {
        $error[] = "That email was not found";
      } else {

        $_SESSION['forgot']['email'] = $email;
        send_email($email);
        header("Location: " . ROOT . "forgot?mode=enter_code");
        die;
      }
      break;

    case 'enter_code':

      $code = $_POST['code'];
      $result = is_code_correct($code);

      if ($result == "the code is correct") {

        $_SESSION['forgot']['code'] = $code;
        header("Location: " . ROOT . "forgot?mode=enter_password");
        die;
      } else {
        $error[] = $result;
      }
      break;

    case 'enter_password':

      $password = $_POST['password'];
      $password2 = $_POST['password2'];

      if ($password !== $password2) {
        $error[] = "Passwords do not match";
      } elseif (!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])) {
        header("Location: " . ROOT . "forgot");
        die;
      } else {

        save_password($password);
        if (isset($_SESSION['forgot'])) {
          unset($_SESSION['forgot']);
        }

        header("Location: " . ROOT . "login");
        die;
      }
      break;

    default:
      // code...
      break;
  }
}
function send_email($email)
{

  $con = mysqli_connect("localhost", "root", "", "neust");

  $expire = time() + (60 * 5);
  $code   = rand(10000, 99999);
  $email  = addslashes($email);

  $query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
  mysqli_query($con, $query);

  //send email here
  send_mail($email, 'Password reset', "Your code is " . $code);
}

function save_password($password)
{

  $con = mysqli_connect("localhost", "root", "", "neust");

  $password = password_hash($password, PASSWORD_DEFAULT);
  $email    = addslashes($_SESSION['forgot']['email']);

  $query = "update users set password = '$password' where email = '$email' limit 1";
  mysqli_query($con, $query);

}

function valid_email($email)
{
  $con = mysqli_connect("localhost", "root", "", "neust");

  $email = addslashes($email);

  $query  = "select * from users where email = '$email' limit 1";
  $result = mysqli_query($con, $query);
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      return true;
    }
  }


  return false;

}

function is_code_correct($code)
{
  $con = mysqli_connect("localhost", "root", "", "neust");


  $code   = addslashes($code);
  $expire = time();
  $email  = addslashes($_SESSION['forgot']['email']);

  $query  = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
  $result = mysqli_query($con, $query);
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      if ($row['expire'] > $expire) {

        return "the code is correct";
      } else {
        return "the code is expired";
      }
    } else {
      return "the code is incorrect";
    }
  }

  return "the code is incorrect";
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?= APP_NAME ?> |
    <?= $title ?>
  </title>
  <link rel="icon" type="image/x-icon" href="<?= ROOT ?>/favicon.png" />
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= ROOT ?>assets/dashboard/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= ROOT ?>assets/dashboard/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= ROOT ?>assets/dashboard/css/style.css?t=<?= time(); ?>">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= ROOT ?>assets/dashboard/image-school/logo.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="<?= ROOT ?>assets/images/image-school/logo-2.png"
                  style="height:50px; width:100%; object-fit:contain">
              </div>
              <?php
              switch ($mode) {
                case 'enter_email': ?>
                  <div class="text-center">
                    <h4>FORGOT PASSWORD</h4>
                    <h6 class="font-weight-light">ENTER YOUR EMAIL BELOW</h6>
                    <span style="font-size: 12px;color:red;">
                      <?php
                      foreach ($error as $err) {
                        // code...
                        echo $err . "<br>";
                      }
                      ?>
                    </span>
                  </div>
                  <form method="post" class="pt-3" action="<?= ROOT ?>forgot?mode=enter_email">

                    <input class="my-3 form-control form-control-lg " value="<?= old_value('email') ?>" name="email"
                      placeHolder="Enter Email">


                    <div class="d-grid gap-2">
                      <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                        type="submit">NEXT</button>
                    </div>
                    <div class="mt-3 d-flex justify-content-center align-items-center">
                      <a href="<?= ROOT ?>login" class="auth-link text-black">Login</a>
                    </div>
                  </form>
                  <?php
                  break;

                case 'enter_code': ?>

                  <div class="text-center">
                    <h4>FORGOT PASSWORD</h4>
                    <h6 class="font-weight-light">ENTER THE CODE THAT IS SENT TO YOUR EMAIL BELOW</h6>
                    <span style="font-size: 12px;color:red;">
                      <?php
                      foreach ($error as $err) {
                        // code...
                        echo $err . "<br>";
                      }
                      ?>
                    </span>
                  </div>
                  <form method="post" class="pt-3" action="<?= ROOT ?>forgot?mode=enter_code">

                    <input class="my-3 form-control form-control-lg " name="code" placeHolder="Enter Code">


                    <div class="d-flex gap-2 justify-content-between">
                      <a href="<?= ROOT ?>forgot">
                        <button class="btn btn-block btn-gradient-primary btn-sm font-weight-medium auth-form-btn"
                          type="button">START OVER</button>
                      </a>
                      <button class="btn btn-block btn-gradient-primary btn-sm font-weight-medium auth-form-btn"
                        type="submit">NEXT</button>
                    </div>
                    <div class="mt-3 d-flex justify-content-center align-items-center">
                      <a href="<?= ROOT ?>login" class="auth-link text-black">Login</a>
                    </div>
                  </form>
                  <?php
                  break;

                case 'enter_password': ?>
                  <div class="text-center">
                    <h4>FORGOT PASSWORD</h4>
                    <h6 class="font-weight-light">ENTER YOUR NEW PASSWORD</h6>
                    <span style="font-size: 12px;color:red;">
                      <?php
                      foreach ($error as $err) {
                        // code...
                        echo $err . "<br>";
                      }
                      ?>
                    </span>
                  </div>
                  <form method="post" class="pt-3" action="<?= ROOT ?>forgot?mode=enter_password">

                    <input class="my-3 form-control form-control-lg " type="password" name="password"
                      placeHolder="Enter Password">
                    <input class="my-3 form-control form-control-lg " type="password" name="password2"
                      placeHolder="Confirm Password">

                    <div class="d-grid gap-2">
                      <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                        type="submit">NEXT</button>
                    </div>
                    <div class="mt-3 d-flex justify-content-center align-items-center">
                      <a href="<?= ROOT ?>login" class="auth-link text-black">Login</a>
                    </div>
                  </form>
                  <?php
                  break;
                default:
                  // code...
                  break;
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= ROOT ?>assets/dashboard/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= ROOT ?>assets/dashboard/js/off-canvas.js"></script>
  <script src="<?= ROOT ?>assets/dashboard/js/hoverable-collapse.js"></script>
  <script src="<?= ROOT ?>assets/dashboard/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
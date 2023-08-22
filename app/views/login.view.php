<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=APP_NAME?> | <?= $title?> </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=ROOT?>assets/dashboard/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/dashboard/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=ROOT?>assets/dashboard/css/style2.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?=ROOT?>assets/dashboard/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="<?= ROOT ?>assets/images/image-school/logo-2.png" style="height:50px; width:100%; object-fit:contain">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form method="post" class="pt-3" >

                  <input class="my-3 form-control form-control-lg " value="<?=old_value('email')?>" name="email" placeHolder="Email">
                  <div><small class="text-danger"><?=$user->getError('email')?></small></div>

                  <input type="password" class="my-3 form-control form-control-lg" value="<?=old_value('password')?>" name="password" placeHolder="Password">
                  <div><small class="text-danger"><?=$user->getError('password')?></small></div>

                  <div class="d-grid gap-2">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                  </div>

                  <div class="mt-4 text-center">
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                  
                </form>
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
    <script src="<?=ROOT?>assets/dashboard/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=ROOT?>assets/dashboard/js/off-canvas.js"></script>
    <script src="<?=ROOT?>assets/dashboard/js/hoverable-collapse.js"></script>
    <script src="<?=ROOT?>assets/dashboard/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>
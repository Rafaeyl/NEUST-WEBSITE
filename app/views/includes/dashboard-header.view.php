<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    <?= $title ?>
  </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= ROOT ?>assets/dashboard/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= ROOT ?>assets/dashboard/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= ROOT ?>assets/dashboard/css/style2.css">
  <link rel="stylesheet" href="<?= ROOT ?>assets/dashboard/css/datatables.css">
  <!-- End layout styles -->
  <link rel="icon" type="image/x-icon" href="<?= ROOT ?>/favicon.png" />

</head>

<body>

     

  <?php

  $ses = new \Core\Session;

  ?>

  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

       <!-- Spinner Start -->
       <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only"></span>
            </div>
        </div>
        <!-- Spinner End -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="<?= ROOT ?>assets/dashboard/images/logo.svg"
            alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img
            src="<?= ROOT ?>assets/dashboard/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
              aria-expanded="false">
              <div class="nav-profile-img">
                <img src="<?= get_image($ses->user('image')); ?>" alt="image">
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?= $ses->user('first_name') . " " . $ses->user('last_name') ?></p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= ROOT ?>logout">
                <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?= get_image($ses->user('image')); ?>" alt="profile">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?= $ses->user('first_name') ?></span>
                <span class="text-secondary text-small"><?= $ses->user('role') ?></span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/dashhome">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>

        <?php if( $ses->user('role') == 'Admin'): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/user">
              <span class="menu-title">Users</span>
              <i class="mdi mdi-account menu-icon"></i>
            </a>
          </li>
          <li class="nav-item mt-0 sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <!-- <p class="menu-title">About School</p> -->
              </div>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/announcement">
              <span class="menu-title">Announcement</span>
              <i class="mdi mdi-access-point menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/teachers">
              <span class="menu-title">Teachers</span>
              <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/contact_info">
              <span class="menu-title">Contact Info</span>
              <i class="mdi mdi-account-card-details menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/about_school">
              <span class="menu-title">About School</span>
              <i class="mdi mdi-information menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/history">
              <span class="menu-title">History</span>
              <i class="mdi mdi-history menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#organization" aria-expanded="false"
              aria-controls="organization">
              <span class="menu-title">News</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-sitemap menu-icon"></i>
            </a>
            <div class="collapse" id="organization">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>dashboard/news_categories">Category</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>dashboard/news"> News Info</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/settings">
              <span class="menu-title">Settings</span>
              <i class="mdi mdi-settings menu-icon"></i>
            </a>
          </li>
          <li class="nav-item mt-0 sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <!-- <p class="menu-title">About School</p> -->
              </div>
            </span>
          </li>

        <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#organization" aria-expanded="false"
              aria-controls="organization">
              <span class="menu-title">Organizations</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-sitemap menu-icon"></i>
            </a>
            <div class="collapse" id="organization">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>dashboard/organization">Add Organization</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>dashboard/organization_info">Organization's
                    Info</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>dashboard/organization_about">Organization's About Us</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>dashboard/organization_officials">Organization's
                    Official</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Organization's
                    Album</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#college" aria-expanded="false" aria-controls="college">
              <span class="menu-title">colleges</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-school menu-icon"></i>
            </a>
            <div class="collapse" id="college">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>dashboard/college">Add college</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>dashboard/college_info">College's Info</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>dashboard/college_about">College's About Us</a>
                </li>
                <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>dashboard/college_official">College's Official</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">College's Album</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
              aria-controls="ui-basic">
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <span class="menu-title">Icons</span>
              <i class="mdi mdi-contacts menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <span class="menu-title">Forms</span>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <span class="menu-title">Charts</span>
              <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
            </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
              aria-controls="general-pages">
              <span class="menu-title">Sample Pages</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <h6 class="font-weight-normal mb-3">Projects</h6>
              </div>
              <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
              <div class="mt-4">
                <div class="border-bottom">
                  <p class="text-secondary">Categories</p>
                </div>
                <ul class="gradient-bullet-list mt-4">
                  <li>Free</li>
                  <li>Pro</li>
                </ul>
              </div>
            </span>
          </li>
        </ul>
      </nav>
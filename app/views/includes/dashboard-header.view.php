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
  <link rel="stylesheet" href="<?= ROOT ?>assets/dashboard/css/datatable.css">
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
        <a class="navbar-brand brand-logo" href="<?= ROOT ?>dashboard/dashhome"><img src="<?= ROOT ?>assets/images/image-school/logo-2.png"
            alt="logo" style="height: 80px; object-fit:contain;"/></a>
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
                <?php
                  $id = $ses->user('id');
                  $query  = "select institutions.name FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $id";
                  $orgname = $this->query($query);
                  ?>
                <span class="text-secondary text-small"><?=$orgname[0]->name?></span>
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

        <?php if( $ses->user('institute') == 'Admin'): ?>
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
            <a class="nav-link" data-bs-toggle="collapse" href="#news" aria-expanded="false"
              aria-controls="news">
              <span class="menu-title">News</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-sitemap menu-icon"></i>
            </a>
            <div class="collapse" id="news">
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
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/faq">
              <span class="menu-title">FAQs</span>
              <i class="mdi mdi-comment-question-outline menu-icon"></i>
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
                <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>dashboard/organization_officials">Organization's Official</a></li>
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
              </ul>
            </div>
          </li>
        <?php endif; ?>

        <?php if( $ses->user('institute') == 'organization'): ?>
          <li class="nav-item mt-0 sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
              </div>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/organization_info">
              <span class="menu-title">Organization's Info</span>
              <i class="mdi mdi-information menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/organization_about">
              <span class="menu-title">Organization's About Us</span>
              <i class="mdi mdi-account-card-details menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/organization_officials">
              <span class="menu-title">Organization's Official</span>
              <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
          </li>
        <?php endif; ?>

        <?php if( $ses->user('institute') == 'college'): ?>
          <li class="nav-item mt-0 sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
              </div>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/college_info">
              <span class="menu-title">College's Info</span>
              <i class="mdi mdi-information menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/college_about">
              <span class="menu-title">College's About Us</span>
              <i class="mdi mdi-account-card-details menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>dashboard/college_official">
              <span class="menu-title">College's Official</span>
              <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
          </li>
        <?php endif; ?>
        <li class="nav-item mt-0 sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
              </div>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>">
              <span class="menu-title">NEUST Papaya Website</span>
              <i class="mdi mdi-google-chrome menu-icon"></i>
            </a>
          </li>
        </ul>
      </nav>
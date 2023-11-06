

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $title . " | " . APP_NAME;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?= ROOT ?>/favicon.png" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/animate.css">

    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/magnific-popup.css">

	<link rel="stylesheet" href="<?=ROOT?>assets/main/css/announcement.css">

    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/aos.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/flaticon.css">	
    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/icomoon.css">
	<link rel="stylesheet" href="<?=ROOT?>assets/main/css/style.css?t=<?= time();?>">
	<link rel="stylesheet" href="<?=ROOT?>assets/main/css/custom.css?t=<?= time();?>">
	<link rel="stylesheet" href="<?=ROOT?>assets/main/slider/style.css?t=<?= time();?>">
	<script src="<?=ROOT?>assets/main/js/jquery.min.js"></script>
  	<script src="<?=ROOT?>assets/main/js/jquery-migrate-3.0.1.min.js"></script>

	<link rel="shortcut icon" href="<?= ROOT ?>assets/dashboard/image-school/logo.ico" />
	<link href="<?=ROOT?>assets/main/fontawesome/css/all.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">

	<!-- swiper -->
	<link rel="stylesheet" href="<?=ROOT?>assets/main/swiperjs-slider/css/swiper.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/main/swiperjs-slider/css/app.css">

  </head>
  <body>

	  <div class="bg-top navbar-light">
		<div class="data-info bg-darken">
			<div class="container-lg mx-3 p-2">
				<div class="row">
					<div class="col-6 d-none d-md-block">
						<a href="tel:+<?= $school_contact[0]->phone?>" class="text-white mr-4"><i class="fa-solid fa-phone mr-2"></i> <?= $school_contact[0]->phone?></a> 
						<a href="mailto:<?= $school_contact[0]->email?>" class="text-white "><i class="fa-solid fa-envelope"></i> <?= $school_contact[0]->email?></a> 
					</div>
					<div class="col-md-6  col-sm-12 d-flex justify-content-end text-right">
						<a href="https://119.93.173.77/enroll/" class="portal mr-4" target="_blank"target="_blank"><i class="fa-solid fa-pen"></i> Enrollment Portal</a> 
						<a href="http://119.93.173.77:81/admission/" class="portal" target="_blank"><i class="fa-solid fa-building-columns"></i> Admission Portal</a>
					</div>
				</div>
			</div>
		</div>
		
    	<div class="container-fluid">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-12 d-flex align-items-center text-center py-3 ">
					<a href="<?=ROOT?>" class="mx-auto"><img class="logo mx-auto" src="<?= get_image($SETTINGS['Logo'] ?? "Rafa")?>" alt=""></a>
					
    			</div>
		    </div>
		  </div>
		  <div class="container-xxl bg-dark">
			<nav class="navbar navbar-expand-lg navbar-dark bg-darken ftco-navbar-light justify-content-end " id="ftco-navbar">
				<button class="navbar-toggler  text-white text-center p-2" style="background-color:#f1f1f1;"type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				   <span class="fa-solid fa-bars text-dark"></span>
				 </button>
				 <div class="collapse navbar-collapse " id="ftco-nav">
				   <ul class="navbar-nav mx-auto">
						<li class="nav-item <?=$slug == 'home' ? 'active' : ''?>"><a href="<?=ROOT?>" class="nav-link pl-0">Home</a></li>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
							<div class="dropdown-menu rounded-0 m-0">
								<a href="<?=ROOT?>home/history#history" class="dropdown-item ">History</a>
								<a href="<?=ROOT?>home/mission#missionAndVision" class="dropdown-item">Mission and Vision</a>
								<a href="<?=ROOT?>home/march#neustMarch" class="dropdown-item">NEUST March</a>
								<a href="<?=ROOT?>home/teachers#teachers" class="dropdown-item">Teachers</a>
							</div>
						</div>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Organizations</a>
							<div class="dropdown-menu rounded-0 m-0">
								<?php if(!empty($organizations)): ?>
									<?php foreach($organizations as $orga): ?>
										<a href="<?=ROOT?>organization/<?=$orga->slug?>" class="dropdown-item"><?=$orga->name?></a>
									<?php endforeach; ?>
								<?php else : ?>
									<a href="<?=ROOT?>" class="dropdown-item">NO Organizations Found</a>
								<?php endif;?>
							</div>
						</div>
						<div class="nav-item dropdown ">
							<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Colleges</a>
							<div class="dropdown-menu rounded-0 m-0">
								<?php if(!empty($colleges)): ?>
									<?php foreach($colleges as $col): ?>
										<a href="<?=ROOT?>colleges/<?=$col->slug?>" class="dropdown-item"><?=$col->name?></a>
									<?php endforeach; ?>
								<?php else : ?>
									<a href="<?=ROOT?>" class="dropdown-item">NO Colleges Found</a>
								<?php endif;?>
							</div>
						</div>
						<li class="nav-item  <?=$slug == 'admission' ? 'active' : ''?>"><a href="<?=ROOT?>home/admission#admission" class="nav-link ">Admission</a></li>
					 	<li class="nav-item  <?=$slug == 'contact' ? 'active' : ''?>"><a href="<?=ROOT?>home/contact#contact" class="nav-link">Contact</a></li>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Others</a>
							<div class="dropdown-menu rounded-0 m-0">
								<a href="<?=ROOT?>home/academic_calendar" class="dropdown-item ">Academic Calendar</a>
								<a href="<?=ROOT?>home/faqs" class="dropdown-item">Frequently Asked Questions</a>
							</div>
						</div>
				   </ul>
				 </div>
			 </nav>
		  </div>
    </div>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=APP_NAME;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/x-icon" href="<?= ROOT ?>/favicon.png" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/animate.css">

    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/magnific-popup.css">

    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/aos.css">

    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/ionicons.min.css">
    
    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/flaticon.css">	
    <link rel="stylesheet" href="<?=ROOT?>assets/main/css/icomoon.css">
	<link rel="stylesheet" href="<?=ROOT?>assets/main/css/style1.css">
	<link rel="stylesheet" href="<?=ROOT?>assets/main/css/custom.css">
	 <link rel="shortcut icon" href="<?= ROOT ?>assets/dashboard/image-school/logo.ico" />
	<link href="<?=ROOT?>assets/main/fontawesome/css/all.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
	  <div class="bg-top navbar-light">
		<div class="data-info bg-darken">
			<div class="container-lg mx-3">
				<p class="text-white fw-bold"><?= date("D, F j, Y"); ?></p>	
			</div>
		</div>
		
    	<div class="container-fluid">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-12 d-flex align-items-center text-center py-3 ">
    				<!-- <a class="navbar-brand" href="<?=ROOT?>">Fox. <span>University</span></a> -->
					<img class="logo mx-auto" src="<?= get_image($SETTINGS['Logo'] ?? "Rafa")?>" alt="">
    			</div>
		    </div>
		  </div>
		  <div class="container-xxl bg-dark">
			<nav class="navbar navbar-expand-lg navbar-dark bg-darken ftco-navbar-light" id="ftco-navbar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				   <span class="oi oi-menu"></span> Menu
				 </button>
				 <div class="collapse navbar-collapse " id="ftco-nav">
				   <ul class="navbar-nav mx-auto">
						<li class="nav-item active"><a href="<?=ROOT?>" class="nav-link pl-0">Home</a></li>
						<div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
							<div class="dropdown-menu rounded-0 m-0">
								<a href="<?=ROOT?>home/history" class="dropdown-item">History</a>
								<a href="<?=ROOT?>home/mission" class="dropdown-item">Mission and Vision</a>
								<a href="<?=ROOT?>home/march" class="dropdown-item">NEUST March</a>
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
						<div class="nav-item dropdown">
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
						<li class="nav-item"><a href="http://localhost/NEUST-PAPAYA/public/home/teachers" class="nav-link">Teachers</a></li>
						<li class="nav-item"><a href="<?=ROOT?>home/" class="nav-link">Courses</a></li>
						<li class="nav-item"><a href="<?=ROOT?>home/frequently-asked-questions" class="nav-link">FAQS</a></li>
					 	<li class="nav-item"><a href="<?=ROOT?>home/contact" class="nav-link">Contact</a></li>
				   </ul>
				 </div>
			 </nav>
		  </div>
    </div>

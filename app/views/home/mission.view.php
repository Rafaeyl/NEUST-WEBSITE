<?= $this->view('includes/header', $data); ?>

<section class="hero-wrap hero-wrap-2"
	style="background-image: url('<?= ROOT ?>/assets/images/image-school/school-1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Mission and Vision</h1>
				<!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
								class="fa-solid fa-arrow-right"></i></a></span> <span>Mission and Vision <i
							class="fa-solid fa-arrow-right"></i></span></p> -->
			</div>
		</div>
	</div>
</section>

<section class="hmv-box" id="missionAndVision">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12 my-3 wow fadeInUp" data-wow-delay="0s">
				<div class="inner-hmv" style="height:300px">
					<div class="icon-box-hmv mx-auto mx-auto"><i class="fa-solid fa-bullseye fa-2x p-3"></i></div>
					<h3>Mission</h3>
					<p class=" ">To develop new knowledge and technologies and transform human resources into productive
						citizenry to bring about development impact to local and international communities.</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-12 my-3 wow fadeInUp" data-wow-delay="0.5s">
				<div class="inner-hmv" style="height:300px">
					<div class="icon-box-hmv mx-auto"><i class="fa-solid fa-eye fa-2x p-3"></i></div>
					<h3>Vision</h3>
					<p class="text-center">NEUST is a locally responsive and internationally relevant and recognized
						University of Science and Technology.</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-12 my-3 wow fadeInUp" data-wow-delay="0.7s">
				<div class="inner-hmv" style="height:300px">
					<div class="icon-box-hmv mx-auto"><i class="fa-solid fa-atom fa-2x p-3"></i></div>
					<h3>CORE VALUES</h3>
					<p class="text-center">Nationalism, Excellence, Unity, Spiritually, Transparency.</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-12 my-3 wow fadeInUp" data-wow-delay="1s">
				<div class="inner-hmv" style="height:300px">
					<div class="icon-box-hmv mx-auto"><i class="fa-solid fa-comment fa-2x p-3"></i></div>
					<h3>TAGLINE</h3>
					<p class="text-center">Nationalism, Excellence, Unity, Spiritually, Transparency.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include '../app/views/includes/footer.view.php'; ?>
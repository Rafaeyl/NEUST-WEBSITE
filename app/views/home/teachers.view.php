<?= $this->view('includes/header', $data); ?>

<style>
	.dept-top {
		font-size: 3em;
		font-weight: bold;
		text-align: center;
	}

	.dept-box {
		border-radius: 10px;
	}

	.dept-box img {
		width: 100%;
		height: 350px;
	}

	.dept-box .social {
		margin-top: -270px;
		background: #2b3da6;
		border-radius: 0 20px 20px 0;
		position: absolute;


	}

	.dept-box a {
		display: flex;
		margin: 5px;


		position: relative;
		text-decoration: none;
		font-size: 15px;
		color: #fff;
		padding: 5px;
	}


	.dept-box .text {
		text-align: center;
		color: #fff;
	}

	.dept-box p {
		font-size: 20px;
	}
</style>

<section class="hero-wrap hero-wrap-2"
	style="background-image: url('<?= ROOT ?>/assets/images/image-school/school-1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Faculty</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
								class="fa-solid fa-arrow-right"></i></a></span> <span>Faculty <i
							class="fa-solid fa-arrow-right"></i></span></p>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section " id="teachers">
	<div class="container ">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h1 class="text-primary">Faculty and Staffs</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 mx-auto mb-5">
				<div class="dept-box bg-primeLight ">
					<img src="<?= ROOT ?>/assets/images/Depart/maam-rivera.jpg">
					<div class="text text-dark fw-bold py-2">
						<h6> App Developer</h6>
					</div>
				</div>
			</div>
		</div>
		<div class="row mx-auto justify-content-center">
			<div class="col-md-3 ">
				<div class="dept-box bg-primeLight">
					<img src="<?= ROOT ?>/assets/images/Depart/sir-albert.jpg">
					<div class="text text-dark fw-bold py-2">
					<h6> App Developer</h6>
					</div>
				</div>
			</div>
			<?php if (!empty($dept_head)): ?>
				<?php foreach ($dept_head as $teacher): ?>
					<div class="col-md-3 ">
						<div class="dept-box bg-primeLight">
							<img src="<?= get_image($teacher->image) ?>">
							<div class="text text-dark fw-bold py-2">
							 <h6> 	<?= esc($teacher->position) ?></h6>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>


<section class="ftco-section bg-light" id="teachers">
	<div class="container-fluid ">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h6 class="text-primary">Faculty</h6>
				<h2 class="mb-4 ">Full Time <span class="text-primary">Faculty</span></h2>
				<p>Below are the full time teachers in the campus.</p>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php if (!empty($full_time)): ?>
				<?php foreach ($full_time as $teacher): ?>
					<div class=" col-md-4 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex">
								<div class="img align-self-stretch"
									style="background-image: url(<?= get_image($teacher->image) ?>);"></div>
							</div>
							<div class="text p-3 text-center  align-items-center bg-primeLight" style="height:100px">
								<h6>
									<?= esc($teacher->name) . "," . ' ' . esc($teacher->suffixes) ?>
								</h6>
								<p class="position mb-2">
									<?= esc($teacher->position) ?>
								</p>
								<!-- <div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
									</ul>
								</div> -->
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="bg-danger p-5 mb-5 mx-auto text-center">
					<h2 class="lead display-4">NO PART TIME TEACHERS AVAILABLE</h2>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="container-fluid px-4 ">
		<div class="row justify-content-center my-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">

				<h6 class="text-primary">Faculty</h6>
				<h2 class="mb-4 ">Part Time <span class="text-primary">Faculty</span></h2>
				<p>Below are the Part Time teachers in the campus.</p>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php if (!empty($part_time)): ?>
				<?php foreach ($part_time as $teacher): ?>
					<div class=" col-md-4 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex">
								<div class="img align-self-stretch"
									style="background-image: url(<?= get_image($teacher->image) ?>);"></div>
							</div>
							<div class="text p-3 text-center align-items-center bg-primeLight" style="height:100px">
								<h5>
									<?= esc($teacher->name) . "," . ' ' . esc($teacher->suffixes) ?>
								</h5>
								<p class="position mb-2">
									<?= esc($teacher->position) ?>
								</p>
								<!-- <div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
									</ul>
								</div> -->
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="bg-danger p-5 mb-5 mx-auto text-center">
					<h2 class="lead display-4">NO PART TIME TEACHERS AVAILABLE</h2>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>



<?php include '../app/views/includes/footer.view.php'; ?>
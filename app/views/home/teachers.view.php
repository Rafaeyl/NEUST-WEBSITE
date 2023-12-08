<?= $this->view('includes/header', $data); ?>

<section class="hero-wrap hero-wrap-2"
	style="background-image: url('<?= ROOT ?>/assets/images/image-school/school-1.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Teachers</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
								class="fa-solid fa-arrow-right"></i></a></span> <span>Teachers <i
							class="fa-solid fa-arrow-right"></i></span></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section bg-light" id="teachers">
	<div class="container-fluid ">
		<div class="row justify-content-center mb-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				<h6 class="text-primary">Teachers</h6>
				<h2 class="mb-4 ">Full Time <span class="text-primary">Teachers</span></h2>
				<p>Below are the full time teachers in the campus.</p>
			</div>
		</div>	
		<div class="row justify-content-center">
			<?php if (!empty($full_time)): ?>
				<?php foreach ($full_time as $teacher): ?>
					<div class=" col-md-4 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex">
								<div class="img align-self-stretch" style="background-image: url(<?= get_image($teacher->image) ?>);"></div>
							</div>
							<div class="text p-3 text-center bg-white align-items-center " style="height:150px">
								<h5>
									<?= esc($teacher->name) . "," . ' ' .esc($teacher->suffixes) ?>
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
	<div class="container-fluid px-4 ">
		<div class="row justify-content-center my-5 pb-2">
			<div class="col-md-8 text-center heading-section ftco-animate">
				
				<h6 class="text-primary">Teachers</h6>
				<h2 class="mb-4 ">Part Time <span class="text-primary">Teachers</span></h2>
				<p>Below are the Part Time teachers in the campus.</p>
			</div>
		</div>	
		<div class="row justify-content-center">
			<?php if (!empty($part_time)): ?>
				<?php foreach ($part_time as $teacher): ?>
					<div class=" col-md-4 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex">
								<div class="img align-self-stretch" style="background-image: url(<?= get_image($teacher->image) ?>);"></div>
							</div>
							<div class="text p-3 text-center bg-white align-items-center " style="height:150px">
								<h5>
									<?= esc($teacher->name) . "," . ' ' .esc($teacher->suffixes) ?>
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
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

<section class="ftco-section bg-light">
	<div class="container-fluid px-4">
		<div class="row">
			<?php if (!empty($teachers)): ?>
				<?php foreach ($teachers as $teacher): ?>
					<div class="col-md-6 col-lg-4 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(<?= get_image($teacher->image) ?>);"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>
									<?= esc($teacher->name) . "," . esc($teacher->suffixes) ?>
								</h3>
								<span class="position mb-2">
									<?= esc($teacher->position) ?>
								</span>
								<div class="faded">
									<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
									<ul class="ftco-social text-center">
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
				<div class="bg-danger p-5 mb-5 mx-auto text-center">
					<h2 class="lead display-4">NO TEACHERS AVAILABLE</h2>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>



<?php include '../app/views/includes/footer.view.php'; ?>
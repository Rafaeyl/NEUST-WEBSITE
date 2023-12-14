<?= $this->view('includes/header', $data); ?>

<!-- Announcements -->
<!-- <div class="container-xxl announcement">
		<div class="announcement-container">
			<img src="<?= ROOT ?>/assets/images/image-school/announcement1.png" class="title" alt="annnouncement">
			<p class="announce">ANNOUNCEMENT</p>
			<div class="news">
				<ul>
				<?php if (!empty($announcements)): ?>
					<?php foreach ($announcements as $announcement): ?>
						<li>
							<a href="<?= ROOT ?>announcementDetails/<?= $announcement->slug ?>" class="mr-2 text-white"><?= $announcement->title ?></a>
						</li>
					<?php endforeach; ?>
				<?php else: ?>
					<li>
							<a href="" class="mr-2 text-white">No Announcement Yet</a>
						</li>
				<?php endif; ?>
				</ul>
			</div>
		</div>
	</div> -->

<!-- <section class="bg-light">
	<div class="container bg-light py-3">
		<div class="row">
			<div class="col-2 bg-primary">
				<h5>Announcements</h5>
			</div>
			<div class="col-10 bg-darken">
				lskdfnlksdfn
			</div>
		</div>
	</div>
	</section> -->


<!-- SLIDER START -->
<!-- <section class="container mt-100 mb-100">
        <h2 class="heading text-center">Photo <span class="text-primary">Albums</span>
            <span class="sub-heading">EDUComp is a fully responsive premium education theme for schools, colleges, insitutions and universities.</span>
            <span class="icon-divider"></span>
        </h2>
        <div class="row">
            <div class="col-lg-4">
                <a href="album-single.html">
                    <div class="album-card card">
                        <div class="card-body album-images">
                            <img src="<?= ROOT ?>/assets/images/food/food-1.jpg" class="img-fluid w-100" alt="">
                            <img src="<?= ROOT ?>/assets/images/food/food-2.jpg" class="img-fluid" alt="">
                            <img src="<?= ROOT ?>/assets/images/food/food-3.jpg" class="img-fluid" alt="">
                            <img src="<?= ROOT ?>/assets/images/food/food-1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="card-footer">
                            <h5 class="heading">Coporate Ethics</h5>
                            <span class="text-muted">Updated 5 days ago</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section> -->
<section class="home">
	<div class="slider">
		<?php if (!empty($slideShow)): ?>
			<?php foreach ($slideShow as $slide): ?>
				<div class="slide active" style="background-image: url('<?= get_image($slide->image) ?>')">
					<div class="container">
						<div class="caption">
							<h1>
								<?= esc($slide->title) ?>
							</h1>
							<a href="<?= ROOT ?>newsDetail/<?= $slide->slug ?>">Read More</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<center>
				<h1>NO Slide FOUND</h1>
			</center>
		<?php endif; ?>
	</div>

	<!-- controls  -->
	<div class="controls">
		<div class="prev"><i class="fa-solid fa-arrow-left"></i></div>
		<div class="next"><i class="fa-solid fa-arrow-right"></i></div>
	</div>

	<!-- indicators -->
	<div class="indicator">
	</div>
</section>

<!-- SLIDER END -->

<!--ABOUT THE UNIVERISTY -->
<div class="container-fluid">
	<div class="row heading-section bg-darken p-4 heading-title">
		<div class="col-1 d-none d-md-block">
			<img src="<?= ROOT ?>/assets/images/title-image.png" class="title-image text-lg-start text-center" alt="">
		</div>
		<div class="col-md-8 text-center text-lg-left">
			<span class="text-white ftco-animate px-4 ">ABOUT THE UNIVERSITY</span>
		</div>
	</div>
</div>
<section class="ftco-section ftco-counter img m-0" id="section-counter"
	style="background-image: url(<?= ROOT ?>/assets/images/image-school/school-2.jpg);"
	data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-2 d-flex">
			<div class="col-md-6 align-items-stretch d-flex">
				<div class="img img-video d-flex align-items-center"
					style="background-image: url(<?= ROOT ?>/assets/images/image-school/school-1.jpg);">
					<div class="video justify-content-center">
						<a href="https://www.youtube.com/watch?v=zdAntvPS4Xk"
							class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
							<span class="fa-solid fa-play"></span>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 pt-5">
				<p class="mb-4" style="font-size: clamp(1.5625rem, 1.3839rem + 1.4286vw, 2.1875rem);
						margin-bottom: 0.5rem;
						font-weight: 500;
						line-height: 1.2;">
					<?= $about_school[0]->title ?>
				</p>
				<p>
					<?= $about_school[0]->description ?>
				</p>
			</div>
		</div>
		<div class="row d-md-flex align-items-center justify-content-center">
			<div class="col-lg-12">
				<div class="row d-md-flex align-items-center">
					<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18">
							<div class="icon"><span class="flaticon-doctor"></span></div>
							<div class="text">
								<strong class="number" data-number="<?= $about_school[0]->teachers ?>">
									<?= $about_school[0]->teachers ?>
								</strong>
								<span>Certified Teachers</span>
							</div>
						</div>
					</div>
					<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18">
							<div class="icon"><span class="flaticon-doctor"></span></div>
							<div class="text">
								<strong class="number" data-number="<?= $about_school[0]->students ?>">
									<?= $about_school[0]->students ?>
								</strong>
								<span>Students</span>
							</div>
						</div>
					</div>
					<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
						<div class="block-18">
							<div class="icon"><span class="flaticon-doctor"></span></div>
							<div class="text">
								<strong class="number" data-number="<?= $about_school[0]->staffs ?>">
									<?= $about_school[0]->staffs ?>
								</strong>
								<span>Staffs</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Announements -->
<div class="container-fluid">
	<div class="row heading-section bg-darken p-4 heading-title">
		<div class="col-1 d-none d-md-block">
			<img src="<?= ROOT ?>/assets/images/title-image.png" class="title-image text-lg-start text-center" alt="">
		</div>
		<div class="col-md-11 text-center text-lg-left">
			<span class="text-white ftco-animate px-4 ">ANNOUNCEMENTS</span>
		</div>
	</div>

	<div class="container">
	<div class="row   my-5">
		<?php if (!empty($announcements)): ?>
			<?php foreach ($announcements as $ann): ?>
				<div class="col-md-6 col-lg-4 ftco-animate my-2">
					<div class="post-box border">
						<a href="<?= ROOT ?>announcementDetails/<?= $ann->slug ?>"><img src="<?= get_image($ann->image) ?>"
								alt="" class="post-img"></a>
						<a href="<?= ROOT ?>announcementDetails/<?= $ann->slug ?>" class="post-title">
							<?= $ann->title ?>
						</a>
						<span class="post-date text-primary">
							<?= get_date($ann->date) ?>
						</span>
						<p class="post-description">
							<?php
							$des  = strip_tags($ann->description);
							$des2 = str_replace("&nbsp;", "", $des);
							echo substr($des2, 0, 200);
							?>
						</p>

					</div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<center>
				<h1 class="text-danger">NO ANNOUNCEMENTS FOUND</h1>
			</center>
		<?php endif; ?>
	</div>
	</div>

</div>



<div class="container-fluid">
	<div class="row heading-section bg-darken p-4 heading-title">
		<div class="col-1 d-none d-md-block ">
			<img src="<?= ROOT ?>/assets/images/title-image.png" class="title-image text-lg-start text-center" alt="">
		</div>
		<div class="col-md-8 text-center text-lg-left justify-content-center">
			<span class="text-white ftco-animate px-4 ">UNIVERSITY GALLERY</span>
		</div>
	</div>
</div>
<section class="ftco-section ftco-counter img m-0 bg-dark " id="section-counter"
	style="background-image: url(<?= ROOT ?>/assets/images/image-school/school-1.jpg);"
	data-stellar-background-ratio="0.5">
	<div class="row justify-content-center mb-2 ">
		<div class="col-md-8 text-center heading-section ftco-animate">
			<h2 class=" text-white">
				<?= $gallery_name[0]->title ?? '' ?>
			</h2>

		</div>
	</div>

	<section id="slider-2 ">
		<div class="container-wide ">
			<div class="swiper" id="swiper-2">
				<div class="swiper-wrapper">
					<?php if (!empty($gallery_home)): ?>
						<?php foreach ($gallery_home as $row): ?>
							<div class="swiper-slide">
								<figure>
									<img src="<?= ROOT ?>uploads/<?= $row->file_name ?>" alt="Marbella, Spain" />
								</figure>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="swiper-slide">
							<figure>
								<img src="<?= ROOT ?>assets/images/no-gallery.jpg" alt="Marbella, Spain" />
							</figure>
						</div>
					<?php endif; ?>
				</div> <!-- end swiper-wrapper -->

				<div class="swiper-custom-nav">
					<svg width="64" height="64" viewBox="0 0 64 64" id="nav-left" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M32 2.79753e-06C14.3269 4.34256e-06 -4.34256e-06 14.3269 -2.79753e-06 32C-1.2525e-06 49.6731 14.3269 64 32 64C49.6731 64 64 49.6731 64 32C64 14.3269 49.6731 1.2525e-06 32 2.79753e-06ZM28.9334 24.3999C28.6667 24.1333 28.4 23.9999 28 23.9999C27.6 23.9999 27.3334 24.1333 27.0667 24.3999L20.4 31.0666L20.4 31.0667C20.2 31.2667 20.075 31.5041 20.025 31.751C19.9417 32.1624 20.0666 32.6 20.4 32.9333L27.0667 39.6C27.6 40.1333 28.4 40.1333 28.9333 39.6C29.4667 39.0667 29.4667 38.2667 28.9333 37.7333L24.5334 33.3334L42.7222 33.3334C43.4889 33.3334 44 32.8 44 32C44 31.2 43.4889 30.6667 42.7222 30.6667L24.5333 30.6667L28.9334 26.2666C29.4667 25.7333 29.4667 24.9333 28.9334 24.3999Z"
							fill="white" />
					</svg>

					<svg width="64" height="64" viewBox="0 0 64 64" id="nav-right" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M32 64C49.6731 64 64 49.6731 64 32C64 14.3269 49.6731 0 32 0C14.3269 0 0 14.3269 0 32C0 49.6731 14.3269 64 32 64ZM35.0666 39.6001C35.3333 39.8667 35.6 40.0001 36 40.0001C36.4 40.0001 36.6666 39.8667 36.9333 39.6001L43.6 32.9334L43.6 32.9333C43.8 32.7333 43.925 32.4959 43.975 32.249C44.0583 31.8376 43.9334 31.4 43.6 31.0667L36.9333 24.4C36.4 23.8667 35.6 23.8667 35.0667 24.4C34.5333 24.9333 34.5333 25.7333 35.0667 26.2667L39.4666 30.6666H21.2778C20.5111 30.6666 20 31.2 20 32C20 32.8 20.5111 33.3333 21.2778 33.3333H39.4667L35.0666 37.7334C34.5333 38.2667 34.5333 39.0667 35.0666 39.6001Z"
							fill="white" />
					</svg>
				</div> <!-- end swiper-custom-nav -->

				<div class="swiper-custom-pagination"></div>
			</div> <!-- end swiper -->
		</div> <!-- end container -->
	</section>

	<div class="d-flex align-items-center mt-5 mr-5 justify-content-end">
		<p><a href="<?= ROOT ?>schoolAlbum" class="more">More Gallery
				<span class="fa-solid fa-arrow-right "></span></a>
		</p>
	</div>
</section>


<div class="container-fluid">
	<div class="row heading-section bg-darken p-4 heading-title">
		<div class="col-1 d-none d-md-block">
			<img src="<?= ROOT ?>/assets/images/title-image.png" class="title-image text-lg-start text-center" alt="">
		</div>
		<div class="col-md-11 text-center text-lg-left">
			<span class="text-white ftco-animate px-4 ">RECENT NEWS AND EVENTS</span>
		</div>
	</div>
</div>

<section class="bg-light">
	<div class="container ">
		<div class="row  ">
			<div class="col-12 ">
				<div class="row d-flex justify-content-center">
					<?php if (!empty($news)): ?>
						<?php foreach ($news as $row): ?>
							<div class="col-lg-3 col-md-6 ftco-animate my-2">
								<div class="blog-entry ">
									<a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>" class="block-20 d-flex align-items-end"
										width="200" height="250"
										style="background-image: url(<?= get_image($row->image) ?>); object-fit:cover;">
										<div class="meta-date text-center p-2">
											<span class="text-whote">
												<?= get_date($row->date) ?>
											</span>
										</div>
									</a>
									<div class="text bg-white p-4" style="height:400px;">
										<h3 class="heading text-justify"><a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>">
												<?= substr($row->title, 0, 50) ?>
											</a></h3>
										<hr class="bg-primary">
										<p class=" news-body">
											<?php
											$des  = strip_tags($row->description);
											$des2 = str_replace("&nbsp;", "", $des);
											echo substr($des2, 0, 200);

											?>
										</p>
									
									</div>
									<div class="bg-white pb-3">
											<div class="row d-flex justify-content-center align-items-center text-center">
												<div class="col-12">
													<p class="mb-0"><a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>"
															class="btn btn-primary">Read More
															<span class="fa-solid fa-arrow-right "></span></a></p>
												</div>
												<div class="col-12 mt-2">
													<p class="ml-auto mb-0">
														<a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>" class="mr-2">
															<?= $row->name ?>
														</a>
													</p>
												</div>
											</div>
										</div>
								</div>
							</div>

						<?php endforeach; ?>
					<?php else: ?>
						<center>
							<h1>NO NEWS FOUND</h1>
						</center>
					<?php endif; ?>
				</div>
			</div>


		</div>
		<div class="d-flex align-items-center  justify-content-end ">
			<p class="my-5"><a href="<?= ROOT ?>newsAndEvents" class="more">More News and Events
					<span class="fa-solid fa-arrow-right "></span></a>
			</p>
		</div>
	</div>
</section>


<!-- Testimonial Start -->
<!-- <div class="container-xxl testimonial py-5 bg-dark" >
		<div class="container">
			<div class="row p-5 d-flex justify-content-center">
				<div class="col-7 text-center">
					<span class="fa-solid fa-check explore_title"> </span>
					<h1>APPLY NOW</h1>

					<h5>BE A NEUSTIAN</h5>
				</div>
				<div class="col-5 text-center">
					<div class="">
					<span class="fa-solid fa-magnifying-glass explore_title"> </span>
					<h1>EXPLORE</h1>
					</div>
				
					<a href="<?= ROOT ?>schoolAlbum" class="explore_link"><h5><span class="fa fa-circle-arrow-right"> </span> &nbsp; GALLERY</h5></a>
					<a href="<?= ROOT ?>home/academic_calendar" class="explore_link"><h5><span class="fa fa-circle-arrow-right"> </span> &nbsp;ACADEMIC CALENDAR</h5></a> 
					<a href="<?= ROOT ?>home/faqs" class="explore_link"><h5><span class="fa fa-circle-arrow-right"> </span> &nbsp; FREQUENTLY ASKED QUESTIONS</h5></a>
					<a href="<?= ROOT ?>newsAndEvents" class="explore_link">   <h5 ><span class="fa fa-circle-arrow-right"> </span> &nbsp; NEWS AND EVENTS</h5></a>
				
				</div>
			</div>
		</div>
	</div>  -->
<!-- Testimonial End -->

 <!-- <section class="ftco-gallery mt-5">
		<div class="container-wrap">
			<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="<?= ROOT ?>assets/main/images/course-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?= ROOT ?>assets/main/images/course-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="<?= ROOT ?>assets/main/images/course-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?= ROOT ?>assets/main/images/image_2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="<?= ROOT ?>assets/main/images/course-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?= ROOT ?>assets/main/images/image_3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="<?= ROOT ?>assets/main/images/course-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?= ROOT ?>assets/main/images/image_4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
		</div>
		</div>
</section> -->




<?php include '../app/views/includes/footer.view.php'; ?>
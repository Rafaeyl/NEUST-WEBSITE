<?= $this-> view('includes/header', $data);   ?>
	<!-- Announcements -->
	<div class="container-xxl announcement">
		<div class="announcement-container">
			<img src="<?=ROOT?>/assets/images/image-school/announcement1.png" class="title" alt="annnouncement">
			<p class="announce">ANNOUNCEMENT</p>
			<div class="news">
				<ul>
				<?php if(!empty($announcements)):?>
                    <?php foreach($announcements as $announcement):?>
						<li>
							<a href="<?=ROOT?>announcementDetails/<?=$announcement->slug?>" class="mr-2 text-white"><?=$announcement->title?></a>
						</li>
					<?php endforeach; ?>
                <?php else : ?>
                    <center><h1>NO ANNOUNCEMENTS FOUND</h1></center>
                <?php endif;?>
				</ul>
			</div>
    	</div>
	</div>

	<!-- SLIDER START -->
	<section aria-label="Newest Photos">
		<div class="carousel" data-carousel>
			<button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
			<button class="carousel-button next" data-carousel-button="next">&#8658;</button>
			<ul data-slides>

				<li class="slide" data-active>
				<img src="<?= get_image($SETTINGS['Cover-photo 2'] ?? "http://localhost/NEUST-PAPAYA/public/assets/images/events/start_of_classes.jpg")?>" alt="Nature Image #1">
				</li>
				<li class="slide" data-active>
				<img src="<?= get_image($SETTINGS['Cover-photo 1'])?>" alt="Nature Image #1">
				</li>
			</ul>
		</div>
  </section>
	<!-- SLIDER END -->
	
	<div class="row heading-section bg-darken p-4 heading-title">
			<div class="col-1 d-none d-md-block">
				<img src="<?= ROOT ?>/assets/images/title-image.png" class="title-image text-lg-start text-center"alt="">
			</div>
			<div class="col-md-8 text-center text-lg-left">
				<span class="text-white ftco-animate px-4 ">ABOUT THE UNIVERSITY</span>
			</div>
	</div>
	<section class="ftco-section ftco-counter img m-0" id="section-counter" style="background-image: url(<?= ROOT?>/assets/images/image-school/school-2.jpg);" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2 d-flex">
				<div class="col-md-6 align-items-stretch d-flex">
					<div class="img img-video d-flex align-items-center" style="background-image: url(<?= ROOT?>/assets/images/image-school/school-1.jpg);">
						<div class="video justify-content-center">
								<a href="https://www.youtube.com/watch?v=ljoTZ0CI2-g" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
									<span class="fa-solid fa-play"></span>
								</a>
						</div>
					</div>
				</div>
				<div class="col-md-6 heading-section heading-section-white ftco-animate pl-lg-5 pt-md-0 pt-5">
					<h2 class="mb-4"><?=$about_school[0]->title?></h2>
					<p><?=$about_school[0]->description?></p>
				</div>
			</div>
			<div class="row d-md-flex align-items-center justify-content-center">
				<div class="col-lg-12">
					<div class="row d-md-flex align-items-center">
						<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
							<div class="block-18">
								<div class="icon"><span class="flaticon-doctor"></span></div>
							<div class="text">
								<strong class="number" data-number="<?=$about_school[0]->teachers?>"><?=$about_school[0]->teachers?></strong>
								<span>Certified Teachers</span>
							</div>
							</div>
						</div>
						<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
							<div class="block-18">
								<div class="icon"><span class="flaticon-doctor"></span></div>
							<div class="text">
								<strong class="number" data-number="<?=$about_school[0]->students?>"><?=$about_school[0]->students?></strong>
								<span>Students</span>
							</div>
							</div>
						</div>
						<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
							<div class="block-18">
								<div class="icon"><span class="flaticon-doctor"></span></div>
							<div class="text">
								<strong class="number" data-number="<?=$about_school[0]->staffs?>"><?=$about_school[0]->staffs?></strong>
								<span>Staffs</span>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		
	<div class="row heading-section bg-darken p-4 heading-title">
			<div class="col-1 d-none d-md-block">
				<img src="<?= ROOT ?>/assets/images/title-image.png" class="title-image text-lg-start text-center"alt="">
			</div>
			<div class="col-md-11 text-center text-lg-left">
				<span class="text-white ftco-animate px-4 ">RECENT NEWS AND EVENTS</span>
			</div>
	</div>
	
	<section class="bg-light">
		<div class="container-fluid ">
			<div class="row justify-content-center  ">
			<?php if(!empty($news)):?>
				<?php foreach($news as $row):?>
					<div class="col-md-6 col-lg-4 ftco-animate my-2">
						<div class="blog-entry" >
							<a href="<?=ROOT?>newsDetail/<?=$row->slug?>" class="block-20 d-flex align-items-end" width="200" height="250" style="background-image: url(<?= get_image($row->image) ?>); object-fit:cover;">
								<div class="meta-date text-center p-2">
									<span class="text-whote"><?= get_date($row->date)?></span> 
								</div>
							</a>
							<div class="text bg-white p-4" style="height:510px;">
								<h3 class="heading text-justify"><a href="<?=ROOT?>newsDetail/<?=$row->slug?>"><?= substr($row->title, 0,50)?></a></h3>
								<hr class="bg-primary">
								<p class=" news-body">
                                            <?php 
                                            $des = strip_tags($row->description); 
                                            $des2 = str_replace("&nbsp;", "",$des);
                                            echo substr($des2, 0,400);
                                            
                                            ?>
                                        </p>
								<div class="d-flex align-items-center mt-4">
									<p class="mb-0"><a href="<?=ROOT?>newsDetail/<?=$row->slug?>" class="btn btn-primary">Read More 
											<span class="fa-solid fa-arrow-right "></span></a></p>
									<p class="ml-auto mb-0">
										<a href="<?=ROOT?>newsDetail/<?=$row->slug?>" class="mr-2"><?=$row->name?></a>
									</p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<center><h1>NO NEWS FOUND</h1></center>
			<?php endif;?>

			</div>
			<div class="d-flex align-items-center  justify-content-end ">
				<p class="my-5"><a href="<?=ROOT?>newsAndEvents" class="more">More News and Events
						<span class="fa-solid fa-arrow-right "></span></a>
				</p>
			</div>
		</div>
	</section>

	<div class="d-none d-md-block">
		<div class="row heading-section bg-darken p-4 heading-title ">
				<div class="col-1 d-none d-md-block">
					<img src="<?= ROOT ?>/assets/images/title-image.png" class="title-image text-lg-start text-center"alt="">
				</div>
				<div class="col-md-8 text-center text-lg-left">
					<span class="text-white ftco-animate px-4 ">UNIVERSITY GALLERY</span>
				</div>
		</div>
	</div>
	<section class="ftco-section ftco-counter img m-0 bg-dark d-none d-md-block"  id="section-counter" style="background-image: url(<?= ROOT?>/assets/images/image-school/school-1.jpg);" data-stellar-background-ratio="0.5">
		<div id="content-wrapper">
			<div class="column">
				<img id=featured src="<?= ROOT?>/assets/main/images/image_1.jpg">

				<div id="slide-wrapper" >
					<img id="slideLeft" class="arrow" src="<?= ROOT?>/assets/main/images/left-arrow.png">

					<div id="slider">
						<img class="thumbnail active" src="<?= ROOT?>/assets/main/images/image_1.jpg">
						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_2.jpg">
						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_3.jpg">

						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_1.png">
						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_2.jpg">
						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_3.jpg">
						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_4.jpg">
					</div>

					<img id="slideRight" class="arrow" src="<?= ROOT?>/assets/main/images/right-arrow.png">
				</div>
			</div>
		</div>
		<div class="d-flex align-items-center mt-5 mr-5 justify-content-end">
			<p><a href="<?=ROOT?>university_gallery" class="more">More Gallery
					<span class="fa-solid fa-arrow-right "></span></a>
			</p>
		</div>
	</section>

	<script type="text/javascript">
		let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('mouseover', function(){
				console.log(activeImages)
				
				if (activeImages.length > 0){
					activeImages[0].classList.remove('active')
				}
				

				this.classList.add('active')
				document.getElementById('featured').src = this.src
			})
		}


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft += 180
		})


	</script>
	<!-- <section class="ftco-gallery mt-5">
		<div class="container-wrap">
			<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="<?=ROOT?>assets/main/images/course-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=ROOT?>assets/main/images/course-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="<?=ROOT?>assets/main/images/course-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=ROOT?>assets/main/images/image_2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="<?=ROOT?>assets/main/images/course-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=ROOT?>assets/main/images/image_3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="<?=ROOT?>assets/main/images/course-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=ROOT?>assets/main/images/image_4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
		</div>
		</div>
    </section> -->

		


<?php include '../app/views/includes/footer.view.php'; ?>
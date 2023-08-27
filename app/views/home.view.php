<?= $this-> view('includes/header', $data);   ?>
	<!-- Announcements -->
	<div class="container-xxl announcement">
		<div class="announcement-container">
			
			
			<img src="<?=ROOT?>/assets/images/image-school/announcement1.png" class="title" alt="">
			
			<p class="announce">ANNOUNCEMENT</p>

			<div class="news">
				<ul>
				<?php if(!empty($announcements)):?>
                    <?php foreach($announcements as $announcement):?>
						<li>
							<?= $announcement->description;?>
						</li>
					<?php endforeach; ?>
                <?php else : ?>
                    <center><h1>NO ANNOUNCEMENTS FOUND</h1></center>
                <?php endif;?>

					
				</ul>
			</div>
    	</div>
	</div>
	 
    
    <section class="home-slider owl-carousel">
	  <div class="slider-item" style="background-image:url(<?= get_image($SETTINGS['Cover-photo 2'] ?? "Rafa")?>);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
          </div>
        </div>
        </div>
      </div>
    </section>
		<div class="container-fluid py-5" data-aos="fade-up">
			<div class="container py-5">
				<div class="section-title text-center position-relative pb-3 mb-5 mx-auto "  style="max-width: 600px;">
					<h5 class="fw-bold text-primary text-uppercase">Why Choose Us</h5>
					<h1 class="m-0">Why You Should Start Learning with Us?</h1>
				</div>
				<div class="row g-5">
					<div class="col-lg-4">
						<div class="row g-5">
							<div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
								<div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
									<i class="fa fa-cubes text-white"></i>
								</div>
								<h4>Exceptional Academic Programs</h4>
								<p class="mb-0">We take pride in offering a wide range of cutting-edge academic programs designed to prepare students for success in today's dynamic world.</p>
							</div>
							<div class="col-12 wow fadeInUp my-3" data-wow-delay="0.4s">
								<div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
									<i class="fa fa-award text-white"></i>
								</div>
								<h4>Academic Excellence</h4>
								<p class="mb-0">Our renowned faculty members are leaders in their fields, ensuring that you receive a world-class education.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 mb-3"  data-wow-delay="0.6s" style="min-height: 350px;">
						<div class="position-relative h-100">
							<img class="position-absolute w-100 h-100 rounded" data-aos-duration="0.1s" src="<?=ROOT?>assets/main/images/about.jpg" style="object-fit: cover;">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="row g-5">
							<div class="col-12 wow fadeInUp" data-wow-delay="0.8s">
								<div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
									<i class="fa fa-users-cog text-white"></i>
								</div>
								<h4>State-of-the-Art Facilities</h4>
								<p class="mb-0">We believe that an exceptional learning environment is essential for your success. That's why we've invested in state-of-the-art facilities, laboratories, libraries, and study spaces that support your academic pursuits.</p>
							</div>
							<div class="col-12 wow fadeInUp mt-3" data-wow-delay="1s" >
								<div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
									<i class="fa fa-phone-alt text-white"></i>
								</div>
								<h4>24/7 Support</h4>
								<p class="mb-0">We prioritize your success and well-being.  We ensure that you receive the guidance you need to thrive both academically and personally.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
    	</div>

		<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(<?= ROOT?>/assets/images/image-school/school-2.jpg);" data-stellar-background-ratio="0.5">
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

		<section class="ftco-section">
			<div class="container-fluid px-4">
				<div class="row justify-content-center mb-5 pb-2">
					<div class="col-md-8 text-center heading-section ftco-animate">
						<h2 class="mb-4"><span>Our</span> <span class="text-primary">Courses</span></h2>
						<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
					</div>
        		</div>	
				<div class="row">
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(<?=ROOT?>assets/main/images/course-1.jpg);"></div>
						<div class="text pt-4">
							<p class="meta d-flex justify-content-center align-items-center text-center">
								<span><i class="fa-regular fa-calendar-days mr-2"></i>4 Years</span>
							</p>
							<h3><a href="#">Electric Engineering</a></h3>
							<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							<p><a href="#" class="btn btn-primary">Apply now</a></p>
						</div>
					</div>
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(<?=ROOT?>assets/main/images/course-2.jpg);"></div>
						<div class="text pt-4">
							<p class="meta d-flex justify-content-center align-items-center text-center">
								<span><i class="fa-regular fa-calendar-days mr-2"></i>4 Years</span>
							</p>
							<h3><a href="#">Electric Engineering</a></h3>
							<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							<p><a href="#" class="btn btn-primary">Apply now</a></p>
						</div>
					</div>
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(<?=ROOT?>assets/main/images/course-3.jpg);"></div>
						<div class="text pt-4">
							<p class="meta d-flex justify-content-center align-items-center text-center">
								<span><i class="fa-regular fa-calendar-days mr-2"></i>4 Years</span>
							</p>
							<h3><a href="#">Electric Engineering</a></h3>
							<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							<p><a href="#" class="btn btn-primary">Apply now</a></p>
						</div>
					</div>
					<div class="col-md-3 course ftco-animate">
						<div class="img" style="background-image: url(<?=ROOT?>assets/main/images/course-4.jpg);"></div>
						<div class="text pt-4">
							<p class="meta d-flex justify-content-center align-items-center text-center">
								<span><i class="fa-regular fa-calendar-days mr-2"></i>4 Years</span>
							</p>
							<h3><a href="#">Electric Engineering</a></h3>
							<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
							<p><a href="#" class="btn btn-primary">Apply now</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Teachers -->
		<section class="py-5 bg-light">
			<div class="container-fluid">
				<div class="row justify-content-center mb-5 pb-2">
					<div class="col-md-8 text-center heading-section ftco-animate">
						<h2 class="mb-4"> <span class="text-dark"> Meet Our</span> <span class="text-primary">Teachers</span> </h2>
						<p>Our highly qualified teachers put in their best efforts for outstanding results in both studies and co-curricular activities.</p>
					</div>
        		</div>	
				<div class="row justify-content-center">
					<?php if(!empty($teachers)): ?>
						<?php foreach($teachers as $teacher): ?>
							<div class="col-md-6 col-lg-4 ftco-animate">
								<div class="staff">
									<div class="img-wrap d-flex align-items-stretch">
										<div class="img align-self-stretch" style="background-image: url(<?=get_image($teacher->image)?>);"></div>
									</div>
									<div class="text pt-3 text-center">
										<h3><?= esc($teacher->name). "," . esc($teacher->suffixes)?></h3>
										<span class="position mb-2"><?= esc($teacher->position) ?></span>
										<div class="faded">
											<p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>
											<ul class="ftco-social text-center">
											</ul>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else:?>
						<div class="bg-danger p-5 mb-5 mx-auto text-center">
							<h2 class="lead display-4">NO TEACHERS AVAILABLE</h2>
						</div>
					<?php endif; ?>
				</div>
				<div class="float-right">
					<a href="<?=ROOT?>/home/teachers"> See more <i class="fa-solid fa-arrow-right"></i></a>
				</div>
			</div>
		</section>

	<section class="pt-80 pb-80 bg-dark" style="background-image: url(<?=ROOT?>assets/main/images/bg-pattern.png)">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<h3 class="text-white font36 motto-text"> <span class="text-primary">Creativity</span> , <span class="text-primary">passion</span>  and <span class="text-primary">excellence</span> . We discover the hidden genius in every child.</h3>
				</div>
			</div>
		</div>
	</section>

    <!-- <section class="ftco-section ftco-counter  img" id="section-counter"  style="background-image: url(<?=ROOT?>assets/main/images/bg_5.jpg);" data-stellar-background-ratio="0.5" id="contact">

    	<div class="container">
    		<div class="row justify-content-end">
    			<div class="col-md-6 py-5 px-md-5">
    				<div class="py-md-5">
                        <div class="heading-section heading-section-white ftco-animate mb-5">
                            <h2 class="mb-4">Request A Quote</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        </div>
		                <form action="#" class="appointment-form ftco-animate">
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="text" class="form-control" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="" id="" class="form-control">
                                                <option value="">Select Your Course</option>
                                            <option value="">Art Lesson</option>
                                            <option value="">Language Lesson</option>
                                            <option value="">Music Lesson</option>
                                            <option value="">Sports</option>
                                            <option value="">Other Services</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="d-md-flex">
                                <div class="form-group">
                                    <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group ml-md-4">
                                    <input type="submit" value="Request A Quote" class="btn btn-primary py-3 px-4">
                                </div>
                            </div>
                        </form>
		    		</div>
    			</div>
            </div>
    	</div>
    </section> -->

		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-2">
					<div class="col-md-8 text-center heading-section ftco-animate">
						<h2 class="mb-4"><span>Recent</span> <span class="text-primary">News</span></h2>
						<p>Explore the recent news and happenings in our university</p>
					</div>
				</div>
				<div class="row justify-content-center ">
				<?php if(!empty($news)):?>
                    <?php foreach($news as $row):?>
						
						<div class="col-md-6 col-lg-4 ftco-animate">
							<div class="blog-entry" >
								<a href="<?=ROOT?>newsDetail/<?=$row->slug?>" class="block-20 d-flex align-items-end" width="200" height="250" style="background-image: url(<?= get_image($row->image) ?>); object-fit:cover;">
									<div class="meta-date text-center p-2">

									<span class="text-whote"><?= get_date($row->date)?></span> 
									</div>
								</a>
								<div class="text bg-white p-4" style="height:250px;">
									<h3 class="heading"><a href="<?=ROOT?>newsDetail/<?=$row->slug?>"><?= substr($row->title, 0,20)?></a></h3>
									<p><?=substr($row->description, 0,100)?></p>
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
			</div>
		</section>

		<section class="ftco-section testimony-section">
	  <div class="container">
		<div class="row justify-content-center mb-5 pb-2">
		  <div class="col-md-8 text-center heading-section ftco-animate">
			<h2 class="mb-4">Student Says About Us</h2>
			<p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
		  </div>
		</div>
		<div class="row ftco-animate justify-content-center">
		  <div class="col-md-12">
			<div class="carousel-testimony owl-carousel">
			  <div class="item">
				<div class="testimony-wrap d-flex">
				  <div class="user-img mr-4" style="background-image: url(<?=ROOT?>assets/main/images/teacher-1.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Racky Henderson</p>
                    <span class="position">Father</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(<?=ROOT?>assets/main/images/teacher-2.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Henry Dee</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(<?=ROOT?>assets/main/images/teacher-3.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Mark Huff</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(<?=ROOT?>assets/main/images/teacher-4.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Rodel Golez</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap d-flex">
                  <div class="user-img mr-4" style="background-image: url(<?=ROOT?>assets/main/images/teacher-1.jpg)">
                  </div>
                  <div class="text ml-2">
                  	<span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Ken Bosh</p>
                    <span class="position">Mother</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

	<section class="ftco-gallery">
		<div class="container-wrap">
			<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="images/image_1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=ROOT?>assets/main/images/course-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=ROOT?>assets/main/images/image_2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=ROOT?>assets/main/images/image_3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=ROOT?>assets/main/images/image_4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="fa-solid fa-image"></span>
						</div>
						</a>
					</div>
		</div>
		</div>
    </section>

		


<?php include '../app/views/includes/footer.view.php'; ?>
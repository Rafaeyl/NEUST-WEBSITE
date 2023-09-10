<?= $this-> view('includes/header', $data); ?>

<?php $news_slug = $collegeInfo['slug'] ?? 'not slug';?>

<?php if($news_slug != 'not slug'): ?>

    <?php if(!empty($collegeInfo)):?>
        <section class="hero-wrap hero-wrap-2" style="background-image: url('<?=get_img($collegeInfo['cover_photo'])?>');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <h1 class="mb-2 bread"><?=esc($collegeInfo['name'])?></h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home &nbsp; <i class="fa-solid fa-arrow-right"></i></a></span> <span>Colleges</span></p>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <p class="bg-danger mx-auto text-center text-white p-5">No Information Available to this Organization.</p>
    <?php endif;?>

           <!-- About Start -->
           <div class="container-xxl py-5 my-5">
            <div class="container">
                <div class="row g-5 align-items-center">

                <?php if(!empty($collegeAbout)):?>
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase text-center">About Us</h6>
                        <h2 class="mb-4 text-center fw-bolder"><?= $collegeAbout['title']; ?></h2>
                        <p class="mb-4"><?= $collegeAbout['description']; ?></p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?= $collegeAbout['students']; ?></h2>
                                        <p class="mb-0">Students</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?= $collegeAbout['activities']; ?></h2>
                                        <p class="mb-0">Activities</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up"><?= $collegeAbout['events']; ?></h2>
                                        <p class="mb-0">Events</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="row g-3">
                            <img src="<?=get_img($collegeAbout['image'])?>" style="width: 100%; height: 500px; object-fit:cover;" alt="" class="img-fluid img-rounded">
                        </div>
                    </div>
                <?php else: ?>
                    <p class="bg-danger mx-auto text-center text-white p-5">No Information Available to this Organization.</p>
                <?php endif;?>
                </div>
            </div>
        </div>
        <!-- About End -->

    <div class="ftco-section py-5 mt-5">
         <!-- Contact Start -->
         <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Contact Us</h6>
                    <h1 class="mb-5"><span class="text-primary text-uppercase">Contact</span> For Any Query</h1>
                </div>
                <?php
                    if (isset($_SESSION['status'])) { ?>

                        <script>
                            swal({
                            title: "<?= $_SESSION['status']?>",
                            icon: "success",
                            });
                        </script>
                    
                        <?php
                        unset($_SESSION['status']);
                    }elseif(isset($_SESSION['error'])) { ?>

                        <script>
                            swal({
                            title: "There is something wrong!",
                            text: "<?= $_SESSION['error']?>",
                            icon: "error",
                            });
                        </script>
                    
                        <?php
                        unset($_SESSION['error']);  }
                ?>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                        <?php if(!empty($collegeInfo)):?>
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase"><i class="fa fa-envelope-open text-tertiary me-2"></i> &nbsp; Email</h6>
                                <p> <a href="mailto:<?=esc($collegeInfo['email'])?>"  class="text-dark"><?=esc($collegeInfo['email'])?></a></p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase"><i class="fa fa-envelope-open text-tertiary me-2"></i> &nbsp; Phone</h6>
                                <p> <?=$collegeInfo['phone']?></p>
                            </div>
                            <div class="col-md-4">
                                <h6 class="section-title text-start text-primary text-uppercase"><i class="fa fa-envelope-open text-tertiary me-2"></i> &nbsp;Facebook</h6>
                                <p> <a href="<?=$collegeInfo['fb_link']?>" class="text-secondary">Facebook Link</a> </p>
                            </div>
                        <?php else: ?>
                            <p class="bg-danger mx-auto text-center text-white p-2">No Information Available to this Organization.</p>
                        <?php endif;?>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.2s">
                            <form  action="" method="POST">
                                <div class="row g-3 ">
                                    <div class="col-md-6 my-2">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>

                                        </div>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                            
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required> 
                                    
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        <div class="form-floating">
                                            <textarea id="message" name="message" class="form-control" placeholder="Leave a message here" name="" id="" cols="30" rows="10" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="send">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
    </div>

    <!-- Officiers Start -->
    <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Officers</h6>
                    <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Officers</span></h1>
                </div>
                <div class="row g-4 justify-content-center">
                <?php if(!empty($collegeOfficials)):?>
                    <?php foreach($collegeOfficials as $official): ?>
                        <div class="col-lg-3 col-md-6 wow fadeInUp mt-3" data-wow-delay="0.1s">
                            <div class="rounded shadow overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid w-100" style="min-height: 250px; max-height: 250px; background-size: cover;" src="<?= get_image($official->image) ?>" alt="">
                                </div>
                                <div class="text-center p-4 mt-3">
                                    <h5 class="fw-bold mb-0"><?=$official->official_name?></h5>
                                    <small><?=$official->position?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                <?php else: ?>
                    <p class="bg-danger mx-auto text-center text-white p-5">No Officers Available to this Organization.</p>
                <?php endif;?>
                </div>
            </div>
    </div>
    <!-- Team End -->

<?php else: ?>
    <div class="container">
        <div class=" p-5 my-5 bg-danger">
            <h2 class="lead text-center text-white">
                The page you requested may have been moved to a new location or the College does not have any information yet.
                Go back to the <a href="<?= ROOT ?>" class="text-dark">HOME PAGE </a>.
            </h2>

        </div>
    </div>
<?php endif; ?>
    <?php include '../app/views/includes/footer.view.php'; ?>
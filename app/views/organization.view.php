<?= $this-> view('includes/header', $data); ?>

<?php $news_slug = $organizationInfo['slug'] ?? 'not slug';?>

<?php if($news_slug != 'not slug'): ?>

    <?php if(!empty($organizationInfo)):?>
        <section class="hero-wrap hero-wrap-2" style="background-image: url('<?=get_img($organizationInfo['cover_photo'])?>');">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <h1 class="mb-2 bread"><?=esc($organizationInfo['name'])?></h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home &nbsp; <i class="fa-solid fa-arrow-right"></i></a></span> <span>Organization </span></p>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <p class="bg-danger mx-auto text-center text-white p-5">No Information Available to this Organization.</p>
    <?php endif;?>

     <!-- About Us -->
   
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="section-title row text-center">
                    <div class="col-md-8 offset-md-2  text-center heading-section ftco-animate">
                        <h2 class="mb-4"><span>About</span> Our Organization</h2>
                        <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
                    </div>
                </div><!-- end title -->
            
                <div class="row align-items-center mt-5">
                <?php if(!empty($organizationAbout)):?>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div>
                            <h2 class="text-center"><?= $organizationAbout['title']; ?></h2>
                            <p><?= $organizationAbout['description']; ?></p>
        
                        </div><!-- end messagebox -->
                    </div><!-- end col -->
                    
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="post-media wow fadeIn">
                            <img src="<?=get_img($organizationAbout['image'])?>" alt="" class="img-fluid img-rounded" style="width: 100%; height: 300px; object-fit:contain;">
                        </div><!-- end media -->
                    </div><!-- end col -->
                <?php else: ?>
                    <p class="bg-danger mx-auto text-center text-white p-5">No Information Available to this Organization.</p>
                <?php endif;?>
                </div>
            </div><!-- end container -->
        </section> 
    
    
      <!-- Contact Start -->
   <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="section-title row text-center mb-5">
                <div class="col-md-8 offset-md-2  text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Contact Us</span></h2>
                    <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
                </div>
            </div><!-- end title -->
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
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="bg-light d-flex flex-column justify-content-center px-3" style="height: 450px;">
                    <?php if(!empty($organizationInfo)):?>
                            <div class="d-flex align-items-center mb-3">
                                <div class="d-none d-md-block">
                                    <div class="btn-icon bg-info mr-4 con-name">
                                        <i class="fa-solid fa-location-dot mr-2 fa-2x text-white"></i>
                                    </div>
                                </div>
                                
                                <div class="con-name">
                                    <h4>Our Location</h4>
                                    <p class="m-0">Brgy. Concepcion General Tinio Nueva Ecija, General Tinio, Philippines</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="d-none d-md-block">
                                    <div class="btn-icon bg-dark mr-4 con-name">
                                        <i class="fa fa-2x fa-phone text-white"></i>
                                    </div>
                                </div>
                                <div class="con-name">
                                    <h4>Call Us</h4>
                                    <p class="m-0"><?=esc($organizationInfo['phone'])?></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="d-none d-md-block">
                                    <div class="btn-icon bg-warning mr-4 con-name">
                                        <i class="fa fa-2x fa-envelope text-white"></i>
                                    </div>
                                </div>
                                <div class="con-name">
                                    <h4>Email Us</h4>
                                    <p class="m-0"><a href="mailto:<?=esc($organizationInfo['email'])?>"  class="text-dark"><?=esc($organizationInfo['email'])?></a> </p>
                                </div>
                            </div>
                        <?php else: ?>
                            <p class="bg-danger mx-auto text-center text-white p-2">No Information Available to this Organization.</p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4 mt-3">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Need Help?</h6>
                        <h1 class="display-4">Send Us A Message</h1>
                    </div>
                    <div class="contact-form">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" name="name" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" name="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Subject" required="required">
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Message" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit" name="send">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

  <!-- our -->
<!-- <div id="important" class="important">
   
    <div class="important_bg">
        <div class="container">
        <div class="row">
            <?php if(!empty($organizationAbout)):?>
                <div class="col col-xs-12">
                <div class="important_box">
                    <h3 data-toggle="counter-up"><?= $organizationAbout['students'];?></h3>
                    <span>Members</span>
                </div>
                </div>
                <div class="col col-xs-12">
                <div class="important_box">
                    <h3 data-toggle="counter-up"><?= $organizationAbout['activities'];?></h3>
                    <span>Activities</span>
                </div>
                </div>
                <div class="col col-xs-12">
                <div class="important_box">
                    <h3 data-toggle="counter-up"><?= $organizationAbout['events'];?></h3>
                    <span>Events</span>
                </div>
                </div>
            <?php else: ?>
                <p class="bg-danger mx-auto text-center text-white p-5">No Information Available to this Organization.</p>
            <?php endif;?>
        </div>
        </div>
    </div>
</div> -->

    <!-- Officers -->
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2  text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span> Officers Of <?=esc($organizationInfo['name'])?></span></h2>
                    <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
                </div>
            </div><!-- end title -->
            
            <div class="row text-center g-4 justify-content-center mt-5">
                <?php if(!empty($organizationOfficials)):?>
                    <?php foreach($organizationOfficials as $official): ?>
                        <div class="col-lg-3 col-sm-4 wow fadeInUp">
                            <div class="team-member">
                                <img src="<?= get_image($official->image) ?>" alt="">
                                <div style="min-height: 130px;">
                                    <h5 class="my-3"><?=$official->official_name?></h5>
                                    <p><?=$official->position?></p>
                                </div>
                            </div>
                        </div>  
                    <?php endforeach;?>
                <?php else: ?>
                    <p class="bg-danger mx-auto text-center text-white p-5">No Officers Available to this Organization.</p>
                <?php endif;?>
            </div>
        </div>
     
    </section>
    
<?php else: ?>
    <div class="container">
        <div class=" p-5 my-5 bg-danger">
            <h2 class="lead text-center text-white">
                The page you requested may have been moved to a new location or the Organization does not have any information yet.
                Go back to the <a href="<?= ROOT ?>" class="text-dark">HOME PAGE </a>.
            </h2>

        </div>
    </div>
<?php endif; ?>

    <?php include '../app/views/includes/footer.view.php'; ?>
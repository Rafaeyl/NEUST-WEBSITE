<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="fa-solid fa-location-dot mr-2"> </span><span class="text"> Brgy. Conception, General Tinio, Nueva Ecija</span></li>
	                <li><a href="#"><span class="fa-solid fa-phone mr-2"></span><span class="text"><?= $school_contact[0]->phone?></span></a></li>
	                <li><a href="#"><span class="fa-solid fa-envelope mr-2"></span><span class="text"><?= $school_contact[0]->email?></span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Recent News</h2>
              <div class="block-21 mb-5 d-flex">
                <a class="blog-img mr-4" style="background-image: url(<?=get_image($news_footer['image'])?>);"></a>
                <div class="text">
                  <h6><a href="<?=ROOT?>newsDetail/<?=$news_footer['slug']?>"><?= substr($news_footer['title'], 0,30) . '...'?></a></h6>
                  <div class="meta">
                    <div><a href="#"><span class="fa-regular fa-calendar-days"></span> <?= get_date($news_footer['date'])?></a></div>
                    <div><a href="#"><span class="fa-solid fa-user"></span> Admin</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="<?=ROOT?>/home/"><span class="fa-solid fa-arrow-right  mr-2"></span>Home</a></li>
                <li><a href="<?=ROOT?>/home/history"><span class="fa-solid fa-arrow-right  mr-2"></span>History</a></li>
                <li><a href="<?=ROOT?>/home/teachers"><span class="fa-solid fa-arrow-right  mr-2"></span>Teachers</a></li>
                <li><a href="<?=ROOT?>/home/contact"><span class="fa-solid fa-arrow-right  mr-2"></span>Contact</a></li>
                <li><a href="<?=ROOT?>/login"><span class="fa-solid fa-arrow-right  mr-2"></span>Login</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="fab fa-facebook-f"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This Website is made with <i class="fa-solid fa-heart" aria-hidden="true"></i> by <?= $SETTINGS['Designed by'] ?? "Rafa"?>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?=ROOT?>assets/main/js/jquery.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/popper.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/popper.js"></script>
  <script src="<?=ROOT?>assets/main/js/bootstrap.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/jquery.easing.1.3.js"></script>
  <script src="<?=ROOT?>assets/main/js/jquery.waypoints.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/jquery.stellar.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/owl.carousel.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/accordion.js"></script>
  <script src="<?=ROOT?>assets/main/js/jquery.magnific-popup.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/aos.js"></script>
  <script src="<?=ROOT?>assets/main/js/jquery.animateNumber.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?=ROOT?>assets/main/js/google-map.js"></script>
  <script src="<?=ROOT?>assets/main/js/wow/wow.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/counterup/counterup.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/waypoints/waypoints.min.js"></script>
  <script src="<?=ROOT?>assets/main/js/main1.js"></script>
  <script src="<?=ROOT?>assets/main/js/slider1.js"></script>
  </body>
</html>
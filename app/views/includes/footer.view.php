<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container-fluid">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 text-primary">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="fa-solid fa-location-dot mr-2"> </span><span class="text"> Brgy. Conception, General Tinio, Nueva Ecija</span></li>
	                <li><span class="fa-solid fa-phone mr-2"></span><span class="text"><?= $school_contact[0]->phone?></span></li>
	                <li><span class="fa-solid fa-envelope mr-2"></span><span class="text"><?= $school_contact[0]->email?></span></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61544.24564958052!2d120.96213983005357!3d15.402711909364873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339724981f72b52f%3A0xaab029753d9a2287!2sNueva%20Ecija%20University%20of%20Science%20and%20Technology%20-%20Papaya!5e0!3m2!1sen!2sph!4v1680485889693!5m2!1sen!2sph" 
            frameborder="0" style="border:0; max-height:250px;  min-height:200px;" allowfullscreen="" aria-hidden="false"
            tabindex="0" id="map"></iframe>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2 text-primary">Links</h2>
              <ul class="list-unstyled">
                <li><a href="<?=ROOT?>/home/"><span class="fa-solid fa-arrow-right  mr-2"></span>Home</a></li>
                <li><a href="<?=ROOT?>/home/history"><span class="fa-solid fa-arrow-right  mr-2"></span>History</a></li>
                <li><a href="<?=ROOT?>/home/faqs"><span class="fa-solid fa-arrow-right  mr-2"></span>FAQs</a></li>
                <li><a href="<?=ROOT?>/home/contact"><span class="fa-solid fa-arrow-right  mr-2"></span>Contact</a></li>
                <li><a href="<?=ROOT?>/login"><span class="fa-solid fa-arrow-right  mr-2"></span>Login</a></li>

              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 text-primary mb-0">Connect With Us</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="https://www.facebook.com/NEUSTPAPAYA/"><span class="fab fa-facebook-f"></span></a></li>
                <li class="ftco-animate"><a href="mailto:<?= $school_contact[0]->email?>"><span class="fa-solid fa-envelope"></span></a></li>
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
  <script src="<?=ROOT?>assets/main/js/main6.js?t=<?= time();?>"></script>
  <script src="<?=ROOT?>assets/main/js/slider1.js"></script>

  </body>
</html>
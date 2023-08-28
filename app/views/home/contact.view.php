<?= $this-> view('includes/header', $data); ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= ROOT?>/assets/images/image-school/school-1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Contact Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="fa-solid fa-arrow-right"></i></a></span> <span>Contact <i class="fa-solid fa-arrow-right"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex contact-info">
          <div class="col-md-4 d-flex">
          	<div class="bg-info align-self-stretch box p-4 text-center">
          		<h3 class="mb-4 text-white">Address</h3>
	            <p class="text-white">198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="bg-dark  align-self-stretch box p-4 text-center">
          		<h3 class="mb-4 text-white">Contact Number</h3>
	            <p><a href="tel://1234567920"class="text-white">+ 1235 2355 98</a></p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="bg-primary align-self-stretch box p-4 text-center">
          		<h3 class="mb-4 text-white">Email Address</h3>
	            <p><a href="mailto:faeyldojo@gmail.com"  class="text-white">info@yoursite.com</a></p>
	          </div>
          </div>
        </div>
      </div>
    </section>
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

		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section mb-5">
			<div class="container mb-5">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-6 p-4 p-md-5 order-md-last bg-light mb-5">
						<form action="" method="POST">
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="email"  name="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text"  name="subject" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="send" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
					</div>
					<div class="col-md-6 d-flex align-items-stretch mb-5">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61544.24564958052!2d120.96213983005357!3d15.402711909364873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339724981f72b52f%3A0xaab029753d9a2287!2sNueva%20Ecija%20University%20of%20Science%20and%20Technology%20-%20Papaya!5e0!3m2!1sen!2sph!4v1680485889693!5m2!1sen!2sph" 
            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0" id="map"></iframe>
					</div>
				</div>
			</div>
		</section>


		

    <?php include '../app/views/includes/footer.view.php'; ?>
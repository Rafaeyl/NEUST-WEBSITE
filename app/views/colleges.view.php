<?= $this->view('includes/header', $data); ?>

<?php $news_slug = $collegeInfo['slug'] ?? 'not slug'; ?>

<?php if ($news_slug != 'not slug'): ?>

    <?php if (!empty($collegeInfo)): ?>
        <section class="hero-wrap-ins hero-wrap-2" style="background-image: url('<?= get_img($collegeInfo['cover_photo']) ?>');">
            <!-- <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center">
                        <h1 class="mb-2 bread"><?= esc($collegeInfo['name']) ?></h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home &nbsp; <i class="fa-solid fa-arrow-right"></i></a></span> <span>Colleges</span></p>
                    </div>
                </div>
            </div> -->
        </section>
    <?php else: ?>
        <p class="bg-danger mx-auto text-center text-white p-5">No Information Available to this Organization.</p>
    <?php endif; ?>

    <!-- About Start -->
    <div class="container-xxl py-5 my-5">
        <div class="container">
            <div class="row g-5 align-items-center">

                <?php if (!empty($collegeAbout)): ?>
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase text-center">About Us</h6>
                        <h2 class="mb-4 text-center fw-bolder">
                            <?= $collegeAbout['title']; ?>
                        </h2>
                        <p class="mb-4">
                            <?= $collegeAbout['description']; ?>
                        </p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4 bg-primeLight">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">
                                            <?= $collegeAbout['students']; ?>
                                        </h2>
                                        <p class="mb-0">Students</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4 bg-primeLight">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">
                                            <?= $collegeAbout['activities']; ?>
                                        </h2>
                                        <p class="mb-0">Activities</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4 bg-primeLight">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">
                                            <?= $collegeAbout['events']; ?>
                                        </h2>
                                        <p class="mb-0">Events</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Explore More</a> -->
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="row g-3">
                            <img src="<?= get_img($collegeAbout['image']) ?>"
                                style="width: 100%; height: 500px; object-fit:contain;" alt="" class="img-fluid img-rounded">
                        </div>
                    </div>
                <?php else: ?>
                    <p class="bg-danger mx-auto text-center text-white p-5">No Information Available to this Organization.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Officiers Start -->

    <!-- Team End -->
    <!-- Officers -->
    <section class="ftco-section p-3 ">
        <div class="container-fluid bg-light">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2  text-center heading-section ftco-animate">
                    <h6 class="text-primary mt-5">Officers</h6>
                    <h1 class="mb-5">Meet Our <span class="text-primary text-uppercase">Officers</span></h1>
                </div>
            </div><!-- end title -->

            <div class="row text-center g-4 justify-content-center">
                <?php if (!empty($collegeOfficials)): ?>
                    <?php foreach ($collegeOfficials as $official): ?>
                        <div class="col-lg-3 col-md-3 wow fadeInUp bg-primeLight m-2 py-3">
                            <div class="team-member">
                                <img src="<?= get_image($official->image) ?>" alt="">
                                <div style="min-height: 100px;">
                                    <h6 class="mt-3"><?= $official->official_name ?></h6>
                                    <p class="text-primary"><?= $official->position ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="bg-danger mx-auto text-center text-white p-5">No Officers Available to this Organization.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
            <section class="ftco-section">
                <div class="container-fluid px-4">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="section-title text-center text-primary text-uppercase"> Instructors</h6>
                        <h1 class="mb-5">Meet Our <span class="text-primary text-uppercase">Instructors</span></h1>
                    </div>

                    <div class="row justify-content-center">
                        <?php if (!empty($teachers)): ?>
                            <?php foreach ($teachers as $teacher): ?>
                                <div class="col-md-6 col-lg-3 ftco-animate">
                                    <div class="staff">
                                        <div class="img-wrap d-flex align-items-stretch">
                                            <div class="img align-self-stretch"
                                                style="background-image: url(<?= get_image($teacher->image) ?>);"></div>
                                        </div>
                                        <div class="text p-3 text-center bg-primeLight">
                                            <h6 class="fw-bolder fw-dark">
                                                <?= esc($teacher->name) . "," . esc($teacher->suffixes) ?>
                                            </h6>
                                            <span class="position mb-2">
                                                <?= esc($teacher->position) ?>
                                            </span>
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
                                <h2 class="lead display-4">NO TEACHERS AVAILABLE</h2>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <div class="container">
                <div class=" p-5 my-5 bg-danger">
                    <h2 class="lead text-center text-white">
                        The page you requested may have been moved to a new location or the College does not have any
                        information yet.
                        Go back to the <a href="<?= ROOT ?>" class="text-dark">HOME PAGE </a>.
                    </h2>

                </div>
            </div>
        <?php endif; ?>
        <div class="ftco-section py-5 mt-5 bg-light">
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
                                title: "<?= $_SESSION['status'] ?>",
                                icon: "success",
                            });
                        </script>

                        <?php
                        unset($_SESSION['status']);
                    } elseif (isset($_SESSION['error'])) { ?>

                        <script>
                            swal({
                                title: "There is something wrong!",
                                text: "<?= $_SESSION['error'] ?>",
                                icon: "error",
                            });
                        </script>

                        <?php
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="row gy-4">
                                <?php if (!empty($collegeInfo)): ?>
                                    <div class="col-md-4">
                                        <h6 class="section-title text-start text-primary text-uppercase"><i
                                                class="fa fa-envelope-open text-tertiary me-2"></i> &nbsp; Email</h6>
                                        <p> <a href="mailto:<?= esc($collegeInfo['email']) ?>" class="text-dark">
                                                <?= esc($collegeInfo['email']) ?>
                                            </a></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="section-title text-start text-primary text-uppercase"><i
                                                class="fa fa-envelope-open text-tertiary me-2"></i> &nbsp; Phone</h6>
                                        <!-- <p> <?= $collegeInfo['phone'] ?></p> -->
                                        <p> <a href="tel:+<?= esc($collegeInfo['phone']) ?>" class="text-dark">
                                                <?= esc($collegeInfo['phone']) ?>
                                            </a></p>

                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="section-title text-start text-primary text-uppercase"><i
                                                class="fa fa-envelope-open text-tertiary me-2"></i> &nbsp;Facebook</h6>
                                        <p> <a href="<?= $collegeInfo['fb_link'] ?>" class="text-secondary">Facebook Link</a>
                                        </p>
                                    </div>
                                <?php else: ?>
                                    <p class="bg-danger mx-auto text-center text-white p-2">No Information Available to this
                                        Organization.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                            <iframe class="position-relative rounded w-100 h-100"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61544.24564958052!2d120.96213983005357!3d15.402711909364873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339724981f72b52f%3A0xaab029753d9a2287!2sNueva%20Ecija%20University%20of%20Science%20and%20Technology%20-%20Papaya!5e0!3m2!1sen!2sph!4v1680485889693!5m2!1sen!2sph"
                                frameborder="0" style="min-height: 350px; border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="col-md-6">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <form action="" method="POST">
                                    <div class="row g-3 ">
                                        <div class="col-md-6 my-2">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Your Name" required>

                                            </div>
                                        </div>
                                        <div class="col-md-6 my-2">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Your Email" required>

                                            </div>
                                        </div>
                                        <div class="col-12 my-2">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="subject" name="subject"
                                                    placeholder="Subject" required>

                                            </div>
                                        </div>
                                        <div class="col-12 my-2">
                                            <div class="form-floating">
                                                <textarea id="message" name="message" class="form-control"
                                                    placeholder="Leave a message here" name="" id="" cols="30" rows="10"
                                                    required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit" name="send">Send
                                                Message</button>
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



        <?php include '../app/views/includes/footer.view.php'; ?>
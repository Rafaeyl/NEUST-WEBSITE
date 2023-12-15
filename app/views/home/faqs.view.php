<?= $this->view('includes/header', $data); ?>

<!-- Page Header Start -->
<section class="hero-wrap hero-wrap-2 mb-0"
    style="background-image: url('<?= ROOT ?>/assets/images/image-school/school-1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Frequently Asked Questions</h1>
                <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home
                            <i class="fa-solid fa-arrow-right"></i></a></span> <span>Frequently Asked Questions
                        <i class="fa-solid fa-arrow-right"></i></span></p> -->
            </div>
        </div>
    </div>
</section>
<!-- Page Header End -->
<section class="ftco-section bg-light" id="FAQs">
    <div class="container p-3" >
        <div class="row justify-content-center mb-5 ">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h2 class="mb-4 text-primary">Frequently Asked Questions</h2>
                <p class="subheadings">Have questions? Look no further. Our Frequently Asked Questions (FAQ) make it
                    easy for you to find answers to your most pressing inquiries into the School of Education.
                    If you can't find your answer here, please feel free to <a
                        href="<?= ROOT ?>home/contact#contact">contact us</a>. </p>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-md-10 col-lg-10  p-5 bg-primeLight " style="border-radius:10px">
                <div id="accordion" class="myaccordion w-100">
                    <?php if (!empty($faqs)):
                        $num = 0; ?>
                        <?php foreach ($faqs as $row):
                            $ber = $num++; ?>
                            <div class="card">
                                <div class="card-header p-0" id="heading<?= $ber ?>">
                                    <button
                                        class="d-flex pl-4 align-items-center justify-content-between btn btn-link collapsed"
                                        data-toggle="collapse" data-target="#collapse<?= $ber ?>" aria-expanded="false"
                                        aria-controls="collapse<?= $ber ?>">
                                        <div class="heading d-flex align-items-center">
                                            <h3 class="mb-0 text-white">
                                                <?= $row->question ?>
                                            </h3>
                                        </div>
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <i class="fa" aria-hidden="true"></i>
                                        </div>
                                    </button>
                                </div>
                                <div id="collapse<?= $ber ?>" class="collapse" aria-labelledby="heading<?= $ber ?>"
                                    data-parent="#accordion">
                                    <div class="card-body p-4">
                                        <p>
                                            <?= $row->answer ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <center>
                            <h1 class="bg-danger p-5 text-white">NO FAQ FOUND</h1>
                        </center>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include '../app/views/includes/footer.view.php'; ?>
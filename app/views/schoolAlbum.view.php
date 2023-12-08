<?= $this->view('includes/header', $data); ?>

<section class="hero-wrap hero-wrap-2"
    style="background-image: url('<?= ROOT ?>/assets/images/image-school/school-1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">SCHOOL ALBUM</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">HOME <i
                                class="fa-solid fa-arrow-right"></i></a></span> <span>SCHOOL ALBUM<i
                            class="fa-solid fa-arrow-right"></i></span> </p>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="page-content">
                <div class="most-popular mb-5 bg-light">
                    <div class="row ">

                        <!-- Sidebar Start -->
                        <!-- <div class="col-lg-4">

                            <div class="mb-2 wow slideInUp" data-wow-delay="0.1s">
                                <div class="section-title-gallery section-title-gallery-sm position-relative pb-3 mb-4">
                                    <h3 class="mb-0">Recent Albums</h3>
                                </div>
                                <div class="d-flex rounded overflow-hidden mb-3">
                                    <img class="img-fluid" src="<?= ROOT ?>/assets/main/images/image_1.jpg"
                                        style="width: 75px; height: 75px; object-fit: cover;" alt="">
                                    <a href=""
                                        class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                                        dolor sit amet adipis elit
                                    </a>
                                </div>
                                <div class="d-flex rounded overflow-hidden mb-3">
                                    <img class="img-fluid" src="<?= ROOT ?>/assets/main/images/image_2.jpg"
                                        style="width: 75px; height: 75px; object-fit: cover;" alt="">
                                    <a href=""
                                        class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                                        dolor sit amet adipis elit
                                    </a>
                                </div>
                                <div class="d-flex rounded overflow-hidden mb-3">
                                    <img class="img-fluid" src="<?= ROOT ?>/assets/main/images/image_3.jpg"
                                        style="width: 75px; height: 75px; object-fit: cover;" alt="">
                                    <a href=""
                                        class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                                        dolor sit amet adipis elit
                                    </a>
                                </div>
                                <div class="d-flex rounded overflow-hidden mb-3">
                                    <img class="img-fluid" src="<?= ROOT ?>/assets/main/images/image_4.jpg"
                                        style="width: 75px; height: 75px; object-fit: cover;" alt="">
                                    <a href=""
                                        class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                                        dolor sit amet adipis elit
                                    </a>
                                </div>
                                <div class="d-flex rounded overflow-hidden mb-3">
                                    <img class="img-fluid" src="<?= ROOT ?>/assets/main/images/image_5.jpg"
                                        style="width: 75px; height: 75px; object-fit: cover;" alt="">
                                    <a href=""
                                        class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                                        dolor sit amet adipis elit
                                    </a>
                                </div>
                            </div>
                            <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                                <div class="section-title-gallery section-title-gallery-sm position-relative pb-3 mb-4">
                                    <h3 class="mb-0">Archives</h3>
                                </div>
                                <div class="d-flex rounded overflow-hidden mb-3">
                                    <img class="img-fluid" src="<?= ROOT ?>/assets/main/images/image_1.jpg"
                                        style="width: 75px; height: 75px; object-fit: cover;" alt="">
                                    <a href=""
                                        class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                                        dolor sit amet adipis elit
                                    </a>
                                </div>
                                <div class="d-flex rounded overflow-hidden mb-3">
                                    <img class="img-fluid" src="<?= ROOT ?>/assets/main/images/image_2.jpg"
                                        style="width: 75px; height: 75px; object-fit: cover;" alt="">
                                    <a href=""
                                        class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                                        dolor sit amet adipis elit
                                    </a>
                                </div>
                                <div class="d-flex rounded overflow-hidden mb-3">
                                    <img class="img-fluid" src="<?= ROOT ?>/assets/main/images/image_3.jpg"
                                        style="width: 75px; height: 75px; object-fit: cover;" alt="">
                                    <a href=""
                                        class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">Lorem ipsum
                                        dolor sit amet adipis elit
                                    </a>
                                </div>
                                <div class="sidebar-box mt-5">
                                    <p>
                                        <a href="<?= ROOT ?>newsAndEvents" class="more">
                                            See More Archives
                                            <span class="fa-solid fa-arrow-right "></span></a>
                                    </p>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-12 wow slideInUp" data-wow-delay="0.1s">
                            <div class="row justify-content-center">
                                <?php if (!empty($albums)): ?>
                                    <?php foreach ($albums as $album): ?>
                                        <div class="col-lg-4 mt-3">

                                            <a href="<?= ROOT ?>gallery/<?= $album->idg ?>">
                                                <div class="album-card card">
                                                    <div class="card-body album-images">
                                                        <img src="<?php if (!empty($album->file_name)) { ?>
                                                            <?= ROOT . 'uploads/' . $album->file_name; ?>" <?php } ?> class="img-fluid w-100"
                                                            alt="Album-Image">
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <h5 class="heading">
                                                            <?= $album->title ?>
                                                        </h5>
                                                        <span class="text-dark">
                                                            <?= get_date($album->modified) ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <center>
                                        <h1 class="text-danger">NO AlBUMS FOUND</h1>
                                    </center>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include '../app/views/includes/footer.view.php'; ?>
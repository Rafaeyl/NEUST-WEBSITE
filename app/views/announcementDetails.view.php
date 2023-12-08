<?= $this-> view('includes/header', $data);?>


  <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= ROOT?>/assets/images/image-school/school-1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">ANNOUNCEMENT DETAIL</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">HOME <i class="fa-solid fa-arrow-right"></i></a></span> <span>ANNOUNCEMENT <i class="fa-solid fa-arrow-right"></i></span> </p>
          </div>
        </div>
      </div>
    </section>

    <div class="container">
      <section class="my-5" id="">
        <div class="post-box-lg border">
            <div class="row align-items-center ml-1">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 bg-light p-5">
                    <div>
                        <h4 ><?= $row['title']; ?></h4>
                        <hr class="bg-primary">
                        <p><?= $row['description']; ?></p>
                        <div class="tag-widget post-tag-container">
                            <div class="tagcloud">
                                <span class="float-right fw-bolder"><?=get_date($row['date'] )?></span>
                            </div>
                        </div>
                    </div><!-- end messagebox -->
                </div><!-- end col -->

                <hr>
                
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="<?=get_image($row['image'])?>" alt="" class="img-fluid img-rounded" style="width: 100%; height: 280px; object-fit: cover;">
                    </div><!-- end media -->
                </div><!-- end col -->
            </div>
        </div>
      </section>
    </div>
   
        <div class="section-title row text-center">
            <div class="col-md-8 offset-md-2  text-center heading-section ftco-animate">
                <h3 class="mb-4 text-primary">OTHER ANNOUNCEMENTS</h3>
            </div>
        </div><!-- end title -->
        <div class="post container mb-5">
        <!-- Post 1 -->
        <div class="row ">
            <?php if(!empty($announce)):?>
                <?php foreach($announce as $ann):?>
                    <div class="col-md-6 col-lg-4 ftco-animate my-2">
                    <div class="post-box border">
                        <a href="<?=ROOT?>announcementDetails/<?=$ann->slug?>"><img src="<?=get_image($ann->image)?>" alt="" class="post-img"></a>
                        <a href="<?=ROOT?>announcementDetails/<?=$ann->slug?>" class="post-title"><?=$ann->title?></a>
                        <span class="post-date text-primary"><?=get_date($ann->date)?></span>
                        <p class="post-description">
                            <?php 
                                $des = strip_tags($ann->description); 
                                $des2 = str_replace("&nbsp;", "",$des);
                                echo substr($des2, 0,200);
                            ?>
                        </p>
                    </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <center><h1>NO ANNOUNCEMENTS FOUND</h1></center>
            <?php endif;?>
        </div>
   
    </div>

<?php include '../app/views/includes/footer.view.php'; ?>
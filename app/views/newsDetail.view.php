<?= $this-> view('includes/header', $data);?>

  <?php

  $news_slug = $row['slug'] ?? 'not slug';
  ?>

<?php if($news_slug != 'not slug'): ?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= ROOT?>/assets/images/image-school/school-1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">NEWS DETAIL</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">HOME <i class="fa-solid fa-arrow-right"></i></a></span> <span>NEWS <i class="fa-solid fa-arrow-right"></i></span> <span>NEWS DETAILS <i class="fa-solid fa-arrow-right"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		
		<section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3 text-justify"><?= $row['title']?></h2>
            <hr class="bg-darken">
            <p>
              <img src="<?=get_image($row['image'])?>" alt="" class="img-fluid w-100" >
            </p>
            <hr class="bg-darken">
            <p><?= $row['description']?></p>
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link bg-primary text-white"><?=$row['name'] ?? 'Uncategorized' ?></a>
                <span class="float-right fw-bolder"><?=get_date($row['date'] )?></span>
              </div>
            </div>
        
          </div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
            	<h3>Category</h3>
              <ul class="categories">
                                
                <?php if (!empty($categories)): ?>
                  <?php foreach ($categories as $row): ?>
                    
                  <li><a href="<?= ROOT ?>category/<?= $row->slug ?>" > <?= $row->name ?> <span>(6)</span></a></li>
                  <?php endforeach; ?>
                <?php else: ?>
                  <center>
                    <h1 class="bg-danger py-3">NO CATEGORIES FOUND</h1>
                  </center>
                <?php endif; ?>

              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Recent News</h3>

              <?php if(!empty($latest_news)): ?>
                  <?php foreach($latest_news as $row):  ?>
                    <div class="block-21 mb-4 d-flex">
                      <a class="blog-img mr-4" href="<?=ROOT?>newsDetail/<?=$row->slug?>" style="background-image: url('<?=get_image($row->image)?>');"></a>
                      <div class="text">
                        <h3 class="heading"><a href="<?=ROOT?>newsDetail/<?=$row->slug?>"><?= substr($row->title, 0,18)?></a></h3>
                        <div class="meta">
                          <div><a href="<?=ROOT?>newsDetail/<?=$row->slug?>" class="text-info"><span class="fa-regular fa-calendar-days"></span> &nbsp; <?=get_date($row->date)?></a></div>
                        </div>
                      </div>
                    </div>  
                  <?php  endforeach; ?>
              <?php else: ?>
                  <center><h1 class="bg-danger py-3">NO CATEGORIES FOUND</h1></center>
              <?php endif;?> 
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Archives</h3>
              <ul class="categories">
                <li><a href="#">December 2018 <span>(30)</span></a></li>
                <li><a href="#">Novemmber 2018 <span>(20)</span></a></li>
                <li><a href="#">September 2018 <span>(6)</span></a></li>
                <li><a href="#">August 2018 <span>(8)</span></a></li>
              </ul>
            </div>


            <div class="sidebar-box ftco-animate">
            <p><a href="<?=ROOT?>newsAndEvents" class="more">More News and Events
              <span class="fa-solid fa-arrow-right "></span></a>
            </p>
            </div>
          </div><!-- END COL -->
        </div>
      </div>
    </section>

  <?php else: ?>

    <div class="container">
      <div class=" p-5 my-5 bg-danger">
        <h2 class="lead text-center text-white">
          The page you requested may have been moved to a new location or removed from the site.
           Go back to the <a href="<?=ROOT?>" class="text-dark">HOME PAGE </a>.
        </h2>
    
      </div>
    </div>
  <?php endif; ?>
<?php include '../app/views/includes/footer.view.php'; ?>
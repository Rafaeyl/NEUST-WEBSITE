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
            <div class="bg-light p-3">
            <h2 class="mb-3"><?= $row['title']?></h2>
            <p class="border  border-dark p-2">
              <img src="<?=get_image($row['image'])?>" alt="" style="height: 500px; object-fit: cover;" class="img-fluid w-100" >
            </p>
            <p><?= $row['description']?></p>
            <div class="tag-widget post-tag-container  mt-5">
              <div class="tagcloud">
                <a href="#" class="tag-cloud-link bg-primary text-white"><?=$row['name'] ?? 'Uncategorized' ?></a>
               
                <span class="float-right fw-bolder text-primary"><?=get_date($row['date'] )?></span>
                <span class="float-right fw-bolder text-primary"><?=$row['author'] ?>, &nbsp;</span>
              </div>
            </div>
            </div>
          </div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
              <?php
                if(isset($_GET['keyword'])){
                  $keyword =  mysqli_real_escape_string($db,$_GET['keyword']);
                }else{
                  $keyword = '';
                }
              ?>
              <form method="GET" action="<?=ROOT?>search#search" class="search-form">
                <div class="input-group">
                    <input type="text" class="form-control p-3 search-input" name="keyword"  
                    max-length="70" placeholder="Keyword" required autocomplete="off" value="<?=$keyword?>">
                    <button class="btn-search btn-search-primary px-4" type="submit"><i class="fa fa-search"></i></button>
                  </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3 class="title">Category</h3>
              <ul class="categories">
                                
                <?php if (!empty($categories)): ?>
                  <?php foreach ($categories as $row): ?>
                    
                  <li><a href="<?= ROOT ?>category/<?= $row->slug ?>" > <?= $row->name ?></a></li>
                  <?php endforeach; ?>
                <?php else: ?>
                  <center>
                    <h1 class="bg-danger py-3">NO RECENT NEWS FOUND</h1>
                  </center>
                <?php endif; ?>

              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              
              <h3 class="title">Recent News</h3>

              <?php if(!empty($latest_news)): ?>
                  <?php foreach($latest_news as $row):  ?>
                    <div class="block-21 mb-4 d-flex">
                      <a class="blog-img mr-4" href="<?=ROOT?>newsDetail/<?=$row->slug?>" style="background-image: url('<?=get_image($row->image)?>');"></a>
                      <div class="text">
                        <h3 class="heading"><a href="<?=ROOT?>newsDetail/<?=$row->slug?>"><?= substr($row->title, 0,18)?></a></h3>
                        <div class="meta">
                          <div><a href="<?=ROOT?>newsDetail/<?=$row->slug?>" class="text-dark"><span class="fa-regular fa-calendar-days"></span> &nbsp; <?=get_date($row->date)?></a></div>
                        </div>
                      </div>
                    </div>  
                    <hr>
                  <?php  endforeach; ?>
              <?php else: ?>
                  <center><h1 class="bg-danger py-3">NO CATEGORIES FOUND</h1></center>
              <?php endif;?> 
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
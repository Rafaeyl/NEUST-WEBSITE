<?= $this-> view('includes/header', $data);?>

<?php

    $news_slug = [];

    if (!empty($categories)){
        foreach($categories as $row){

            array_push($news_slug,$row->slug) ;
        }
    }
?>


<?php  if(in_array($slug, $news_slug)): ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= ROOT?>/assets/images/image-school/school-1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">NEWS CATEGORIES</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">HOME <i class="fa-solid fa-arrow-right"></i></a></span> <span>NEWS <i class="fa-solid fa-arrow-right"></i></span> <span>NEWS CATEGORIES <i class="fa-solid fa-arrow-right"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <div class="row justify-content-center">
                        <?php if (!empty($rows)): ?>
                            <?php foreach ($rows as $row): ?>

                                <div class="col-md-6 mb-5">
                                    <div class="blog-entry" >
                                        <a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>" class="block-20 d-flex align-items-end" width="200" height="250"
                                            style="background-image: url(<?= get_image($row->image) ?>); object-fit:cover;">
                                            <div class="meta-date text-center p-2">
                        
                                                <span class="text-whote">
                                                    <?= get_date($row->date) ?>
                                                </span>
                                            </div>
                                        </a>
                                        <div class="text bg-white p-4" style="height:250px;">
                                            <h3 class="heading"><a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>"><?= substr($row->title, 0, 20) ?></a></h3>
                                            <p><?= substr($row->description, 0, 100) ?></p>
                                            <div class="d-flex align-items-center mt-4">
                                                <p class="mb-0"><a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>" class="btn btn-primary">Read More
                                                        <span class="fa-solid fa-arrow-right "></span></a></p>
                                                <p class="ml-auto mb-0">
                                                    <a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>" class="mr-2"><?= $row->name ?></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <center>
                                <h1>NO NEWS FOUND IN THIS CATEGORY</h1>
                            </center>
                        <?php endif; ?>
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
                                <div><a href="<?=ROOT?>newsDetail/<?=$row->slug?>"><span class="fa-regular fa-calendar-days"></span> &nbsp; <?=get_date($row->date)?></a></div>
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
                    <h3>Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
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
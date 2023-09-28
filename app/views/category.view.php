<?= $this-> view('includes/header', $data);?>

<?php

    $news_slug = [];

    if (!empty($categories)){
        foreach($categories as $row){

            array_push($news_slug,$row->slug) ;
        }
    }

    $db = new mysqli('localhost', 'root', '', 'neust'); 

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $limit = 5;
    $offset = ($page-1)*$limit;

  
    $query = $db->query("select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id where news_categories.slug = '$slug' ORDER BY date desc limit $offset, $limit");

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

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
            <div class="col-lg-8 ftco-animate">
                <?php 
                        if($query->num_rows > 0){ 
                            while($row = $query->fetch_assoc()){ 
                                $offset++
                        ?> 

                            <div class="card shadow mb-2">
                                <div class="card-body d-flex blog_flex">
                                    <div class="flex-part1">
                                        <a href="<?= ROOT ?>newsDetail/<?= $row['slug'] ?>"> <img src="<?= get_image($row['image']) ?>"> </a>
                                    </div>
                                    <div class="flex-grow-1 flex-part2">
                                        <a href="<?= ROOT ?>newsDetail/<?= $row['slug'] ?>" id="title"><?= substr($row['title'], 0, 50) . "..."?></a>
                                        <p>
                                        <a href="<?= ROOT ?>newsDetail/<?= $row['slug'] ?>" id="body" class="news-body">
                                        <?php 
                                        $des = strip_tags($row['description']); 
                                        $des2 = str_replace("&nbsp;", "",$des);
                                        echo substr($des2, 0,150) . "...";
                                        
                                        ?>
                                        </a> 
                                        <span><br>
                                        <a href="<?= ROOT ?>newsDetail/<?= $row['slug'] ?>" class="btn btn-sm btn-primary mt-2">Continue Reading  </a></span>
                                        </p>
                                        <ul>
                                            <li class="mr-4">
                                                <span><i class="fa-regular fa-calendar-days" aria-hidden="true"></i></span> <?= get_date($row['date']) ?>
                                            </li>
                                            <li>
                                                <span><i class="fa-solid fa-tag"></i></span> <?= $row['name'] ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>  
                            <?php 
                            } 
                        }else{  
                            echo '
                            <div class="border p-5">
                                <h1 class="text-danger text-white">NO CATEGORY FOUND</h1>
                                <b>Its seems like there are no news under this category. </b>
                            </div>
                        ';
                    } 
                    ?> 
                   
                    <!-- Pagination Begin -->
                                        
                    <?php $pages = ceil($total_news/$limit);?>

                    <?php if($total_news > $limit): ?>
                        <ul class="pagination pt-2 pb-5">

                            <?php for ($i=1; $i <= $pages ; $i++) {?>
                            <li class="page-item <?=($i == $page) ? $active="active":"";?>">
                                <a href="<?=ROOT?>category/<?=$slug?>?page=<?=$i?>" class="page-link"><?=$i  ?></a>
                            </li>
                            <?php }?>
                        </ul>
                    <?php endif; ?>
                    <!-- Pagination End -->
               
                   
                   
                </div>

                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                    <?php
                        if(isset($_GET['keyword'])){
                            $keyword =   mysqli_real_escape_string($db,$_GET['keyword']);
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
                            <h1 class="bg-danger py-3">NO CATEGORIES FOUND</h1>
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

                        <h3 class="title">Archives</h3>
                        <ul class="categories">
                            
                            <li><a href="#">December 2018 <span>(30)</span></a></li>
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
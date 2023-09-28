<?= $this-> view('includes/header', $data);?>

    <?php 
    
        $db = new mysqli('localhost', 'root', '', 'neust'); 

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $limit = 5;
        $offset = ($page-1)*$limit;

        if(isset($_GET['keyword'])){
            $keyword = mysqli_real_escape_string($db,$_GET['keyword']);
        }else{
            $keyword = '';
        }
        $query = $db->query("select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id WHERE ( title LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%' OR name LIKE '%".$keyword."%') ORDER BY date desc limit $offset, $limit");

    
    ?>


    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= ROOT?>/assets/images/image-school/school-1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          </div>
        </div>
      </div>
    </section>

		
   
        <div class="container-fluid my-4 ftco-animate">
                <?php
                if(isset($_GET['keyword'])){
                  $keyword = $_GET['keyword'];
                }else{
                  $keyword = '';
                }
              ?>
            <h3>Search Result for: <span class="text-primary"><?=$keyword?></span></h3>
            
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
                                <h1 class="text-danger text-white">NO RECORD FOUND</h1>
                                <b>Suggestions:</b>
                                <li>Make sure that word are spelled correctly.</li>
                                <li>Try different Keywords</li>
                            </div>
                        ';
                    } 
                    ?> 

                     <!-- Pagination Begin -->
                    
                        <?php 
                        if(isset($_GET['keyword'])){
                            $keyword = mysqli_real_escape_string($db,$_GET['keyword']);
                        }
                        // Pagination
                        $page_query = "SELECT * FROM news WHERE ( title LIKE '%".$keyword."%' OR description LIKE '%".$keyword."%')";
                        $query =  mysqli_query($db,$page_query);
                        $total_news = mysqli_num_rows($query);
                               
                        $pages = ceil($total_news/$limit);
                        ?>

                        <?php if($total_news > $limit): ?>
                            <ul class="pagination pt-2 pb-5">

                                <?php for ($i=1; $i <= $pages ; $i++) {?>
                                <li class="page-item <?=($i == $page) ? $active="active":"";?>">
                                    <a href="<?=ROOT?>search?keyword=<?=$keyword?>&page=<?=$i?>" class="page-link"><?=$i  ?></a>
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
                        $keyword = $_GET['keyword'];
                        }else{
                        $keyword = '';
                        }
                    ?>
                    <form method="GET" action="<?=ROOT?>search" class="search-form">
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
                    <h3 class="title">Archives</h3>
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
                 </div>
            </div>
 



<?php include '../app/views/includes/footer.view.php'; ?>
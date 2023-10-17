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

        // Previous Page
        $previous_page = $page-1;
        // Next Page
        $next_page = $page+1;
        
        $query = $db->query("select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id WHERE news.isArchived='no' ORDER BY date desc limit $offset, $limit");

    ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= ROOT?>/assets/images/image-school/school-1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">NEWS AND EVENTS</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">HOME <i class="fa-solid fa-arrow-right"></i></a></span> <span>NEWS AND EVENTS <i class="fa-solid fa-arrow-right"></i></span> </p>
          </div>
        </div>
      </div>
    </section>

        
    <div class="container-fluid my-4 ftco-animate">
        <h3 class="text-primary my-5 title-news">LIST OF NEWS AND EVENTS</h3>
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
                            echo '    <center>
                            <h1 class="bg-danger p-5 text-white">NO NEWS FOUND IN THIS CATEGORY</h1>
                        </center>';
                    } 
                    ?> 
                    <!-- Pagination Begin -->
                
                    <?php $pages = ceil($total_news/$limit);?>

                    <?php if($total_news > $limit): ?>
                        <nav aria-label="Page navigation">
                        <ul class="pagination pagination-md m-0">

                            <li class="page-item <?= ($page <= 1) ? 'disabled' : ''?>">
                                <a class="page-link rounded-0" 
                                <?php if($page > 1) { ?> href="<?=ROOT?>newsAndEvents?page=<?=$previous_page?>" <?php } else{ ?> href='' <?php }?> aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
                                </a>
                            </li>


                            <?php for ($i=1; $i <= $pages ; $i++) {?>
                            <li class="page-item <?=($i == $page) ? $active="active":"";?>">
                                <a href="<?=ROOT?>newsAndEvents?page=<?=$i?>" class="page-link"><?=$i  ?></a>
                            </li>
                            <?php }?>


                            <li class="page-item <?= ($page >= $pages) ? 'disabled' : ''?>">
                                <a class="page-link rounded-0 " 
                                <?php if($page < $pages) { ?> href="<?=ROOT?>newsAndEvents?page=<?=$next_page?>" <?php } else{ ?> href='' <?php }?> aria-label="Previous">
                                    <span aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="p-10">
                        <strong>Page <?=$page ?> of  <?=$pages ?>  </strong>
                    </div>
                    <?php endif; ?>
                <!-- Pagination End -->
                    
                  
                
            </div>
            <div class="col-lg-4 sidebar ftco-animate">
                <div class="sidebar-box ftco-animate">
                    <?php
                        if(isset($_POST['keyword'])){

                            $keyword =$_POST['keyword'];
                          
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
                                <div><a href="<?=ROOT?>newsDetail/<?=$row->slug?>" class="text-dark"><span class="fa-regular fa-calendar-days"></span> &nbsp; <?=get_date($row->date)?></a></div>
                            </div>
                            </div>
                        </div>  
                        <hr>
                        <?php  endforeach; ?>
                    <?php else: ?>
                        <center><h1 class="bg-danger py-3">NO RECENT NEWS FOUND</h1></center>
                    <?php endif;?> 
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3 class="title">Archives</h3>

                    <a href="<?=ROOT?>newsAndEvents" >
                    <span class="fa-solid fa-arrow-right "></span> &nbsp;See archives
                      
                    </a>
                </div>


                <div class="sidebar-box ftco-animate">
                <p><a href="<?=ROOT?>newsAndEvents" class="more">More News and Events
                <span class="fa-solid fa-arrow-right "></span></a>
                </p>
                </div>
            </div><!-- END COL -->
        </div>
    </div>

    

<?php include '../app/views/includes/footer.view.php'; ?>




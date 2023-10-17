<?= $this->view('includes/header', $data); ?>

<?php

    $db = new mysqli('localhost', 'root', '', 'neust'); 

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $limit = 8;
    $offset = ($page-1)*$limit;

      // Previous Page
      $previous_page = $page-1;
      // Next Page
      $next_page = $page+1;
  
    $query = $db->query("select gallery_images.*, gallery.title from gallery_images join gallery on gallery_images.gallery_id = gallery.id where gallery.id = '$slug' limit $offset, $limit");

?>

<link rel="stylesheet" href="<?= ROOT ?>assets/main/galleries/galleries.css?t=<?= time(); ?>">

<?php if($slug != 'home'): ?>
<section class="hero-wrap hero-wrap-2"
    style="background-image: url('<?= ROOT ?>/assets/images/image-school/school-1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread" stlyle="font-size: 50px;">GALLERY</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">HOME 
                    <i class="fa-solid fa-arrow-right"></i></a></span> <span>GALLERY
                    <i class="fa-solid fa-arrow-right"></i></span> </p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-gallery my-5">
    <div class="container">
        <div class="my-5">
            <p><a href="<?= ROOT ?>schoolAlbum" class="more"><span class="fa-solid fa-arrow-left "></span> All Albums
                </a>
            </p>
        </div>
        <div class="bg-light p-4" style="border-radius: 50px">
            <h2 style="font-size: clamp(1.25rem, 0.4688rem + 2.5vw, 1.875rem);" class="album-title my-3">ALBUM: <span
                    class="text-primary display-5">
                    <?= $gallery_name[0]->title ?? '' ?>
                </span></h2>
            <div class="row no-gutters">
                    <?php 
                        if($query->num_rows > 0){ 
                            while($row = $query->fetch_assoc()){ 
                                $offset++
                        ?> 
                        <div class="col-md-3 ftco-animate">
                            <a href="<?= ROOT . 'uploads/' . $row['file_name'] ?>"
                                class="gallery image-popup img d-flex align-items-center"
                                style="background-image: url(<?= ROOT . 'uploads/' . $row['file_name'] ?>">
                                <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                    <span class="fa-solid fa-image"></span>
                                </div>
                            </a>
                        </div>
                        <?php 
                            } 
                        }else{  
                            echo '
                            <div class="border p-5">
                                <h1 class="text-danger text-white">NO IMAGE FOUND</h1>
                                <b>Its seems like there are no image under this Gallery. </b>
                            </div>
                        ';
                    } 
                    ?> 
            </div>
            <!-- Pagination Begin -->
                                        
            <?php $pages = ceil($galleries_total/$limit);?>

            <?php if($galleries_total > $limit): ?>
                <div class="col-12 wow slideInUp d-flex justify-content-center my-3" data-wow-delay="0.1s">
                <nav aria-label="Page navigation ">
                <ul class="pagination pagination-md m-0">

                    <li class="page-item <?= ($page <= 1) ? 'disabled' : ''?>">
                        <a class="page-link rounded-0" 
                        <?php if($page > 1) { ?> href="<?=ROOT?>gallery/<?=$slug?>?page=<?=$previous_page?>" <?php } else{ ?> href='' <?php }?> aria-label="Previous">
                            <span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
                        </a>
                    </li>


                    <?php for ($i=1; $i <= $pages ; $i++) {?>
                    <li class="page-item <?=($i == $page) ? $active="active":"";?>">
                        <a href="<?=ROOT?>gallery/<?=$slug?>?page=<?=$i?>" class="page-link"><?=$i  ?></a>
                    </li>
                    <?php }?>


                    <li class="page-item <?= ($page >= $pages) ? 'disabled' : ''?>">
                        <a class="page-link rounded-0 " 
                        <?php if($page < $pages) { ?> href="<?=ROOT?>gallery/<?=$slug?>?page=<?=$next_page?>" <?php } else{ ?> href='' <?php }?> aria-label="Previous">
                            <span aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
                        </a>
                    </li>
                </ul>
            </nav>
            </div>
            <div class="p-10 text-center">
                <strong>Page <?=$page ?> of  <?=$pages ?>  </strong>
            </div>
            
            <?php endif; ?>
            <!-- Pagination End -->


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
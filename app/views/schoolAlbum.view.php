<?= $this-> view('includes/header', $data);?>

    <?php 

        $db = new mysqli('localhost', 'root', '', 'neust'); 

        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $limit = 1;
        $offset = ($page-1)*$limit;

        // Previous Page
        $previous_page = $page-1;
        // Next Page
        $next_page = $page+1;
        
        $query = $db->query("SELECT P.id as idg, title, modified, file_name FROM `gallery` AS P LEFT JOIN gallery_images AS I ON (I.gallery_id = P.id AND I.id = (SELECT MAX(id) FROM gallery_images WHERE gallery_id=P.id)) limit $offset, $limit");

    ?>


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
<div class="container-fluid  ftco-animate">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="page-content">
                <div class="most-popular mb-5 bg-light">
                    <div class="row ">
                        <div class="col-lg-12  " >
                            <div class="row justify-content-center">
                                    <?php 
                                        if($query->num_rows > 0){ 
                                            while($row = $query->fetch_assoc()){ 
                                                $offset++
                                        ?> 
                                        <div class="col-lg-4 mt-3">
                                       
                                            <a href="<?= ROOT ?>gallery/<?= $row['idg'] ?>">
                                                <div class="album-card card">
                                                    <div class="card-body album-images">
                                                        <img src="<?php if (!empty($row['file_name'])) { ?>
                                                            <?= ROOT . 'uploads/' . $row['file_name']; ?>" <?php } ?> class="img-fluid w-100"
                                                            alt="Album-Image">
                                                    </div>
                                                    <div class="card-footer text-center bg-primeLight">
                                                        <h5 class="heading">
                                                            <?= $row['title'] ?>
                                                        </h5>
                                                        <span class="text-dark">
                                                            <?= get_date($row['modified']) ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>
                                     <?php   } 
                        }else{  
                            echo '    <center>
                            <h1 class="bg-danger p-5 text-white">NO Album FOUND </h1>
                        </center>';
                    } 
                    ?> 

                            </div>
                        </div>
                        <?php $pages = ceil($total_gallery/$limit);?>

                            <div class="mx-auto mt-5 ">
                                
                            <?php if($total_gallery > $limit): ?>
                            <nav aria-label="Page navigation">
                                <ul class="pagination pagination-md m-0">

                                    <li class="page-item <?= ($page <= 1) ? 'disabled' : ''?>">
                                        <a class="page-link rounded-0" 
                                        <?php if($page > 1) { ?> href="<?=ROOT?>schoolAlbum?page=<?=$previous_page?>" <?php } else{ ?> href='' <?php }?> aria-label="Previous">
                                            <span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
                                        </a>
                                    </li>


                                    <?php for ($i=1; $i <= $pages ; $i++) {?>
                                    <li class="page-item <?=($i == $page) ? $active="active":"";?>">
                                        <a href="<?=ROOT?>schoolAlbum?page=<?=$i?>" class="page-link"><?=$i  ?></a>
                                    </li>
                                    <?php }?>


                                    <li class="page-item <?= ($page >= $pages) ? 'disabled' : ''?>">
                                        <a class="page-link rounded-0 " 
                                        <?php if($page < $pages) { ?> href="<?=ROOT?>schoolAlbum?page=<?=$next_page?>" <?php } else{ ?> href='' <?php }?> aria-label="Previous">
                                            <span aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="col-md-12">
                                <strong class="text-dark">Page <?=$page ?> of  <?=$pages ?>  </strong>
                            </div>
                            <?php endif; ?>
                            <!-- Pagination End -->
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include '../app/views/includes/footer.view.php'; ?>
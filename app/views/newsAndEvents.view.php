<?= $this-> view('includes/header', $data);?>


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

    <div class="bg-light p-5">
    <div class="container-fluid my-4 ftco-animate">
      <form action="" class="NewsDetailForm">
        <div class="search-container">
          <i class="fa-solid fa-search"></i>
          <input type="text" name="getName" id="getName" placeholder="Enter search keyword">
        </div>
        <button type="button" id="search" >Search</button>
      </form>
        <div class="row" >
            <div class="col-12 ftco-animate"  >
                <div class="row justify-content-center"  id="showdata" >
                    <?php if (!empty($rows)): ?>
                        <?php foreach ($rows as $row): ?>
                            <div class="col-md-3 mb-2">
                                <div class="blog-entry" >
                                    <a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>" class="block-20 d-flex align-items-end" width="200" height="250"
                                        style="background-image: url(<?= get_image($row->image) ?>); object-fit:cover;">
                                        <div class="meta-date text-center p-2">
                    
                                            <span class="text-whote">
                                                <?= get_date($row->date) ?>
                                            </span>
                                        </div>
                                    </a>
                                    <div class="text bg-white p-4" style="height:410px;">
                                        <h6 class="heading text-left "><a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>"><?= substr($row->title, 0, 40) ?></a></h6>
                                        <p class="text-justify news-body"><?= substr($row->description, 0, 120) ?></p>
                                        <div class="justify-content-center text-center align-items-center mt-4">
                                            <p class="mb-0"><a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>" class="btn btn-primary">Read More
                                                    <span class="fa-solid fa-arrow-right "></span></a></p>
                                            <p class="ml-auto my-2">
                                                <a href="<?= ROOT ?>newsDetail/<?= $row->slug ?>" class="mr-2"><?= $row->name ?></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <center>
                            <h1 class="bg-danger p-5 text-white">NO NEWS FOUND IN THIS CATEGORY</h1>
                        </center>
                    <?php endif; ?>
                </div>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
    </div>
<script>
  $(document).ready(function(){
   $('#getName').on("keyup", function(){
     var getName = $(this).val();
     $.ajax({
       method:'POST',
       url:'../app/views/others/fetch.php',
       data:{name:getName},
       success:function(response)
       {
            $("#showdata").html(response);
       } 
     });
   });
  });
</script>
<?php include '../app/views/includes/footer.view.php'; ?>


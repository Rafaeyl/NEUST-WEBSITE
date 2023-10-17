<?= $this->view('includes/header', $data); ?>

<?php if($slug != 'home'): ?>
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<!-- Google web font "Open Sans" -->
<link href="<?=ROOT?>assets/main/fontawesome/css/all.css" rel="stylesheet">      
<link rel="stylesheet" href="<?=ROOT?>assets/main/gallery/templatemo-style.css?t=<?= time();?>">


<section class="hero-wrap hero-wrap-2"
    style="background-image: url('<?= ROOT ?>/assets/images/image-school/school-1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread" stlyle="font-size: 50px;">GALLERY</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">HOME <i
                                class="fa-solid fa-arrow-right"></i></a></span> <span>GALLERY<i
                            class="fa-solid fa-arrow-right"></i></span> </p>
            </div>
        </div>
    </div>
</section>

<div class="container  mt-5" >

<div class="my-5">
    <p><a href="<?=ROOT?>schoolAlbum" class="more"><span class="fa-solid fa-arrow-left "></span> All Albums
        </a>
    </p>
</div>
<ul class="cd-hero-slider " >

<!-- Page 1 Gallery One -->  
              
    <div class="cd-full-width bg-light p-3" style="border-radius: 50px">
        <div class="container js-tm-page-content bg-white p-3 " style="border-radius: 50px" data-page-no="1" data-page-type="gallery">
            <div class="my-5">
                <h2 style="font-size: clamp(1.25rem, 0.4688rem + 2.5vw, 1.875rem);" class="album-title ">ALBUM: <span class="text-primary"><?= $gallery_name[0]->title ?? '' ?> </span></h2>   
            </div>
            <div class="tm-img-gallery-container">
                <div class="tm-img-gallery gallery-one">
                <?php if(!empty($rows)): ?>
                     <?php foreach($rows as $row):  ?>
                        <div class="grid-item ">
                            <figure class="effect-sadie">
                                <img src="<?=ROOT. 'uploads/'.$row->file_name?>" alt="Image" class="img-fluid tm-img">
                                <figcaption>
                                    <a href="<?=ROOT. 'uploads/'.$row->file_name?>">View more</a>
                                </figcaption>           
                            </figure>
                        </div> 
                    <?php  endforeach; ?>
              <?php else: ?>
                  <center><h1 class="bg-danger p-3">NO IMAGES FOUND IN THIS ALBUM</h1></center>
              <?php endif;?> 
                </div>                                 
            </div>
        </div>                                                    
    </div>        
    


</ul> <!-- .cd-hero-slider -->
<div class="container d-flex justify-content-center my-4" data-wow-delay="0.1s">
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-md m-0">
            <li class="page-item disabled">
                <a class="page-link rounded-0" href="#" aria-label="Previous">
                    <span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link rounded-0" href="#" aria-label="Next">
                    <span aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
                </a>
            </li>
        </ul>
    </nav>
</div>   

</div>


<script src="<?=ROOT?>assets/main/gallery/tether.min.js"></script>
<script src="<?=ROOT?>assets/main/gallery/hero-slider-main.js"></script>
<script src="<?=ROOT?>assets/main/gallery/jquery.magnific-popup.min.js"></script>
<script>

function adjustHeightOfPage(pageNo) {

    var pageContentHeight = 0;

    var pageType = $('div[data-page-no="' + pageNo + '"]').data("page-type");

    if( pageType != undefined && pageType == "gallery") {
        pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .tm-img-gallery-container").height();
    }
    else {
        pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height() + 20;
    }
   
    // Get the page height
    var totalPageHeight = $('.cd-slider-nav').height()
                            + pageContentHeight
                            + $('.tm-footer').outerHeight();

    // Adjust layout based on page height and window height
    if(totalPageHeight > $(window).height()) 
    {
        $('.cd-hero-slider').addClass('small-screen');
        $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
    }
    else 
    {
        $('.cd-hero-slider').removeClass('small-screen');
        $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
    }
}

/*
    Everything is loaded including images.
*/
$(window).load(function(){

    adjustHeightOfPage(1); // Adjust page height

    /* Gallery One pop up
    -----------------------------------------*/
    $('.gallery-one').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image',
        gallery:{enabled:true}                
    });
    
    /* Gallery Two pop up
    -----------------------------------------*/
    $('.gallery-two').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery:{enabled:true}                
    });

    /* Gallery Three pop up
    -----------------------------------------*/
    $('.gallery-three').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery:{enabled:true}                
    });

    /* Collapse menu after click 
    -----------------------------------------*/
    $('#tmNavbar a').click(function(){
        $('#tmNavbar').collapse('hide');

        adjustHeightOfPage($(this).data("no")); // Adjust page height       
    });

    /* Browser resized 
    -----------------------------------------*/
    $( window ).resize(function() {
        var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");
        
        // wait 3 seconds
        setTimeout(function() {
            adjustHeightOfPage( currentPageNo );
        }, 1000);
        
    });

    // Remove preloader (https://ihatetomatoes.net/create-custom-preloading-screen/)
    $('body').addClass('loaded');

    // Write current year in copyright text.
    $(".tm-copyright-year").text(new Date().getFullYear());
               
});

/* Google map
------------------------------------------------*/
var map = '';
var center;

function initialize() {
    var mapOptions = {
        zoom: 13,
        center: new google.maps.LatLng(37.779724, -122.452152),
        scrollwheel: false
    };

    map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

    google.maps.event.addDomListener(map, 'idle', function() {
      calculateCenter();
    });

    google.maps.event.addDomListener(window, 'resize', function() {
      map.setCenter(center);
    });
}

function calculateCenter() {
    center = map.getCenter();
}

function loadGoogleMap(){
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
    document.body.appendChild(script);
}

// DOM is ready
$(function() {   
    loadGoogleMap(); // Google Map
});

</script>            

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


<!-- <div id="content-wrapper">
			<div class="column">
				
				<div class="featured-wrapper">
					<img id="slideLeft" class="arrow" src="<?= ROOT?>/assets/main/images/left-arrow.png">
					<img id=featured src="<?= ROOT?>/assets/main/images/image_1.jpg">
					<img id="slideRight" class="arrow" src="<?= ROOT?>/assets/main/images/right-arrow.png">
				</div>
				
				<div id="slide-wrapper" >

					<div id="slider">
						<img class="thumbnail active" src="<?= ROOT?>/assets/main/images/image_1.jpg">
						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_2.jpg">
						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_3.jpg">

						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_1.png">
						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_2.jpg">
						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_3.jpg">
						<img class="thumbnail" src="<?= ROOT?>/assets/main/images/image_4.jpg">
					</div>
				</div>
			</div>
		</div> -->
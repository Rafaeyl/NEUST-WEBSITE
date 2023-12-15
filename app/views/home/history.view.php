<?= $this-> view('includes/header', $data);?>


<style>
       

        .timeline {
            position: relative;
            padding: 0;
            list-style: none;
        }
        .timeline:before {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 40px;
            width: 2px;
            margin-left: -1.5px;
            content: "";
            background-color: #e9ecef;
        }
        .timeline > li {
            position: relative;
            min-height: 50px;
            margin-bottom: 50px;
        }
        .timeline > li:after, .timeline > li:before {
            display: table;
            content: " ";
        }
        .timeline > li:after {
            clear: both;
        }
        .timeline > li .timeline-panel {
            position: relative;
            float: right;
            width: 100%;
            padding: 0 20px 0 100px;
            text-align: left;
        }
        .timeline > li .timeline-panel:before {
            right: auto;
            left: -15px;
            border-right-width: 15px;
            border-left-width: 0;
        }
        .timeline > li .timeline-panel:after {
            right: auto;
            left: -14px;
            border-right-width: 14px;
            border-left-width: 0;
        }
        .timeline > li .timeline-image {
            position: absolute;
            z-index: 100;
            left: 0;
            width: 80px;
            height: 80px;
            margin-left: 0;
            text-align: center;
            color: white;
            border: 7px solid #e9ecef;
            border-radius: 100%;
            background-color: #ffc800;
        }
        .timeline > li .timeline-image h4, .timeline > li .timeline-image .h4 {
            font-size: 10px;
            line-height: 14px;
            margin-top: 12px;
        }
        .timeline > li.timeline-inverted > .timeline-panel {
            float: right;
            padding: 0 20px 0 100px;
            text-align: left;
        }
        .timeline > li.timeline-inverted > .timeline-panel:before {
            right: auto;
            left: -15px;
            border-right-width: 15px;
            border-left-width: 0;
        }
        .timeline > li.timeline-inverted > .timeline-panel:after {
            right: auto;
            left: -14px;
            border-right-width: 14px;
            border-left-width: 0;
        }
        .timeline > li:last-child {
            margin-bottom: 0;
        }
            .timeline .timeline-heading h4, .timeline .timeline-heading .h4 {
            margin-top: 0;
            color: inherit;
        }
        .timeline .timeline-heading h4.subheading, .timeline .timeline-heading .subheading.h4 {
            text-transform: none;
        }
        .timeline .timeline-body > ul,
        .timeline .timeline-body > p {
            margin-bottom: 0;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

      
        @media (min-width: 300px) {
            .img{
                height: 70px; 
                width: 200px;
            }
        }
        @media (min-width: 767px) {
            .timeline:before {
             left: 50%;
            }
            .timeline > li {
                min-height: 100px;
                margin-bottom: 100px;
            }
            .timeline > li .timeline-panel {
                float: left;
                width: 41%;
                padding: 0 20px 20px 30px;
                text-align: right;
            }
            .timeline > li .timeline-image {
                left: 50%;
                width: 100px;
                height: 100px;
                margin-left: -50px;
            }
            .timeline > li .timeline-image h4, .timeline > li .timeline-image .h4 {
                font-size: 13px;
                line-height: 18px;
                margin-top: 16px;
            }
            .timeline > li.timeline-inverted > .timeline-panel {
                float: right;
                padding: 0 30px 20px 20px;
                text-align: left;
            }
            .img{
                height: 90px; 
                width: 200px;
            }
        }
        @media (min-width: 992px) {
            .timeline > li {
                min-height: 150px;
            }
            .timeline > li .timeline-panel {
                padding: 0 20px 20px;
            }
            .timeline > li .timeline-image {
                width: 150px;
                height: 150px;
                margin-left: -75px;
            }
            .timeline > li .timeline-image h4, .timeline > li .timeline-image .h4 {
                font-size: 18px;
                line-height: 26px;
                margin-top: 30px;
            }
            .timeline > li.timeline-inverted > .timeline-panel {
                padding: 0 20px 20px;
            }
            .img{
                height: 140px; 
                width: 200px;
            }
        }
        @media (min-width: 1200px) {
            .timeline > li {
                min-height: 170px;
            }
            .timeline > li .timeline-panel {
                padding: 0 20px 20px 100px;
            }
            .timeline > li .timeline-image {
                width: 170px;
                height: 170px;
                margin-left: -85px;
            }
            .timeline > li .timeline-image h4, .timeline > li .timeline-image .h4 {
                margin-top: 40px;
            }
            .timeline > li.timeline-inverted > .timeline-panel {
                padding: 0 100px 20px 20px;
            }

            .img{
                height: 158px; 
                width: 200px;
            }
        }
    </style>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= ROOT?>/assets/images/image-school/school-1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          
            <h1 class="mb-2 bread">History</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- History-->
    <section class="ftco-section py-5 mt-5" id="history">
            <div class="container">
            <!-- <div class="row no-gutters slider-text ">
          <div class="col-md-3 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="ROOT">Home <i class="fa-solid fa-arrow-right"></i></a></span> <span>History <i class="fa-solid fa-arrow-right"></i></span></p>
          </div>
        </div> -->
                <div class="row justify-content-center mb-5 pb-2">
					<div class="col-md-8 text-center heading-section ftco-animate">
                        <h6 class="text-primary">History</h6>
						<h2 class="mb-4"><span>Our</span> History</h2>
					</div>
        		</div>	
                <ul class="timeline">

                   <?php if(!empty($histories)): $num=0?>
                        <?php foreach($histories as $row): $num++?>
                            <?php if($num % 2): ?>
                                <li>
                                    <div class="timeline-image"><img class="rounded-circle img-fluid img" src="<?=get_image($row->image)?>" alt="..." style="object-fit: cover;" /></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="text-primary"><?=esc($row->date)?></h4>
                                            <h4 class="subheading"><?=esc($row->title)?></h4>
                                        </div>
                                        <div class="timeline-body"><p class="text-muted"><?=esc($row->description)?></p></div>
                                    </div>
                                </li>
                            <?php else: ?>
                                <li class="timeline-inverted">
                                    <div class="timeline-image"><img class="rounded-circle img-fluid img" src="<?=get_image($row->image)?>" alt="..." style="object-fit: cover;"  /></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="text-primary"><?=esc($row->date)?></h4>
                                            <h4 class="subheading"><?=esc($row->title)?></h4>
                                        </div>
                                        <div class="timeline-body"><p class="text-muted"><?=esc($row->description)?></p></div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Be Part
                                <br />
                                Of Our
                                <br />
                                Story!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        
        <?php include '../app/views/includes/footer.view.php'; ?>
<?= $this-> view('includes/dashboard-header', $data); ?>
<?php $ses = new \Core\Session;  ?>

<?php $news_slug = $slug ?? 'not slug';?>

<?php if($news_slug != 'not slug'): ?>
  <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                      <?php $row =  $rows[0]->disabled;?>
                      <?php if($row == 'Active'): ?>
                        <div class="col-md-12 justify-content-center bg-gradient-primary p-5">
                          <h3 class="text-white fw-bolder text-center">WELCOME TO NEUST PAPAYA CAMPUS WEBSITE DASHBOARD!</h3>
                        </div>   
                        
                      <?php else: ?>
                        <div class="col-md-12 justify-content-center bg-gradient-danger p-5">
                          <h3 class="text-white fw-bolder text-center">
                            WARNING!!! <br> <br>YOUR ORGANIZATION IS CURRENTLY INACTIVE, CONTACT THE ADMINISTRATOR FOR MORE INFORMATION!
                            THANK YOU!
                          </h3>
                        </div>  
                      <?php endif; ?>
                    
                </div>
              </div>
            </div>
          </div>
        </div>
  <?php else: ?>
    <div class="container">
        <div class=" p-5 my-5 bg-danger">
            <h2 class="lead text-center text-white">
                The page you requested may have been moved to a new location.
            </h2>

        </div>
    </div>
<?php endif; ?>
<?= $this-> view('includes/dashboard-footer'); ?>
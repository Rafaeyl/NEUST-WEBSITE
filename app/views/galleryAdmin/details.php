
<?= $this->view('includes/dashboard-header', $data); ?>


<?php 
// Include and initialize DB class 
require_once 'DB.class.php'; 
$db = new DB(); 
 
// If record ID is available in the URL 
if(!empty($_GET['id'])){ 
    // Fetch data from the database 
    $conditions['where'] = array( 
        'id' => $_GET['id'] 
    ); 
    $conditions['return_type'] = 'single'; 
    $proData = $db->getRows($conditions); 
}else{ 
    // Redirect to listing page 
    header("Location: index.php"); 
    exit(); 
} 
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h1>View Gallery</h1> 
            <a href="<?=ROOT?>galleryAdmin/index" class="btn btn-gradient-secondary float-end btn-lg my-4">
                BACK
            </a>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card ">
                <div class="card">
                <div class="card-body">
                    
                        <div class="col-md-12">
                            <div class=" my-2  text-center">
                                <div class="form-group">
                                    <label class="form-label fw-bolder">Title</label> <br>
                                    <input class="w-50 mx-auto p-2 text-center" value="<?php echo !empty($proData['title'])?$proData['title']:''; ?>" disabled>
                                </div>
                            </div>
                            <div class=" my-2 text-center">
                                <div class="form-group">
                                    <label class="form-label fw-bolder">Description</label> <br>
                                    <input class="w-50 mx-auto p-2 text-center" value="<?php echo !empty($proData['description'])?$proData['description']:''; ?>" disabled>
                                </div>
                            </div>
                            <div class="mb-3 text-center ">
                                <label class="form-label">Images</label>
                                <?php if(!empty($proData['images'])){ ?>
                                    <div class="row justify-content-center"> 
                                    <?php foreach($proData['images'] as $imageRow){ ?>
                                        <div class="img-bx col-md-2" id="imgbx_<?php echo $imageRow['id']; ?>">
                                            <img src="<?= ROOT. 'uploads/'.$imageRow['file_name']; ?>" width="120" class="mt-3"/>
                                        </div>
                                    <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </div>




<?= $this->view('includes/dashboard-footer', $data); ?>
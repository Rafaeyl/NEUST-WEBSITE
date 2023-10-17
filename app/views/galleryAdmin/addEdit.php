
<?= $this->view('includes/dashboard-header', $data); ?>
<?php 
// Include and initialize DB class 
require_once 'DB.class.php'; 
$db = new DB(); 
 
$postData = $proData = array(); 
 
// Get session data 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
 
// Get status message from session 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
 
// Get posted data from session 
if(!empty($sessData['postData'])){ 
    $postData = $sessData['postData']; 
    unset($_SESSION['sessData']['postData']); 
} 
 
// Fetch data from the database 
if(!empty($_GET['id'])){ 
    $conditions['where'] = array( 
        'id' => $_GET['id'] 
    ); 
    $conditions['return_type'] = 'single'; 
    $proData = $db->getRows($conditions); 
} 
 
// Pre-filled data 
$proData = !empty($postData)?$postData:$proData; 
 
// Define action 
$actionLabel = !empty($_GET['id'])?'Edit':'Add'; 
?>




<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Gallery</h1>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <!-- Display status message -->
                <?php if(!empty($statusMsg)){ ?>
                <div class="col col-md-12">
                    <div class="alert alert-<?php echo $statusMsgType; ?>"><?php echo $statusMsg; ?></div>
                </div>
                <?php } ?>
                <form method="post" action="<?= ROOT?>galleryAdmin/postAction" enctype="multipart/form-data">
                  
                        <div class="row mx-auto w-75">
                            <div class="col-md-12 mb-3">
                                <label class="form-label text-center">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter title" value="<?php echo !empty($proData['title'])?$proData['title']:''; ?>" required>
                            </div>
                        </div>
                        <div class="row mx-auto w-75 ">
                            <div class="col-md-12 mb-3">
                                <label class="form-label text-center">Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter description here..."><?php echo !empty($proData['description'])?$proData['description']:''; ?></textarea>
                            </div>
                        </div>
                        <div class="row mx-auto w-75 ">
                        <div class="col-md-12 mb-3">
                            <label class="form-label text-center">Images</label>
                            <input type="file" name="image_files[]" class="form-control " accept="image/*" multiple >
                            
                            <?php if(!empty($proData['images'])){ ?>
                                <div class="row justify-content-center text-center">
                                <?php foreach($proData['images'] as $imageRow){ ?>
                                    <div class="img-bx col-md-2" id="imgbx_<?php echo $imageRow['id']; ?>">
                                        <img src="<?= ROOT. 'uploads/'.$imageRow['file_name']; ?>" width="120"  class="mt-3 mb-2"/> 
                                        <a href="javascript:void(0);" class="text-danger text-center text-decoration-none" onclick="deleteImage(<?php echo $imageRow['id']; ?>)">Delete</a>
                                    </div>
                                <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo !empty($proData['id'])?$proData['id']:''; ?>">
                        
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" name="dataSubmit" class="btn btn-gradient-primary btn-lg my-4" value="Submit">
                            </div>
                            <div class="col-6">
                                <a href="<?=ROOT?>galleryAdmin/index" class="btn btn-gradient-secondary float-end btn-lg my-4">
                                    BACK
                                </a>
                            </div>
                        </div>
                    </div>
                 </form>
                 </div>
            </div>
          </div>
        </div>
      </div>





<script>
function deleteImage(row_id) {
    if(row_id && confirm('Are you sure to delete image?')){
        const img_element = document.getElementById("imgbx_"+row_id);

        img_element.setAttribute("style", "opacity:0.5;");

        fetch("../../app/views/galleryAdmin/ajax_request.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ request_type:'image_delete', row_id: row_id }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.status == 1) {
                img_element.remove();
            } else {
                alert(data.msg);
            }
            img_element.setAttribute("style", "opacity:1;");
        })
        .catch(console.error);
    }
}
</script>

<?= $this->view('includes/dashboard-footer', $data); ?>
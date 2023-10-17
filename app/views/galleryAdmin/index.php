<?= $this->view('includes/dashboard-header', $data); ?>

<?php 
// Include and initialize DB class 
require_once 'DB.class.php'; 
$db = new DB(); 
 
// Fetch existing records from database 
$products = $db->getRows(); 
 
// Get session data 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
 
// Get status message from session 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
?>



<div class="main-panel">
    <div class="content-wrapper">
    <?php if(!empty($statusMsg)){ ?>
      <div class="col-xs-12">
          <div class="alert alert-<?php echo $statusMsgType; ?>"><?php echo $statusMsg; ?></div>
      </div>
    <?php } ?>
      <div class="page-header">
        <h1>Gallery &nbsp; 
          <a href="<?= ROOT ?>galleryAdmin/addEdit">
            <button type="button" class="btn btn-gradient-primary btn-icon-text mb-3">
              Add Gallery <i class="mdi mdi-account-plus btn-icon-append"></i>
            </button>
          </a>
        </h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div style="overflow-x:auto;">
              <table class="table table-striped table-bordered"  id="userTable">
                <thead  class="bg-gradient-dark">
                  <tr class="text-white">
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if(!empty($products)){ 
                       $id=1;
                      foreach($products as $row){ 
                        
                          $statusLink = ($row['status'] == 1)?'postAction.php?action_type=block&id='.$row['id']:'postAction.php?action_type=unblock&id='.$row['id']; 
                          $statusTooltip = ($row['status'] == 1)?'Click to Inactive':'Click to Active'; 
                  ?>
                  <tr>
                      <td><?php echo $id++; ?></td>
                      <td class="text-center">
                          <?php if(!empty($row['file_name'])){ ?>
                              <img src="<?= ROOT. 'uploads/'.$row['file_name']; ?>" width="120" />
                          <?php } ?>
                      </td>
                      <td><?php echo $row['title']; ?></td>
                      <td>
                          <?php  
                          $description = strip_tags($row['description']); 
                          echo (strlen($description)>140)?substr($description, 0, 140).'...':$description; 
                          ?>
                      </td>
                      <td><?php echo $row['created']; ?></td>
                      <td>
                          <a href="<?= ROOT?>galleryAdmin/details?id=<?php echo $row['id']; ?>" class="btn btn-inverse-success  p-3"><i class="mdi mdi-eye"></i></a>
                          <a href="<?= ROOT?>galleryAdmin/addEdit?id=<?php echo $row['id']; ?>" class="btn btn-inverse-info  p-3"><i class="mdi mdi-account-edit"></i></a>
                          <a href="<?= ROOT?>galleryAdmin/postAction?action_type=delete&id=<?php echo $row['id']; ?>" class="btn btn-inverse-danger p-3" onclick="return confirm('Are you sure to delete record?')?true:false;"> <i class="mdi mdi-delete"></i></a>
                      </td>
                  </tr>
                  <?php }} ?>
              </tbody>
                </table>
              </div>
                  </div>
            </div>
          </div>
        </div>


<?= $this->view('includes/dashboard-footer', $data); ?>
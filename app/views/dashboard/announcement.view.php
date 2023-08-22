<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Announcement</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Add Announcement</h2>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">

                  <div class="col-md-8">
                    <label for="description" class="form-label">Announcement's Description</label>
                    <input value="<?= old_value('description') ?>" type="text" class="form-control" id="description" name="description"
                      placeholder="Announcemnent(date)" Required>
                  </div>
                  <div class="col-md-4">
                    <label for="list_order" class="form-label">List Order</label>
                    <input value="<?= old_value('list_order') ?>" type="number" class="form-control" id="list_order"
                      name="list_order" placeholder="Enter a number for list order" required>
                  </div>
                  
                </div>
                <div class="row">
                    <div class="col-lg-5 mx-auto my-3 text-center">
                        <div class="form-group row">
                        <label class="form-label">Active/Inactive</label>
                        <div class="col-sm-5">
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="disabled" id="disabled1"
                                value="Active" checked> Active </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="disabled" id="disabled2"
                                value="Inactive"> Inactive </label>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                 
                
                <div class="row">
                <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">ADD</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/announcement" class="btn btn-gradient-secondary float-end btn-lg my-4">
                          BACK
                      </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>




<?php elseif ($action == 'edit'): ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Announcement</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Update Announcement</h2>
              <?php if(!empty($row)):?>
              <form method="post" enctype="multipart/form-data">
              <div class="row g-3 my-3 mx-auto">

                <div class="col-md-8">
                <label for="description" class="form-label">Announcement's Description</label>
                <input value="<?= old_value('description', $row->description) ?>" type="text" class="form-control" id="description" name="description"
                    placeholder="Announcemnent(date)" Required>
                </div>
                <div class="col-md-4">
                <label for="list_order" class="form-label">List Order</label>
                <input value="<?= old_value('list_order', $row->list_order) ?>" type="number" class="form-control" id="list_order"
                    name="list_order" placeholder="Enter a number for list order" required>
                </div>

                </div>
                <div class="row">
                <div class="col-lg-5 mx-auto my-3 text-center">
                    <div class="form-group row">
                    <label class="form-label">Active/Inactive</label>
                    <div class="col-sm-5">
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="disabled" id="disabled1"
                            value="Active" <?=old_checked('disabled','Active',$row->disabled)?>> Active </label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="disabled" id="disabled2"
                            value="Inactive" <?=old_checked('disabled','Inactive',$row->disabled)?>> Inactive </label>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-2">UPDATE</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/announcement" class="btn btn-gradient-secondary float-end btn-lg my-2">
                          BACK
                      </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php else:?>
        <div class="alert alert-danger text-center">Record not found!</div>
        <div class="mb-5"> <a href="<?=ROOT?>dashboard/user" class="btn  btn-gradient-secondary float-end btn-lg me-2">  BACK </a>  </div>
    <?php endif;?>


<?php elseif ($action == 'delete'): ?>

  <!-- partial -->
  <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">

                <h1>
                  Delete Announcement &nbsp;
                </h1>
              </div>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      

                        <h3 class="mb-5 text-center">Are you sure you want to delete this Annuncement?</h3>

                        <form method="post" class="text-center">

                      
                          <div class="form-control mt-3">   <?=old_value('userid',$row->description)?>   </div>

                          <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                          <a href="<?= ROOT ?>dashboard/announcement" class="btn btn-secondary float-end btn-lg mt-3">
                            BACK
                          </a>

                        </form>
                    
                    </div>
                  </div>
                </div>
              </div>
<?php else: ?>

  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Announcement &nbsp;  
            <a href="<?= ROOT ?>dashboard/announcement/new">
                <button type="button" class="btn btn-gradient-primary btn-icon-text">
                  Add  <i class="mdi mdi-account-plus btn-icon-append"></i>
                </button>
              </a>
          </h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

              <div style="overflow-x:auto;">
              <table class="table table-striped  table-bordered" id="userTable">
                <thead  class="bg-gradient-dark">
                  <tr class="text-white text-center">
                    <th> # </th>
                    <th> Announcement's Name</th>
                    <th> Active/Inactive  </th>
                    <th> Announcement Order </th>
                    <th> Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if (!empty($rows)):
                    $num = 1; ?>
                    <?php foreach ($rows as $row): ?>
                      <tr >
                        <td>
                          <?= $num++ ?>
                        </td>
                        <td>
                          <?= substr($row->description, 0,30) . '...'?>
                        </td>
                        <td>
                          <?= esc($row->disabled) ?>
                        </td>
                        <td>
                          <?= esc($row->list_order) ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-inverse-info btn-icon">
                            <a href="<?= ROOT ?>dashboard/announcement/edit/<?= $row->id ?>">
                              <i class="mdi mdi-account-edit"></i>
                            </a>
                          </button>
                          <a href="<?= ROOT ?>dashboard/announcement/delete/<?= $row->id ?>">
                            <button type="button" class="btn btn-inverse-danger btn-icon">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <h1>No results found</h1>
                    </tr>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
                  </div>
            </div>
          </div>
        </div>


    <?php endif; ?>





    <?= $this->view('includes/dashboard-footer', $data); ?>
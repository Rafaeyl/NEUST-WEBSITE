<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>News Categories</h1>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Add News Categories</h2>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">

                  <div class="col-md-6">
                    <label for="name" class="form-label">Category name</label>
                    <input value="<?= old_value('name') ?>" type="text" class="form-control" id="name" name="name"
                      placeholder="Enter the name of the News Categories">
                  </div>
                  <div class="col-md-6">
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
                      <a href="<?=ROOT?>dashboard/news_categories" class="btn btn-gradient-secondary float-end btn-lg my-4">
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
        <h1>News Categories</h1>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Add News Categories</h2>
              <?php if(!empty($row)):?>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">

                  <div class="col-md-6">
                    <label for="name" class="form-label">Category name</label>
                    <input value="<?= old_value('name',$row->name) ?>" type="text" class="form-control" id="name" name="name"
                      placeholder="Enter the name of the News Categories">
                  </div>
                  <div class="col-md-6">
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
                    <button class="btn btn-gradient-primary btn-lg my-4">UPDATE</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/news_categories" class="btn btn-gradient-secondary float-end btn-lg my-4">
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
        <div class="mb-5"> <a href="<?=ROOT?>dashboard/news_categories" class="btn  btn-gradient-secondary float-end btn-lg me-2">  BACK </a>  </div>
    <?php endif;?>


<?php elseif ($action == 'delete'): ?>

  <!-- partial -->
  <div class="main-panel">
            <div class="content-wrapper">

              <div class="page-header">
                <h1>
                  Delete News Categories &nbsp;
                </h1>
              </div>

              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card ">
                  <div class="card">
                    <div class="card-body">
                      

                        <h3 class="mb-5 text-center">Are you sure you want to delete <?=old_value('userid',$row->name)?> ?</h3>

                        <form method="post" class="text-center">

                          <label> News Category</label>
                          <div class="form-control m-3 mx-auto w-75">   <?=old_value('userid',$row->name)?>   </div>

                          <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                          <a href="<?= ROOT ?>dashboard/news_categories" class="btn btn-secondary float-end btn-lg mt-3">
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
        <h1>News Categories &nbsp; <a href="<?= ROOT ?>dashboard/news_categories/new">
                <button type="button" class="btn btn-gradient-primary btn-icon-text mb-3">
                  Add  <i class="mdi mdi-account-plus btn-icon-append"></i>
                </button>
              </a></h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

              <div style="overflow-x:auto;">
              <table class="table table-striped table-bordered"  id="userTable">
                <thead  class="bg-gradient-dark">
                  <tr class="text-white">
                    <th> # </th>
                    <th> News Category</th>
                    <th> Active/Inactive </th>
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
                          <?= esc($row->name)?>
                        </td>
                        <td>
                          <?= esc($row->disabled) ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-inverse-info btn-icon">
                            <a href="<?= ROOT ?>dashboard/news_categories/edit/<?= $row->id ?>">
                              <i class="mdi mdi-account-edit"></i>
                            </a>
                          </button>
                          <a href="<?= ROOT ?>dashboard/news_categories/delete/<?= $row->id ?>">
                            <button type="button" class="btn btn-inverse-danger btn-icon">
                              <i class="mdi mdi-delete"></i>
                            </button>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
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
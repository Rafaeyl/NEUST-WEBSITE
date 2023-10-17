<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Academic Calendar</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Add Academic Calendar</h2>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="title" class="form-label">Title</label>
                    <input value="<?= old_value('title') ?>" type="text" class="form-control text-center" id="title" name="title"
                      placeholder="Enter title" required>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="date" class="form-label">Date</label>
                    <input value="<?= old_value('date') ?>" type="text" class="form-control text-center" id="date"
                      name="date" placeholder="Choose Date">
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="list_order" class="form-label">List Order</label>
                    <input value="<?= old_value('list_order') ?>" type="number" class="form-control text-center" id="list_order"
                      name="list_order" placeholder="Enter a number for list order" required>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 mx-auto my-3 text-center">
                        <div class="form-group row">
                        <label class="form-label">Type</label>
                        <div class="col-sm-5">
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" id="type1"
                                value="general" checked> General </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type" id="type2"
                                value="holiday"> Holiday </label>
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
                      <a href="<?=ROOT?>dashboard/academic_calendar" class="btn btn-gradient-secondary float-end btn-lg my-4">
                          BACK
                      </a>
                  </div>

                </div>
              </form>
              <script>
                function display_image(file, e) {
                  let img = e.currentTarget.parentNode.querySelector("img");

                  img.src = URL.createObjectURL(file);
                }
              </script>
            </div>
          </div>
        </div>
      </div>




<?php elseif ($action == 'edit'): ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Academic Calendar</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Update Academic Calendar</h2>
              <?php if(!empty($row)):?>
              <form method="post" enctype="multipart/form-data">
              <div class="row g-3 my-3 mx-auto">
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="title" class="form-label">Title</label>
                    <input value="<?= old_value('title',$row->title) ?>" type="text" class="form-control text-center" id="title" name="title"
                      placeholder="Enter title" required>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="date" class="form-label">Date</label>
                    <input value="<?= old_value('date',$row->date) ?>" type="text" class="form-control text-center" id="date"
                      name="date" placeholder="Choose Date">
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="list_order" class="form-label">List Order</label>
                    <input value="<?= old_value('list_order', $row->list_order) ?>" type="number" class="form-control text-center"" id="list_order"
                        name="list_order" placeholder="Enter a number for list order" required>
                  </div>
                </div>
                <div class="row">
                <div class="col-lg-5 mx-auto my-3 text-center">
                    <div class="form-group row">
                    <label class="form-label">Type</label>
                    <div class="col-sm-5">
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="type" id="type1"
                            value="general" <?=old_checked('type','general',$row->type)?>> General </label>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="type" id="type2"
                            value="holiday" <?=old_checked('type','holiday',$row->type)?>> Holiday </label>
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
                      <a href="<?=ROOT?>dashboard/academic_calendar" class="btn btn-gradient-secondary float-end btn-lg my-2">
                          BACK
                      </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <script>
                function display_image(file, e) {
                  let img = e.currentTarget.parentNode.querySelector("img");

                  img.src = URL.createObjectURL(file);
                }
              </script>
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
                  Delete Academic Calendar &nbsp;
                </h1>
              </div>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      

                        <h3 class="mb-5 text-center">Are you sure you want to delete?</h3>

                        <form method="post" class="text-center">

                      
                          <div class="form-control mt-3 mx-auto w-75">   <?=esc(old_value('title',$row->title))?>   </div>
                          <div class="form-control my-3 mx-auto w-75">   <?=esc(old_value('date',$row->date))?>   </div>
      
                          <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                          <a href="<?= ROOT ?>dashboard/academic_calendar" class="btn btn-secondary float-end btn-lg mt-3">
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
        <h1>Academic Calendar &nbsp;  
            <a href="<?= ROOT ?>dashboard/academic_calendar/new">
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
                    <th> Title</th>
                    <th> Date </th>
                    <th> Type  </th>
                    <th> Calendar Order </th>
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
                          <?= esc(substr($row->title, 0,30)) . '...'?>
                        </td>
                        <td>
                          <?= $row->date ?>
                        </td>
                        <td>
                          <?= esc($row->type) ?>
                        </td>
                        <td>
                          <?= esc($row->list_order) ?>
                        </td>
                        <td>
                          <button type="button" class="btn btn-inverse-info btn-icon">
                            <a href="<?= ROOT ?>dashboard/academic_calendar/edit/<?= $row->id ?>">
                              <i class="mdi mdi-account-edit"></i>
                            </a>
                          </button>
                          <a href="<?= ROOT ?>dashboard/academic_calendar/delete/<?= $row->id ?>">
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
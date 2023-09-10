<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Instructors</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4 text-center">Add new Instructor</h2>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                  <div class="col-md-12 text-center mb-5">
                    <label class="mb-3 fw-bolder lead"> Image</label><br>
                    <label>Click to change Image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                      <img src="<?= get_image() ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $teachers->getError('image') ?></small></div>
                    </label>
                  </div>
                  <div class="col-md-6 text-center">
                    <label for="name" class="form-label">Name</label>
                    <input value="<?= old_value('name') ?>" type="name" class="form-control text-center" id="name" name="name"
                      placeholder="Juan Dela Cruz">
                      <div><small class="text-danger"> <?= $teachers->getError('name') ?></small></div>

                  </div>
                  <div class="col-md-6 text-center">
                    <label for="suffixes" class="form-label"> Academic Suffixes</label>
                    <input value="<?= old_value('suffixes') ?>" type="text" class="form-control text-center" id="suffixes"
                      name="suffixes" placeholder="LPT,MIT">
                      <div><small class="text-danger"> <?= $teachers->getError('suffixes') ?></small></div>
                  </div>
                  <div class="col-md-6 text-center">
                    <label for="position" class="form-label">Position</label>
                    <input value="<?= old_value('position') ?>" type="text" class="form-control text-center" id="position"
                      name="position" placeholder="Academic Teacher">
                      <div><small class="text-danger"> <?= $teachers->getError('position') ?></small></div>
                  </div>
                  <div class="col-md-6 text-center">
                    <label for="list_order" class="form-label">List Order</label>
                    <input value="<?= old_value('list_order') ?>" type="number" class="form-control text-center" id="list_order"
                      name="list_order" placeholder="Teacher order">
                      <div><small class="text-danger"> <?= $teachers->getError('list_order') ?></small></div>
                  </div>
                  <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">ADD</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/teachers" class="btn btn-gradient-secondary float-end btn-lg my-4">
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

    <?php elseif ($action == 'edit'):?>
        <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>  Instructors</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4 text-center">Update an Instructor</h2>
              <?php if(!empty($row)):?>
                <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                  <div class="col-md-12 text-center mb-5">
                    <label class="mb-3 fw-bolder lead"> Image</label><br>
                    <label>Click to change Image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                      <img src="<?= get_image($row->image) ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $teachers->getError('image') ?></small></div>
                    </label>
                  </div>
                  <div class="col-md-6 text-center">
                    <label for="name" class="form-label">Name</label>
                    <input value="<?= old_value('name',$row->name) ?>" type="name" class="form-control text-center" id="name" name="name"
                      placeholder="Juan Dela Cruz">
                      <div><small class="text-danger"> <?= $teachers->getError('name') ?></small></div>
                  </div>
                  <div class="col-md-6 text-center">
                    <label for="suffixes" class="form-label"> Academic Suffixes</label>
                    <input value="<?= old_value('suffixes',$row->suffixes) ?>" type="text" class="form-control text-center" id="suffixes"
                      name="suffixes" placeholder="LPT,MIT">
                      <div><small class="text-danger"> <?= $teachers->getError('suffixes') ?></small></div>
                  </div>
                  <div class="col-md-6 text-center">
                    <label for="position" class="form-label">Position</label>
                    <input value="<?= old_value('position',$row->position) ?>" type="text" class="form-control text-center" id="position"
                      name="position" placeholder="Academic Teacher">
                      <div><small class="text-danger"> <?= $teachers->getError('position') ?></small></div>
                  </div>
                  <div class="col-md-6 text-center">
                    <label for="list_order" class="form-label">List Order</label>
                    <input value="<?= old_value('list_order',$row->suffixes) ?>" type="number" class="form-control text-center" id="list_order"
                      name="list_order" placeholder="Teacher Order">
                      <div><small class="text-danger"> <?= $teachers->getError('list_order') ?></small></div>
                  </div>
                  <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">UPDATE</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/teachers" class="btn btn-gradient-secondary float-end btn-lg my-4">
                          BACK
                      </a>
                  </div>

                </div>

                </form>
              <?php else:?>
                <div class="alert alert-danger text-center">Record not found!</div>
                <div class="mb-5"> <a href="<?=ROOT?>dashboard/teachers" class="btn  btn-gradient-secondary float-end btn-lg me-2">  BACK </a>  </div>
              <?php endif;?>
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
    

<?php elseif ($action == 'delete'): ?>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">

        <h1>
          Delete Instructors &nbsp;
        </h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
      

                <h3 class="mb-5 text-center">Are you sure you want to delete this Instructors?</h3>
                <form method="post" class="text-center">

                  <div class="row mb-5">
                    <div class="col-md-12 text-center">
                      <label>
                        <input onchange="display_image(this.files[0], event)" type="file" name="image"
                          class="d-none">
                        <img src="<?= get_img($row->image) ?>"
                          style="width: 200px;height:200px;object-fit: cover;cursor: pointer;">
                      </label>
                    </div>
                    
                    <div class="col-md-6">
                      <label class="mt-4">Name</label>
                      <input class="form-control mt-3 text-center" value="<?=old_value('institution',$row->name)?>" disabled>
                    </div>
                    <div class="col-md-6">
                      <label class="mt-4">Position</label>
                      <input class="form-control mt-3 text-center" value="<?=old_value('institution',$row->position)?>" disabled>
                    </div>
                  </div>
                
                 
                          
                  <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                  <a href="<?= ROOT ?>dashboard/teachers" class="btn btn-secondary float-end btn-lg mt-3">
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

            <h1>
            Instructors &nbsp;
              <a href="<?= ROOT ?>dashboard/teachers/new" class="mb-4">
                <button type="button" class="btn btn-gradient-primary btn-icon-text">
                  Add <i class="mdi mdi-account-plus btn-icon-append"></i>
                </button>
              </a>
            </h1>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div style="overflow-x:auto;">


                    <table class="table table-striped table-bordered" id="userTable">
                      <thead class="bg-gradient-dark">
                        <tr  class="text-white">
                          <th> # </th>
                          <th> Image </th>
                          <th> Name</th>
                          <th> Academic Suffixes </th>
                          <th> Position</th>
                          <th> List Order</th>
                          <th> Action </th>
                          <!-- <th> Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php if(!empty($rows)): $num = 1 ;?>
                          <?php foreach($rows as $row):?>
                            <tr>
                               <td><?= $num++ ?>
                                </td>
                                <td>
                                  <img src="<?= get_image($row->image) ?>" style="width: 50px;height:50px;object-fit:cover; border-radius=100%;">
                                </td>
                                <td><?= esc($row->name) ?></td>
                                <td><?= esc($row->suffixes) ?></td>
                                <td><?= esc($row->position) ?></td>
                                <td><?= esc($row->list_order) ?></td>
                                <td>
                                  <button type="button" class="btn btn-inverse-info btn-icon">
                                    <a  href="<?=ROOT?>dashboard/teachers/edit/<?=$row->id?>">
                                      <i class="mdi mdi-account-edit"></i>
                                    </a>
                                  </button>
                                  <a href="<?= ROOT ?>dashboard/teachers/delete/<?= $row->id ?>">
                                    <button type="button" class="btn btn-inverse-danger btn-icon">
                                      <i class="mdi mdi-delete"></i>
                                    </button>
                                  </a>
                                </td>
                              </tr>
                          <?php endforeach;?>
                        <?php endif;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        <?php endif; ?>





        <?= $this->view('includes/dashboard-footer', $data); ?>
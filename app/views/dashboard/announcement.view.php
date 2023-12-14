<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>
  <link rel="stylesheet" type="text/css" href="<?=ROOT?>assets/main/summernote/summernote-lite.min.css">
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
                  <div class="col-md-12 text-center mb-5">
                    <label class="mb-3 fw-bolder lead"> Image</label><br>
                    <label>Click to change Image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                      <img src="<?= get_image() ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $announcement->getError('image') ?></small></div>
                    </label>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="title" class="form-label">Title</label>
                    <input value="<?= old_value('title') ?>" type="text" class="form-control text-center" id="title" name="title"
                      placeholder="Enter title" required>
                  </div>
                  <div class="col-md-12 mx-auto text-center w-75">
                    <label for="description" class="form-label">Announcement's Description</label>
                    <textarea rows="8"name="description" class="form-control mx-auto w-75" id="summernote" type="content"  placeholder="Enter Description" required><?=old_value('description')?></textarea>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="date" class="form-label">Date</label>
                    <input value="<?= old_value('date') ?>" type="date" class="form-control text-center" id="date"
                      name="date" placeholder="Choose Date">
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
              <script>
                function display_image(file, e) {
                  let img = e.currentTarget.parentNode.querySelector("img");

                  img.src = URL.createObjectURL(file);
                }
              </script>
                <script src="<?= ROOT ?>assets/dashboard/js/jquery3.js" type="text/javascript"></script>
                  <script src="<?=ROOT?>assets/main/summernote/summernote-lite.min.js"></script>
                  <script>
                  $('#summernote').summernote({
                    placeholder: 'Enter Annnouncements',
                    tabsize: 2,
                    height: 300,
                    width: 640,
                    toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                    ]
                  });
                </script>
            </div>
          </div>
        </div>
      </div>




<?php elseif ($action == 'edit'): ?>
  <link rel="stylesheet" type="text/css" href="<?=ROOT?>assets/main/summernote/summernote-lite.min.css">
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
                <div class="col-md-12 text-center mb-5">
                    <label class="mb-3 fw-bolder lead"> Image</label><br>
                    <label>Click to change Image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                      <img src="<?= get_image($row->image) ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $announcement->getError('image') ?></small></div>
                    </label>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="title" class="form-label">Title</label>
                    <input value="<?= old_value('title',$row->title) ?>" type="text" class="form-control text-center" id="title" name="title"
                      placeholder="Enter title" required>
                  </div>
                  <div class="col-md-12 mx-auto text-center w-75">
                    <label for="description" class="form-label text-center">Description</label>
                    <textarea rows="8"name="description" class="form-control mx-auto w-75" id="summernote" type="content"  placeholder="Enter Description" required><?=old_value('description',$row->description)?></textarea>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="date" class="form-label">Date</label>
                    <input value="<?= old_value('date',$row->date) ?>" type="date" class="form-control text-center" id="date"
                      name="date" placeholder="Choose Date">
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
          <script>
                function display_image(file, e) {
                  let img = e.currentTarget.parentNode.querySelector("img");

                  img.src = URL.createObjectURL(file);
                }
              </script>
                 <script src="<?= ROOT ?>assets/dashboard/js/jquery3.js" type="text/javascript"></script>
                  <script src="<?=ROOT?>assets/main/summernote/summernote-lite.min.js"></script>
                  <script>
                  $('#summernote').summernote({
                    placeholder: 'Enter Annnouncements',
                    tabsize: 2,
                    height: 300,
                    width: 640,
                    toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                    ]
                  });
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
                  Delete Announcement &nbsp;
                </h1>
              </div>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      

                        <h3 class="mb-5 text-center">Are you sure you want to delete this Annuncement?</h3>

                        <form method="post" class="text-center">

                      
                          <div class="form-control mt-3">   <?=esc(old_value('userid',$row->title))?>   </div>
      
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
                <thead  class="bg-darken">
                  <tr class="text-white text-center">
                    <th> # </th>
                    <th> Image</th>
                    <th> Title</th>
                    <th> Description</th>
                    <th> Active/Inactive  </th>
                    <th> Date </th>
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
                        <td class="text-center">
                          <img src="<?= get_image($row->image) ?>" style="width: 50px;height:50px;object-fit:cover; border-radius=100%;">
                        </td>
                        <td>
                          <?= esc(substr($row->title, 0,30)) . '...'?>
                        </td>
                        <td>
                          <?php 
                                $des = strip_tags($row->description); 
                                $des2 = str_replace("&nbsp;", "",$des);
                                echo substr($des2, 0,50);
                            ?>
                        </td>
                        <td>
                          <?= esc($row->disabled) ?>
                        </td>
                        <td>
                          <?= get_date($row->date) ?>
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
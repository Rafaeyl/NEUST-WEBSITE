<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Album</h1>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Add Album</h2>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                    <div class="col-md-12 text-center mb-5">
                    <label class="mb-3 fw-bolder lead">Album Image</label><br>
                    <label>Click to change Image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none" accept="image/*">
                      <img src="<?= get_image() ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $album->getError('image') ?></small></div>
                    </label>
                  </div>
                  <div class="col-md-12 text-center w-50 mx-auto">
                    <label for="name" class="form-label text-center">Album name</label>
                    <input value="<?= old_value('album_name') ?>" type="text" class="form-control text-center"  id="album_name" name="album_name"
                      placeholder="Enter the name of the Album" required>
                  </div>
                </div>
                <div class="row">
                <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">ADD</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/album" class="btn btn-gradient-secondary float-end btn-lg my-4">
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
        <h1>Album</h1>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Edit Album</h2>
              <?php if(!empty($row)):?>
              <form method="post" enctype="multipart/form-data">
              <div class="row g-3 my-3 mx-auto">
                    <div class="col-md-12 text-center mb-5">
                    <label class="mb-3 fw-bolder lead">Album Image</label><br>
                    <label>Click to change Image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none" accept="image/*">
                      <img src="<?= get_image($row->image) ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $album->getError('image') ?></small></div>
                    </label>
                  </div>
                  <div class="col-md-12 text-center w-50 mx-auto">
                    <label for="name" class="form-label">Album name</label>
                    <input value="<?= old_value('album_name', $row->album_name) ?>" type="text" class="form-control text-center" id="album_name" name="album_name"
                      placeholder="Enter the name of the Album" required>
                  </div>
                </div>
                <div class="row">
                <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">UPDATE</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/album" class="btn btn-gradient-secondary float-end btn-lg my-4">
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

      <?php else:?>
        <div class="alert alert-danger text-center">Record not found!</div>
        <div class="mb-5"> <a href="<?=ROOT?>dashboard/album" class="btn  btn-gradient-secondary float-end btn-lg me-2">  BACK </a>  </div>
    <?php endif;?>


<?php elseif ($action == 'delete'): ?>

  <!-- partial -->
  <div class="main-panel">
            <div class="content-wrapper">

              <div class="page-header">
                <h1>
                  Delete Album &nbsp;
                </h1>
              </div>

              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card ">
                  <div class="card">
                    <div class="card-body">
                        <h3 class="mb-5 text-center">Are you sure you want to delete <?=esc(old_value('album_name',$row->album_name))?> ?</h3>

                        <form method="post" class="text-center">
                            <div class="col-md-12 text-center mb-4">
                                <label>
                                    <input onchange="display_image(this.files[0], event)" type="file" name="image" 
                                    class="d-none">
                                    <img src="<?= get_img($row->image) ?>"
                                    style="width: 200px;height:200px;object-fit: cover;cursor: pointer;">
                                </label>
                            </div>
                            <label> Album Name </label>
                            <div class="form-control m-3 mx-auto w-75">   <?=esc(old_value('album_name',$row->album_name))?>   </div>

                            <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                            <a href="<?= ROOT ?>dashboard/album" class="btn btn-secondary float-end btn-lg mt-3">
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
        <h1>Album &nbsp; <a href="<?= ROOT ?>dashboard/album/new">
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
                        <td> <?= $num++ ?> </td>
                        <td>
                            <img src="<?= get_image($row->image) ?>" style="width: 50px;height:50px;object-fit:cover; border-radius=100%;">
                        </td>
                        <td> <?= esc($row->album_name)?> </td>
                        <td>
                          <button type="button" class="btn btn-inverse-info btn-icon">
                            <a href="<?= ROOT ?>dashboard/album/edit/<?= $row->id ?>">
                              <i class="mdi mdi-account-edit"></i>
                            </a>
                          </button>
                          <a href="<?= ROOT ?>dashboard/album/delete/<?= $row->id ?>">
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
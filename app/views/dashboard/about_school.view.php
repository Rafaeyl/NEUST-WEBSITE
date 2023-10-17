<?= $this->view('includes/dashboard-header', $data); ?>

    <?php if ($action == 'edit'):?>
        <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>  About School</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4 text-center">Update About School</h2>
              <?php if(!empty($row)):?>
                <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                  <div class="col-md-4 text-center">
                    <label for="title" class="form-label">Title</label>
                    <input value="<?= old_value('title',$row->title) ?>" type="title" class="form-control text-center" id="title" name="title"
                      placeholder="Enter title">
                      <div><small class="text-danger"> <?= $about_school->getError('title') ?></small></div>
                  </div>
                  <div class="col-md-8 text-center">
                    <label for="description" class="form-label">Description</label>
                    <textarea rows="4"name="description" class="form-control text-center mx-auto w-75" id="summernote" type="content"  placeholder="Enter Description"><?=old_value('description',$row->description)?></textarea>
                      <div><small class="text-danger"> <?= $about_school->getError('description') ?></small></div>
                  </div>
                  <div class="col-md-4 text-center">
                    <label for="students" class="form-label  mt-3"> Total Students</label>
                    <input value="<?= old_value('students',$row->students) ?>" type="number" class="form-control text-center" id="students"
                      name="students" placeholder="Enter total students">
                      <div><small class="text-danger"> <?= $about_school->getError('students') ?></small></div>
                  </div>
                  <div class="col-md-4 text-center">
                    <label for="teachers" class="form-label mt-3"> Total Teachers</label>
                    <input value="<?= old_value('teachers',$row->teachers) ?>" type="number" class="form-control text-center" id="teachers"
                      name="teachers" placeholder="Enter total teachers">
                      <div><small class="text-danger"> <?= $about_school->getError('teachers') ?></small></div>
                  </div>
                  <div class="col-md-4 text-center">
                    <label for="staffs" class="form-label mt-3"> Total Staffs</label>
                    <input value="<?= old_value('staffs',$row->staffs) ?>" type="number" class="form-control text-center" id="staffs"
                      name="staffs" placeholder="Enter total staffs">
                      <div><small class="text-danger"> <?= $about_school->getError('staffs') ?></small></div>
                  </div>
                  <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">UPDATE</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/about_school" class="btn btn-gradient-secondary float-end btn-lg my-4">
                          BACK
                      </a>
                  </div>

                </div>


                </form>
              <?php else:?>
                <div class="alert alert-danger text-center">Record not found!</div>
                <div class="mb-5"> <a href="<?=ROOT?>dashboard/about_school" class="btn  btn-gradient-secondary float-end btn-lg me-2">  BACK </a>  </div>
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
    

    <?php else: ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
                <h1> About School </h1>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div style="overflow-x:auto;">

                  <table class="table table-striped table-bordered">

                        <?php if(!empty($rows)):?>
                        <?php foreach($rows as $row):?>
                         
                            <tr><th>Title</th><td><?=$row->title?></td></tr>
                            <tr><th>Description</th><td><?=substr($row->description, 0,20) . '...' ?></td></tr>
                            <tr><th>Students</th><td><?=$row->students?></td></tr>
                            <tr><th>Teachers</th><td><?=$row->teachers?></td></tr>
                            <tr><th>Staffs</th><td><?=$row->staffs?></td></tr>
                            <tr><th>Action</th>
                                <td>
                                <button type="button" class="btn btn-inverse-info btn-icon">
                                    <a href="<?= ROOT ?>dashboard/about_school/edit/<?= $row->id ?>">
                                    <i class="mdi mdi-account-edit"></i>
                                    </a>
                                </button>
                                </td>
                            </tr>
                            
                                            
                        <?php endforeach;?>
                        <?php endif;?>

                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>


        <?php endif; ?>





        <?= $this->view('includes/dashboard-footer', $data); ?>
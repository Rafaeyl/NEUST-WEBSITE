<?= $this->view('includes/dashboard-header', $data); ?>

<?php if ($action == 'new'): ?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h1>Settings</h1>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="mb-4 text-center">Add new Setting</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                  <div class="col-lg-4 mx-auto text-center">
                    <label for="setting" class="form-label">Setting's Name</label>
                    <input value="<?= old_value('setting') ?>" type="text" class="form-control text-center" id="setting" name="setting"
                      placeholder="Enter Setting's name">
                      <div><small class="text-danger"> <?= $settings->getError('setting') ?></small></div>
                  </div>
                </div>
                <div class="row g-3 my-2 mx-auto">
                  <div class="col-lg-4 mx-auto text-center">
                    <label for="type" class="form-label">Type</label>
                    <select id="type" class="form-select" aria-label="Default select example" name="type">
                      <option <?=old_select('type',"text")?> value="text" class="text-center">Text</option>
                      <option <?=old_select('type',"image")?> value="image" class="text-center">Image</option>
                      <option <?=old_select('type',"number")?> value="number" class="text-center"> Number</option>
                    </select>
                  </div>
                </div>
                  <div class="row">
                    <div class="col-6">
                        <button class="btn btn-gradient-primary btn-lg my-4">ADD</button>
                    </div>
                    <div class="col-6">
                        <a href="<?=ROOT?>dashboard/settings" class="btn btn-gradient-secondary float-end btn-lg my-4">
                            BACK
                        </a>
                    </div>
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
      <h1>Settings</h1>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h2 class="mb-4 text-center">Update Setting</h2>
            <?php if(!empty($row)):?>
            <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                    <div class="col-lg-4 mx-auto text-center">
                        <label for="setting" class="form-label">Setting's Name</label>
                        <input value="<?= old_value('setting',$row->setting) ?>" type="text" class="form-control text-center" id="setting" name="setting"
                        placeholder="Enter Setting's name">
                        <div><small class="text-danger"> <?= $settings->getError('setting') ?></small></div>
                    </div>
                </div>

                <?php if($row->type == 'image'): ?>
                    <div class="row g-3 mx-auto">
                        <div class="col-md-12 text-center">
                            <label class="mb-3 fw-bolder lead"> Image</label><br>
                            <label>Click to change Image</label><br>
                            <label>
                            <input onchange="display_image(this.files[0], event)" type="file" name="value" class="d-none">
                            <img src="<?= get_image($row->value) ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                            <div><small class="text-danger"> <?= $settings->getError('value') ?></small></div>
                            </label>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row g-3 my-3 mx-auto">
                        <div class="col-lg-4 mx-auto text-center">
                            <label for="value" class="form-label">Value</label>
                            <input value="<?= old_value('value',$row->value) ?>" type="text" class="form-control text-center" id="value" name="value"
                            placeholder="Enter Value">
                            <div><small class="text-danger"> <?= $settings->getError('value') ?></small></div>
                        </div>
                    </div>
                <?php endif; ?>
                
             
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-gradient-primary btn-lg my-4">UPDATE</button>
                    </div>
                    <div class="col-6">
                        <a href="<?=ROOT?>dashboard/settings" class="btn btn-gradient-secondary float-end btn-lg my-4">
                            BACK
                        </a>
                    </div>
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
          Delete Settings &nbsp;
        </h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
      

                <h3 class="mb-2 text-center">Are you sure you want to delete this Settings?</h3>
                <form method="post" class="text-center">

                  <div class="row">
                    <?php if($row->type == 'image'): ?>
                      <div class="row g-3 mx-auto">
                          <div class="col-md-12 text-center">

                              <label class=" fw-bolder"> Setting's name</label><br>
                              <div class="form-control w-50 mx-auto my-3"><?= $row->setting?></div>

                              <label class="my-3 fw-bolder"> Image</label><br>
                              <img src="<?= get_image($row->value) ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                              
                          </div>
                      </div>
                  <?php else: ?>
                      <div class="row g-3 my-3 mx-auto">
                          <div class="col-md-12  mx-auto text-center">
                              <label class=" fw-bolder"> Setting's name</label><br>
                              <div class="form-control w-50 mx-auto my-3"><?= $row->setting?></div>

                              <label class=" fw-bolder">Value</label><br>
                              <div class="form-control w-50 mx-auto my-3"><?= $row->value?></div>
                          </div>
                      </div>
                  <?php endif; ?>
                  </div>
            
                 
                          
                  <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                  <a href="<?= ROOT ?>dashboard/settings" class="btn btn-secondary float-end btn-lg mt-3">
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
                Settings &nbsp;
                <!-- <a href="<?= ROOT ?>dashboard/settings/new" class="mb-4">
                    <button type="button" class="btn btn-gradient-primary btn-icon-text">
                    Add <i class="mdi mdi-account-plus btn-icon-append"></i>
                    </button>
                </a> -->
            </h1>
        </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

              <table class="table table-striped text-center">
                <thead>
                    <th>#</th>
                    <th>Setting</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Action</th>
                </thead>
                <?php if(!empty($rows)): $num = 1;?>
                  <?php foreach($rows as $row):?>
                    <tr>
                        <td><?= $num++ ?> </td>
                        <td><?=$row->setting?></td> 
                        <td><?=$row->type?></td> 
                        
                        <?php if($row->type == 'image'): ?>
                            <td class="text-center">
                                <img src="<?= get_image($row->value) ?>" style="width: 50px;height:50px;object-fit:cover; border-radius=100%;">
                            </td> 
                        <?php else: ?>
                            <td><?=$row->value?></td>
                        <?php endif; ?>
                        <td>
                          <button type="button" class="btn btn-inverse-info btn-icon">
                            <a href="<?= ROOT ?>dashboard/settings/edit/<?= $row->id ?>">
                              <i class="mdi mdi-account-edit"></i>
                            </a>
                          </button>
                          <a href="<?= ROOT ?>dashboard/settings/delete/<?= $row->id ?>">
                             <button type="button" class="btn btn-inverse-danger btn-icon">
                                <i class="mdi mdi-delete"></i>
                             </button>
                          </a>
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
  </div>


    <?php endif; ?>





    <?= $this->view('includes/dashboard-footer', $data); ?>
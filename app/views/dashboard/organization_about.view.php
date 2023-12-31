<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>
  <?php $ses = new \Core\Session;  ?>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Organization's About Us</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4 text-center">Add Organization's About Us</h2>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                  <div class="col-md-12 text-center mb-3">
                    <label class=" fw-bolder lead"> Image</label><br>
                    <label>Click to change Image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                      <img src="<?= get_image() ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $OrganizationAbout->getError('image') ?></small></div>
                    </label>
                  </div>
                  <div class="col-md-6 text-center mb-3">
                    <label for="title" class="form-label ">Title</label>
                    <input value="<?= old_value('title') ?>" type="text" class="form-control text-center  mx-auto w-75" id="title" name="title"
                      placeholder="Welcome to College of Nursing">
                      <div><small class="text-danger"> <?= $OrganizationAbout->getError('title') ?></small></div>
                  </div>
                  <div class="col-md-6 text-center mb-3">
                    <label for="description" class="form-label  ">Description</label>
                    <textarea rows="4"name="description" class="form-control text-center mx-auto w-75" id="summernote" type="content"  placeholder="Enter Description"><?=old_value('description')?></textarea>
                    
                    <div><small class="text-danger"> <?= $OrganizationAbout->getError('description') ?></small></div>
                  </div>
                  <div class="col-md-4 text-center">
                    <label for="students" class="form-label">Total Members</label>
                    <input value="<?= old_value('students') ?>" type="number" class="form-control text-center  mx-auto w-75" id="students" name="students"
                      placeholder="Enter total Members">
                      <div><small class="text-danger"> <?= $OrganizationAbout->getError('students') ?></small></div>
                  </div>
                  <div class="col-md-4 text-center">
                    <label for="activities" class="form-label">Activities Per Sem</label>
                    <input value="<?= old_value('activities') ?>" type="number" class="form-control text-center  mx-auto w-75" id="activities" name="activities"
                      placeholder="Enter Estimated Activities Per Sem">
                      <div><small class="text-danger"> <?= $OrganizationAbout->getError('activities') ?></small></div>
                  </div>
                  <div class="col-md-4 text-center">
                    <label for="events" class="form-label">Events Per Sem</label>
                    <input value="<?= old_value('events') ?>" type="number" class="form-control text-center  mx-auto w-75" id="events" name="events"
                      placeholder="Enter Estimated Events Per Sem">
                      <div><small class="text-danger"> <?= $OrganizationAbout->getError('events') ?></small></div>
                  </div>
                  <div class="col-md-12 text-center ">
                       <label for="role" class="form-label">Organization</label>
                        <?php if($ses->user('institute') == 'Admin'):?>
                          <select id="institution" class="form-select mx-auto w-50" aria-label="Default select example" name="institution">
                              <?php if(!empty($organizations)):?>
                                    <?php foreach($organizations as $organization):?>
                                        <option <?=old_select('institution',$organization->id)?> class="text-center" value="<?=$organization->id?>"><?=$organization->name?></option>
                                    <?php endforeach;?>
                                <?php else: ?>
                                  <option value="">No Organization Available</option>
                                <?php endif;?>
                          </select>
                        <?php elseif($ses->user('institute') == 'organization'):?>
                          <?php
                            $id = $ses->user('id');
                            $query  = "select institutions.id,institutions.name  FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $id";
                            $orgname = $this->query($query);
                            ?>
                            <select id="institution" class="form-select mx-auto w-50" aria-label="Default select example" name="institution">
                           
                              <option <?=old_select('institution',$orgname[0]->id)?> class="text-center" value="<?=$orgname[0]->id?>"><?=$orgname[0]->name?></option>
                                
                          </select>

                      <?php endif;?>  
                    </div> 
                  <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">ADD</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/organization_about" class="btn btn-gradient-secondary float-end btn-lg my-4">
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
      <?php $ses = new \Core\Session;  ?>
        <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>  Organization's  About Us</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4 text-center">Update Organization's  About Us</h2>
              <?php if(!empty($row)):?>
                <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                  <div class="col-md-12 text-center mb-3">
                    <label class=" fw-bolder lead"> Image</label><br>
                    <label>Click to change Image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                      <img src="<?= get_image($row->image) ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $OrganizationAbout->getError('image') ?></small></div>
                    </label>
                  </div>
                  <div class="col-md-12 text-center">
                    <label for="title" class="form-label">Title</label>
                    <input value="<?= old_value('title',$row->title) ?>" type="text" class="form-control text-center  mx-auto w-75" id="title" name="title"
                      placeholder="Welcome to College of Nursing">
                      <div><small class="text-danger"> <?= $OrganizationAbout->getError('title') ?></small></div>
                  </div>
                  <div class="col-md-12 text-center">
                    <label for="description" class="form-label">Description</label>
                    <textarea rows="7"name="description" class="form-control mb-3 text-center mx-auto w-75" id="summernote" type="content"  placeholder="Enter Description"><?=old_value('description',$row->description)?></textarea>
                    
                    <div><small class="text-danger"> <?= $OrganizationAbout->getError('description') ?></small></div>
                  </div>
                  <div class="col-md-4 text-center">
                    <label for="students" class="form-label">Total Members</label>
                    <input value="<?= old_value('students',$row->students) ?>" type="number" class="form-control text-center  mx-auto w-75" id="students" name="students"
                      placeholder="Enter total Members">
                      <div><small class="text-danger"> <?= $OrganizationAbout->getError('students') ?></small></div>
                  </div>
                  <div class="col-md-4 text-center">
                    <label for="activities" class="form-label">Activities Per Sem</label>
                    <input value="<?= old_value('activities',$row->activities) ?>" type="number" class="form-control text-center  mx-auto w-75" id="activities" name="activities"
                      placeholder="Enter Estimated Activities Per Sem">
                      <div><small class="text-danger"> <?= $OrganizationAbout->getError('activities') ?></small></div>
                  </div>
                  <div class="col-md-4 text-center">
                    <label for="events" class="form-label">Events Per Sem</label>
                    <input value="<?= old_value('events',$row->events) ?>" type="number" class="form-control text-center  mx-auto w-75" id="events" name="events"
                      placeholder="Enter Estimated Events Per Sem">
                      <div><small class="text-danger"> <?= $OrganizationAbout->getError('events') ?></small></div>
                  </div>
                  <div class="col-md-12 text-center ">
                      <label for="institution" class="form-label">Organization</label>
                        <?php
                          $query  = "select institutions.name FROM institutions JOIN about ON about.institution = institutions.id WHERE about.id = $row->id";
                          $orgname = $this->query($query);
                        ?>
                          <input class="form-control text-center mx-auto w-50" value="<?=old_value('institution',$orgname[0]->name)?>" name="institution" disabled>
                             
                    </div> 
                  <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">UPDATE</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/organization_about" class="btn btn-gradient-secondary float-end btn-lg my-4">
                          BACK
                      </a>
                  </div>

                </div>

              </form>
              <?php else:?>
                <div class="alert alert-danger text-center">Record not found!</div>
                <div class="mb-5"> <a href="<?=ROOT?>dashboard/organization_about" class="btn  btn-gradient-secondary float-end btn-lg me-2">  BACK </a>  </div>
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
          Delete Organization's  About Us &nbsp;
        </h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              
              <?php
                  $query  = "select institutions.name FROM institutions JOIN about ON about.institution = institutions.id WHERE about.id = $row->id";
                  $orgname = $this->query($query);
                ?>

                <h3 class="mb-5 text-center">Are you sure you want to delete <?= $row->name ?> ?</h3>
                <form method="post" class="text-center">

                  <div class="row">
                    <div class="col-md-12 text-center">
                      <label>
                        <input onchange="display_image(this.files[0], event)" type="file" name="image"
                          class="d-none">
                        <img src="<?= get_img($row->image) ?>"
                          style="width: 200px;height:200px;object-fit: cover;cursor: pointer;">
                      </label>
                    </div>
                    
                    <div class="col-md-4">
                      <label class="mt-4">Name</label>
                      <input class="form-control mt-3 text-center" value="<?=old_value('institution',$row->name)?>" disabled>
                    </div>
                    <div class="col-md-4">
                      <label class="mt-4">description</label>
                      <input class="form-control mt-3 text-center" value="<?=old_value('institution',$row->description)?>" disabled>
                    </div>
                    <div class="col-md-4">
                      <label class="mt-4">Organization</label>
                      <input class="form-control mt-3 text-center" value="<?=old_value('institution',$orgname[0]->name)?>" disabled>
                    </div>
                  </div>
                
                 
                          
                  <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                  <a href="<?= ROOT ?>dashboard/organization_about" class="btn btn-secondary float-end btn-lg mt-3">
                    BACK
                  </a>

                </form>
              
            </div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <?php $ses = new \Core\Session;  ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">

            <h1>
              Organization's About Us &nbsp;
                <?php if($ses->user('institute') == 'Admin' || empty($single_rows)):?>
                  <a href="<?= ROOT ?>dashboard/organization_about/new" class="mb-4">
                  <button type="button" class="btn btn-gradient-primary btn-icon-text">
                    Add Info <i class="mdi mdi-account-plus btn-icon-append"></i>
                  </button>
                  </a>
                <?php endif;?>
            </h1>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                   <!-- Admin View -->
                <?php if($ses->user('institute') == 'Admin'):?>
                  <div style="overflow-x:auto;">
                    <table class="table table-bordered table-striped" id="userTable">
                      <thead class="bg-gradient-dark">
                        <tr  class="text-white text-center">
                          <th> # </th>
                          <th> Image </th>
                          <th> Name</th>
                          <th> description</th>
                          <th> Members</th>
                          <th> Activities</th>
                          <th> Events</th>
                          <th> Organization </th>
                          <th> Action </th>
                          <!-- <th> Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php if(!empty($rows)): $num = 1 ;?>
                          <?php foreach($rows as $row):?>
                            <tr class="text-center">
                               <td><?= $num++ ?>
                                </td>
                                <td class="text-center">
                                  <img src="<?= get_image($row->image) ?>" style="width: 50px;height:50px;object-fit:cover; border-radius=100%;">
                                </td>
                                <td><?= esc($row->title) ?></td>
                                <td><?= substr($row->description, 0,20) . '...' ?></td>
                                <td><?= esc($row->students) ?></td>
                                <td><?= esc($row->activities) ?></td>
                                <td><?= esc($row->events) ?></td>
                                <?php
                                 $query  = "select institutions.name FROM institutions JOIN about ON about.institution = institutions.id WHERE about.id = $row->id";
                                  $orgname = $this->query($query);
                                ?>
                                <td><?=$orgname[0]->name?></td>
                                <td>
                                  <button type="button" class="btn btn-inverse-info btn-icon">
                                    <a  href="<?=ROOT?>dashboard/organization_about/edit/<?=$row->id?>">
                                      <i class="mdi mdi-account-edit"></i>
                                    </a>
                                  </button>
                                  <a href="<?= ROOT ?>dashboard/organization_about/delete/<?= $row->id ?>">
                                    <button type="button" class="btn btn-inverse-danger btn-icon">
                                      <i class="mdi mdi-delete"></i>
                                    </button>
                                  </a>
                                </td>
                              </tr>
                          <?php endforeach;?>
                        <?php else:?>
                        <tr>
                            <h1>No results found. Plead Add Information </h1>
                        </tr>
                        <?php endif;?>
                        
                      </tbody>
                    </table>
                  </div>
                   <!-- Organization Representative View -->
                  <?php elseif($ses->user('institute') == 'organization'):?>

                    <table class="table table-bordered" >
                        <thead class="bg-gradient-dark">
                          <tr class="text-white text-center">
                          <th> Image </th>
                          <th> Title</th>
                          <th> Description</th>
                          <th> Members</th>
                          <th> Activities</th>
                          <th> Events</th>
                          <th> Organization </th>
                          <th> Action </th>
                            <!-- <th> Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($single_rows)):   ?>
                            <?php foreach($single_rows as $row):?>
                              <tr class="text-center">
                                  <td class="text-center">
                                    <img src="<?= get_image($row->image) ?>" style="width: 50px;height:50px;object-fit:cover; border-radius=100%;">
                                  </td>
                                  <td><?= esc($row->title) ?></td>
                                  <td><?= substr($row->description, 0,20) . '...' ?></td>
                                  <td><?= esc($row->students) ?></td>
                                  <td><?= esc($row->activities) ?></td>
                                  <td><?= esc($row->events) ?></td>
                                  <?php
                                  $query  = "select institutions.name FROM institutions JOIN about ON about.institution = institutions.id WHERE about.id = $row->id";
                                    $orgname = $this->query($query);
                                  ?>
                                  <td><?=$orgname[0]->name?></td>
                                  <td>  
                                    <button type="button" class="btn btn-inverse-info btn-icon">
                                      <a  href="<?=ROOT?>dashboard/organization_about/edit/<?=$row->id?>">
                                        <i class="mdi mdi-account-edit"></i>
                                      </a>
                                    </button>
                                  </td>
                                </tr>
                            <?php endforeach;?>
                          <?php else:?>
                          <tr>
                              <h1 class="alert alert-danger text-center">No results found. Plead Add Information </h1>
                          </tr>
                          <?php endif;?>
                          
                        </tbody>
                      </table>
                  <?php endif;?>
                </div>
              </div>
            </div>
          </div>


        <?php endif; ?>





        <?= $this->view('includes/dashboard-footer', $data); ?>
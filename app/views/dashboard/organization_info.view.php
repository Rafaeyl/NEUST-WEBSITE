<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>
  <?php $ses = new \Core\Session;  ?>
  
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Organization's Info</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Add Organization's Info</h2>
              <p class="text-danger">Make sure to click and watch this <a href="https://youtu.be/sT2ZbN3etTk" target="_blank" class="text-danger fw-bolder">video</a> on how to add a <span class="fw-bolder"> Gmail app password.</span></p>

              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                  
                  <div class="row">
                   <div class="col-lg-4 mx-auto mb-3 text-center">
                      <label for="role" class="form-label">Organization</label>
                        <?php if($ses->user('institute') == 'Admin'):?>
                          <select id="institution" class="form-select" aria-label="Default select example" name="institution">
                              <?php if(!empty($organizations)):?>
                                    <?php foreach($organizations as $organization):?>
                                        <option <?=old_select('institution',$organization->id)?> value="<?=$organization->id?>"><?=$organization->name?></option>
                                    <?php endforeach;?>
                                <?php else: ?>
                                  <option value="empty">No Organization Available</option>
                                <?php endif;?>
                          </select>
                          <div><small class="text-danger"> <?= $OrganizationInfo->getError('institution') ?></small></div>

                        <?php elseif($ses->user('institute') == 'organization'):?>
                          <?php
                            $id = $ses->user('id');
                            $query  = "select institutions.id,institutions.name  FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $id";
                            $orgname = $this->query($query);
                            ?>
                            <select id="institution" class="form-select" aria-label="Default select example" name="institution">
                           
                              <option <?=old_select('institution',$orgname[0]->id)?> value="<?=$orgname[0]->id?>"><?=$orgname[0]->name?></option>
                                
                          </select>

                      <?php endif;?>  
                    </div>
                  </div>
                 
                  <div class="col-md-6 text-center mb-5">
                    <label class="mb-3 fw-bolder lead"> Logo</label><br>
                    <label>Click to change image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="logo" class="d-none">
                      <img src="<?= get_image() ?>" style="width: 200px;height:200px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $OrganizationInfo->getError('logo') ?></small></div>
                    </label>
                  </div>
                  <div class="col-md-6 text-center mb-5">
                  <label class="mb-3 fw-bolder lead"> Cover Photo</label><br>
                    <label>Click to change image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="cover_photo" class="d-none">
                      <img src="<?= get_image() ?>" style="width: 200px;height:200px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $OrganizationInfo->getError('cover_photo') ?></small></div>
                    </label>
                  </div>
                  <p class="card-description">Contact Info</p>
                  <div class="col-md-6 text-center">
                    <label for="email" class="form-label">Email</label>
                    <input value="<?= old_value('email') ?>" type="email" class="form-control text-center" id="email" name="email"
                      placeholder="e.g. COE@gmail.com">
                  </div>
                  <div class="col-md-6 text-center">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input value="<?= old_value('phone') ?>" type="number" class="form-control text-center" id="phone"
                      name="phone" placeholder="09056073442">
                      <div><small class="text-danger"> <?= $OrganizationInfo->getError('phone') ?></small></div>
                  </div>
                  <div class="col-md-6 col-md-12 text-center w-50 mx-auto mt-5">
                    <label for="fb_link" class="form-label">Facebook Link</label>
                    <input value="<?= old_value('fb_link') ?>" type="text" class="form-control text-center" id="fb_link"
                      name="fb_link" placeholder="Enter N/A if not applicable ">
                  </div>

                  <div class="row">
                  <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">ADD</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/organization_info" class="btn btn-gradient-secondary float-end btn-lg my-4">
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
        <h1>  Organization's Info</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Update Organization's Info</h2>
              <?php if(!empty($row)):?>
                <form method="post" enctype="multipart/form-data">
                  <div class="row g-3 my-3 mx-auto">
                    
                    <div class="row">
                    <div class="col-lg-4 mx-auto mb-3 text-center">
                        <label for="institution" class="form-label">Organization</label>
                        <?php
                          $query  = "select institutions.name FROM institutions JOIN institutionsinfo ON institutionsinfo.institution = institutions.id WHERE institutionsinfo.id = $row->id";
                          $orgname = $this->query($query);
                        ?>
                          <input class="form-control text-center" value="<?=old_value('institution',$orgname[0]->name)?>" name="institution" disabled>
                             
                        
                      </div>
                    </div>
                  
                    <div class="col-md-6 text-center mb-5">
                      <label class="mb-3 fw-bolder lead"> Logo</label><br>
                      <label>Click to change image</label><br>
                      <label>
                        <input onchange="display_image(this.files[0], event)" type="file" name="logo" class="d-none">
                        <img src="<?= get_image($row->logo) ?>" style="width: 200px;height:200px;object-fit: cover;cursor: pointer;">
                        <div><small class="text-danger"> <?= $OrganizationInfo->getError('logo') ?></small></div>
                      </label>
                    </div>
                    <div class="col-md-6 text-center mb-5">
                    <label class="mb-3 fw-bolder lead"> Cover Photo</label><br>
                      <label>Click to change image</label><br>
                      <label>
                        <input onchange="display_image(this.files[0], event)" type="file" name="cover_photo" class="d-none">
                        <img src="<?= get_image($row->cover_photo) ?>" style="width: 200px;height:200px;object-fit: cover;cursor: pointer;">
                        <div><small class="text-danger"> <?= $OrganizationInfo->getError('cover_photo') ?></small></div>
                      </label>
                    </div>
                    <p class="card-description">Contact Info</p>
                    <div class="col-md-6 text-center">
                      <label for="email" class="form-label">Email</label>
                      <input value="<?= old_value('email', $row->email) ?>" type="email" class="form-control text-center" id="email" name="email"
                        placeholder="e.g. COE@gmail.com">
                    </div>
                    <div class="col-md-6 text-center">
                      <label for="phone" class="form-label">Phone Number</label>
                      <input value="<?= old_value('phone',$row->phone) ?>" type="number" class="form-control text-center" id="phone"
                        name="phone" placeholder="09056073442" >
                        <div><small class="text-danger"> <?= $OrganizationInfo->getError('phone') ?></small></div>
                    </div>
                    <div class="col-md-12 text-center w-50 mx-auto mt-5">
                      <label for="fb_link" class="form-label">Facebook Link</label>
                      <input value="<?= old_value('fb_link',$row->fb_link) ?>" type="text" class="form-control text-center" id="fb_link"
                        name="fb_link" placeholder="Enter N/A if not applicable ">
                    </div>

                    <div class="row">
                    <div class="col-6">
                      <button class="btn btn-gradient-primary btn-lg my-4">UPDATE</button>
                    </div>
                    <div class="col-6">
                        <a href="<?=ROOT?>dashboard/organization_info" class="btn btn-gradient-secondary float-end btn-lg my-4">
                            BACK
                        </a>
                    </div>
                    </div>
                   

                  </div>

                </form>
              <?php else:?>
                <div class="alert alert-danger text-center">Record not found!</div>
                <div class="mb-5"> <a href="<?=ROOT?>dashboard/organization_info" class="btn  btn-gradient-secondary float-end btn-lg me-2">  BACK </a>  </div>
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
          Delete Organization's Info &nbsp;
        </h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div style="overflow-x:auto;">
              <?php
                  $query  = "select institutions.name FROM institutions JOIN institutionsinfo ON institutionsinfo.institution = institutions.id WHERE institutionsinfo.institution = $row->institution";
                  $orgname = $this->query($query);
                ?>

                <h3 class="mb-5 text-center">Are you sure you want to delete <?= $orgname[0]->name ?> ?</h3>
                <form method="post" class="text-center">
                  <div class="col-md-12 text-center">
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="logo"
                        class="d-none">
                      <img src="<?= get_img($row->logo) ?>"
                        style="width: 200px;height:200px;object-fit: cover;cursor: pointer;">
                    </label>
                  </div>
                 
                  <div class="form-control mt-3"><?=old_value('institution',$orgname[0]->name)?></div>

                  <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                  <a href="<?= ROOT ?>dashboard/organization_info" class="btn btn-secondary float-end btn-lg mt-3">
                    BACK
                  </a>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <?php $ses = new \Core\Session;  ?>
      <!-- partial -->
      <div class="main-panel" id="organization_info">
        <div class="content-wrapper">
          <div class="page-header">

            <h1>
              Organization's  Info &nbsp;
              
                <?php if($ses->user('institute') == 'Admin' || empty($single_rows)):?>
                  <a href="<?= ROOT ?>dashboard/organization_info/new" class="mb-4">
                  <button type="button" class="btn btn-gradient-primary btn-icon-text">
                    Add Info <i class="mdi mdi-account-plus btn-icon-append"></i>
                  </button>
                  </a>
                <?php endif;?>
              </a>
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
                        <thead class="bg-darken">
                          <tr class="text-white text-center">
                            <th> # </th>
                            <th> Logo </th>
                            <th> Cover Photo</th>
                            <th> Email</th>
                            <th> Phone </th>
                            <th> Organization </th>
                            <th> Action </th>
                            <!-- <th> Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($rows)): $num = 1 ;  ?>
                            <?php foreach($rows as $row):?>
                              <tr class="text-center">
                                <td><?= $num++ ?>
                                  </td>
                                  <td class="text-center">
                                    <img src="<?= get_image($row->logo) ?>" style="width: 50px;height:50px;object-fit:cover; border-radius=100%;">
                                  </td>
                                  <td class="text-center">
                                    <img src="<?= get_image($row->cover_photo) ?>" style="width: 50px;height:50px;object-fit:cover; border-radius=100%;">
                                  </td>
                                  <td><?= esc($row->email) ?></td>
                                  <td><?= esc($row->phone) ?></td>
                                  <td><?= esc($row->name) ?></td>
                                  <td>
                                    <button type="button" class="btn btn-inverse-info btn-icon">
                                      <a  href="<?=ROOT?>dashboard/organization_info/edit/<?=$row->id?>">
                                        <i class="mdi mdi-account-edit"></i>
                                      </a>
                                    </button>
                                    <a href="<?= ROOT ?>dashboard/organization_info/delete/<?= $row->id ?>">
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
                  <!-- Organization Representative View -->
                  <?php elseif($ses->user('institute') == 'organization'):?>
                      <table class="table table-bordered table-striped" >
                        <thead class="bg-darken">
                          <tr class="text-white text-center" >
                            <th> Logo </th>
                            <th> Cover Photo</th>
                            <th> Email</th>
                            <th> Phone </th>
                            <th> Action </th>
                            <!-- <th> Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(!empty($single_rows)):   ?>
                            <?php foreach($single_rows as $row):?>
                              <tr class="text-center">
                                  <td class="text-center">
                                    <img src="<?= get_image($row->logo) ?>" style="width: 50px;height:50px;object-fit:cover; border-radius=100%;">
                                  </td>
                                  <td class="text-center">
                                    <img src="<?= get_image($row->cover_photo) ?>" style="width: 50px;height:50px;object-fit:cover; border-radius=100%;">
                                  </td>
                                  <td><?= esc($row->email) ?></td>
                                  <td><?= esc($row->phone) ?></td>
                                  <td>  
                                    <button type="button" class="btn btn-inverse-info btn-icon">
                                      <a  href="<?=ROOT?>dashboard/organization_info/edit/<?=$row->id?>">
                                        <i class="mdi mdi-account-edit"></i>
                                      </a>
                                    </button>
                                  </td>
                                </tr>
                            <?php endforeach;?>
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
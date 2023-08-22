<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>User</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Add User</h2>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">

                  <div class="col-md-12 text-center mb-5">
                      <label class="form-label">Choose Image </label><br>
                    
                      <input  type="file" name="image" class="crop_image form-control mx-auto w-50" id="upload_image">
                      <div><small class="text-danger"> <?= $user->getError('image') ?></small></div>
                    
                  </div>
                  <div class="col-md-3">
                    <label for="userid" class="form-label">School ID</label>
                    <input value="<?= old_value('school_id') ?>" type="text" class="form-control" id="school_id" name="school_id"
                      placeholder="PPY-00002">
                    <div><small class="text-danger"> <?= $user->getError('school_id') ?></small></div>
                  </div>
                  <div class="col-md-3">
                    <label for="username" class="form-label">User Name</label>
                    <input value="<?= old_value('username') ?>" type="text" class="form-control" id="username"
                      name="username" placeholder="juaan">
                    <div><small class="text-danger"> <?= $user->getError('username') ?></small></div>
                  </div>
                  <div class="col-md-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input value="<?= old_value('first_name') ?>" type="text" class="form-control" id="fname"
                      name="first_name" placeholder="Juan">
                    <div><small class="text-danger"> <?= $user->getError('first_name') ?></small></div>
                  </div>
                  <div class="col-md-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input value="<?= old_value('last_name') ?>" type="text" class="form-control" id="lname"
                      name="last_name" placeholder="DelaCruz">
                    <div><small class="text-danger"> <?= $user->getError('last_name') ?></small></div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group row">
                      <label class="form-label">Gender</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="gender1"
                              value="Male" checked> Male </label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="gender2"
                              value="Female"> Female </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <label for="bday" class="form-label">Birthday</label>
                    <input name="birthday" value="<?= old_value('birthday') ?>" type="date" class="form-control" id="birthday"
                      >
                    <div><small class="text-danger"> <?= $user->getError('birthday') ?></small></div>
                  </div>
                  <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input value="<?= old_value('email') ?>" type="email" class="form-control" id="email" name="email"
                      placeholder="Juan@gmail.com">
                    <div><small class="text-danger"> <?= $user->getError('email') ?></small></div>
                  </div>

                  <div class="col-md-4">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input value="<?= old_value('phone') ?>" type="number" class="form-control" id="contact" name="phone"
                      placeholder="09337849329">
                    <div><small class="text-danger"> <?= $user->getError('phone') ?></small></div>
                  </div>
                  <div class="col-md-4">
                    <label for="address" class="form-label">Address</label>
                    <input value="<?= old_value('address') ?>" type="text" class="form-control text-center" name="address"
                      id="address" placeholder="Purok Gulod, Brgy. Bago, General Tinio Nueva Ecija">
                    <div><small class="text-danger"> <?= $user->getError('address') ?></small></div>
                  </div>
                  <div class="col-md-4">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" class="form-select" aria-label="Default select example" name="role">
                      <?php if(!empty($institutions)):?>
                          <?php foreach($institutions as $institutionz):?>
                              <option <?=old_select('category_id',$institutionz->id)?> value="<?=$institutionz->id?>"><?=$institutionz->name . ' ' . 'Rep'?></option>
                          <?php endforeach;?>
                      <?php endif;?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input value="<?= old_value('password') ?>" type="password" class="form-control" name="password"
                      id="password">
                    <div><small class="text-danger"> <?= $user->getError('password') ?></small></div>
                  </div>
                  <div class="col-md-6">
                    <label for="confirm_pass" class="form-label">Confirm Password</label>
                    <input value="<?= old_value('confirm_pass') ?>" type="password" class="form-control"
                      name="confirm_pass" id="confirm_pass">

                  </div>

                  <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">ADD</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/user" class="btn btn-gradient-secondary float-end btn-lg my-4">
                          BACK
                      </a>
                  </div>

                </div>

              </form>
              <!-- <div class="modal fade" id="modal_crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crop Image Before Upload</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="" id="sample_image" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="crop_and_upload" class="btn btn-primary">Crop</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>             -->
        </div>
              <script src="<?= ROOT ?>assets/dashboard/js/cropper.js"></script>
              <script src="<?= ROOT ?>assets/dashboard/js/jscropper-ajax.js"></script>
            </div>
          </div>
        </div>
      </div>

    <?php elseif ($action == 'edit'):?>

      <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>User</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update User</li>
          </ol>
        </nav>
      </div>
      
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Update User</h2>
              <?php if(!empty($row)):?>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">

                  <div class="col-md-12 text-center mb-5">
                    <label>Click to change image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                      <img src="<?= get_image($row->image) ?>" style="width: 200px;height:200px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $user->getError('image') ?></small></div>
                    </label>
                  </div>

                  <div class="col-md-3">
                    <label for="userid" class="form-label">School ID</label>
                    <input value="<?= old_value('school_id',$row->school_id) ?>" type="text" class="form-control" id="school_id" name="school_id"
                      placeholder="PPY-00002">
                    <div><small class="text-danger"> <?= $user->getError('school_id') ?></small></div>
                  </div>
                  <div class="col-md-3">
                    <label for="username" class="form-label">User Name</label>
                    <input value="<?= old_value('username',$row->username) ?>" type="text" class="form-control" id="username"
                      name="username" placeholder="juaan">
                    <div><small class="text-danger"> <?= $user->getError('username') ?></small></div>
                  </div>
                  <div class="col-md-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input value="<?= old_value('first_name',$row->first_name) ?>" type="text" class="form-control" id="fname"
                      name="first_name" placeholder="Juan">
                    <div><small class="text-danger"> <?= $user->getError('first_name') ?></small></div>
                  </div>
                  <div class="col-md-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input value="<?= old_value('last_name',$row->last_name) ?>" type="text" class="form-control" id="lname"
                      name="last_name" placeholder="DelaCruz">
                    <div><small class="text-danger"> <?= $user->getError('last_name') ?></small></div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group row">
                      <label class="form-label">Gender</label>
                      <div class="col-sm-4">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="gender1"
                              value="Male" <?=old_checked('gender','Male',$row->gender)?>> Male </label>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" id="gender2"
                              value="Female" <?=old_checked('gender','Female',$row->gender)?>> Female </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="bday" class="form-label">Birthday</label>
                    <input value="<?= old_value('birthday',$row->birthday) ?>" type="date" class="form-control" id="birthday"
                      name="birthday">
                    <div><small class="text-danger"> <?= $user->getError('birthday') ?></small></div>
                  </div>
                  <div class="col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input value="<?= old_value('email',$row->email) ?>" type="email" class="form-control" id="email" name="email"
                      placeholder="Juan@gmail.com">
                    <div><small class="text-danger"> <?= $user->getError('email') ?></small></div>
                  </div>

                  <div class="col-md-4">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input value="<?= old_value('phone',$row->phone) ?>" type="number" class="form-control" id="contact" name="phone"
                      placeholder="09337849329">
                    <div><small class="text-danger"> <?= $user->getError('phone') ?></small></div>
                  </div>
                  <div class="col-md-4">
                    <label for="address" class="form-label">Address</label>
                    <input value="<?= old_value('address',$row->address) ?>" type="text" class="form-control text-center" name="address"
                      id="address" placeholder="Purok Gulod, Brgy. Bago, General Tinio Nueva Ecija">
                    <div><small class="text-danger"> <?= $user->getError('address') ?></small></div>
                  </div>
                  <div class="col-md-4">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" class="form-select" aria-label="Default select example" name="role">
                      <?php if(!empty($institutions)):?>
                          <?php foreach($institutions as $institutionz):?>
                              <option <?=old_select('role',$institutionz->id,$row->role)?>  value="<?=$institutionz->id?>"><?=$institutionz->name . ' ' . 'Rep'?></option>
                          <?php endforeach;?>
                      <?php endif;?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input value="<?= old_value('password') ?>" type="password" class="form-control" name="password"
                      id="password">
                    <div><small class="text-danger"> <?= $user->getError('password') ?></small></div>
                  </div>
                  <div class="col-md-6">
                    <label for="confirm_pass" class="form-label">Confirm Password</label>
                    <input value="<?= old_value('confirm_pass') ?>" type="password" class="form-control"
                      name="confirm_pass" id="confirm_pass">

                  </div>

                  <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">UPDATE</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/user" class="btn btn-gradient-secondary float-end btn-lg my-4">
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
        <div class="mb-5"> <a href="<?=ROOT?>dashboard/user" class="btn  btn-gradient-secondary float-end btn-lg me-2">  BACK </a>  </div>
    <?php endif;?>

        <?php elseif ($action == 'delete'): ?>
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">

                <h1>
                  Delete Users
                </h1>

                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View Users</li>

                  </ol>
                </nav>
              </div>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div style="overflow-x:auto;">
                        <form method="post" class="text-center">
                          <div class="col-md-12 text-center">
                            <label>
                              <input onchange="display_image(this.files[0], event)" type="file" name="image"
                                class="d-none">
                              <img src="<?= get_img($row->image) ?>"
                                style="width: 200px;height:200px;object-fit: cover;cursor: pointer;">
                            </label>
                          </div>

                          <div class="form-control mt-3"><?=old_value('userid',$row->school_id)?></div>
                          <div class="form-control mt-3"><?=old_value('userid',$row->first_name)?></div>
                          <div class="form-control mt-3"><?=old_value('userid',$row->role)?></div>

                          <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                          <a href="<?= ROOT ?>dashboard/user" class="btn btn-secondary float-end btn-lg mt-3">
                            BACK
                          </a>

                        </form>
                      </div>
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
                      Users &nbsp;
                      <a href="<?= ROOT ?>dashboard/user/new" class="mb-4">
                        <button type="button" class="btn btn-gradient-primary btn-icon-text">
                          Add User <i class="mdi mdi-account-plus btn-icon-append"></i>
                        </button>
                      </a>
                    </h1>

                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Users</li>

                      </ol>
                    </nav>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                          <div style="overflow-x:auto;">


                            <table class="table table-striped table-bordered" id="userTable">
                              <thead class="bg-gradient-dark">
                                <tr class="text-white text-center">
                                  <th class="text-center"> # </th>
                                  <th class="text-center"> Photo </th>
                                  <th class="text-center"> School #</th>
                                  <th class="text-center"> Name</th>
                                  <th class="text-center"> Username </th>
                                  <th class="text-center"> Birthday </th>
                                  <th class="text-center"> Email </th>
                                  <th class="text-center"> Phone </th>
                                  <th class="text-center"> Address </th>
                                  <th class="text-center"> Role </th>
                                  <th class="text-center"> Action </th>
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
                                        <td><?= esc($row->school_id) ?></td>
                                        <td><?= esc($row->first_name) . ' ' . esc($row->last_name) ?> </td>
                                        <td><?= esc($row->username) ?></td>
                                        <td><?= get_date($row->birthday) ?></td>
                                        <td><?= esc($row->email) ?></td>
                                        <td><?= esc($row->phone) ?></td>
                                        <td><?= esc($row->address) ?></td>
                                        <?php
                                          $query  = "select institutions.name FROM institutions JOIN users ON users.role = institutions.id WHERE users.id = $row->id";
                                          $orgname = $this->query($query);
                                          ?>
                                          <td><?=$orgname[0]->name?></td>
                                        <td>
                                          <button type="button" class="btn btn-inverse-info btn-icon">
                                            <a  href="<?=ROOT?>dashboard/user/edit/<?=$row->id?>">
                                              <i class="mdi mdi-account-edit"></i>
                                            </a>
                                          </button>
                                          <a href="<?= ROOT ?>dashboard/user/delete/<?= $row->id ?>">
                                            <button type="button" class="btn btn-inverse-danger btn-icon">
                                              <i class="mdi mdi-delete"></i>
                                            </button>
                                          </a>
                                        </td>
                                      </tr>
                                  <?php endforeach;?>
                                <?php else:?>
                                <tr>
                                    <h1>No results found</h1>
                                </tr>
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
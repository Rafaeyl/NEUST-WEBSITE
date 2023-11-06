<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'edit'): ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Contact Information</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4">Add Contact Info</h2>
              <?php if(!empty($row)):?>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">

                  <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input value="<?= old_value('email',$row->email) ?>" type="email" class="form-control" id="email" name="email"
                      placeholder="Enter School's Email Address" required>
                  </div>
                  <div class="col-md-6">
                    <label for="phone" class="form-label mt-3">Phone Number</label>
                    <input value="<?= old_value('phone',$row->phone) ?>" type="number" class="form-control" id="phone"
                      name="phone" placeholder="Enter School's Phone Number"  >
                      <div><small class="text-danger"> <?= $contact_info->getError('phone') ?></small></div>
                  </div>
                  <div class="col-md-6">
                    <label for="address" class="form-label mt-3">Address</label>
                    <input value="<?= old_value('address',$row->address) ?>" type="text" class="form-control" id="address"
                      name="address" placeholder="Enter School's Address" required>
                  </div>
                  <div class="col-lg-6 text-center mx-auto">
                    <label for="facebook_link" class="form-label mt-3">Facebook Link</label>
                    <input value="<?= old_value('facebook_link',$row->facebook_link) ?>" type="text" class="form-control" id="facebook_link"
                      name="facebook_link" placeholder="EnterSchool's facebook_link" required>
                  </div>
                </div>
                <div class="row">
                <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">ADD</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/contact_info" class="btn btn-gradient-secondary float-end btn-lg my-4">
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
        <div class="mb-5"> <a href="<?=ROOT?>dashboard/user" class="btn  btn-gradient-secondary float-end btn-lg me-2">  BACK </a>  </div>
     <?php endif;?>

<?php else: ?>

  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>Contact Information</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

              <table class="table table-striped table-bordered">

                <?php if(!empty($rows)):?>
                  <?php foreach($rows as $row):?>

                      <tr><th>Facebook:</th><td><?=$row->facebook_link?></td></tr>
                      <tr><th>Email</th><td><?=$row->email?></td></tr>
                      <tr><th>Phone</th><td><?=$row->phone?></td></tr>
                      <tr><th>Address</th><td><?=$row->address?></td></tr>
                      <tr><th>Action</th>
                        <td>
                          <button type="button" class="btn btn-inverse-info btn-icon">
                            <a href="<?= ROOT ?>dashboard/contact_info/edit/<?= $row->id ?>">
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
  </div>


    <?php endif; ?>





    <?= $this->view('includes/dashboard-footer', $data); ?>
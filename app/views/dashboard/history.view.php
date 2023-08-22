<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>History</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4 text-center">Add new History</h2>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                  <div class="col-md-12 text-center mb-5">
                    <label class="mb-3 fw-bolder lead"> Image</label><br>
                    <label>Click to change Image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                      <img src="<?= get_image() ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $history->getError('image') ?></small></div>
                    </label>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="title" class="form-label">Title</label>
                    <input value="<?= old_value('title') ?>" type="text" class="form-control text-center" id="title" name="title"
                      placeholder="Enter Title">
                      <div><small class="text-danger"> <?= $history->getError('title') ?></small></div>
                  </div>
                  <div class="col-md-12 mx-auto text-center">
                    <label for="description" class="form-label">Description</label>
                    <textarea rows="5"name="description" class="form-control text-center mx-auto w-75" id="summernote" type="content"  placeholder="Enter Description"><?=old_value('description')?></textarea>
                    <div><small class="text-danger"> <?= $history->getError('description') ?></small></div>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="date" class="form-label">Date</label>
                    <input value="<?= old_value('date') ?>" type="text" class="form-control text-center" id="date"
                      name="date" placeholder="Enter Date">
                      <div><small class="text-danger"> <?= $history->getError('date') ?></small></div>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="list_order" class="form-label">List Order</label>
                    <input value="<?= old_value('list_order') ?>" type="number" class="form-control text-center" id="list_order"
                      name="list_order" placeholder="History order">
                      <div><small class="text-danger"> <?= $history->getError('list_order') ?></small></div>
                  </div>
                  <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">ADD</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/history" class="btn btn-gradient-secondary float-end btn-lg my-4">
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
        <h1>  History</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4 text-center">Update an History</h2>
              <?php if(!empty($row)):?>
                <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                    <div class="col-md-12 text-center mb-5">
                        <label class="mb-3 fw-bolder lead"> Image</label><br>
                        <label>Click to change Image</label><br>
                        <label>
                        <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                        <img src="<?= get_image($row->image) ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                        <div><small class="text-danger"> <?= $history->getError('image') ?></small></div>
                        </label>
                    </div>
                    <div class="col-md-12 mx-auto w-75 text-center">
                        <label for="title" class="form-label">Title</label>
                        <input value="<?= old_value('title',$row->title) ?>" type="text" class="form-control text-center" id="title" name="title"
                        placeholder="Enter Title">
                        <div><small class="text-danger"> <?= $history->getError('title') ?></small></div>
                    </div>
                    <div class="col-md-12 mx-auto text-center">
                        <label for="description" class="form-label">Description</label>
                        <textarea rows="5"name="description" class="form-control text-center mx-auto w-75" id="summernote" type="content"  placeholder="Enter Description"><?=old_value('description',$row->description)?></textarea>
                        <div><small class="text-danger"> <?= $history->getError('description') ?></small></div>
                    </div>
                    <div class="col-md-12 mx-auto w-75 text-center">
                        <label for="date" class="form-label">Date</label>
                        <input value="<?= old_value('date',$row->date) ?>" type="text" class="form-control text-center" id="date"
                        name="date" placeholder="Enter Date">
                        <div><small class="text-danger"> <?= $history->getError('date') ?></small></div>
                    </div>
                    <div class="col-md-12 mx-auto w-75 text-center">
                        <label for="list_order" class="form-label">List Order</label>
                        <input value="<?= old_value('list_order',$row->list_order) ?>" type="number" class="form-control text-center" id="list_order"
                        name="list_order" placeholder="History order">
                        <div><small class="text-danger"> <?= $history->getError('list_order') ?></small></div>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-gradient-primary btn-lg my-4">UPDATE</button>
                    </div>
                    <div class="col-6">
                        <a href="<?=ROOT?>dashboard/history" class="btn btn-gradient-secondary float-end btn-lg my-4">
                            BACK
                        </a>
                    </div>
                </div>

                </form>
              <?php else:?>
                <div class="alert alert-danger text-center">Record not found!</div>
                <div class="mb-5"> <a href="<?=ROOT?>dashboard/history" class="btn  btn-gradient-secondary float-end btn-lg me-2">  BACK </a>  </div>
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
          Delete History &nbsp;
        </h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
      

                <h3 class="mb-5 text-center">Are you sure you want to delete this History?</h3>
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
                    
                    <div class="col-md-12 mx-auto w-50">
                      <label class="mt-4">Title</label>
                      <input class="form-control mt-3 text-center" value="<?=old_value('title',$row->title)?>" disabled>
                    </div>
                    <div class="col-md-12 mx-auto w-50">
                      <label class="mt-4">Description</label>
                      <input class="form-control mt-3 text-center" value="<?=old_value('description',$row->description)?>" disabled>
                    </div>
                  </div>
                
                 
                          
                  <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                  <a href="<?= ROOT ?>dashboard/history" class="btn btn-secondary float-end btn-lg mt-3">
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
            History &nbsp;
              <a href="<?= ROOT ?>dashboard/history/new" class="mb-4">
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


                    <table class="table table-striped table-bordered"  id="userTable">
                      <thead class="bg-gradient-dark">
                        <tr class="text-white">
                          <th> # </th>
                          <th> Image </th>
                          <th> Title</th>
                          <th> Description</th>
                          <th> Date</th>
                          <th> List Order</th>
                          <th> Action </th>
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
                                <td><?= esc($row->title) ?></td>
                                <td><?= esc($row->description) ?></td>
                                <td><?= esc($row->date) ?></td>
                                <td><?= esc($row->list_order) ?></td>
                                <td>
                                  <button type="button" class="btn btn-inverse-info btn-icon">
                                    <a  href="<?=ROOT?>dashboard/history/edit/<?=$row->id?>">
                                      <i class="mdi mdi-account-edit"></i>
                                    </a>
                                  </button>
                                  <a href="<?= ROOT ?>dashboard/history/delete/<?= $row->id ?>">
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
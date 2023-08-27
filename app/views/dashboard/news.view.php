<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>

  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1>News</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4 text-center">Add News</h2>
              <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                  <div class="col-md-12 text-center mb-5">
                    <label class="mb-3 fw-bolder lead"> Image</label><br>
                    <label>Click to change Image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                      <img src="<?= get_image() ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                      <div><small class="text-danger"> <?= $news->getError('image') ?></small></div>

                    </label>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="title" class="form-label">Title</label>
                    <input value="<?= old_value('title') ?>" type="text" class="form-control text-center" id="title" name="title"
                      placeholder="Enter title">

                  </div>
                  <div class="col-md-12 mx-auto text-center">
                    <label for="description" class="form-label">Description</label>
                    <textarea rows="4"name="description" class="form-control text-center mx-auto w-75" id="summernote" type="content"  placeholder="Enter Description"><?=old_value('description')?></textarea>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                      <label for="role" class="form-label">Organization</label>
                      <select id="institution" class="form-select" aria-label="Default select example" name="category_id">
                        <?php if(!empty($categories)):?>
                            <?php foreach($categories as $category):?>
                                <option class="text-center" <?=old_select('category_id',$category->id)?> value="<?=$category->id?>"><?=$category->name?></option>
                            <?php endforeach;?>
                        <?php else: ?>
                          <option value="">No category Available</option>
                        <?php endif;?>
                      </select>
                    </div> 
                  <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">ADD</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/news" class="btn btn-gradient-secondary float-end btn-lg my-4">
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
        <h1>  News</h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h2 class="mb-4 text-center">Update News</h2>
              <?php if(!empty($row)):?>
                <form method="post" enctype="multipart/form-data">
                <div class="row g-3 my-3 mx-auto">
                  <div class="col-md-12 text-center mb-5">
                    <label class="mb-3 fw-bolder lead"> Image</label><br>
                    <label>Click to change Image</label><br>
                    <label>
                      <input onchange="display_image(this.files[0], event)" type="file" name="image" class="d-none">
                      <img src="<?= get_image($row->image) ?>" style="width: 150px;height:150px;object-fit: cover;cursor: pointer;">
                    </label>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                    <label for="title" class="form-label">Title</label>
                    <input value="<?= old_value('title',$row->title) ?>" type="text" class="form-control text-center" id="title" name="title"
                      placeholder="Enter title">

                  </div>
                  <div class="col-md-12 mx-auto text-center">
                    <label for="description" class="form-label text-center">Description</label>
                    <textarea rows="4"name="description" class="form-control text-center mx-auto w-75" id="summernote" type="content"  placeholder="Enter Description"><?=old_value('description',$row->description)?></textarea>
                  </div>
                  <div class="col-md-12 mx-auto w-75 text-center">
                      <label for="role" class="form-label">Organization</label>
                      <select id="category_id" class="form-select" aria-label="Default select example" name="category_id">
                        <?php if(!empty($categories)):?>
                            <?php foreach($categories as $category):?>
                                <option class="text-center" <?=old_select('category_id',$category->id,$row->category_id)?> value="<?=$category->id?>"><?=$category->name?></option>
                            <?php endforeach;?>
                        <?php else: ?>
                          <option value="">No category Available</option>
                        <?php endif;?>
                      </select>
                    </div> 
                  <div class="col-6">
                    <button class="btn btn-gradient-primary btn-lg my-4">UPDATE</button>
                  </div>
                  <div class="col-6">
                      <a href="<?=ROOT?>dashboard/news" class="btn btn-gradient-secondary float-end btn-lg my-4">
                          BACK
                      </a>
                  </div>
                </div>
              </form>
              <?php else:?>
                <div class="alert alert-danger text-center">Record not found!</div>
                <div class="mb-5"> <a href="<?=ROOT?>dashboard/news" class="btn  btn-gradient-secondary float-end btn-lg me-2">  BACK </a>  </div>
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
          Delete News &nbsp;
        </h1>
      </div>
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">

                <h3 class="mb-5 text-center">Are you sure you want to delete <?= $row->title ?> ?</h3>
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
                    
                    <div class="col-md-12 mx-auto w-75">
                      <label class="mt-4">Title</label>
                      <input class="form-control mt-3 text-center" value="<?=old_value('institution',$row->title)?>" disabled>
                    </div>
                  </div>
                
                 
                          
                  <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                  <a href="<?= ROOT ?>dashboard/news" class="btn btn-secondary float-end btn-lg mt-3">
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
              News &nbsp;
              <a href="<?= ROOT ?>dashboard/news/new" class="mb-4">
                <button type="button" class="btn btn-gradient-primary btn-icon-text">
                  Add News <i class="mdi mdi-account-plus btn-icon-append"></i>
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
                      <thead  class="bg-gradient-dark">
                        <tr class="text-white">
                            <th>#</th>
                            <th>Image</th>
                            <th>News title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Action</th>
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
                                <td><?=substr($row->title, 0,20) . '...' ?></td>
                                <td><?=substr($row->description, 0,20) . '...' ?></td>
                                <?php
                                 $query  = "select news_categories.name FROM news_categories JOIN news ON news.category_id = news_categories.id WHERE news.id = $row->id";
                                  $orgname = $this->query($query);
                                ?>
                                <td><?=$orgname[0]->name?></td>
                                <td><?= get_date($row->date) ?></td>
                                <td>
                                  <button type="button" class="btn btn-inverse-info btn-icon">
                                    <a  href="<?=ROOT?>dashboard/news/edit/<?=$row->id?>">
                                      <i class="mdi mdi-account-edit"></i>
                                    </a>
                                  </button>
                                  <a href="<?= ROOT ?>dashboard/news/delete/<?= $row->id ?>">
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
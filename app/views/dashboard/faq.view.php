<?= $this->view('includes/dashboard-header', $data); ?>


<?php if ($action == 'new'): ?>
  <link rel="stylesheet" type="text/css" href="<?=ROOT?>assets/main/summernote/summernote-lite.min.css">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h1 ">FAQ</h1>
          </div>
          <div class=" row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h2 class="mb-4 text-center">Add FAQ</h2>
                <form method="post" enctype="multipart/form-data">
                  <div class="row g-3 my-3 mx-auto">
                    <div class="col-md-8 mx-auto w-75">
                      <label for="question" class="form-label">FAQ's Question</label>
                      <input value="<?= old_value('question') ?>" type="text" class="form-control text-center"
                        id="question" name="question" placeholder="Enter FAQ's question" required>
                    </div>
                    <div class="col-md-8 mx-auto w-75">
                      <label for="answer" class="form-label">FAQ's Answer</label>
                      <textarea rows="7" name="answer" class="form-control text-center" id="summernote" type="content"
                        placeholder="Enter FAQ's Answer"><?= old_value('answer') ?></textarea>
                    </div>
                    <div class="col-md-8 mx-auto w-75">
                      <label for="list_order" class="form-label">List Order</label>
                      <input value="<?= old_value('list_order') ?>" type="number" class="form-control text-center"
                        id="list_order" name="list_order" placeholder="Enter a number for list order" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-gradient-primary btn-lg my-4">ADD</button>
                    </div>
                    <div class="col-6">
                      <a href="<?= ROOT ?>dashboard/faq" class="btn btn-gradient-secondary float-end btn-lg my-4">
                        BACK
                      </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
      <script src="<?= ROOT ?>assets/dashboard/js/jquery3.js" type="text/javascript"></script>
      <script src="<?= ROOT ?>assets/main/summernote/summernote-lite.min.js"></script>
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



    <?php elseif ($action == 'edit'): ?>
      <link rel="stylesheet" type="text/css" href="<?=ROOT?>assets/main/summernote/summernote-lite.min.css">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h1>FAQ</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="mb-4">Update FAQ</h2>
                  <?php if (!empty($row)): ?>
                    <form method="post" enctype="multipart/form-data">
                      <div class="row g-3 my-3 mx-auto">
                        <div class="col-md-8 mx-auto w-75">
                          <label for="question" class="form-label">FAQ's Question</label>
                          <input value="<?= old_value('question', $row->question) ?>" type="text"
                            class="form-control text-center" id="question" name="question"
                            placeholder="Enter FAQ's question" required>
                        </div>
                        <div class="col-md-8 mx-auto w-75">
                          <label for="answer" class="form-label">FAQ's Answer</label>
                          <textarea rows="7" name="answer" class="form-control text-center" id="summernote" type="content"
                            placeholder="Enter FAQ's Answer"><?= old_value('answer', $row->answer) ?></textarea>
                        </div>
                        <div class="col-md-8 mx-auto w-75">
                          <label for="list_order" class="form-label">List Order</label>
                          <input value="<?= old_value('list_order', $row->list_order) ?>" type="number"
                            class="form-control text-center" id="list_order" name="list_order"
                            placeholder="Enter a number for list order" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <button class="btn btn-gradient-primary btn-lg my-2">UPDATE</button>
                        </div>
                        <div class="col-6">
                          <a href="<?= ROOT ?>dashboard/faq" class="btn btn-gradient-secondary float-end btn-lg my-2">
                            BACK
                          </a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <script src="<?= ROOT ?>assets/dashboard/js/jquery3.js" type="text/javascript"></script>
            <script src="<?= ROOT ?>assets/main/summernote/summernote-lite.min.js"></script>
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
          <?php else: ?>
            <div class="alert alert-danger text-center">Record not found!</div>
            <div class="mb-5"> <a href="<?= ROOT ?>dashboard/user"
                class="btn  btn-gradient-secondary float-end btn-lg me-2">
                BACK </a> </div>
          <?php endif; ?>


        <?php elseif ($action == 'delete'): ?>

          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">
              <div class="page-header">

                <h1>
                  Delete FAQ &nbsp;
                </h1>
              </div>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">


                      <h3 class="mb-5 text-center">Are you sure you want to delete this FAQ?</h3>

                      <form method="post" class="text-center">


                        <div class="form-control my-3 w-75 mx-auto">
                          <?= old_value('question', $row->question) ?>
                        </div>

                        <button type="submit" class="btn btn-danger float-start btn-lg mt-3">DELETE</button>
                        <a href="<?= ROOT ?>dashboard/faq" class="btn btn-secondary float-end btn-lg mt-3">
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
                    <h1>FAQ &nbsp;
                      <a href="<?= ROOT ?>dashboard/faq/new">
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
                            <table class="table table-striped  table-bordered" id="userTable">
                              <thead class="bg-darken">
                                <tr class="text-white text-center">
                                  <th> # </th>
                                  <th> FAQ's Name</th>
                                  <th> FAQ Order </th>
                                  <th> List Order</th>
                                  <th> Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if (!empty($rows)):
                                  $num = 1; ?>
                                  <?php foreach ($rows as $row): ?>
                                    <tr>
                                      <td>
                                        <?= $num++ ?>
                                      </td>
                                      <td>
                                        <?= esc($row->question) ?>
                                      </td>
                                      <td>
                                        <?= substr($row->answer, 0, 30) . '...' ?>
                                      </td>
                                      <td>
                                        <?= esc($row->list_order) ?>
                                      </td>
                                      <td>
                                        <button type="button" class="btn btn-inverse-info btn-icon">
                                          <a href="<?= ROOT ?>dashboard/faq/edit/<?= $row->id ?>">
                                            <i class="mdi mdi-account-edit"></i>
                                          </a>
                                        </button>
                                        <a href="<?= ROOT ?>dashboard/faq/delete/<?= $row->id ?>">
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
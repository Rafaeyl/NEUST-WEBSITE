<?= $this->view('includes/header', $data); ?>

<section class="hero-wrap hero-wrap-2"
    style="background-image: url('<?= ROOT ?>/assets/images/image-school/school-1.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Academic Calendar</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                class="fa-solid fa-arrow-right"></i></a></span> <span>Academic Calendar <i
                            class="fa-solid fa-arrow-right"></i></span></p>
            </div>
        </div>
    </div>
</section>





<section id="section">
    <div class="container">
        <div class="my-5 fw-bolder calendar_title">
            <h1 class=" text-primary">2023-2024 Academic Calendar</h1>
            <h5 class="text-secondary">The Campus's Academic Calendar is subject to change. In the event that changes
                are made, the latest, most up-to-date version will be posted on this page.</h5>
        </div>

        <table class="table table-striped table-bordered my-5">
            <thead class="bg-darken text-white">
                <tr>
                    <th></th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($general)): ?>
                    <?php foreach($general as $row):?>
                        <tr>
                            <td><?= esc($row->title)?></td>
                            <td><?= esc($row->date) ?></td>
                        </tr>
                    <?php endforeach; ?>
            <?php else: ?>
                    <center>
                        <h1 class="bg-danger p-5 text-white">NO ACADEMIC CALENDAR FOUND</h1>
                    </center>
            <?php endif; ?>    
            </tbody>
        </table>

        <div class="my-5 fw-bolder calendar_title">
            <h2 class=" text-primary">Holidays</h2>
            <h5 class="text-secondary">NEUST General Tinio(Papaya) Campus support and recognize the holidays,
                traditional observances and major days of religious significance of the diverse students we serve.</h5>
        </div>

        <table class="table table-striped table-bordered my-5">
            <thead class="bg-darken text-white">
                <tr>
                    <th></th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php if(!empty($holiday)): ?>
                    <?php foreach($holiday as $row):?>
                        <tr>
                            <td><?= esc($row->title)?></td>
                            <td><?= esc($row->date) ?></td>
                        </tr>
                    <?php endforeach; ?>
            <?php else: ?>
                    <center>
                        <h1 class="bg-danger p-5 text-white">NO HOLIDAYS FOUND</h1>
                    </center>
            <?php endif; ?>   
            </tbody>
        </table>

    </div>
</section>


<?php include '../app/views/includes/footer.view.php'; ?>
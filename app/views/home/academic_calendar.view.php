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
            <thead class="bg-secondary">
                <tr>
                    <th></th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h5>General Registration</h5>
                    </td>
                    <td>
                        <h5>June 13 - August 19 </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>1<sup>st</sup> Semester Begins</h5>
                    </td>
                    <td>
                        <h5> August 22 </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Last Day of Registration</h5>
                    </td>
                    <td>
                        <h5> August 30 </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Deadline of Adding, Changing, and Dropping of Subject</h5>
                    </td>
                    <td>
                        <h5> August 29 - 30 </h5>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="my-5 fw-bolder calendar_title">
            <h2 class=" text-primary">Holidays</h2>
            <h5 class="text-secondary">NEUST General Tinio(Papaya) Campus support and recognize the holidays,
                traditional observances and major days of religious significance of the diverse students we serve.</h5>
        </div>

        <table class="table table-striped table-bordered my-5">
            <thead class="bg-secondary">
                <tr>
                    <th></th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h5>Independence Day (Regular Holiday)</h5>
                    </td>
                    <td>
                        <h5>June 12 </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Ninoy Aquino Day (Regular Holiday)</h5>
                    </td>
                    <td>
                        <h5>August 21</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5> National Hero's Day (Regular Holiday)</h5>
                    </td>
                    <td>
                        <h5> August 29 </h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5> Nueva Ecija Day (Regular Holiday) </h5>
                    </td>
                    <td>
                        <h5> September 02</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5> All Saint's Day (Special Non-Working Day) </h5>
                    </td>
                    <td>
                        <h5> November 01</h5>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</section>


<?php include '../app/views/includes/footer.view.php'; ?>
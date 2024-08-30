<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<?php include "template/head.html" ?>

<body>
    <!-- Icon -->
    <?php include "template/svg.html" ?>

    <!-- Theme -->
    <?php include "template/theme.html" ?>

    <!-- Navbar -->
    <?php include "template/navbar.html" ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include "template/sidebar.html" ?>

            <!-- Content -->
            <main class="col-md-8 ms-sm-auto col-lg-9 px-md-4 bg-body-tertiary ">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Anggota Kelompok</h1>
                </div>
                <div class="row">
                    <div class="col-sm-4 my-3">
                        <div class="card p-0 mx-3 rounded-top-5 border-0">
                            <div class="card-image">
                                <img src="assets/img/person.jpg" alt="">
                            </div>
                            <div class="card-content d-flex flex-column align-items-center text-light">
                                <h4 class="pt-2">Person</h4>
                                <h5>ID</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card p-0 mx-3 rounded-top-5 border-0">
                            <div class="card-image">
                                <img src="assets/img/person.jpg" alt="">
                            </div>
                            <div class="card-content d-flex flex-column align-items-center text-light">
                                <h4 class="pt-2">Person</h4>
                                <h5>ID</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card p-0 mx-3 rounded-top-5 border-0">
                            <div class="card-image">
                                <img src="assets/img/person.jpg" alt="">
                            </div>
                            <div class="card-content d-flex flex-column align-items-center text-light">
                                <h4 class="pt-2">Person</h4>
                                <h5>ID</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>


<?php include "template/foot.html" ?>

</html>

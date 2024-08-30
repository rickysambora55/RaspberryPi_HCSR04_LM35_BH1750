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
                    <h1 class="h2">Dashboard Thingspeak</h1>
                </div>
                <div class="row">
                    <div class="col-sm-4 my-3">
                        <div class="card border-5 border-start-0 border-top-0 border-end-0 border-success rounded-0 rounded-top-5 shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-start col-8">
                                        <h3 class="text-success" id="dataTSSuhu">0°C</h3>
                                        <span>Suhu Ruangan</span>
                                    </div>
                                    <div class="text-end col-2">
                                        <i class="bi bi-thermometer-half text-success fs-1 m-0 p-0 align-end"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card border-5 border-start-0 border-top-0 border-end-0 border-primary rounded-0 rounded-top-5 shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-start col-8">
                                        <h3 class="text-primary" id="dataTSJarak">0cm</h3>
                                        <span>Jarak</span>
                                    </div>
                                    <div class="text-end col-2">
                                        <i class="bi bi-rulers text-primary fs-1 m-0 p-0 align-end"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 my-3">
                        <div class="card border-5 border-start-0 border-top-0 border-end-0 border-warning rounded-0 rounded-top-5 shadow">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="text-start col-8">
                                        <h3 class="text-warning" id="dataTSCahaya">0Lux</h3>
                                        <span>Cahaya</span>
                                    </div>
                                    <div class="text-end col-2">
                                        <i class="bi bi-brightness-low-fill text-warning fs-1 m-0 p-0 align-end"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12 my-3">
                        <div class="card border-0 rounded-5 shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <iframe width="450" height="260" src="https://thingspeak.com/channels/2292107/charts/1?bgcolor=%23ffffff&color=%23138535&dynamic=true&results=10&round=2&title=Suhu+Ruangan&type=line&xaxis=Waktu&yaxis=Celcius"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 my-3">
                        <div class="card border-0 rounded-5 shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <iframe width="450" height="260" src="https://thingspeak.com/channels/2292107/charts/2?bgcolor=%23ffffff&color=%23007AAE&dynamic=true&results=10&title=Jarak&type=line&xaxis=Waktu&yaxis=cm"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12 my-3">
                        <div class="card border-0 rounded-5 shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <iframe width="450" height="260" src="https://thingspeak.com/channels/2292107/charts/3?bgcolor=%23ffffff&color=%23FFF766&dynamic=true&results=10&title=Cahaya&type=line&xaxis=Waktu&yaxis=Lux"></iframe>
                                </div>
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
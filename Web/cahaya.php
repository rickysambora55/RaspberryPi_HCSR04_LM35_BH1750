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
                    <h1 class="h2">Log Sensor Cahaya</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="my-3">
                        <div class="card p-5 border-0 shadow rounded-5 mx-3 text-warning">
                            <canvas class="w-100" id="myChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="my-3 text-warning">
                        <div class="card p-5 border-0 shadow rounded-5 mx-2 my-3 text-dark-emphasis">
                            <table id="tabeldata" class="table table-striped table-hover my-3 text-center">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center text-dark-emphasis">#</th>
                                        <th scope="col" class="text-center text-dark-emphasis">Waktu</th>
                                        <th scope="col" class="text-center text-dark-emphasis">Cahaya (Lux)</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php
                                    include "assets/database/koneksi.php";
                                    $result = mysqli_query($db, "SELECT * FROM sensorCahaya ORDER BY id");
                                    while ($row = mysqli_fetch_row($result)) {
                                    ?>
                                        <tr>
                                            <th scope="row" class="text-dark-emphasis"><?php echo $row[0] ?></th>
                                            <td class="text-dark-emphasis"><?php echo date('d M Y H:i:s', strtotime($row[1])) ?></td>
                                            <td class="text-dark-emphasis"><?php echo $row[2] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script type="text/javascript">
    const sensorData = <?php
                        include "assets/database/koneksi.php";

                        $result = mysqli_query($db, "SELECT timestamp, cahaya FROM sensorCahaya ORDER BY id DESC LIMIT 10");

                        $timestampData = array();
                        $valueData = array();

                        while ($row = mysqli_fetch_assoc($result)) {
                            $timestampData[] = date('i:s', strtotime($row['timestamp']));
                            $valueData[] = $row['cahaya'];
                        }

                        // Create an associative array to hold both sets of data
                        $data = array(
                            'timestamp' => $timestampData,
                            'cahaya' => $valueData
                        );

                        echo json_encode($data);
                        ?>

    const waktuArray = sensorData.timestamp;
    const valueArray = sensorData.cahaya;
    const ctx = document.getElementById("myChart");
    const chartData = new Chart(ctx, {
        type: "line",
        data: {
            labels: waktuArray,
            datasets: [{
                label: "Cahaya (Lux)",
                data: valueArray,
                borderWidth: 2,
                borderColor: '#FFC107'
            }, ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false,
                },
            },
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 16,
                            weight: 'bold'
                        }
                    }
                }
            }
        },
    });
</script>
<?php include "template/foot.html" ?>
<script src="assets/js/chart.js"></script>

</html>
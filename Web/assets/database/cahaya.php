<?php
include "koneksi.php";

$response = array();

// Fetch data for Cahaya
$dataCahaya = mysqli_query($db, "SELECT * FROM sensorCahaya ORDER BY id DESC");
$cahaya = $dataCahaya->fetch_assoc();
$response['cahaya'] = $cahaya;

mysqli_close($db);

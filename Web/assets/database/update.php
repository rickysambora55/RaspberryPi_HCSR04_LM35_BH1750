<?php
include "koneksi.php";

$response = array();

// Fetch data for Cahaya
$dataCahaya = mysqli_query($db, "SELECT * FROM sensorCahaya ORDER BY id DESC LIMIT 1");
$cahaya = $dataCahaya->fetch_assoc();
$response['cahaya'] = $cahaya;

// Fetch data for Suhu
$dataSuhu = mysqli_query($db, "SELECT * FROM sensorSuhu ORDER BY id DESC LIMIT 1");
$suhu = $dataSuhu->fetch_assoc();
$response['suhu'] = $suhu;

// Fetch data for Jarak
$dataJarak = mysqli_query($db, "SELECT * FROM sensorJarak ORDER BY id DESC LIMIT 1");
$jarak = $dataJarak->fetch_assoc();
$response['jarak'] = $jarak;

mysqli_close($db);

echo json_encode($response);

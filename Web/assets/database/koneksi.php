<?php

date_default_timezone_set("Asia/Jakarta");
$db = mysqli_connect('localhost', 'kel2te4b', '12345678', 'sensor');
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// function formatDateToIndonesian($dateString)
// {
//     $locale = 'id_ID';
//     $dateFormatter = new IntlDateFormatter($locale, IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, "dd MMM yyyy HH:mm:ss v");
//     $dateTime = new DateTime($dateString);
//     $formattedDate = $dateFormatter->format($dateTime);

//     return $formattedDate;
// }

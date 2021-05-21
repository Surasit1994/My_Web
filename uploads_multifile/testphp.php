<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $filename = $_POST['filename'];
    $name_activity=$_POST['name_activity'];
    $old_name_activity=$_POST['old_name_activity'];
    if (empty($name_activity)) {
        echo "name_activity is empty";
    } else {
        echo $name_activity;
    }

    if (empty($old_name_activity)) {
        echo "old_name_activity is empty";
    } else {
        echo $old_name_activity;
    }

    if (empty($filename)) {
        echo "filename is empty";
    } else {
        echo $filename;
    }
    
   
?>
   


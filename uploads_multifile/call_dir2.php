<script>
    console.log('<?php echo $_GET["part_dir1"]; ?>');
</Script>

<?php

function call_pic()
{   //echo $_GET["part_dir1"];
    $part_dir = $_GET['part_dir1'];
    //echo $_GET["part_data_from_link"];
    $dir = $part_dir;
    $list_dir = array();
    // Open a directory, and read its contents
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            $i = 0;
            while (($file = readdir($dh)) !== false) {
                //echo "filename:" . $file . "<br>";


                if ($file == "." or $file == ".." or $file == "...") {
                    continue;
                } else {
                    $part_pic = $dir . "/" . $file;
                    //echo $part_pic . "<br>";
                    array_push($list_dir, $part_pic);
                } //Close else;--------------------------
            }
            closedir($dh);
        }
    }
    // echo 'value form call pic!!!!!';
    //echo $part_dir;
     $js_list_dir = json_encode($list_dir);
     //echo '<br>'.$js_list_dir;
     return $js_list_dir;
     

    
   
}

?>

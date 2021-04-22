

<?php
    

    function call_dir($part_dir){
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
                    //$part_pic = $dir . "/" . $file;
                    
                    //echo $part_pic . "<br>";
                    array_push($list_dir,$file);
                   
                } //Close else;--------------------------
            }
            closedir($dh);
        }
    }
    // echo 'value form call pic!!!!!';
    //echo $part_dir;
     $js_list_dir = json_encode($list_dir);
     return $js_list_dir;
     //echo $js_list_dir;
} 
     if( isset($_GET['index_link']) ){
        $part_dir  = $_GET['index_link'];
        echo call_dir($part_dir);
    }
    else{
        $part_dir  = 'uploads';
        echo call_dir("Error");
    } 
    
    
   

?>

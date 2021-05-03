<?php
    echo filetype("./test_file/img1.jpg");
   echo basename("./test_file/img1.jpg");
   $n=strpos(basename("./test_file/img1.jpg"),".");
   echo "<br>".$n."<br>";
   $file_type = substr(basename("./test_file/img1.jpg"),$n+1);
   echo $file_type;
   if($file_type=="jpg"){
    echo '<br>True';
  }

?>
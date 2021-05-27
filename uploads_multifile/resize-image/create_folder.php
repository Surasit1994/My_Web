<?php
if($_POST['name']!=''){
    if(mkdir("./uploads/".$_POST['name'], 0700)){
        echo "success!! : ".$_POST['name'] ;
    }
    else { echo "unsuccess";
    }
}else echo "name not set";

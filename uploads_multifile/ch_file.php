<!DOCTYPE html>
<html>

<head>
  <title>How to upload Multiple Image files with jQuery AJAX and PHP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript" src='jquery-3.4.1.min.js'></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style type="text/css">
    #preview img {
      margin: 5px;
    }

    body {
      /* font-family: 'Sriracha', cursive;*/
      background-color: rgba(225, 242, 245, 0.836);
    }

    /*
    [class*="col"] {
      padding: 1rem;
      background-color: #f5d3ff;
      border: 2px solid #fff;
      color: rgb(10, 10, 10);

    }
*/
    [id*="slide1"] {
      padding: 1rem;
      background-color: #f5d3ff;
      border: 2px solid #fff;
      color: rgb(10, 10, 10);

    }
  </style>
</head>
<script>
              function myFunction() {
                console.log(<?php call_pic(); ?>);
                document.getElementById('test3').innerHTML = "<?php call_pic(); ?>">;
              }
            </script>
<body>

<?php
      function call_pic()
      {
        $dir = "uploads";

        // Open a directory, and read its contents
        if (is_dir($dir)) {
          if ($dh = opendir($dir)) {
            $i = 0;
            while (($file = readdir($dh)) !== false) {
              //echo "filename:" . $file . "<br>";


              if ($file == "." or $file == ".." or $file == "...") {
                continue;
              } else {
                $part_pic2 = "uploads/" . $file;
                //echo $part_pic."<br>";
      ?>
                <script>
                  if (<?php echo $i ?> == 0) {
                    <?php $i = 1 ?>
                    $('#pic1').append('<img src=' + <?php echo  '"' . $part_pic2 . '"' ?> + ' class="d-block w-100 img-fluid" width:200px hight: auto>');
                  } else {
                    $('#pic_2').append('<div class="carousel-item"><img src=' + <?php echo '"' . $part_pic2 . '"' ?> + ' class="d-block w-100  img-fluid" alt="..." ></div>');

                  }
                </script>

      <?php
              } //Close else;--------------------------
            }
            closedir($dh);
          }
        }echo 'value form call pic!!!!!';
      }
      ?>
      
    
  <div class="container">
    <!---------------------------Image first page ----------------------------------------->
    <img src="./images/head-index.png" class="img-fluid" alt="Welcome">
    <!---------------------------Menu navbar-------------------------------->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <!--<a class="navbar-brand" href="#">Navbar</a>-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
          <!-- 
                       <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                             <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>> 
                    -->
        </div>
      </div>
    </nav>
    <!------------------------------------Body content------------------------------------------>
    <div class="container " style="background-color: rgba(214, 246, 252, 0.836);">
      <div class="row justify-content-start">
        <div class="col-2">
          <div id="test2">
            <p id="test3">
                  55555555
            </p>

          </div>
          <div id="list_folder_pic" class="container">
          
            <?php
            echo '<br>';
            $dir = "uploads";

            // Open a directory, and read its contents
            if (is_dir($dir)) {
              if ($dh = opendir($dir)) {
                $i = 0;
                while (($file = readdir($dh)) !== false) {
                  //echo "filename:" . $file . "<br>";


                  if ($file == "." or $file == ".." or $file == "...") {
                    continue;
                  } else {
                    $part_pic = "uploads/" . $file;

                    echo '<button class="btn-sm btn-success"  onclick="myFunction()">' . $file . '</button><br>';
                    //echo $part_pic."<br>";

                  } //Close else;--------------------------
                }
                closedir($dh);
              }
            }
            ?>
            
          </div>
        </div>
        <div class="col-10">
          <div class="row justify-content-center">
            <div id="slide1" class="col-8">
              <!---------------------------  photo slide  ------------------------------------->
              <div id="test1" style="text-align: center;">
                <div id="carouselExampleControlsNoTouching" class="carousel slide " data-bs-touch="false" data-bs-interval="false">
                  <div id="pic_2" class="carousel-inner">
                    <div id="pic1" class="carousel-item active">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>




     

    </div>






  </div>
  <!-----------------------------End----Body content------------------------------------------>

  <!----------------------Footer-------------------------------------------------------------->
  <!-- Footer -->
  <footer class="bg-light text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4" style="background-color: rgba(214, 246, 252, 0.836);">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5>ติดต่อ</h5>
          <p>
            ช่องทางการรับเรื่องร้องเรื่อง <br>
            1.Email โรงพยาบาล : <a href="mailto:Rattanawapi.hospital@gmail.com ">Rattanawapi.hospital@gmail.com </a><br>
            2.Facebook โรงพยาบาล :<a target="_blank" href="https://www.facebook.com/rtnhospital/">https://www.facebook.com/rtnhospital/</a><br>
            3.โทรสายตรง : <a href="tel:042-414824">042-414824</a> <br>
            4.ที่อยู่โรงพยาบาล : 317 หมู่ 11 ต.รัตนวาปี อ.รัตนวาปี จ.หนองคาย
          </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <!--   <h5 class="text-uppercase">Links</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-dark">Link 1</a>
                            </li>

                        </ul> -->
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <!--    <h5 class="text-uppercase mb-0">Links</h5>

                       <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="text-dark">Link 1</a>
                            </li>

                        </ul> -->
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="http://113.53.232.202/h4316/">โรงพยาบาลรัตนวาปี</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
  <!--------------------END--Footer----------------------------------------------------------->


</body>

</html>
<!DOCTYPE html>
<html>
<head>
  <title>คลังรูปภาพ กิจกรรมโรงพยาบาลรัตนวาปี</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript" src='jquery-3.4.1.min.js'></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
  <script>
    //-----------------ฟังค์ชั่นดึงข้อม฿ล part file จาก server--------------------
    function get1_part(data_part1) {
      return $.ajax({
        url: 'call_dir3.php',
        type: 'get', //หรือ post (ค่าเริ่มต้นเป็นแบบ get)
        data: {
          index_link: data_part1
        },
        dataType: 'json', //หรือ json หรือ xml
      });
    }
    function load_menu(part_recieve, part_first1) {
      response = part_recieve
      //------------ให้โหลดฟังค์ชั่นนี้ตอนเริ่มต้นเท่านั่้น------------------------
      for (var index = 0; index < response.length; index++) {
        var src = response[index];
        $('#list_folder_pic').append('<button class="btn btn-sm btn-outline-primary " value=' + part_first1 + '/' + src + ' onclick="load_img(this.value)">' + src + '</button>');
      }
    }
    //--------------โหลดเมนู โฟล์เดอร์มาแสดง-------------------------
    function first_load_all() {
      var part_first = 'uploads'
      var promise = get1_part(part_first);
      promise.done(function(part_dir) {
        load_menu(part_dir, part_first); //------ส่งค่าpart folder ไปให้ฟังค์ชั่น load_menu เพื่อสร้างปุ่มเมนูรายการ
        load_img(part_first + '/' + part_dir[0]); //----------ส่งค่า part เริ่มต้น show รูปภาพ ในการโหลดหน้าเว็บครั้งแรกที่่ folder 1
      });
    }
    function load_img(part_dir) {
      var getfile_name = get1_part(part_dir);
      //alert(part_dir);
      var state_pic = 0;
      getfile_name.done(function(file_name) {
        for (var index = 0; index < file_name.length; index++) {
          var src = part_dir + '/' + file_name[index];
          if (state_pic == 0) {
            state_pic = 1
            $('#pic_all').remove();
            $('#name_allumb').remove();
            $('#album').remove();
            $('#text_header').append('<div class="container" id = "name_allumb"><p class="text-center text-lg fw-bold fs-6 text-primary" >' + part_dir.substr(8) + '</p></div>');
            $('#carouselExampleControlsNoTouching').append('<div id="pic_all" class="carousel-inner"></div>');
            $('#pic_all').append('<div id="pic1" class="carousel-item active"><img src=' + src + ' class="d-block w-100 img-fluid" width:200px hight: auto></div>');
            $('#pic_list').append('<div id="album" class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3"></div>');
            $('#album').append('<div class="col"><div class="p-1 border bg-light"><img src=' + src + ' class="rounded d-block w-100  img-fluid" alt="' + src + '" ></div></div>');
          } else {
            $('#pic_all').append('<div class="carousel-item"><img src=' + src + ' class="d-block w-100  img-fluid" alt="..." ></div>');
            $('#album').append('<div class="col"><div class="p-1 border bg-light"><img src=' + src + ' class="rounded d-block w-100  img-fluid" alt="' + src + '" ></div></div>')
          };
        }
      })
    }
    window.onload = first_load_all();
  </script>
  <style type="text/css">
    body {
      font-family: 'Sarabun', sans-serif;
      /*background-color: rgba(225, 242, 245, 0.836);*/

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
      padding: .2rem;
      background-color: white;
      border: 2px solid #99d6ff;
      color: rgb(10, 10, 10);
    }
    [id*="main_div"] {
      border: 2px solid #99d6ff;
      color: rgb(10, 10, 10);
    }
    [id*="main_div2"],
    [id*="main_div3"] {
      padding: 0.5rem;

      border: 2px solid #99d6ff;
      color: rgb(10, 10, 10);
    }
    [id*="foot"] {
      padding: 0.5rem;
      border: 2px solid #99d6ff;
      color: rgb(10, 10, 10);
    }
    .button {
                  font-size: 20px;
    }
  </style>
</head>
<body>
  <div class="container-lg">
    <!---------------------------Image first page ----------------------------------------->
    <img src="./images/head-index.png" class="img-fluid" alt="Welcome">
    <!---------------------------Menu navbar-------------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#0099ff">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
          </svg></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#">Home</a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li> -->
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
    <div id="main_div" class="container-fluid " style="background-color: rgba(214, 246, 252, 0.836); ">
      <div class="row justify-content-start">
        <div id="main_div2" class="col-lg-3 col-md-12 mb-4 mb-md-0  border-end-0">
          <!----------------------------เรียกดูfolder เก็บรูปและส้ราง เมนู---------------------------------------------->
          <div class="container-fluid">
            <div id="list_folder_pic" class="d-grid gap-2 col-12 mx-auto">
            </div>
          </div>
        </div>
        <!---------------------------Slide Show picture here ---------------------------------------->
        <div id="main_div3" class="col-lg-9 col-md-12 mb-4 mb-md-0  border-start-0 " style="background-color:#ccf2ff">
          <div class="row justify-content-center" style="text-align: center;">
            <div class="container" id="text_header">
              <p class="text-center text-lg fw-bold fs-5 text-primary">
                ภาพกิจกรรมโรงพยาบาลรัตนวาปี </p>
              <p id="name_allumb"></p>
            </div>
          </div>
          <div class="row justify-content-center">
            <div id="slide1" class="col-lg-9 col-md-12 mb-4 mb-md-0 ">
              <!---------------------------  photo slide  ------------------------------------->
              <div id="test1" style="text-align: center;">
                <div id="carouselExampleControlsNoTouching" class="carousel slide border border-primary" data-bs-touch="false" data-bs-interval="false">
                  <!---------------div สำหรับ ใส่รูป ---------------------------------------->
                  <div id="pic_all" class="carousel-inner"></div>
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
          <!--------------สร้างตารางแสดงรูปภาพ--------------------------------------------------------->
          <div class="container " style="text-align: center; ">
            <div id="pic_list" class="container">

              <div id="album" class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
                <!--<div class="col"><div class="p-5 border bg-light">Row column</div></div> -->

              </div>
              <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-----------------------------End----Body content------------------------------------------>
    <!----------------------Footer-------------------------------------------------------------->
    <!-- Footer -->
    <footer class=" text-center text-lg-start">
      <!-- Grid container -->
      <div id="foot" class="container-fluid p-4 border-top-0" style="background-color: rgba(214, 246, 252, 0.836);">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5>ติดต่อ</h5>
            <p>
              1.Email โรงพยาบาล : <a href="mailto:Rattanawapi.hospital@gmail.com ">Rattanawapi.hospital@gmail.com </a><br>
              2.Facebook โรงพยาบาล :<a target="_blank" href="https://www.facebook.com/rtnhospital/">https://www.facebook.com/rtnhospital/</a><br>
              3.โทร. : <a href="tel:042-414824">042-414824</a> <br>
              4.ที่อยู่โรงพยาบาล : 317 หมู่ 11 ต.รัตนวาปี อ.รัตนวาปี จ.หนองคาย
            </p>
          </div>
          <!--Grid column-->


        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color:#0099ff;">
        © 2021 Copyright:
        <a class="text-dark" href="http://113.53.232.202/h4316/">โรงพยาบาลรัตนวาปี</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!--------------------END--Footer----------------------------------------------------------->
  </div>
</body>
</html>
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
    function get1_part() {
      return $.ajax({
        url: 'https://covid19.th-stat.com/api/open/today',
        type: 'get', //หรือ post (ค่าเริ่มต้นเป็นแบบ get)
        dataType: 'json', //หรือ json หรือ xml
      });
    }

    function load_modal_show() {
      $(document).ready(function() {
        var a = get1_part();
        a.done(function(data22) {
          //alert(data22.Confirmed +"/"+ data22.Recovered +"/"+ data22.Hospitalized +"/"+ data22.Deaths +"/"+ data22.NewConfirmed +"/"+ data22.NewRecovered +"/"+ data22.NewDeaths +"/"+ data22.NewDeaths +"/"+ data22.Source +"/"+ data22.DevBy +"/"+ data22.SeverBy);
          document.getElementById("Confirmed1").innerHTML = (data22.Confirmed).toLocaleString();
          document.getElementById("NewConfirmed1").innerHTML = 'รายใหม่ [ +' + (data22.NewConfirmed).toLocaleString() + ' ]';
          document.getElementById("Recovered1").innerHTML = (data22.Recovered).toLocaleString();
          document.getElementById("NewRecovered1").innerHTML = 'รายใหม่ [ +' + (data22.NewRecovered).toLocaleString() + ' ]';
          document.getElementById("Hospitalized1").innerHTML = (data22.Hospitalized).toLocaleString();
          document.getElementById("NewHospitalized1").innerHTML = 'รายใหม่ [ +' + (data22.NewHospitalized).toLocaleString() + ' ]';
          document.getElementById("Deaths1").innerHTML = (data22.Deaths).toLocaleString();
          document.getElementById("NewDeaths1").innerHTML = 'รายใหม่ [ +' + (data22.NewDeaths).toLocaleString() + ' ]';
          document.getElementById("UpdateDate1").innerHTML = 'อัพเดทข้อมูลล่าสุด : ' + (data22.UpdateDate).toLocaleString();
        });
        $("#Modal_pic").modal("show");
      });
    }
    window.onload = load_modal_show();
  </script>
  <style type="text/css">
    body {
      font-family: 'Sarabun', sans-serif;
      /*background-color: rgba(225, 242, 245, 0.836);*/

    }

    .blink_me {
      animation: blinker 2s linear infinite;
    }

    @keyframes blinker {
      50% {
        opacity: 0;
      }
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

    .size_img {
      width: "800";
      height: auto;
    }
  </style>

</head>

<body>
  <div class="container-lg">
    <!---------------------------Image first page ----------------------------------------->
    <img src="./images/head-index.png" class="img-fluid" alt="Welcome">
    <!---------------------------Menu navbar-------------------------------->
    <nav id="top_page" class="navbar navbar-expand-lg navbar-dark " style="background-color:#0099ff">
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
                             <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
          -->
        </div>
      </div>
    </nav>
    <!------------------------------------Body content------------------------------------------>
    <div id="main_div" class="container-fluid " style="background-color: rgba(214, 246, 252, 0.836); ">

      <!-- Modal -->
      <div class="modal fade" id="Modal_pic" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-xl-down modal-dialog-centered modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h5 class="modal-title  text-white" id="ModalLabel">รายงานสถานการณ์ โควิด-19 ประเทศไทย --> <span id="UpdateDate1"></span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
              <!-- <div class="ratio ratio-16x9">
                <iframe src="https://covid19.th-stat.com/th/share/dashboard" frameborder="0"></iframe>
              </div> -->
              <div class="container-fluid">
                <div class="row justify-content-center">
                  <div class="col-lg-12 col-md-12 bg-light  rounded  text-center text-lg text-white fw-normal fs-4" style="padding-top: 10px;">
                    <div class="container bg-danger rounded" style="padding-top: 5px; padding-bottom: 5px;  ">
                      <p class=""> ผู้ป่วยติดเชื้อสะสม<br>
                        <span class="fw-bolt fs-1 blink_me " id="Confirmed1">
                        </span>
                      </p>
                      <P class="fw-bolt fs-3" id="NewConfirmed1"></P>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center" style="margin-top: 10px;">
                  <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bg-light  rounded  text-center text-lg text-white fw-normal fs-4" style="padding-top: 2px; ">
                    <div class="container bg-success rounded" style="padding-top: 5px; padding-bottom: 5px;  ">
                      <p class=""> หายแล้ว
                        <span class="fw-bolt fs-1 blink_me " id="Recovered1"></span>
                      </p>
                      <P class="fw-bolt fs-5" id="NewRecovered1"></P>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bg-light  rounded  text-center text-lg text-white fw-normal fs-4" style="padding-top: 2px;">
                    <div class="container bg-primary rounded" style="padding-top: 5px; padding-bottom: 5px;  ">
                      <p class=""> กำลังรักษาที่ รพ.<br>
                        <span class="fw-bolt fs-1 blink_me " id="Hospitalized1"></span>
                      </p>
                      <P class="fw-bolt fs-5" id="NewHospitalized1"></P>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4 bg-light  rounded  text-center text-lg text-white fw-normal fs-4" style="padding-top: 2px; ">
                    <div class="container bg-dark rounded" style="padding-top: 5px; padding-bottom: 5px;  ">
                      <p class=""> เสียชีวิต<br>
                        <span class="fw-bolt fs-1 blink_me " id="Deaths1"></span>
                      </p>
                      <P class="fw-bolt fs-5" id="NewDeaths1"></P>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <a class="btn btn-primary" target="_blank" href="https://ddc.moph.go.th/viralpneumonia/index.php">ข้อมูลเพิ่มเติม...</a>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
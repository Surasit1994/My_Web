<!DOCTYPE html>
<html lang="en">

<head>
    <title>How to upload Multiple Image files with jQuery AJAX and PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src='jquery-3.4.1.min.js'></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

    <button class="btn-success" onclick="myfcn2()">Click</button>
    <p id="show1"></p>
    <div class="container" id="show_img1"></div>

    <script>
        /*
        function myfcn() {
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    myObj = JSON.parse(this.responseText);
                    document.getElementById("show1").innerHTML = myObj[2];
                }
            };
            xmlhttp.open("GET", "call_dir.php", true);
            xmlhttp.send();
            
        } */
    </script>
    <script>
        function myfcn2() {
            $.ajax({
                url: 'call_dir3.php',
                type: 'get', //หรือ post (ค่าเริ่มต้นเป็นแบบ get)
                data: ['uploads'],
                dataType: 'json', //หรือ json หรือ xml
                success: function(response) {
                    //callbackที่เตรียมไว้รันตอนเซิร์ฟเวอร์ตอบกลับมา
                    for(var index = 0; index < response.length; index++) {
					    var src = response[index];

					    // Add img element in <div id='preview'>
					    //$('#show1').append(src+'<br>');
                        $('#show_img1').append('<button class="btn-success">'+src+'</button><br>');
                        
						
					}
                }
            });
        }
    </script>



</body>

</html>
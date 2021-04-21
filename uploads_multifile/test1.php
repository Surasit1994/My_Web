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
    <?php include 'call_dir.php' ?>
    <button class="btn-success" onclick="myfcn()">Click</button>
    <p id="show1"></p>
    <div class="container" id="show_img1"></div>
    <script>
        function myfcn() {
            <?php $data_part = call_pic('uploads/pic_1'); ?>
            var list_data = <?php echo $data_part; ?>
            //console.log(list_data);
            document.getElementById("show1").innerHTML = list_data;
            list_data.foreach(show_img);

            function show_img(item, index) {
                console.log(item);
                $('#show_img1').append('<img src="' + item + '" class="img-fluid" alt="..." ><br>');
            }
        }
    </script>

</body>

</html>
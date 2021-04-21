<!DOCTYPE html>
<html lang="en">

<head>
    <title>How to upload Multiple Image files with jQuery AJAX and PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src='jquery-3.4.1.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script>
        $(document).ready(function() {
            $("button").click(function() {
                $.get("call_dir2.php",{part_dir1:"uploads"}, function(data, status) {
                    alert("Data: " + data + "\nStatus: " + status);
                });
            });
        });
    </script>

</head>

<body>

    
    <button class="btn-success">Click</button>
    <p id="show1"></p>
    

</body>

</html>
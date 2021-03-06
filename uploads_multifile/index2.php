<!DOCTYPE html>
<html>

<head>
	<title>How to upload Multiple Image files with jQuery AJAX and PHP</title>

	<script type="text/javascript" src='jquery-3.4.1.min.js'></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	<style type="text/css">
		#preview img {
			margin: 5px;
		}
	</style>
</head>

<body>


	<form method='post' action='' enctype="multipart/form-data">
		<input type="text" id='name_folder' name="name_folder" ><br>
		<input type="file" id='files' name="files[]" multiple><br>
		<input type="button" id="submit" value='Upload'>
	</form>

	<!-- Preview -->

	<div id='preview'></div>

	<!-- Script -->
	<script type="text/javascript">
		$(document).ready(function() {

			$('#submit').click(function() {

				var form_data = new FormData();
				//console.log(form_data);
				// Read selected files
				var totalfiles = document.getElementById('files').files.length;

				for (var index = 0; index < totalfiles; index++) {

					form_data.append("files[]", document.getElementById('files').files[index]);
					
				}
				form_data.append("name_folder[]", document.getElementById('name_folder').name_folder[index]);
					console.log(document.getElementById('name_folder').name_folder[0]);
				console.log(form_data);
				// AJAX request
				$.ajax({
					url: 'ajaxfile.php',
					type: 'post',
					data: form_data,
					dataType: 'json',
					contentType: false,
					processData: false,
					success: function(response) {

						for (var index = 0; index < response.length; index++) {
							var src = response[index];

							// Add img element in <div id='preview'>
							$('#preview').append('<img src="' + src + '" width="200px;" height="200px">');

						}


					}

				});


			});
		});
	</script>
</body>

</html>
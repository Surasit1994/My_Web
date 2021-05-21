
function process() {



    if (!document.querySelector("#upload").files[0]) return;
    $("#loadingmessage").removeClass("collapse");
    for (let index = 0; index < (document.querySelector("#upload").files).length; index++) {
      const file = document.querySelector("#upload").files[index];
      //const file = document.querySelector("#upload").files[0];
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = function (event) {
        const imgElement = document.createElement("img");
        imgElement.src = event.target.result;
        //document.querySelector("#input").src = event.target.result;
        imgElement.onload = function (e) {
          const canvas = document.createElement("canvas");
          const MAX_WIDTH = 400;
          const scaleSize = MAX_WIDTH / e.target.width;
          canvas.width = MAX_WIDTH;
          canvas.height = e.target.height * scaleSize;
          const ctx = canvas.getContext("2d");
          ctx.drawImage(e.target, 0, 0, canvas.width, canvas.height);
          const srcEncoded = ctx.canvas.toDataURL(e.target, "image/jpeg");
          // you can send srcEncoded to the server
          //document.querySelector("#output").src = srcEncoded;
          $('#output').append('<img src="' + srcEncoded + '" width="200px;" height="200px">');
          // images_array.push(srcEncoded);
          $.ajax({
            type: "POST",
            url: 'upload65.php',
            dataType: 'text',
            data: {
              base64data: srcEncoded
            },
            success: function (response) {
              console.log('Success');
            //  $('#output').append('<img src="' + srcEncoded + '" width="200px;" height="200px">');
            }
          });
        };
      };
    }
    alert("Uploads Success!");
    $('#loadingmessage').addClass("collapse");
    $('#upload').val('');
  }
  
  
  /*
  $.ajax({
    type: "POST",
    url: 'upload65.php',
    dataType: 'text',
    data: {
      base64data: images_array1
    },
    beforeSend: function () {
      $("#loadingmessage").removeClass("collapse");
    },
    success: function (response) {
      $('#loadingmessage').addClass("collapse");
      $('#upload').val('');
      images_array1 = [];
    }
  });
  */
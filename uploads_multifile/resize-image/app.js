
var data_folder_name_old;
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
//--------------โหลดเมนู โฟล์เดอร์มาแสดงใน dropdown-------------------------
function create_option_menu(folder_name) {
  var x = document.createElement("OPTION");
  x.setAttribute("value", folder_name);
  var t = document.createTextNode(folder_name);
  x.appendChild(t);
  document.getElementById("old_name_activity").appendChild(x);
}
function first_load_all() {
  // alert('first load');
  var part_first = 'uploads';
  var promise = get1_part(part_first);
  promise.done(function (part_dir) {
    data_folder_name_old = part_dir;

    for (i in data_folder_name_old) { //----------------เพิ่มรายการเข้าไปใน dropdown ----------//
      if (data_folder_name_old[i] == '0_Welcome_0') continue;
      create_option_menu(data_folder_name_old[i]);
    }


  });
}
window.onload = first_load_all();
function myFunction() { //------------------เปิดปิด input text box เมื่่อมีการกด checked------------/
  if (document.getElementById("new_activity").checked == false) {
    document.getElementById("name_activity").disabled = true;
    document.getElementById("check_name_btn").disabled = true;
    document.getElementById("old_name_activity").disabled = false;
    document.getElementById("input_file").disabled = false;
    document.getElementById('name_activity').value = ''
    //alert('unchecked!');
  } else {
    document.getElementById("name_activity").disabled = false;
    document.getElementById("check_name_btn").disabled = false;
    document.getElementById("old_name_activity").disabled = true;
    document.getElementById("input_file").disabled = true;
    document.getElementById('name_activity').focus();
    document.getElementById('name_activity').value = ''
    // alert('checked');
  }
}
var status_check_name = 'default';
var folder_destination = '';
function check_name(name) { //-------------ฟังก์ชั่นกำหนดตรวจสอบชื่อซ้ำ-----------------------//
  console.log(name);
  if (name == '') {
    status_check_name = 'false';
    document.getElementById("name_activity").style = "background : #FF625D";//-----สีแดง---//
    document.getElementById("input_file").disabled = true;
    //document.getElementById("btn_upload").disabled = true;
    console.log('true');
    alert("ไม่ได้ตั้งชื่อ กรุณาตั้งชื่อใหม่หรือเลือกจาก เมนู dropdown !!!");
    document.getElementById('name_activity').focus();
  } else {
    for (i in data_folder_name_old) {
      if ((name == data_folder_name_old[i])) {
        status_check_name = 'false';
        document.getElementById("name_activity").style = "background : #FF625D";//-----สีแดง---//
        console.log('true');
        document.getElementById("input_file").disabled = true;
        // document.getElementById("btn_upload").disabled = true;
        alert("ชื่อที่กำหนด มีอยู่แล้ว กรุณาเปลี่ยนชื่อใหม่หรือเลือกจาก เมนู dropdown !!!");
        document.getElementById('name_activity').focus();
        break;
      }
      else {
        console.log('false');
        document.getElementById("name_activity").style = "background : #B5FF95";//--สีเขียว---//
        status_check_name = 'true';
        document.getElementById("input_file").disabled = false;
        // document.getElementById("btn_upload").disabled = false;
      }
    }
  }
}

function reuse_upload() {
  var file = (document.querySelector("#input_file").files).length;
  console.log(file);
  if (file == 0) {
    alert('กรุณาเลือกไฟล์รูปภาพอย่างน้อย 1 รูป');
    document.getElementById("input_file").focus();
  } else {
    console.log('enter uploadfile !!!');//------ หลังจากกรองข้อมูลเรียบร้อยแล้ว จะสร้างโฟล์เดอ และทำการupload file -----//
    if (status_check_name == 'true' & document.getElementById('name_activity').value != '') {
      var cr = create_folder(document.getElementById('name_activity').value);//-----create new folder ---/
      cr.done(function (response) {
        console.log('Status Create folder : ' + response);
        //--------send data to fucntion procress() for upload image to folder --------///
        console.log('folder_destination : ' + folder_destination);
        process();
      });
    } else {
      console.log('folder_destination : ' + folder_destination);
      process();
    }

  }
}

function check_input(data_form) {
  if (document.getElementById("new_activity").checked == true) {
    if (document.getElementById('name_activity').value != '') {
      folder_destination = document.getElementById('name_activity').value;
      reuse_upload();
    } else {
      alert('กรุณาตั้งชื่อกิจกรรมที่ต้องการเพิ่ม');
      document.getElementById('name_activity').focus();
    }
  } else {
    if (document.getElementById('old_name_activity').value != '') {
      folder_destination = document.getElementById('old_name_activity').value;
      reuse_upload();
    } else {
      alert('กรุณาเลือกชื่อกิจกรรมที่ต้องการเพิ่มรูป');
      document.getElementById('old_name_activity').focus();
    }
  }

}


function create_folder(folder_name) {
  return $.ajax({
    type: "POST",
    url: 'create_folder.php',
    dataType: 'text',
    data: {
      name: folder_name
    }
  });

}


function process() {
  if (!document.querySelector("#input_file").files[0]) return;
  $("#loadingmessage").removeClass("collapse");
  for (let index = 0; index < (document.querySelector("#input_file").files).length; index++) {
    const file = document.querySelector("#input_file").files[index];
    //const file = document.querySelector("#upload").files[0];
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function (event) {
      const imgElement = document.createElement("img");
      imgElement.src = event.target.result;
      //document.querySelector("#input").src = event.target.result;
      imgElement.onload = function (e) {
        const canvas = document.createElement("canvas");
        const MAX_WIDTH = 800;
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
            base64data: srcEncoded,
            folder_destination_name: folder_destination
          },
          success: function (response) {
            //console.log('Success');
            console.log(response);

            //  $('#output').append('<img src="' + srcEncoded + '" width="200px;" height="200px">');
          }
        });
      };
    };
  }
  alert("Uploads Success!");
  $('#loadingmessage').addClass("collapse");
  $('#input_file').val('');
}


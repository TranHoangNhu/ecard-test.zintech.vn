var downContact = document.querySelector("#back-to-top");

function downloadCSV() {
  //
  //var tenkh = document.getElementById("tenkh").value;
  var tenkh = "";
  try {
    tenkh = document.getElementById("tenkh_kodau").value;
  } catch (err) {
    tenkh = "";
  }

  var dienthoai = "";
  try {
    dienthoai = document.getElementById("dienthoai").value;
  } catch (err) {
    dienthoai = "";
  }

  var didong = "";
  try {
    didong = document.getElementById("didong").value;
  } catch (err) {
    didong = "";
  }

  //if(dienthoai == "" && didong != "") dienthoai = didong;

  //var email = document.getElementById("email").value;
  var email = "";
  try {
    email = document.getElementById("email_kodau").value;
  } catch (err) {
    email = "";
  }

  //var diachi = document.getElementById("diachi").value;
  var diachi = "";
  try {
    diachi = document.getElementById("diachi_kodau").value;
  } catch (err) {
    diachi = "";
  }

  //var congty = document.getElementById("congty").value;
  var congty = ""; //document.getElementById("congty_kodau").value;
  try {
    congty = document.getElementById("congty_kodau").value;
  } catch (err) {
    congty = "";
  }

  //var bophan = document.getElementById("bophan").value;
  //var bophan = document.getElementById("bophan_kodau").value;

  //var chucvu = document.getElementById("chucvu").value;
  var chucvu = ""; //document.getElementById("chucvu_kodau").value;
  try {
    chucvu = document.getElementById("chucvu_kodau").value;
  } catch (err) {
    chucvu = "";
  }

  //var website1 = document.getElementById("website1").value;
  var website1 = ""; //document.getElementById("website1_kodau").value;
  try {
    website1 = document.getElementById("website1_kodau").value;
  } catch (err) {
    website1 = "";
  }

  //var website2 = document.getElementById("website2").value;
  //var website2 = document.getElementById("website2_kodau").value;

  var vCardText =
    "BEGIN:VCARD\n" +
    "VERSION:2.1\n" +
    "N:" +
    tenkh +
    ";\n" +
    "FN:" +
    tenkh +
    "\n" +
    "ORG:" +
    congty +
    "\n" +
    "TITLE:" +
    chucvu +
    "\n" +
    "TEL;WORK:" +
    dienthoai +
    "\n" +
    "TEL;TYPE=CELL:" +
    didong +
    "\n" +
    "ADR;WORK:" +
    diachi +
    "\n" +
    "EMAIL:" +
    email +
    "\n" +
    "URL:" +
    website1 +
    "\n" +
    "END:VCARD";

  // const encodeVcf = window.btoa(vCardText.toString()); cmt d??ng n??y l???i
  const encodeVcf = window.btoa(vCardText.toString());
  //add line 43,44 ng??y 16/11/2022 by nhu
  // var stringVcf = vCardText.toString();
  // var encodeVcf = window.btoa(unescape(encodeURIComponent(stringVcf)));

  console.log(encodeVcf);

  var base64 =
    "QkVHSU46VkNBUkQNClZFUlNJT046My4wDQpQUk9ESUQ6LS8vQXBwbGUgSW5jLi8vaVBob25lIE9TIDkuMi4xLy9FTg0KTjpaaW50ZWNoO0NvbXBhbnk7OzsNCkZOOiBaaW50ZWNoDQpPUkc6IGxlYWQgeW91ciBzb2x1dGlvbjsNClRFTDt0eXBlPVdPUks7dHlwZT1WT0lDRTt0eXBlPXByZWY6MDg1ODYyNjc2OA0KRU5EOlZDQVJEDQo="; //Creates CSV File Format
  //var vcf = "data:text/x-vcard;charset=utf-8;base64," + base64;
  var vcf = "data:text/x-vcard;charset=utf-8;base64," + encodeVcf; //ok
  //var excel = encodeURI(vcf); //Links to vcf
  var excel = vcf;
  var link = document.createElement("a");
  link.setAttribute("href", excel); //Links to vcf File
  link.setAttribute("download", "contact.vcf"); //Filename that vcf is saved as
  link.click();
}

downContact.addEventListener("click", downloadCSV);

function changePass() {
  document.querySelector(".labelErrorChangePass").innerHTML = "";
  var id = document.getElementById("stt").value.toString();
  var pass = document.getElementById("matkhautext").value.toString();

  var changePassBtn = document.querySelector(".changePassBtn");

  changePassBtn.addEventListener("click", () => {
    const newPass = document.querySelector(".newPasswordInput").value;
    const oldPass = document.querySelector(".oldPasswordInput").value;
    if (newPass != "" && oldPass != "") {
      if (oldPass == pass) {
        //document.querySelector(".labelErrorChangePass").innerHTML = "?????i m???t kh???u th??nh c??ng";
        //begin change pass
        /*$.post('http://localhost:8081/WebECardUser_4/home_changepass.php', {stt:id, matkhaumoi:newPass}, function(response){ 
                        document.querySelector(".labelErrorChangePass").innerHTML = "?????i m???t kh???u th??nh c??ng";
                    });*/

        $.ajax({
          type: "POST",
          url: "../home_changepass.php",
          data: { stt: stt, matkhaumoi: newPass },
          success: function (response) {
            console.log("done");
            document.querySelector(".labelErrorChangePass").innerHTML =
              "?????i m???t kh???u th??nh c??ng";
          },
        }); //ajax
        /*
                $.ajax({
                    url:"../home_changepass.php",
                    method:"POST",
                    data:{'stt' : stt, 'matkhaumoi' : newPass},
                    dataType:"text",
                    success:function(output)
                    {
                        document.querySelector(".labelErrorChangePass").innerHTML = "?????i m???t kh???u th??nh c??ng";
                        console.log("output: " + output);
                    }               
                }); //ajax*/
      } else {
        document.querySelector(".labelErrorChangePass").innerHTML =
          "M???t kh???u c?? ko ????ng";
      }
    } else {
      document.querySelector(".labelErrorChangePass").innerHTML =
        "M???t kh???u kh??ng ???????c tr???ng";
    }
  });
}
var btnChange = document.querySelector(".change-password");
btnChange.addEventListener("click", changePass);

function fixInfo() {
  var inputFix = document.querySelectorAll(".inputUser"),
    i;
  var infoUser = document.querySelectorAll(".main .form-group p"),
    j;
  var btnSave = document.querySelector("button[type=submit]");
  var confirmBtn = document.querySelector(".confirmPassBtn");

  var pass = document.getElementById("matkhautext").value.toString();

  document.querySelector(".labelErrorConfirmPass").innerHTML = "";

  confirmBtn.addEventListener("click", () => {
    const confirmPass = document.querySelector(".ConfirmPassInput").value;
    if (confirmPass === pass) {
      //alert('Ch??? ????? ch??nh s???a th??ng tin ???????c k??ch ho???t!');

      btnSave.style.display = "block";
      for (i = 0; i < inputFix.length; ++i) {
        inputFix[i].style.display = "block";
      }
      for (j = 0; j < infoUser.length; ++j) {
        infoUser[j].style.display = "none";
      }
      // const container = document.getElementById("ConfirmPass");
      // const modal = new bootstrap.Modal(container);
      // modal.hide();
      // $('#ConfirmPass').modal('hide');
      console.log('123');
    } else {
      document.querySelector(".labelErrorConfirmPass").innerHTML =
        "M???t kh???u ko ????ng";
      //alert('M???t kh???u b???n nh???p kh??ng ????ng!');
      // var myModalEl = document.getElementById("ConfirmPass");
      // var modal = bootstrap.Modal.getInstance(myModalEl);
      // modal.hide();
    }
  });
}
var btnFix = document.querySelector(".fix-info");
btnFix.addEventListener("click", fixInfo);

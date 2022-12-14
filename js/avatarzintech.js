var bs_modalFile = $("#modalCropImg");
var bs_modalVideo = $("#modalVideo");
let camera_button = document.querySelector("#start-camera");
let video = document.querySelector("#video");
let click_button = document.querySelector("#click-photo");
let canvas = document.querySelector("#canvas");
let textData = document.querySelector("#dataImgSnap");
// var fileName = document.getElementById("fileName");
var cropper, reader, file;
$("body").on("change", ".image", function (e) {
  let image = document.getElementById("image");
  var files = e.target.files;
  var done = function (url) {
    image.src = url;
    bs_modalFile.modal("show");
  };

  if (files && files.length > 0) {
    file = files[0];

    if (URL) {
      done(URL.createObjectURL(file));
    } else if (FileReader) {
      reader = new FileReader();
      reader.onload = function (e) {
        done(reader.result);
      };
      reader.readAsDataURL(file);
    }
  }
});
console.log(image);
bs_modalFile
  .on("shown.bs.modal", function () {
    cropper = new Cropper(image, {
      aspectRatio: 1,
      viewMode: 3,
      preview: ".preview",
    });
  })
  .on("hidden.bs.modal", function () {
    cropper.destroy();
    cropper = null;
  });

$("#crop").click(function () {
  canvas = cropper.getCroppedCanvas({
    width: 300,
    height: 300,
  });

  $("#output").attr("src", canvas.toDataURL());

  canvas.toBlob(function (blob) {
    url = URL.createObjectURL(blob);
    var reader = new FileReader();
    reader.readAsDataURL(blob);
    reader.onloadend = function () {
      var base64data = reader.result;
      $.ajax({
        type: "POST",
        dataType: "json",
        url: "upload.php",
        data: {
          image: base64data,
        },
        success: function (data) {
          bs_modalFile.modal("hide");
          alert("success upload image");
        },
      });
    };
  });
});

// Xử lý code video snap
camera_button.addEventListener("click", async function () {
  let stream = await navigator.mediaDevices.getUserMedia({
    video: true,
    audio: false,
  });
  video.srcObject = stream;
});

click_button.addEventListener("click", function () {
  canvas.getContext("2d").drawImage(video, 0, 0, canvas.width, canvas.height);
  let image_data_url = canvas.toDataURL("image/jpeg");
  $("#output").attr("src", image_data_url);
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "upload.php",
    data: {
      image: image_data_url,
    },
    success: function (data) {
      bs_modalVideo.modal("hide");
      alert("success upload image");
    },
  });
  // data url of the image
});

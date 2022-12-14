<head>
    <link rel="stylesheet" href="js/CropperJs/cropper.min.css">
    <link rel="stylesheet" href="css/profile1.css">
    <link rel="stylesheet" href="css/avatar.css">
</head>
<style>
    .navbar-toggler:focus {
        box-shadow: none !important;
    }

    .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
    }
</style>
<nav class="navbar navbar-light pt-3">
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars text-black fs-1"></i>
    </button>
    <div class="navbar-collapse pt-3 collapse text-center bg-light rounded-3" id="navbarTogglerDemo01">
        <img src="./images/header_profile.png" alt="logo_Mcard" width="250">
        <ul class="navbar-nav me-auto my-3 mb-lg-0">
            <li class="nav-item my-2">
                <a class="nav-link fw-bold fix-info" aria-current="page" data-bs-toggle="modal" data-bs-target="#ConfirmPass" href="#"><i class="fa-solid fa-wrench pe-2"></i>Chỉnh sửa thông tin</a>
            </li>
            <li class="nav-item my-2">
                <a class="nav-link fw-bold" data-bs-toggle="modal" data-bs-target="#changePassModal" href="#"> <i class="fa-solid fa-key pe-2"></i>Đổi mật khẩu</a>
            </li>
            <li class="nav-item my-2">
                <a class="nav-link fw-bold" data-bs-toggle="modal" data-bs-target="#changePassModal" href="#"><i class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Đăng xuất</a>
            </li>
    </div>
</nav>
<div class="container_fluid">
    <div class="container">
        <div class="row mx-auto text-center align-items-center wave">
            <!-- <img src="./images/user_avatar.png" alt="avatar_profiel" width="150"> -->
            <div class="col-6">
                <form method="post" class="pt-3">
                    <div class="profile-pic">
                        <label class="-label" for="file3">
                            <i class="pt-2 pe-2 fa-solid fa-camera"></i>
                            <span>Upload File</span>
                        </label>
                        <input id="file3" type="file" name="image" class="image" width="150" />
                        <!-- <img src="./images/user_avatar.png" id="output" width="150" /> -->
                        <img src="./images/user_avatar.png" id="output" width="150" />
                    </div>
                    <button id="startVid" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVideo">
                        <i class="fa-solid fa-clapperboard"></i>
                    </button>
                </form>
            </div>
            <div class="col-6 pb-5">
                <h1 class="header_name">YOUR NAME</h1>
                <span class="header_position">Operation manager</span>
            </div>
        </div>
    </div>
    <div class="main container pb-5">
        <form action="" method="post" class="row px-4 mt-5">
            <div class="form-group mt-4">
                <label for="username" class="inp">
                    <input type="text" class="form-control inputUser" name="tenkh" id="tenkh" value="<?= $tenkh ?>" required>
                    <input type="hidden" name="stt" id="stt" value="<?php echo @$stt; ?>" style="width:100%;">
                    <input type="hidden" name="matkhautext" id="matkhautext" value="<?php echo @$matkhautext; ?>" style="width:100%;">
                    <input type="hidden" name="urlQR" id="urlQR" value="<?php echo @$urlQR; ?>" style="width:100%;">
                    <input type="hidden" class="form-control" id="tenkh_kodau" value="<?= stripUnicode(($tenkh)) ?>">
                    <span class="label fs-2 pb-4"><i class="fa-solid fa-user pe-3 fs-1"></i>Họ & tên đệm</span>
                    <p class="mt-5 ms-5 fw-bold fs-5"><?php echo $tenkh ?></p>
                </label>
                <hr>
            </div>
            <div class="form-group mt-4">
                <label for="username" class="inp">
                    <input type="text" class="form-control inputUser" name="email" id="email" value="<?= $email ?>" required>
                    <input type="hidden" class="form-control" id="email_kodau" value="<?= stripUnicode(($email)) ?>">
                    <span class="label fs-2 pb-4"><i class="fa-solid fa-envelope pe-3 fs-1"></i>Địa chỉ Email</span>
                    <p class="mt-5 ms-5 fw-bold fs-5"><?php echo $email ?></p>
                </label>
                <hr>
            </div>
            <div class="form-group mt-4">
                <label for="username" class="inp">
                    <input type="text" class="form-control inputUser" name="didong" id="didong" value="<?= stripUnicode($didong) ?>" required>
                    <span class="label fs-2 pb-4"><i class="fa-solid fa-phone pe-3 fs-1"></i>Số di động</span>
                    <p class="mt-5 ms-5 fw-bold fs-5"><?php echo $didong ?></p>
                </label>
                <hr>
            </div>
            <div class="form-group mt-4">
                <label for="username" class="inp">
                    <input type="text" class="form-control inputUser" name="dienthoai" id="dienthoai" value="<?= stripUnicode($dienthoai) ?>" required>
                    <span class="label fs-2 pb-4"><i class="fa-solid fa-envelope pe-3 fs-1"></i>SĐT (Công việc)</span>
                    <p class="mt-5 ms-5 fw-bold fs-5"><?php echo $dienthoai ?></p>
                </label>
                <hr>
            </div>
            <div class="form-group mt-4">
                <label for="username" class="inp">
                    <input type="text" class="form-control inputUser" name="congty" id="congty" value="<?= $congty ?>" required>
                    <input type="hidden" class="form-control" id="congty_kodau" value="<?= stripUnicode(($congty)) ?>">
                    <span class="label fs-2 pb-4"><i class="fa-solid fa-building pe-3 fs-1"></i>Công ty</span>
                    <p class="mt-5 ms-5 fw-bold fs-5"><?php echo $congty ?></p>
                </label>
                <hr>
            </div>
            <div class="form-group mt-4">
                <label for="username" class="inp">
                    <input type="text" class="form-control inputUser" name="chucvu" id="chucvu" value="<?= $chucvu ?>" required>
                    <input type="hidden" class="form-control" id="chucvu_kodau" value="<?= stripUnicode(($chucvu)) ?>">
                    <span class="label fs-2 pb-4"><i class="fa-solid fa-briefcase pe-3 fs-1"></i>Nghề nghiệp</span>
                    <p class="mt-5 ms-5 fw-bold fs-5"><?php echo $chucvu ?></p>
                </label>
                <hr>
            </div>
            <div class="form-group mt-4">
                <label for="username" class="inp">
                    <input type="text" class="form-control inputUser" name="diachi" id="diachi" value="<?= $diachi ?>" required>
                    <input type="hidden" class="form-control" id="diachi_kodau" value="<?= stripUnicode(($diachi)) ?>">
                    <span class="label fs-2 pb-4"><i class="fa-solid fa-location-dot pe-3 fs-1"></i>Địa chỉ công ty</span>
                    <p class="mt-5 ms-5 fw-bold fs-5"><?php echo $diachi ?></p>
                </label>
                <hr>
            </div>
            <div class="form-group mt-4">
                <label for="username" class="inp">
                    <input type="text" class="form-control inputUser" name="website1" id="website1" value="<?= $website1 ?>" required>
                    <input type="hidden" class="form-control" id="website1_kodau" value="<?= stripUnicode(($website1)) ?>">
                    <span class="label fs-2 pb-4"><i class="fa-solid fa-globe pe-3 fs-1"></i>Website</span>
                    <p class="mt-5 ms-5 fw-bold fs-5"><?php echo $website1 ?></p>
                </label>
                <hr>
            </div>
            <div class="text-center mt-5">
                <!--<img src="https://ecard.zintech.vn/images/QR_profile.png" alt="QR_profile" width="300">-->
                <div id="card" style="left: 10%">
                    <div id="qr-code"></div>
                </div>
                <button type="submit" name="luuthongtin" value="1" class="form-control btn submit px-4 py-3 fs-4 fw-bold text-white">Lưu</button>
            </div>
        </form>
        <h4 class="website_footer mt-5 text-center">www.mcards.vn</h4>
        <div class="pb-5 text-center">
            <img src="./images/header_profile.png" alt="logo_Mcard" width="100">
        </div>
        <a id="back-to-top" class="btn btn-primary text-white position-fixed" style="position: fixed;
  bottom: 10%;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: #0E69AE;
  cursor: pointer;
  border-radius: 50%;
  padding: 10px; 
  font-weight: bold;"><img src="./images/add-contact.png" alt="add-contact" width="40"></a>
    </div>
    <div class="modal fade" id="modalCropImg" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8 col-12">
                                <!--  default image where we will set the src via jquery-->
                                <img id="image" style="max-width: 100%">
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal snap Video -->
    <div class="modal fade bg-dark" id="modalVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body bg-dark border border-info rounded-2">
                    <div class="row mx-auto flex-column justify-content-center align-items-center text-center">
                        <button class="mt-3 btn btn-danger col-2" id="start-camera"><i class="fa-solid fa-video"></i></button>
                        <video class="col-md-8 col-12" id="video" width="300" height="300" autoplay></video>
                        <canvas class="col-md-8 col-12" id="canvas" width="150" height="150"></canvas>
                        <textarea class="col-md-8 col-12" id="dataImgSnap" cols="30" rows="10" readonly style="display: none;"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-danger mt-3" id="click-photo">Click Photo</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Crop Image -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js" integrity="sha512-is1ls2rgwpFZyixqKFEExPHVUUL+pPkBEPw47s/6NDQ4n1m6T/ySeDW3p54jp45z2EJ0RSOgilqee1WhtelXfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- js profile -->
<script src="js/CropperJs/cropper.min.js"></script>
<script src="js/profile.js"></script>
<script src="js/dom-to-image.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="cropperjs/cropper.min.js"></script>
<script src="js/avatarzintech.js"></script>
<script src="js/script.js" defer></script>
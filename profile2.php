 	<head>
 	    <link rel="stylesheet" href="css/profile2.css">
 	</head>
 	<div class="header">
 	    <div class="container text-center">
 	        <div class="row align-items-center justify-content-center">
 	            <div class="py-5 col-12">
 	                <img src="./images/header_profile.png" alt="logo_Mcard" width="250">
 	            </div>
 	            <img src="./images/card_profile.png" alt="card_profile" width="400px" class="px-4 mb-5">
 	        </div>
 	    </div>
 	</div>
 	<div class="main container pb-5">
 	    <form action="" method="post" class="row px-4">
 	        <div class="form-group mt-4">
 	            <label for="username" class="inp">
 	                <input type="text" class="form-control inputUser" name="tenkh" id="tenkh" value="<?= $tenkh ?>" required>
 	                <input type="hidden" name="stt" id="stt" value="<?php echo @$stt; ?>" style="width:100%;">
 	                <input type="hidden" name="matkhautext" id="matkhautext" value="<?php echo @$matkhautext; ?>" style="width:100%;">
 	                <input type="hidden" name="urlQR" id="urlQR" value="<?php echo @$urlQR; ?>" style="width:100%;">
 	                <input type="hidden" class="form-control" id="tenkh_kodau" value="<?= stripUnicode(($tenkh)) ?>">
 	                <span class="label fs-4 pb-5">Họ & tên đệm</span>
 	                <p class="mt-5 pt-3 ms-4 fw-bold fs-5"><?php echo $tenkh ?></p>
 	            </label>
 	        </div>
 	        <div class="form-group mt-4">
 	            <label for="username" class="inp">
 	                <input type="text" class="form-control inputUser" name="email" id="email" value="<?= $email ?>" required>
 	                <input type="hidden" class="form-control" id="email_kodau" value="<?= stripUnicode(($email)) ?>">
 	                <span class="label fs-4 pb-5">Địa chỉ Email</span>
 	                <p class="mt-5 pt-3 ms-4 fw-bold fs-5"><?php echo $email ?></p>
 	            </label>
 	        </div>
 	        <div class="form-group mt-4">
 	            <label for="username" class="inp">
 	                <input type="text" class="form-control inputUser" name="didong" id="didong" value="<?= stripUnicode($didong) ?>" required>
 	                <span class="label fs-4 pb-5">Số di động</span>
 	                <p class="mt-5 pt-3 ms-4 fw-bold fs-5"><?php echo $didong ?></p>
 	            </label>
 	        </div>
 	        <div class="form-group mt-4">
 	            <label for="username" class="inp">
 	                <input type="text" class="form-control inputUser" name="dienthoai" id="dienthoai" value="<?= stripUnicode($dienthoai) ?>" required>
 	                <span class="label fs-4 pb-5">Số điện thoại (Công việc)</span>
 	                <p class="mt-5 pt-3 ms-4 fw-bold fs-5"><?php echo $dienthoai ?></p>
 	            </label>
 	        </div>
 	        <div class="form-group mt-4">
 	            <label for="username" class="inp">
 	                <input type="text" class="form-control inputUser" name="congty" id="congty" value="<?= $congty ?>" required>
 	                <input type="hidden" class="form-control" id="congty_kodau" value="<?= stripUnicode(($congty)) ?>">
 	                <span class="label fs-4 pb-5">Công ty</span>
 	                <p class="mt-5 pt-3 ms-4 fw-bold fs-5"><?php echo $congty ?></p>
 	            </label>
 	        </div>
 	        <div class="form-group mt-4">
 	            <label for="username" class="inp">
 	                <input type="text" class="form-control inputUser" name="chucvu" id="chucvu" value="<?= $chucvu ?>" required>
 	                <input type="hidden" class="form-control" id="chucvu_kodau" value="<?= stripUnicode(($chucvu)) ?>">
 	                <span class="label fs-4 pb-5">Nghề nghiệp</span>
 	                <p class="mt-5 pt-3 ms-4 fw-bold fs-5"><?php echo $chucvu ?></p>
 	            </label>
 	        </div>
 	        <div class="form-group mt-4">
 	            <label for="username" class="inp">
 	                <input type="text" class="form-control inputUser" name="diachi" id="diachi" value="<?= $diachi ?>" required>
 	                <input type="hidden" class="form-control" id="diachi_kodau" value="<?= stripUnicode(($diachi)) ?>">
 	                <span class="label fs-4 pb-5">Địa chỉ công ty</span>
 	                <p class="mt-5 pt-3 ms-4 fw-bold fs-5"><?php echo $diachi ?></p>
 	            </label>
 	        </div>
 	        <div class="form-group mt-4">
 	            <label for="username" class="inp">
 	                <input type="text" class="form-control inputUser" name="website1" id="website1" value="<?= $website1 ?>" required>
 	                <input type="hidden" class="form-control" id="website1_kodau" value="<?= stripUnicode(($website1)) ?>">
 	                <span class="label fs-4 pb-5">Website</span>
 	                <p class="mt-5 pt-3 ms-4 fw-bold fs-5"><?php echo $website1 ?></p>
 	            </label>
 	        </div>
 	        <div class="row mx-auto justify-content-between pt-3 pb-5">
 	            <a class="change-password w-50" href="#" data-bs-toggle="modal" data-bs-target="#changePassModal">Đổi
 	                mật khẩu</a>
 	            <a class="forget-password w-50 text-end fix-info" href="#" data-bs-toggle="modal" data-bs-target="#ConfirmPass">Sửa thông tin</a>
 	        </div>
 	        <div style="text-align: center !important;">
 	            <!--<img src="https://ecard.zintech.vn/images/QR_profile.png" alt="QR_profile" width="300">-->
 	            <div id="card" style="left: 20%">
 	                <div id="qr-code"></div>
 	            </div>
 	            <button type="submit" name="luuthongtin" value="1" class="form-control btn submit px-4 py-3 fs-4 fw-bold text-white">Lưu</button>
 	        </div>
 	    </form>
 	    <a id="back-to-top" class="btn btn-primary text-white position-fixed" style="position: fixed;
  bottom: 150px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: #f1bc18;
  color: #fff;
  cursor: pointer;
  border-radius: 50%;
  font-size: 22px;
  font-weight: bold;"><i class="fas fa-plus" style="padding: 10px 5px;"></i></a>
 	</div>

 	<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.js" integrity="sha512-is1ls2rgwpFZyixqKFEExPHVUUL+pPkBEPw47s/6NDQ4n1m6T/ySeDW3p54jp45z2EJ0RSOgilqee1WhtelXfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 	<!-- js profile -->
 	<script src="js/profile.js"></script>
 	<script src="js/dom-to-image.min.js"></script>
 	<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
 	<script src="js/script.js" defer></script>
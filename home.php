<?php
require('lib/db.php');
require('lib/clsKhachHang.php');
require('functions/lichsuphieu.php');
require_once('helper/custom-functions.php');

@session_start();

$stt = $_SESSION['Stt'];
$tenkh = $_SESSION['TenKH'];
$matkhautext = $_SESSION['MatKhauText'];
//
//------------xu ly lay thong tin user show len eCard ---------------------//
//
$makh = "";
$tenkh = "";
$dienthoai = "";
$diachi = "";
$email = "";
$didong = "";
$congty = "";
$bophan = "";
$chucvu = "";
$urlecard = "";
$username = "";
$matkhau = "";
$image = "";
$website = "";
$urlQR = "";
$website1 = "";
$website2 = "";
$website3 = "";
$idmahoa = "";
//
if ($stt != "") {
    $l_sql = "select a.* from tblKhachHangECard a Where a.Stt like '$stt'";
    try {
        $rs = $conn->query($l_sql)->fetchAll(PDO::FETCH_ASSOC);
        if ($rs !== false) {
            foreach ($rs as $r) {
                $r['MaKH'];
                $r['TenKH'];
                $r['DienThoai'];
                $r['DiDong'];
                $r['DiaChi'];
                $r['Email'];
                $r['CongTy'];
                $r['BoPhan'];
                $r['ChucVu'];
                $r['UrlECard'];
                // $r['Username']; $r['MatKhau']; $r['IdMaHoa'];

                $makh = $r['MaKH'];
                $tenkh = $r['TenKH'];
                $email = $r['Email'];
                $dienthoai = $r['DienThoai'];
                $didong = $r['DiDong'];
                $diachi = $r['DiaChi'];
                $congty = $r['CongTy'];
                $bophan = $r['BoPhan'];
                $chucvu = $r['ChucVu'];
                $urlecard = $r['UrlECard'];
                $username = $r['Username'];
                $matkhau = $r['MatKhau'];
                // $website1 = $r['Website1'];
                // $idmahoa = $r['IdMaHoa'];
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
//
if ($urlecard != "") {
    $urlQR = $urlecard . "login_action.php?id=" . $idmahoa;
} else {
?>
    <script>
        window.onload = function() {
            alert("Thẻ này chưa được kích hoạt. Vui lòng liên hệ CSKH");
            setTimeout('window.location="login.php"', 0);
        }
    </script>
<?php
}
//
//---------change password ----------------------//
//
$error_changepass = "";
$doimatkhau = 0;
$matkhaucu = "";
$matkhaumoi = "";
if (isset($_POST['doimatkhau']) && $stt != "") {
    $doimatkhau = $_POST['doimatkhau'];
    if ($doimatkhau == 1) {
        $matkhaucu = $_POST['matkhaucu'];
        $matkhaumoi = $_POST['matkhaumoi'];

        if ($matkhaumoi != "" && $matkhaucu != "") {
            $sql = "Update tblKhachHangECard set MatKhau = PWDENCRYPT('$matkhaumoi'), MatKhauText = '$matkhaumoi' Where Stt like '$stt'"; //ok
            $conn->query($sql);

            $matkhautext = $matkhaumoi;
            $_SESSION['MatKhauText'] = $matkhaumoi;

            $error_changepass = "Đổi mật khẩu thành công";
        }
    } //end if co doi mat khau
}
//
//----------change info -----------------------//
//
$error_luuthongtin = "";
$luuthongtin = 0;
$ketqualuuthongtin = 0;
if (isset($_POST['luuthongtin'])) {
    $luuthongtin = $_POST['luuthongtin'];
    //
    if ($luuthongtin == 1) {
        $tenkh = $_POST['tenkh'];
        $email = $_POST['email'];
        $didong = $_POST['didong'];
        $dienthoai = $_POST['dienthoai'];
        $congty = $_POST['congty'];
        $chucvu = $_POST['chucvu'];
        $diachi = $_POST['diachi'];
        $website1 = $_POST['website1'];

        $sql = "Update tblKhachHangECard set TenKH = N'$tenkh', Email = N'$email', DiDong = N'$didong', DienThoai = N'$dienthoai', CongTy = N'$congty', ChucVu = N'$chucvu', DiaChi = N'$diachi', Website1 = N'$website1' Where Stt like '$stt'";
        $conn->query($sql);

        $ketqualuuthongtin = 1;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <!-- value="" Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/qr/font.css" />
    <link rel="stylesheet" href="css/qr/style.css" />
</head>

<body>

    <?php include 'profile1.php'; ?>

    <!-- Change PassWord modal -->
    <div class="px-4 modal fade" id="changePassModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #e4f7fb">
                <div class="modal-header d-flex flex-column">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img src="./images/passModal.png" alt="change_pass_logo" width="140">
                </div>
                <div class="modal-body">
                    <form action="" method="post" onSubmit="return validateChangePassForm()" class="row px-2">
                        <div class="form-group mt-5">
                            <label for="password" class="inp">
                                <input type="password" name="matkhaucu" class="form-control w-100 oldPasswordInput" required>
                                <span class="label fs-4 pb-5">Mật khẩu cũ *</span>
                            </label>
                        </div>
                        <div class="form-group mt-2">
                            <label for="password" class="inp">
                                <input id="password-field" type="password" name="matkhaumoi" class="form-control w-100 newPasswordInput" required>
                                <span class="label fs-4 pb-5">Mật khẩu mới *</span>
                                <span class="fa fa-fw field-icon toggle-password fa-eye"></span>
                            </label>
                        </div>
                        <span style="text-align: center !important; color: darkred !important;" class="labelErrorChangePass"></span>
                        <div class="form-group row mx-auto mt-5 ">
                            <button class="form-control btn col-6 w-50 border" data-bs-dismiss="modal">Hủy bỏ</button>
                            <button name="doimatkhau" value="1" class="form-control btn submit col-6 fw-bold w-50" style="background-color: #0E69AE; color:#e4f7fb">Lưu mật khẩu mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Change PassWord modal -->
    <!-- Confirm PassWord modal -->
    <div class="px-4 modal fade" id="ConfirmPass" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #e4f7fb">
                <div class="modal-header d-flex flex-column">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <img src="./images/passModal.png" alt="change_pass_logo" width="140">
                </div>
                <div class="modal-body">
                    <div class="row px-2">
                        <span style="text-align: center; color: darkred;" class="labelErrorConfirmPass"></span>
                        <div class="form-group mt-5">
                            <label for="password" class="inp">
                                <input type="password" name="password" class="form-control w-100 ConfirmPassInput" required>
                                <span class="label fs-4 pb-5">Xác nhận mật khẩu *</span>
                            </label>
                        </div>
                        <div class="form-group row mx-auto mt-5 ">
                            <button class="form-control btn col-6 w-50 border" data-bs-dismiss="modal">Hủy bỏ</button>
                            <button class="form-control btn confirmPassBtn col-6 fw-bold= w-50" style="background-color: #0E69AE; color:#e4f7fb">Xác nhận người dùng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script>
        var togglePassword = document.querySelector('.toggle-password');
        var password = document.querySelector('#password-field');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            var type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            if (!document.querySelector('.form-group .field-icon').classList.replace('fa-eye', 'fa-eye-slash')) {
                document.querySelector('.form-group .field-icon').classList.replace('fa-eye-slash', 'fa-eye')
            } else {
                document.querySelector('.form-group .field-icon').classList.replace('fa-eye', 'fa-eye-slash')

            }
        });

        function validateChangePassForm() {

            document.querySelector(".labelErrorChangePass").innerHTML = "";
            var id = document.getElementById("stt").value.toString();
            var pass = document.getElementById("matkhautext").value.toString();

            const newPass = document.querySelector(".newPasswordInput").value;
            const oldPass = document.querySelector(".oldPasswordInput").value;
            if (newPass != "" && oldPass != "") {
                if (oldPass == pass) {
                    //document.querySelector(".labelErrorChangePass").innerHTML = "Mật khẩu ok";
                    return true;
                } else {
                    document.querySelector(".labelErrorChangePass").innerHTML = "Mật khẩu cũ ko đúng";
                    return false;
                }
            } else {
                document.querySelector(".labelErrorChangePass").innerHTML = "Mật khẩu không được trống";
                return false;
            }
        }
    </script>

</body>

</html>
<?php

if ($ketqualuuthongtin == 1) {
    $ketqualuuthongtin = 0;
?>
    <script type="text/javascript">
        alert("Lưu thông tin thành công !");
    </script>
<?php
}
?>
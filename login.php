<!doctype html>
<html lang="en">

<head>
    <title>Giải pháp quản lý ECARD</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="./css/style_login.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="header">
        <div class="container text-center">
            <div class="row align-items-center justify-content-center">
                <h1 class="py-5 col-12" style="color: #0e69ae;">ĐĂNG NHẬP</h1>
            </div>
        </div>
    </div>
    <div class="main container pb-5">
        <div class="logo_mobifone text-center row justify-content-center">
            <img class="col-md-6" src="./images/header_profile.png" alt="logo_mobifone" width="400">
        </div>
        <h2 class="pt-3 pb-5 fw-bold text-center" style="color: #0e69ae;">THÔNG TIN CÁ NHÂN THỜI ĐẠI SỐ</h2>
        <form action="login_action.php" method="post" class="row px-2">
            <div class="form-group">
                <label for="username" class="inp">
                    <input type="text" id="inp" class="form-control" name="username" style="color: #3abbd6;" required>
                    <span class="label fs-3 pb-5" style="color: #0e69ae;">Tên đăng nhập</span>
                </label>
            </div>
            <div class="form-group mt-3">
                <label for="password" class="inp">
                    <input id="password-field" type="password" name="password" class="form-control w-100" style="color: #3abbd6;" required>
                    <span class="label fs-3 pb-5" style="color: #0e69ae;">Password</span>
                    <span class="fa fa-fw field-icon toggle-password fa-eye" style="color: #3abbd6;"></span>
                </label>
            </div>
            <div class="row mx-auto justify-content-between pt-3 pb-5">
                <div class="form-group w-50">
                    <label class="checkbox-wrap checkbox-primary" for="checkbox" style="color: #0e69ae;">Lưu mật khẩu
                        <input type="checkbox" name="checkbox" checked="">
                        <span class="checkmark"></span>
                </div>
                <a class="forget-password w-50 text-end" href="#" style="color: #0e69ae;">Quên mật khẩu?</a>
            </div>
            <div class="g-recaptcha mb-4" data-sitekey="6Lddyg0jAAAAANxxDXheHJ0fQRdYGIstQJ6cKg74"></div>
            <div class="form-group mx-auto col-8 col-md-4">
                <button type="submit" class="form-control btn submit px-4 py-3 text-white">ĐĂNG NHẬP</button>
            </div>
            <div class="register_account row mx-auto mt-5">
                <span class="pt-5 text-center" style="color: #3abbd6;">Bạn chưa có tài khoản?</span>
                <a class="py-2 text-center" href="https://register-ecard.zintech.vn" style="color: #0e69ae;">Đăng ký tại đây!</a>
            </div>
    </div>
    </form>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
    <script>
        var togglePassword = document.querySelector('.toggle-password');
        var password = document.querySelector('#password-field');

        togglePassword.addEventListener('click', function (e) {
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
    </script>
</body>

</html>
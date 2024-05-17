<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        html {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: linear-gradient(#141e30, #243b55);
        }

        .form-check-label {
            color: #03e9f4;
        }

        .text-end {
            text-align: right;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 10px;
            color: #03e9f4;
        }

        .text-decoration-none {
            color: #fff;
            text-decoration: none;
        }

        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, .5);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 10px;
        }

        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .login-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .login-box .user-box input:focus~label,
        .login-box .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #03e9f4;
            font-size: 12px;
        }

        .login-box form button {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #03e9f4;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 4px
        }

        .btn-success {
            background-color: transparent;
            border: 2px;
        }

        .login-box button:hover {
            background: #03e9f4;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #03e9f4,
                0 0 25px #03e9f4,
                0 0 50px #03e9f4,
                0 0 100px #03e9f4;
        }

        .login-box button span {
            position: absolute;
            display: block;
        }

        .login-box button span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #03e9f4);
            animation: btn-anim1 1s linear infinite;
        }

        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }

            50%,
            100% {
                left: 100%;
            }
        }

        .login-box button span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #03e9f4);
            animation: btn-anim2 1s linear infinite;
            animation-delay: .25s
        }

        @keyframes btn-anim2 {
            0% {
                top: -100%;
            }

            50%,
            100% {
                top: 100%;
            }
        }

        .login-box button span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #03e9f4);
            animation: btn-anim3 1s linear infinite;
            animation-delay: .5s
        }

        @keyframes btn-anim3 {
            0% {
                right: -100%;
            }

            50%,
            100% {
                right: 100%;
            }
        }

        .login-box button span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #03e9f4);
            animation: btn-anim4 1s linear infinite;
            animation-delay: .75s
        }

        .text-end {
            display: flex;
            justify-content: space-between;4
        }
        .text-end a {
  color: #1ecece; /* màu chữ mặc định */
  transition: color 0.3s ease; /* hiệu ứng transition khi thay đổi màu */
}
.text-end a {
  position: relative; /* để có thể sử dụng position absolute cho đường viền */
  color: #d39715; /* màu chữ mặc định */
  text-decoration: none; /* bỏ gạch chân mặc định */
  padding-bottom: 2px; /* khoảng cách giữa chữ và đường viền */
  transition: color 0.3s ease; /* hiệu ứng chuyển màu khi hover */
}

.text-end a::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 0;
  height: 2px;
  background-color: #7bc20a; /* màu đường viền */
  transition: width 0.3s ease; /* hiệu ứng chạy đường viền */
}

.text-end a:hover {
  color: #007bff; /* thay đổi màu chữ khi hover */
}

.text-end a:hover::after {
  width: 100%; /* kéo dài đường viền khi hover */
}

.text-end a:hover {
  color: #007bff; /* màu chữ khi hover */
}

        @keyframes btn-anim4 {
            0% {
                bottom: -100%;
            }

            50%,
            100% {
                bottom: 100%;
            }
        }
    </style>
</head>

<body>
    <main class="login-box">
        <div class="card">
            <div class="card-header">
                <h2>Đăng nhập</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.authUser') }}">
                    @csrf
                    <div class="user-box">
                        <input type="text" id="email" name="email" required autofocus>
                        <label for="email">Email</label>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="user-box">
                        <input type="password" id="password" name="password" required>
                        <label for="password">Mật khẩu</label>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                    </div>
                    <br>
                    <div class="mb-3">
                        <button type="submit" class="btn-success">
                            <span></span>

                            <span></span>Đăng nhập

                        </button>
                    </div>
                    <br>
                    <div class="text-end">
                        <a href="{{ route('user.createUser') }}" class="text-decoration-none">Tạo tài khoản?</a>
                        <a href="{{route('user.fogetpass')}}" class="text-decoration-none">Bạn Quên Mật Khẩu?</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>

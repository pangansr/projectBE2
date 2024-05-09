<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .login-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 350px;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 5px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-bottom: 15px;
        }

        .card-body {
            padding: 20px;
        }

        .form-label {
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        .btn-success:hover {
            background-color: red;
        }

        .text-end {
            text-align: right;
        }

        .text-decoration-none {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<main class="login-form">
    <div class="card">
        <div class="card-header">
            <h2>Đăng nhập</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.authUser') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required autofocus>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                </div>
                <br>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Đăng nhập</button>
                </div>
                <br>
                <div class="text-end">
                    <a href="{{ route('user.createUser') }}" class="text-decoration-none">Tạo tài khoản?</a>
                </div>
            </form>
        </div>
    </div>
</main>
</body>
</html>

@extends('dashboard')

@section('content')
<main class="login-form pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h4 class="card-header text-center bg-primary text-white" style="margin: 40px 20px;">Đăng nhập</h4>
                    <div class="card-body" style="margin: 40px 20px;">
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
                            <div class="mb-3 row">
                                <div class="col-md-7 text-end">
                                    <a href="{{ route('user.createUser') }}" class="text-decoration-none">Tạo tài khoản?</a>
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-success btn-block">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

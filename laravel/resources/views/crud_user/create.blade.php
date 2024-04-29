@extends('dashboard')

@section('content')
<main class="signup-form mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h4 class="card-header text-center bg-primary text-white">Đăng kí</h4>
                    <div class="card-body">
                        <form action="{{ route('user.postUser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="name" name="name" required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <!-- MSSV -->
                            <div class="mb-3">
                                <label for="mssv" class="form-label">MSSV</label>
                                <input type="text" class="form-control" id="mssv" name="mssv" required>
                                @if ($errors->has('mssv'))
                                <span class="text-danger">{{ $errors->first('mssv') }}</span>
                                @endif
                            </div>

                            <!-- Avatar -->
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar</label>
                                <input type="file" class="form-control" id="avatar" name="avatar" required>
                                @error('avatar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Button -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('login') }}" class="">Đăng nhập</a>
                                    <button type="submit" class="btn btn-success">Đăng kí</button>
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

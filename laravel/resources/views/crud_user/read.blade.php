@extends('dashboard')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        .avt {
            background-color: red;
            border-radius: 50%;
        }

        @media (min-width: 1025px) {
            .h-custom {
                height: 100vh !important;
            }
        }
    </style>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('avatar/' . $user->avatar) }}" class="avt" width="100px" height="100px"
                                alt="avatar">
                            <h5 class="my-3">
                                @if ($profile)
                                    {{ $profile->first_name }} {{ $profile->last_name }}
                                @else
                                <i class="bi bi-exclamation-triangle-fill text-warning"></i> Vui lòng cập nhật địa chỉ Firts Last Name
                                @endif
                            </h5>
                            <p class="text-muted mb-1">
                                @if ($profile)
                                    {{ $profile->discription }}
                                @else
                                <i class="bi bi-exclamation-triangle-fill text-warning"></i> Vui lòng cập nhật Profile
                                @endif
                            </p>
                            <p class="text-muted mb-4">
                                @if ($profile)
                                    {{ $profile->address }}
                                @else
                                <i class="bi bi-exclamation-triangle-fill text-warning"></i> Vui lòng cập nhật địa chỉ
                                @endif
                            </p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editModal">Cập Nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    @if ($profile)
                                        {{ $profile->first_name }} {{ $profile->last_name }}
                                    @else
                                    <i class="bi bi-exclamation-triangle-fill text-warning"></i> Vui lòng cập nhật Firts Last Name
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        {{ $user->phone }}
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Giới tính</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        @if ($profile)
                                            @if ($profile->sex == 1)
                                                <p>Nữ</p>
                                            @elseif ($profile->sex == 2)
                                                <p>Nam</p>
                                            @else
                                                <p>Khác</p>
                                            @endif
                                        @else
                                        <i class="bi bi-exclamation-triangle-fill text-warning"></i> Vui lòng cập nhật giới tính
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        @if ($profile)
                                            {{ $profile->address }}
                                        @else
                                        <i class="bi bi-exclamation-triangle-fill text-warning"></i> Vui lòng cập nhật địa chỉ
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->email == 'admin@gmail.com')
            <div class="tb_user">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <img src="{{ asset('avatar/' . $item->avatar) }}" class="avt" width="50px"
                                        height="50px" alt="avatar">
                                </td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <form action="{{ route('users.delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Cập Nhật</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">

                                <input type="hidden" class="form-control" id="id" name="id_user"
                                    value="{{ $user->id }}">
                            </div>
                            <div class="col-md-6 mb-3">

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName"
                                    value="{{ $profile->first_name ?? '' }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName"
                                    name="lastName"value="{{ $profile->last_name ?? '' }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description"
                                value="{{ $profile->discription ?? '' }}"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="gender" class="form-label">Giới tính</label>
                                <select class="form-select" id="gender" name="gioitinh">

                                    <option value="1">Nữ</option>
                                    <option value="2">Nam</option>
                                    <option value="3">Khác</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $profile->phone ?? '' }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $profile->address ?? '' }}">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

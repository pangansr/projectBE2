@extends('dashboard')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        .avt {
            background-color: 'red';
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
                            <img src="{{ asset('avatar/' . $user->avatar) }}"class="avt" width="100px" height="100px"
                                alt="avatar">
                            <h5 class="my-3">Full Name<h5>
                                    <p class="text-muted mb-1">Full Stack Developer</p>
                                    <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="{{ route('user.updateUser',['id'=>$user->id])}}" class="chinhSua">Chỉnh sửa</a>
                                    </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ID_user</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->id }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Johnatan Smith</p>
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
                                    <p class="text-muted mb-0">{{ $user->phone }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Sex</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">(098) 765-4321</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                  class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                  alt="Sample photo">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>
      
                  <form class="px-md-2">
      
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="form3Example1q" class="form-control" />
                      <label class="form-label" for="form3Example1q">Name</label>
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4">
      
                        <div data-mdb-input-init class="form-outline datepicker">
                          <input type="text" class="form-control" id="exampleDatepicker1" />
                          <label for="exampleDatepicker1" class="form-label">Select a date</label>
                        </div>
      
                      </div>
                      <div class="col-md-6 mb-4">
      
                        <select data-mdb-select-init>
                          <option value="1" disabled>Gender</option>
                          <option value="2">Female</option>
                          <option value="3">Male</option>
                          <option value="4">Other</option>
                        </select>
      
                      </div>
                    </div>
      
                    <div class="mb-4">
                    </div>
      
                    <div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                      <div class="col-md-6">
      
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form3Example1w" class="form-control" />
                          <label class="form-label" for="form3Example1w">Registration code</label>
                        </div>
      
                      </div>
                    </div>
      
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-lg mb-1">Submit</button>
      
                  </form>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection

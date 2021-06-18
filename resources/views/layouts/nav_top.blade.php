@if(Auth::check())
<ul class="navbar-nav align-items-center  ml-md-auto ">
    <li class="nav-item d-xl-none">
      <!-- Sidenav toggler -->
      <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
        <div class="sidenav-toggler-inner">
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
        </div>
      </div>
    </li>
    <li class="nav-item dropdown" >
        <style>
            @media only screen and (min-width: 600px) {
                .notifku{
                    position: absolute;
                    top: -6px;
                    right: 5px;
                    width: 20px;
                    height: 20px;
                    font-size: 15px;
                    background: red;
                    color: #ffffff;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-radius: 50%;
                }
            }
            @media only screen and (max-width: 599px) {
                .notifku{
                    position: absolute;
                    top: 14px;
                    left: 70px;
                    width: 20px;
                    height: 20px;
                    font-size: 15px;
                    background: red;
                    color: #ffffff;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-radius: 50%;
                }
            }

        </style>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ni ni-ungroup"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right text-center ">
        <div class="row shortcuts px-4">
          <a href="#" class="col-4 shortcut-item" target="_blank" >
            <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
              <i class="ni ni-email-83"></i>
            </span>
            <small>Email</small>
          </a>
          <a href="#" class="col-4 shortcut-item" target="_blank">
            <span class="shortcut-media avatar rounded-circle bg-gradient-green">
              <i class="ni ni-books"></i>
            </span>
            <small>Repository</small>
          </a>
        </div>
      </div>
    </li>
  </ul>
  <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
    <li class="nav-item dropdown">
      <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="media align-items-center">
          <span class="avatar avatar-sm rounded-circle">
            @yield('avatar')
          </span>
          <div class="media-body  ml-2  d-none d-lg-block">
            <span class="mb-0 text-sm  font-weight-bold">@yield('name')</span>
          </div>
        </div>
      </a>
      <div class="dropdown-menu  dropdown-menu-right ">
        <div class="dropdown-header noti-title">
          <h6 class="text-overflow m-0">Selamat Datang !</h6>
        </div>
        <button href="#!" class="btn text-left" data-toggle="modal" data-target="#change_avatar" style="width: 100%">
          <i class="fas fa-image"></i><span>Profile</span>
        </button>
        <button href="#!" class="btn text-left" data-toggle="modal" data-target="#setting_password" style="width: 100%">
          <i class="fas fa-user-lock"></i><span>Password</span>
        </button>
        <div class="dropdown-divider"></div>
        <a style="width: 100%" class="btn text-left" class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
         <i class="ni ni-user-run"></i>
         {{ __('Logout') }}
     </a>

     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
     </form>
      </div>
    </li>
  </ul>
  {{--  modal avatar --}}
  <div class="modal fade" id="change_avatar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form action="{{url('avatar')}}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Foto Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="avatar" id="dropzoneBasicUpload">
              <label class="custom-file-label" for="dropzoneBasicUpload">Pilih File</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-sm btn-primary">Simpan Profile</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  {{--  modal password --}}
  <div class="modal fade" id="setting_password" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="padding-right:1rem;padding-left:1rem;padding-top:1rem !important;padding-bottom:0px !important">
          <h5 class="modal-title" id="staticBackdropLabel">Ganti Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="padding:0.5rem">
            @if (session()->has('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('profile.updatepassword', Auth::user()->id) }}">
              {{ csrf_field() }}
              <div class="{{ $errors->has('current_password') ? ' has-error' : '' }}">
                <div class="col-md-12">
                  <sub class="label-sm">Password Lama</sub>
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                   </div>
                   <input id="current_password" type="password" class="form-control form-control-sm" name="current_password" autofocus>
                 </div>
                </div>
            </div>

            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-md-12">
                  <sub class="label-sm">Password Baru</sub>
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                   </div>
                   <input id="password" type="password" class="form-control form-control-sm" name="password">
                  </div>
                </div>
            </div>

            <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <div class="col-md-12">
                  <sub class="label-sm">Konfigurasi Password</sub>
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                   </div>
                   <input id="password_confirmation" type="password" class="form-control form-control-sm" name="password_confirmation">
                  </div>
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-sm btn-primary">Simpan Password</button>
            </div>
          </form>

      </div>
    </div>
  </div>
  @endif

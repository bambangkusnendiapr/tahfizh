@php
use App\Models\Master\Profil;
$profil = Profil::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tahfizh Hz | Login</title>

  <!-- Favicons -->
  <link href="{{ asset('images/profil/'.$profil->profil_favicon)}}" rel="icon">
  <link href="{{ asset('images/profil/'.$profil->profil_favicon)}}" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ route('front.index') }}"><img src="{{ asset('images/profil/'.$profil->profil_logo ) }}" width="200px" alt=""></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan masukkan email dan password</p>

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <!-- Email -->
          <div class="input-group mb-3">
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email" autocomplete="email" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <!-- Password -->
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="icheck-primary">
                <input type="checkbox" class="form-check-input" id="checkbox">
                <label for="checkbox">
                  Lihat Password
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Masuk</button>
            </div>
            <!-- /.col -->
          </div>

          <hr>

          <div class="row mt-3">
            <div class="col-6">
              <a href="/" class="btn btn-default w-100"><i class="fas fa-undo-alt"></i> Kembali</a>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <a href="{{ route('register') }}" class="btn btn-success w-100"><i class="fas fa-clipboard-list"></i> Daftar</a>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#checkbox').on('change', function() {
        $('#password').attr('type', $('#checkbox').prop('checked') == true ? "text" : "password");
      });
    });
  </script>
  @include('sweetalert::alert')
</body>

</html>
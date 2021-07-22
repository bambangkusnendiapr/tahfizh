@php
use App\Models\Master\Profil;
$profil = Profil::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tahfizh Hz | Pendaftaran</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">

<div class="register-box mt-3">
<br><br><br>
  <div class="register-logo">
    <a href="{{ route('front.index') }}"><img src="{{ asset('images/profil/'.$profil->profil_logo ) }}" alt=""></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Pendaftaran Online Santri Baru</p>

      <form method="POST" action="{{ route('daftar') }}">
      @csrf

      <!-- Nama -->
        <div class="input-group mb-3">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Nama Lengkap">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <!-- Email -->
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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

        <!-- password -->
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <!-- Ulangi Password -->
        <div class="input-group mb-3">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="icheck-primary">
          <input type="checkbox" id="checkbox">
          <label for="checkbox">
            Lihat Password
          </label>
        </div>

        <hr>

        <!-- Umur -->
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('umur') is-invalid @enderror" name="umur" placeholder="Umur">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-child"></span>
            </div>
          </div>

          @error('umur')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-group mb-3">
          <select class="form-control @error('jk') is-invalid @enderror" name="jk">
            <option disabled selected>Pilih Jenis Kelamin</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          
          @error('jk')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <!-- Hafalan -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="hafalan" placeholder="Hafalan">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-quran"></span>
            </div>
          </div>
        </div>

        <!-- No HP -->
        <div class="input-group mb-3">
          <input type="number" class="form-control @error('no') is-invalid @enderror" name="no" required placeholder="Nomor HP/WA">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>

          @error('no')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <!-- Alamat -->
        <div class="form-group mb-3">
          <textarea class="form-control @error('alamat') is-invalid @enderror" rows="3" placeholder="Alamat" name="alamat"></textarea>

          @error('alamat')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-paper-plane"></i> Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <hr>
        <div class="row mt-3">
          <div class="col-6">
            <a href="/" class="btn btn-default w-100"><i class="fas fa-home"></i> Home</a>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <a href="{{ route('login') }}" class="btn btn-success w-100">Sudah punya akun</a>
          </div>
          <!-- /.col -->
        </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
  <br><br><br>
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script>
$(document).ready(function(){
    $('#checkbox').on('change', function(){
        $('#password, #password-confirm').attr('type',$('#checkbox').prop('checked')==true?"text":"password"); 
    });
});
</script>
</body>
</html>
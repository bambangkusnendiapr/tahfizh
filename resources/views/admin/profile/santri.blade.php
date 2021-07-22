@extends('layouts.admin.master')
@section('title', 'Profile')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              @if(Auth::user()->image)
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/santri/')}}/{{Auth::user()->image}}" alt="User profile picture">
              @else
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/muslim.jpg') }}" alt="User profile picture">
              @endif
            </div>

            <h3 class="profile-username text-center">{{ Auth::user()->name}}</h3>

            <p class="text-muted text-center">{{ $user->roles[0]->display_name }}</p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Info</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Ganti Password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <form action="{{ route('profile.update', $user->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="user" value="santri">
                    <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Gambar" class="col-sm-2 col-form-label">Ganti Gambar</label>@error('filefoto') <span class="text-danger font-italic">{{ $message }}</span>@enderror
                        <div class="col-sm-10">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="filefoto" class="custom-file-input @error('filefoto') is-invalid @enderror" id="exampleInputFile">
                              <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Simpan</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <form action="{{ route('profile.password', $user->id) }}" method="POST" class="form-horizontal">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                      <label for="baru">Password Baru</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password Baru" required autocomplete="new-password">

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="konfirmasi">Konfirmasi Password Baru</label>
                      <input type="password" name="password_confirmation" class="form-control" id="password1" placeholder="Konfirmasi Password Baru" required autocomplete="new-password">
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="checkbox">
                      <label class="form-check-label" for="checkbox">Lihat Password</label>
                    </div>
                    <div class="form-group mt-3">
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

    <div class="row">
      <div class="col-md">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Silahkan Lengkapi Data Diri</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('data.santri', $santri->id) }}" method="POST">
            @method('PATCH')
            @csrf
              
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" readonly class="form-control" value="{{ $santri->kelas->kelas_nama }}">
                  </div>

                  <div class="form-group">
                    <label for="umur">Umur Saat Daftar</label>
                    <input type="text" readonly class="form-control" value="{{ $santri->santri_umur }}">
                  </div>

                  <div class="form-group">
                    <label for="panggil">Nama Panggilan</label>
                    <input type="text" name="panggil" class="form-control" id="panggil" value="{{ $santri->santri_panggil }}">
                  </div>

                  <div class="form-group">
                    <label for="lahir">Tempat Lahir</label>
                    <input type="text" name="lahir" class="form-control" id="lahir" value="{{ $santri->santri_lahir }}">
                  </div>

                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jk">
                      <option value="Laki-laki" {{ $santri->santri_jk == 'Laki-laki' ? 'selected="selected"' : '' }}>Laki-laki</option>
                      <option value="Perempuan" {{ $santri->santri_jk == 'Perempuan' ? 'selected="selected"' : '' }}>Perempuan</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat">{{ $santri->santri_alamat}}</textarea>
                  </div> 
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="hafal">Hafalan Saat Daftar</label>
                    <input type="text" readonly class="form-control" id="hafal" value="{{ $santri->santri_hafal }}">
                  </div>

                  <div class="form-group">
                    <label for="surat">Hafalan Terakhir</label>
                    <input type="text" readonly class="form-control" id="surat" value="{{ $santri->suratakhir->surat_nama }}">
                  </div>

                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="number" name="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" value="{{ $santri->santri_nik }}">

                    @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="tgl">Tanggal Lahir</label>
                    <input type="date" name="tgl" class="form-control" id="tgl" value="{{ $santri->santri_tgl }}">
                  </div>

                  <div class="form-group">
                    <label for="no">Nomor HP/WA</label>
                    <input type="number" name="no" class="form-control @error('no') is-invalid @enderror" id="no" value="{{ $santri->santri_no }}">

                    @error('no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>                  

                  <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <textarea class="form-control" name="ket">{{ $santri->santri_ket}}</textarea>
                  </div>

                </div>
              </div>
              
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
      </div>
    </div>

    <div class="row">
      <div class="col-md">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Data Orangtua / Wali</h3>
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Orangtua / Wali</label>
                  <input type="text" name="ortu" class="form-control" value="{{ $santri->santri_ortu }}">
                </div>
                
                <div class="form-group">
                  <label>Hubungan dengan santri</label>
                  <input type="text" name="hubungan" class="form-control" value="{{ $santri->santri_ortu_hubungan }}">
                </div>
              </div>
 
              <div class="col-md-6">
                <div class="form-group">
                  <label>No HP / WA</label>
                  <input type="number" name="ortu_no" class="form-control" value="{{ $santri->santri_ortu_no }}">
                </div>
                
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="ortu_alamat" class="form-control" value="{{ $santri->santri_ortu_alamat }}">
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-success w-100">Simpan Data Diri</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->

@push('css')
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush

@push('script')
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
$(document).ready(function(){
    $('#checkbox').on('change', function(){
        $('#password, #password1').attr('type',$('#checkbox').prop('checked')==true?"text":"password"); 
    });
});
</script>
@endpush

@endsection
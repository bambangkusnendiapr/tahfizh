@extends('layouts.admin.master')
@section('santri', 'active')
@section('title', 'Edit Santri')
@section('content')
@include('sweetalert::alert')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Data Santri</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('santri.index') }}">Santri</a></li>
          <li class="breadcrumb-item active">Edit Data</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <form action="{{ route('santri.update', $santri->id) }}" method="POST" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      <div class="row">

        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header bg-warning">
              <h3 class="card-title">Form Santri</h3>
            </div>
            <div class="card-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Pilih Kelas</label>
                    <select class="form-control" name="kelas">
                      @foreach($kelas as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $santri->kelas_id ? 'selected':'' }}>{{ $data->kelas_nama }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" required name="name" value="{{ $santri->user->name }}" class="form-control @error('name') is-invalid @enderror" id="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" required name="email" value="{{ $santri->user->email }}" class="form-control @error('email') is-invalid @enderror" id="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group mt-5">
                    @if($santri->user->image)
                      <img id="img" src="{{ url('images/santri/'.$santri->user->image)}}" width="100px" height="100px"/>
                    @else
                      <img id="img" src="{{ url('images/muslim.jpg')}}" width="100px" height="100px"/>
                    @endif
                  </div>
                  <div class="form-group"> 
                    <label><strong>Foto</strong></label>@error('filefoto') <span class="text-danger font-italic">{{ $message }}</span>@enderror
                    <div class="custom-file mb-3">
                        <input type="file" name="filefoto" class="custom-file-input @error('filefoto') is-invalid @enderror" id="filefoto">
                        <label class="custom-file-label" for="filefoto">Pilih Gambar</label>
                        <div class="text-default">
                          Max: 2mb
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="lahir">Tempat Lahir</label>
                    <input type="text" name="lahir" class="form-control @error('lahir') is-invalid @enderror" id="lahir" value="{{ $santri->santri_lahir }}">

                    @error('lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="tgl">Tanggal Lahir</label>
                    <input type="date" required name="tgl" value="{{ $santri->santri_tgl }}" class="form-control @error('tgl') is-invalid @enderror" id="tgl">
                    @error('tgl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="panggil">Nama Panggilan</label>
                    <input type="text" name="panggil" class="form-control @error('panggil') is-invalid @enderror" id="panggil" value="{{ $santri->santri_panggil }}">

                    @error('panggil')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">                  
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
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jk">
                      <option value="Laki-laki" {{ $santri->santri_jk == 'Laki-laki' ? 'selected="selected"' : '' }}>Laki-laki</option>
                      <option value="Perempuan" {{ $santri->santri_jk == 'Perempuan' ? 'selected="selected"' : '' }}>Perempuan</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="no">Nomor HP/WA</label>
                    <input type="number" required name="no" class="form-control @error('no') is-invalid @enderror" id="no" value="{{ $santri->santri_no }}">

                    @error('no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="umur">Umur Saat Daftar</label>
                    <input type="text" name="umur" value="{{ $santri->santri_umur }}" class="form-control @error('umur') is-invalid @enderror" id="umur">
                    @error('umur')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="hafal">Hafalan Saat Daftar</label>
                    <input type="text" name="hafal" value="{{ $santri->santri_hafal }}" class="form-control @error('hafal') is-invalid @enderror" id="hafal">
                    @error('hafal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>                 

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat">{{ $santri->santri_alamat }}</textarea>
                    @error('ket')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <textarea class="form-control" id="ket" name="ket">{{ $santri->santri_ket }}</textarea>
                    @error('ket')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Hafalan Surat Saat Ini</label>
                    <select class="form-control select2bs4" name="surat" style="width: 100%;">
                      @foreach($surat as $data)
                      <option value="{{ $data->id }}" {{ $santri->surat_id == $data->id ? 'selected="selected"' : '' }}>{{ $data->surat_nama }}</option>
                      @endforeach
                    </select>
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

        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header bg-warning">
              <h3 class="card-title">Form Ortu Santri</h3>
            </div>
            <div class="card-body">

              <div class="row">
                <div class="col-md-6">

                  <div class="form-group">
                    <label for="ortu">Nama Orangtua / Wali</label>
                    <input type="text" name="ortu" value="{{ $santri->santri_ortu }}" class="form-control" id="ortu">
                  </div>

                  <div class="form-group">
                    <label for="hubungan">Hubungan</label>
                    <input type="text" name="hubungan" value="{{ $santri->santri_ortu_hubungan }}" class="form-control" id="hubungan">
                  </div>
                </div>

                <div class="col-md-6">                  
                  <div class="form-group">
                    <label for="ortu_no">NO HP Ortu</label>
                    <input type="number" name="ortu_no" class="form-control" id="ortu_no" value="{{ $santri->santri_ortu_no }}">
                  </div>

                  <div class="form-group">
                    <label for="ortu_alamat">Alamat</label>
                    <input type="text" name="ortu_alamat" class="form-control" id="ortu_alamat" value="{{ $santri->santri_ortu_alamat }}">
                  </div>

                  
                </div>
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="form-group">
                <button type="submit" class="btn btn-warning w-100">Edit</button>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>

      </div>
    
    </form>

  </div>
</section>
<!-- /.content -->

@push('css')
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<style>
.btn-margin-auto {
  margin: auto;
}
</style>
@endpush

@push('script')
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false, "lengthChange": true, "autoWidth": false, "scrollX": true,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    bsCustomFileInput.init();

    $('#filefoto').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
      {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
          }
        reader.readAsDataURL(input.files[0]);
      }
    })
  });
</script>
<script>
$(document).ready(function(){
    $('#checkbox').on('change', function(){
        $('#password, #password-confirm').attr('type',$('#checkbox').prop('checked')==true?"text":"password"); 
    });
});
</script>
@endpush

@endsection
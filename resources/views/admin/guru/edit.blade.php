@extends('layouts.admin.master')
@section('guru', 'active')
@section('title', 'Edit Guru')
@section('content')
@include('sweetalert::alert')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Data Guru</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Guru</a></li>
          <li class="breadcrumb-item active">Edit Data</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      <div class="row">

        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header bg-warning">
              <h3 class="card-title">Form Guru</h3>
            </div>
            <div class="card-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" required name="name" value="{{ $guru->user->name }}" class="form-control @error('name') is-invalid @enderror" id="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" required name="email" value="{{ $guru->user->email }}" class="form-control @error('email') is-invalid @enderror" id="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group mt-5">
                    @if($guru->user->image)
                      <img id="img" src="{{ url('images/guru/'.$guru->user->image)}}" width="100px" height="100px"/>
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
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jk">
                      <option value="Laki-laki" {{ $guru->guru_jk == 'Laki-laki' ? 'selected="selected"' : '' }}>Laki-laki</option>
                      <option value="Perempuan" {{ $guru->guru_jk == 'Perempuan' ? 'selected="selected"' : '' }}>Perempuan</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">

                  <div class="form-group">
                    <label for="no">Nomor HP/WA</label>
                    <input type="number" required name="no" class="form-control @error('no') is-invalid @enderror" id="no" value="{{ $guru->guru_no }}">

                    @error('no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="lahir">Kota Tempat Lahir</label>
                    <input type="text" name="lahir" value="{{ $guru->guru_lahir }}" class="form-control @error('lahir') is-invalid @enderror" id="lahir">
                    @error('lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="tgl">Tanggal Lahir</label>
                    <input type="date" required name="tgl" value="{{ $guru->guru_tgl }}" class="form-control @error('tgl') is-invalid @enderror" id="tgl">
                    @error('tgl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat...">{{ $guru->guru_alamat }}</textarea>
                    @error('ket')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Hafalan Surat</label>
                    <select class="form-control select2bs4" name="surat" style="width: 100%;">
                      @foreach($surat as $data)
                      <option value="{{ $data->id }}" {{ $guru->surat_id == $data->id ? 'selected="selected"' : '' }}>{{ $data->surat_nama }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <textarea class="form-control" id="ket" name="ket">{{ $guru->guru_ket }}</textarea>
                    @error('ket')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-warning w-100">Edit</button>
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
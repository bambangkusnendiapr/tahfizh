@extends('layouts.admin.master')
@section('manajemen', 'menu-open')
@section('pengaturan', 'active')
@section('profil', 'active')
@section('title', 'Profil')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profil</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="card card-outline card-success">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <img id="imglogo" src="{{ url('images/profil/'.$profil->profil_logo)}}" width="100px" height="100px"/>
                </div>
                <div class="form-group"> 
                  <label><strong>Logo</strong></label>@error('filelogo') <span class="text-danger font-italic">{{ $message }}</span>@enderror
                  <div class="custom-file mb-3">
                      <input type="file" name="filelogo" class="custom-file-input @error('filelogo') is-invalid @enderror" id="filelogo">
                      <label class="custom-file-label" for="filelogo">Pilih Logo</label>
                      <div class="text-default">
                        Max: 2mb
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <!-- Nama -->
                <div class="form-group">
                  <label for="nama">Nama</label>@error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="text" required name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $profil->profil_nama }}">
                </div>
              </div>

              <div class="col-md-6">
                <!-- NO HP -->
                <div class="form-group">
                  <label for="no">NO HP <span class="font-italic">(Awali dengan 62 tanpa spasi/strip)</span></label>@error('no') <span class="text-danger">{{ $message }}</span> @enderror
                  <input type="number" required name="no" class="form-control @error('no') is-invalid @enderror" id="no" value="{{ $profil->profil_no }}">
                </div>
              </div>
            </div>        

            

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-success w-100">Simpan</button>
          </div>
        </div>
        <!-- /.card -->
        </form>
      </div>
    </div>
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

    bsCustomFileInput.init();

    $('#filelogo').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
      {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#imglogo').attr('src', e.target.result);
          }
        reader.readAsDataURL(input.files[0]);
      }
    })

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
@endpush

@endsection
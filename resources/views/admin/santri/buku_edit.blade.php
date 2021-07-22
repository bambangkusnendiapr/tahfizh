@extends('layouts.admin.master')
@section('tahfizh', 'sidebar-collapse')
@section('santri', 'active')
@section('title', 'Tahfizh Santri')
@section('content')
@include('sweetalert::alert')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Penilaian Tahfizh</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('santri.index') }}">Santri</a></li>
          <li class="breadcrumb-item"><a href="{{ route('santri.show', $buku->santri->id) }}">{{ $buku->santri->user->name }}</a></li>
          <li class="breadcrumb-item active">Tahfizh</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <form action="{{ route('santri.buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
      @method('PATCH')
      @csrf

      <div class="row">

        <div class="col-md-3">
          <!-- Default box -->
          <div class="card card-success card-outline">
            <div class="card-body">

              <div class="form-group">
                <label for="tgl">Tanggal</label>
                <input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror" id="tgl" required value="{{ $buku->buku_tgl }}">

                @error('tgl')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="santri">Santri</label>
                <input type="text" name="santri" class="form-control @error('santri') is-invalid @enderror" id="santri" value="{{ $buku->santri->user->name }}" readonly>
              </div>

              <div class="form-group">
                <label for="guru">Guru</label>
                <input type="text" class="form-control @error('guru') is-invalid @enderror" id="guru" value="{{ Auth::user()->name }}" readonly>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-6">
          <!-- Default box -->
          <div class="card card-success card-outline">
            <div class="card-body">

              <div class="form-group">
                <label for="jilid">Jilid</label>
                <input type="text" name="jilid" class="form-control @error('jilid') is-invalid @enderror" id="jilid" required value="{{ $buku->buku_jilid }}">

                @error('jilid')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="halaman">Halaman</label>
                <input type="text" name="halaman" class="form-control @error('halaman') is-invalid @enderror" id="halaman" required value="{{ $buku->buku_halaman }}">

                @error('halaman')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="murajaah">Murajaah</label>
                <input type="text" name="murajaah" class="form-control @error('murajaah') is-invalid @enderror" id="murajaah" required value="{{ $buku->buku_murajaah }}">

                @error('murajaah')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="ziyadah">Ziyadah</label>
                <input type="text" name="ziyadah" class="form-control @error('ziyadah') is-invalid @enderror" id="ziyadah" required value="{{ $buku->buku_ziyadah }}">

                @error('ziyadah')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <div class="col-md-3">
          <!-- Default box -->
          <div class="card card-success card-outline">
            <div class="card-body">

              <div class="form-group">
                <label for="tgl">Nilai</label>
                <select name="nilai" id="nilai" required class="form-control @error('ket') is-invalid @enderror">
                  @foreach($nilai as $data)
                    <option value="{{ $data->id }}" {{ $data->id == $buku->nilai_id ? 'selected': '' }}>{{ $data->nilai_nama }}</option>
                  @endforeach
                </select>

                @error('nilai')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="ket">Keterangan</label>
                <textarea name="ket" id="ket" class="form-control @error('ket') is-invalid @enderror">{{ $buku->buku_ket }}</textarea>
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="form-group">
                <button type="submit" class="btn btn-success w-100">Simpan</button>
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
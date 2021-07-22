@extends('layouts.admin.master')
@section('post', 'menu-open')
@section('posting', 'active')
@section('artikel', 'active')
@section('title', 'Edit Artikel')
@section('content')
@include('sweetalert::alert')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Edit Data Artikel</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}">Artikel</a></li>
          <li class="breadcrumb-item active">Edit Data</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      <div class="row">

        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">Form Artikel</h3>
            </div>
            <div class="card-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="tgl">Tanggal</label>
                    <input type="date" required name="tgl" value="{{ $artikel->artikel_tgl }}" class="form-control @error('tgl') is-invalid @enderror" id="tgl">
                    @error('tgl')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Penulis</label>
                    <select class="form-control select2bs4" name="penulis">
                      @foreach($user as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $artikel->penulis ? 'selected':'' }}>{{ $data->name }}</option>
                      @endforeach
                    </select>
                  </div>                  
                  
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori">
                      @foreach($kategori as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $artikel->kategori_id ? 'selected':'' }}>{{ $data->kategori_nama }}</option>
                      @endforeach
                    </select>
                  </div>                  
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    @if($artikel->artikel_gambar)
                      <img id="img" src="{{ url('images/artikel/'.$artikel->artikel_gambar)}}" width="100px" height="100px"/>
                    @else
                      <img id="img" src="{{ url('images/muslim.jpg')}}" width="100px" height="100px"/>
                    @endif
                  </div>
                  <div class="form-group"> 
                    <label><strong>Gambar</strong></label>@error('filefoto') <span class="text-danger font-italic">{{ $message }}</span>@enderror
                    <div class="custom-file mb-3">
                        <input type="file" name="filefoto" class="custom-file-input @error('filefoto') is-invalid @enderror" id="filefoto">
                        <label class="custom-file-label" for="filefoto">Pilih Gambar</label>
                        <div class="text-default">
                          Max: 4mb
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" required name="judul" value="{{ $artikel->artikel_judul }}" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul..." autofocus>
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
        <div class="col-md-12">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">Konten </h3>@error('isi') <span class="text-danger font-italic">{{ $message }}</span>@enderror
            </div>
            <div class="card-body">
              
              <textarea id="summernote" rows="8" name="isi" required placeholder="Konten artikel">
                {{ $artikel->artikel_isi }}
              </textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-success">
            <div class="card-body">
              <div class="form-group">
                <label>Pilih Tag #</label>@error('tag') <span class="text-danger font-italic">{{ $message }}</span>@enderror
                <div class="select2-primary">
                  <select class="select2" name="tag[]" multiple="multiple" data-placeholder="Pilih Tag" data-dropdown-css-class="select2-primary" style="width: 100%;">
                    @foreach($tag as $data)
                      <option value="{{ $data->id }}"
                      @foreach($artikel->tag as $value)
                        @if($data->id == $value->id)
                        selected
                        @endif
                      @endforeach
                      >#{{ $data->tag_nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-success w-100">Simpan Artikel</button>
            </div>
          </div>
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
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
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
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
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

    // Summernote
    $('#summernote').summernote()
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
@extends('layouts.admin.master')
@section('manajemen', 'menu-open')
@section('pengaturan', 'active')
@section('role', 'active')
@section('title', 'Create Role')
@section('content')
@include('sweetalert::alert')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Data Role</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('role.index') }}">Role</a></li>
          <li class="breadcrumb-item active">Tambah Data</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <form action="{{ route('role.store') }}" method="POST">
      @csrf
      <div class="row">

        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">Form Role</h3>
            </div>
            <div class="card-body">

              <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-7">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="role name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>

              <div class="form-group row">
                  <label for="display_name" class="col-md-3 col-form-label text-md-right">{{ __('Display Name') }}</label>

                  <div class="col-md-7">
                      <input id="display_name" type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" value="{{ old('display_name') }}" required autocomplete="display_name">

                      @error('display_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>

                  <div class="col-md-7">
                      <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                      @error('description')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
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
            <div class="card-header bg-primary">
              <h3 class="card-title">Form Menu - Permission</h3>
            </div>
            <div class="card-body">
              <div class="form-group">

                <div class="row">
                  @foreach($menus as $menu)
                  <div class="col-md-4" id="accordion">
                    
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapse{{ $menu->id}}">
                            <div class="card-header">
                                <h4 class="card-title w-100 text-center">
                                  {{ $menu->menu_nama }}
                                </h4>
                            </div>
                        </a>
                        <div id="collapse{{ $menu->id}}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                              @foreach($menu->permissions as $permission)
                              <div class="form-check d-inline">
                                    &nbsp;<input
                                        class="form-check-input"
                                        type="checkbox" id=""
                                        name="permissions_id[]"
                                        value="{{ $permission->id }}"
                                    >
                                    <label class="form-check-label" for="">{{ $permission->display_name }}</label>
                                </div>
                                @endforeach

                                @error('permissions_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                  </div>
                  @endforeach
                </div>

              </div>
            <!-- /.card-body -->
            </div>
          <!-- /.card -->
          </div>

        </div> 
      </div>

      <div class="row">

        <div class="col-12">
          <!-- Default box -->
          <div class="card card-success card-outline">
            <div class="card-body mx-auto">
              <button type="submit" class="btn btn-xl btn-success px-5"><i class="fas fa-save"></i>&nbsp;Simpan</button>
            </div>
            <!-- /.card-body -->
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
  });
</script>
@endpush

@endsection
@extends('layouts.admin.master')
@section('manajemen', 'menu-open')
@section('pengaturan', 'active')
@section('permission', 'active')
@section('title', 'Permission')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Permission</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Permission</li>
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
        <div class="card card-outline card-success">
          @permission('permission-create')
          <div class="card-header">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
              <i class="fas fa-plus"></i> Tambah Data
            </button>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          @endpermission
          <div class="card-body">
          <table id="example1" class="table table-sm table-striped">
            <thead>
            <tr class="text-center">
              <th>#</th>
              <th>Menu</th>
              <th>Permission</th>
              <th>Display Name</th>
              <th>Description</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
            <tr>
              <td class="align-middle text-center">{{ $loop->iteration }}</td>
              @foreach($permission->menus as $m)
              <td>{{ $m->menu_nama }}</td>
              @endforeach
              <td>{{ $permission->name}}</td>
              <td>{{ $permission->display_name}}</td>
              <td>{{ $permission->description}}</td>
              <td class="align-middle text-center">
                @permission('permission-update')
                <a href="#" data-target="#modal-edit{{ $permission->id }}" class="btn btn-warning btn-sm" data-toggle="modal"><i class="fas fa-edit"></i></a>
                @endpermission
                @permission('permission-delete')
                <a href="#" data-target="#modal-hapus{{ $permission->id }}" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fas fa-trash"></i></a>
                @endpermission
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
<!-- /.content -->

<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('permission.store') }}" method="POST">
        @csrf
          <div class="modal-body">

          <div class="form-group row">
            <label for="menu_id" class="col-md-3 col-form-label text-md-right">{{ __('Menu') }}</label>

            <div class="col-md-7">
                <select name="menu_id" id="menu_id" class="form-control select2bs4 @error('menu_id') is-invalid @enderror">
                    @if (count($menus))
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->menu_nama }}</option>
                    @endforeach
                    @endif
                </select>

                @error('menu_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

          <div class="form-group row">
              <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-7">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="permission-name" autofocus>

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
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal Hapus Data -->
@foreach($permissions as $permission)
<div class="modal fade" id="modal-hapus{{$permission->id}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('permission.destroy', $permission->id) }}" method="post" class="d-inline" id="id_form">
        @method('delete')
        @csrf
          <div class="modal-body">
            <input type="hidden" value="" id="{{ $permission->id }}">
            <p>Yakin ingin dihapus ?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

<!-- Modal Edit Data -->
@foreach($permissions as $permission)
<div class="modal fade" id="modal-edit{{ $permission->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="{{ route('permission.update', $permission->id) }}" method="POST">
        @method('patch')
        @csrf
          <div class="modal-body">

          <div class="form-group row">
            <label for="menu_id" class="col-md-3 col-form-label text-md-right">{{ __('Menu') }}</label>

            <div class="col-md-7">
                <select class="form-control option-select" name="menu_id" id="menu_id" style="width: 100%;">
                    @if (count($menus))
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}" @foreach($menu->permissions as $per)
                              @if($per->id == $permission->id)
                                  selected="selected"
                              @endif
                          @endforeach>{{ $menu->menu_nama }}</option>
                    @endforeach
                    @endif
                </select>

                @error('menu_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

          <div class="form-group row">
              <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-7">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $permission->name }}" required autocomplete="name" autofocus>

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
                  <input id="display_name" type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" value="{{ $permission->display_name }}" required autocomplete="display_name">

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
                  <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $permission->description }}" required>

                  @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Edit</button>
          </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

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
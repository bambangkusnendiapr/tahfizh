@extends('layouts.admin.master')
@section('pembelajaran', 'menu-open')
@section('belajar', 'active')
@section('kelas', 'active')
@section('title', 'Kelas')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kelas</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Kelas</li>
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
          @permission('kelas-create')
          <div class="card-header">
            <button type="button" id="tombolTambah" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
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
              <th>Kelas</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($kelas as $data)
            <tr>
              <td class="align-middle text-center">{{ $loop->iteration }}</td>
              <td>{{ $data->kelas_nama }}</td>
              <td>{{ $data->kelas_ket }}</td>
              <td class="align-middle text-center">
                <a href="{{ route('kelas.show', $data->id) }}" class="btn btn-primary btn-sm">Lihat Santri</a>
                @permission('kelas-update')
                <a href="#" data-target="#modal-edit{{ $data->id }}" class="btn btn-warning btn-sm" data-toggle="modal"><i class="fas fa-edit"></i></a>
                @endpermission
                @permission('kelas-delete')
                <a href="#" data-target="#modal-hapus{{ $data->id }}" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fas fa-trash"></i></a>
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
        <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="kelas">Kelas</label>@error('kelas') <span class="text-danger">{{ $message }}</span> @enderror
              <input type="text" required name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" placeholder="Masukan Kelas">
            </div>
            <div class="form-group">
              <label for="ket">Keterangan</label>@error('ket') <span class="text-danger">{{ $message }}</span> @enderror
              <input type="text" required name="ket" class="form-control @error('ket') is-invalid @enderror" id="ket" placeholder="Masukan Keterangan kelas">
            </div>
              <input type="hidden" name="warna" class="form-control" id="warna" value="">
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
@foreach($kelas as $data)
<div class="modal fade" id="modal-hapus{{$data->id}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('kelas.destroy', $data->id) }}" method="post" class="d-inline" id="id_form">
        @method('delete')
        @csrf
          <div class="modal-body">
            <input type="hidden" value="" id="{{ $data->id }}">
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

@foreach($kelas as $data)
<div class="modal fade" id="modal-edit{{$data->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('kelas.update', $data->id) }}" method="POST">
      @method('PATCH')
      @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="kelas">Kelas</label>@error('kelas') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="text" required name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" value="{{ $data->kelas_nama }}">
          </div>
          <div class="form-group">
            <label for="ket">Keterangan</label>@error('ket') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="text" required name="ket" class="form-control @error('ket') is-invalid @enderror" id="ket" value="{{ $data->kelas_ket }}">
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
<!-- /.modal -->

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

    $( "#tombolTambah" ).click(function() {
      var symbols,color;
      symbols = "0123456789ABCDEF";

      color = "#"
      for(var i=0; i<6; i++){
        color = color + symbols[Math.floor(Math.random() * 16)];
      }
      $("#warna").val(color);
    });
  });
</script>
@endpush

@endsection
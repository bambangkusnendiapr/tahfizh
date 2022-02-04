@extends('layouts.admin.master')
@section('post', 'menu-open')
@section('posting', 'active')
@section('artikel', 'active')
@section('title', 'Artikel')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Artikel</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Artikel</li>
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
          @permission('artikel-create')
          <div class="card-header">
            <a href="{{ route('artikel.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>

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
              <th>Gambar</th>
              <th>Judul</th>
              <th>Kategori</th>
              <th>Penulis</th>
              <th>Tanggal</th>
              <th>Dipublish Oleh</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($artikel as $data)
            <tr>
              <td class="align-middle text-center">{{ $loop->iteration }}</td>
              <td>
                @if($data->artikel_gambar)
                    <img id="img" src="{{ url('images/artikel/')}}/{{$data->artikel_gambar }}" width="50px"/>
                @else
                    <img id="img" src="{{ url('images/muslim.jpg')}}" width="50px"/>
                @endif
              </td>
              <td><a href="{{ route('front.artikel.single', $data->artikel_slug) }}" target="_blank">{{ $data->artikel_judul }}</a></td>
              <td>{{ $data->kategori->kategori_nama }}</td>
              <td>
                {{ $data->user->name }}
              </td>
              <td>{{ $data->artikel_tgl }}</td>
              <td>{{ $data->user->name }}</td>
              <td class="align-middle text-center">
                <a href="{{ route('front.artikel.single', $data->artikel_slug) }}" target="_blank" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                <a href="{{ route('artikel.show', $data->id) }}" class="btn btn-success btn-sm"><i class="fas fa-comment"></i></a>
                @permission('artikel-update')
                <a href="{{ route('artikel.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                @endpermission
                @permission('artikel-delete')
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

<!-- Modal Hapus Data -->
@foreach($artikel as $data)
<div class="modal fade" id="modal-hapus{{$data->id}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('artikel.destroy', $data->id) }}" method="post" class="d-inline" id="id_form">
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
  });
</script>
@endpush

@endsection
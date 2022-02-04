@extends('layouts.admin.master')
@section('guru', 'active')
@section('title', 'Guru')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Guru</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Guru</li>
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
          @permission('guru-create')
          <div class="card-header">
            <a href="{{ route('guru.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
            <a href="{{ route('guru.export') }}" class="btn btn-success"><i class="far fa-file-excel"></i></i> Download Excel</a>

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
              <th>Foto</th>
              <th>Nama</th>
              <th>Email</th>
              <th>L/P</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach($guru as $data)
              <tr>
                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                <td class="text-center align-middle">
                  @if($data->user->image)
                      <img id="img" src="{{ url('images/guru/')}}/{{$data->user->image }}" width="50px"/>
                  @else
                      <img id="img" src="{{ url('images/muslim.jpg')}}" width="50px"/>
                  @endif
                </td>
                <td class="align-middle">{{ $data->user->name }}</td>
                <td class="text-center align-middle">{{ $data->user->email }}</td>
                <td class="text-center align-middle">{{ $data->guru_jk }}</td>
                <td class="text-center align-middle">
                  <a href="#" data-target="#modal-edit{{ $data->id }}" class="btn btn-primary btn-sm" data-toggle="modal">detail</a>
                  @permission('guru-update')
                  <a href="{{ route('guru.edit', $data->id) }}" class="btn btn-warning btn-sm">edit</a>
                  @endpermission
                  @permission('guru-delete')
                  <a href="#" data-target="#modal-hapus{{ $data->id }}" class="btn btn-danger btn-sm" data-toggle="modal">hapus</a>
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

@foreach($guru as $data)
<div class="modal fade" id="modal-edit{{$data->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title">Detail Guru</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          @if($data->user->image)
            <img src="{{ asset('images/guru/')}}/{{$data->user->image}}" class="img-circle" width="80"/><br>
          @endif

          <div class="row">
            <div class="col-md-6">
              <strong>Nama</strong>
                <p class="text-muted">{{ $data->user->name }}</p>

                <strong>Email</strong>
                <p class="text-muted">{{ $data->user->email }}</p>

                @role('superadmin|admin|guru')
                <strong>Hafalan</strong>
                <p class="text-muted">{{ $data->suratakhir->surat_nama }}</p>
                @endrole

                <strong>L/P</strong>
                <p class="text-muted">{{ $data->guru_jk }}</p>

                <strong>No HP/WA</strong>
                <p class="text-muted">{{ $data->guru_no }}</p>
            </div>

            <div class="col-md 6">
                <strong>Tempat Lahir</strong>
                <p class="text-muted">{{ $data->guru_lahir }}</p>

                <strong>Tanggal Lahir</strong>
                <p class="text-muted">{{ $data->guru_tgl }}</p>

                <strong>Alamat</strong>
                <p class="text-muted">{{ $data->guru_alamat }}</p>

                <strong>Keterangan</strong>
                <p class="text-muted">{{ $data->guru_ket }}</p>
            </div>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach
<!-- /.modal -->

<!-- Modal Hapus Data -->
@foreach($guru as $data)
<div class="modal fade" id="modal-hapus{{$data->id}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('guru.destroy', $data->id) }}" method="post" class="d-inline" id="id_form">
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
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
          <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="d-flex justify-content-center">
                    @if($artikel->artikel_gambar)
                        <img id="img" src="{{ url('images/artikel/')}}/{{$artikel->artikel_gambar }}" class="figure-img img-fluid rounded" width="300px"/>
                    @else
                        <img id="img" src="{{ url('images/muslim.jpg')}}" width="200px"/>
                    @endif
                  </div>
                </div>

                <div class="col-md-8">
                  <table class="table table-striped table-sm">
                    <tr>
                      <td>Judul</td>
                      <td>:</td>
                      <td><a href="{{ route('front.artikel.single', $artikel->artikel_slug) }}" target="_blank"><strong>{{ $artikel->artikel_judul }}</strong></a></td>
                    </tr>
                    <tr>
                      <td>Kategori</td>
                      <td>:</td>
                      <td>{{ $artikel->kategori->kategori_nama }}</td>
                    </tr>
                    <tr>
                      <td>Penulis</td>
                      <td>:</td>
                      <td>@foreach($user->where('id', $artikel->penulis) as $value)
                        {{ $value->name }}
                      @endforeach</td>
                    </tr>
                    <tr>
                      <td>Tanggal</td>
                      <td>:</td>
                      <td>{{ $artikel->artikel_tgl }}</td>
                    </tr>
                    <tr>
                      <td>Dipublish Oleh</td>
                      <td>:</td>
                      <td>{{ $artikel->user->name }}</td>
                    </tr>
                    <tr>
                      <td>Komentar</td>
                      <td>:</td>
                      <td>{{ $artikel->komentar->count() }}</td>
                    </tr>
                  </table>
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
        <div class="card card-outline card-success">
          <div class="card-header">
            <h4 class="modal-title">Komentar</h4>
          </div>
          <div class="card-body">
          <table id="example1" class="table table-sm table-striped">
            <thead>
            <tr class="text-center">
              <th>#</th>
              <th>Tanggal</th>
              <th>Nama</th>
              <th>Email</th>
              <th>N HP</th>
              <th>Komentar</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach($artikel->komentar as $komen)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ Carbon\Carbon::parse($komen->created_at)->format('d/M/Y') }}</td>
                  <td>{{ $komen->komentar_nama }}</td>
                  <td>{{ $komen->komentar_email }}</td>
                  <td>{{ $komen->komentar_no }}</td>
                  <td>{{ $komen->komentar_isi }}</td>
                  <td>
                    @permission('komentar-delete')
                      <a href="#" data-target="#modal-hapus{{ $komen->id }}" class="btn btn-danger btn-sm" data-toggle="modal"><i class="fas fa-trash"></i></a>
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
@foreach($artikel->komentar as $komen)
<div class="modal fade" id="modal-hapus{{$komen->id}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('komentar.destroy', $komen->id) }}" method="post" class="d-inline" id="id_form">
        @method('delete')
        @csrf
          <div class="modal-body">
            <input type="hidden" value="" id="{{ $komen->id }}">
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
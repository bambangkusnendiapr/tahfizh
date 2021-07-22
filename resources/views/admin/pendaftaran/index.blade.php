@extends('layouts.admin.master')
@section('pendaftaran', 'active')
@section('title', 'Pendafatran')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pendafatran</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Pendaftaran</li>
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
          <div class="card-header">
            Konfirmasi Pendafatran

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
          <table id="example1" class="table table-sm table-striped">
            <thead>
            <tr class="text-center">
              <th>#</th>
              <th>Gambar</th>
              <th>Nama</th>
              <th>Umur</th>
              <th>Jenis Kelamin</th>
              <th>No HP/WA</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
              @foreach($santri as $data)
              <tr>
                <td class="align-middle text-center">{{ $loop->iteration }}</td>
                <td>
                  @if($data->user->image)
                    <img src="{{ asset('images/')}}/{{$data->user->image}}" class="img-circle" width="80"/>
                  @endif
                </td>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->santri_umur }}</td>
                <td>{{ $data->santri_jk }}</td>
                <td>{{ $data->santri_no }}</td>
                <td>
                  <a href="#" data-target="#modal-edit{{ $data->id }}" class="btn btn-warning btn-sm" data-toggle="modal">detail</a>
                  <a href="#" data-target="#modal-konfirmasi{{ $data->id }}" class="btn btn-success btn-sm" data-toggle="modal">konfirmasi</a>
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

@foreach($santri as $data)
<div class="modal fade" id="modal-edit{{$data->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">Detail Santri</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          @if($data->user->image)
            <img src="{{ asset('images/')}}/{{$data->user->image}}" class="img-circle" width="80"/><br>
          @endif

          <div class="row">
            <div class="col-md-6">
              <strong>Nama</strong>
                <p class="text-muted">{{ $data->user->name }}</p>

                <strong>Email</strong>
                <p class="text-muted">{{ $data->user->email }}</p>

                <strong>Umur</strong>
                <p class="text-muted">{{ $data->santri_umur }}</p>

                <strong>Hafalan</strong>
                <p class="text-muted">{{ $data->santri_hafal }}</p>

                <strong>L/P</strong>
                <p class="text-muted">{{ $data->santri_jk }}</p>

                <strong>No HP/WA</strong>
                <p class="text-muted">{{ $data->santri_no }}</p>
            </div>

            <div class="col-md 6">
              <strong>Panggilan</strong>
                <p class="text-muted">{{ $data->santri_panggil }}</p>

                <strong>NIK</strong>
                <p class="text-muted">{{ $data->santri_nik }}</p>

                <strong>Tempat Lahir</strong>
                <p class="text-muted">{{ $data->santri_lahir }}</p>

                <strong>Tanggal Lahir</strong>
                <p class="text-muted">{{ $data->santri_tgl }}</p>

                <strong>Alamat</strong>
                <p class="text-muted">{{ $data->santri_alamat }}</p>

                <strong>Keterangan</strong>
                <p class="text-muted">{{ $data->santri_ket }}</p>
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

<!-- Modal Konfirmasi Data -->
@foreach($santri as $data)
<div class="modal fade" id="modal-konfirmasi{{$data->id}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">Konfirmasi Santri</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('konfirmasi', $data->id) }}" method="post" class="d-inline" id="id_form">
        @method('put')
        @csrf
          <div class="modal-body">
            <input type="hidden" name="user_id" value="{{ $data->user->id }}">
            <p>Konfirmasi penerimaan santri <strong>{{ $data->user->name }}</strong>?</p>
            <div class="form-group">
              <label for="kelas">Pilih Kelas</label>
              <select name="kelas" id="kelas" class="form-control">
                @foreach($kelas as $data)
                  <option value="{{ $data->id }}">{{ $data->kelas_nama }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-success">Konfirmasi</button>
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
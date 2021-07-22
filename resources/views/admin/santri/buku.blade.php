@extends('layouts.admin.master')
@section('santri', 'active')
@section('title', 'Buku Santri')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Buku Santri <strong class="font-italic">{{ $santri->user->name }}</strong></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('santri.index') }}">Santri</a></li>
          <li class="breadcrumb-item active">Buku</li>
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
          @permission('santri-buku-create')
          <div class="card-header">            
            <a href="{{ route('santri.buku.create', $santri->id) }}" class="btn btn-success card-title"><i class="fas fa-plus"></i> Tambah Tahfizh</a>            
          </div>
          @endpermission
          <div class="card-body">
          <table id="example1" class="table table-sm table-striped">
            <thead>
            <tr class="text-center">
              <th>#</th>
              <th>Tanggal</th>
              <th>Guru</th>
              <th>Jilid</th>
              <th>Halaman</th>
              <th>Murajaah</th>
              <th>Ziyadah</th>
              <th>Nilai</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($buku as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->buku_tgl }}</td>
                <td>{{ $data->guru->user->name }}</td>
                <td>{{ $data->buku_jilid }}</td>
                <td>{{ $data->buku_halaman }}</td>
                <td>{{ $data->buku_murajaah }}</td>
                <td>{{ $data->buku_ziyadah }}</td>
                <td>{{ $data->nilai->nilai_nama }}</td>
                <td>{{ $data->buku_ket }}</td>
                <td>
                  @permission('santri-buku-delete')
                    <a href="#" data-target="#modal-hapus{{ $data->id }}" class="btn btn-danger btn-sm" data-toggle="modal">hapus</a>
                  @endpermission
                  @permission('santri-buku-update')
                    <a href="{{ route('santri.buku.edit', $data->id) }}" class="btn btn-warning btn-sm">edit</a>
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

    <form action="{{ route('santri.surat.juz', $santri->id) }}" method="POST">
      @method('PATCH')
      @csrf
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card card-success">
            <div class="card-header">            
              <h3 class="card-title">Hafalan Surat dan Juz Al-Qur'an</h3>           
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Pilih Juz Yang Sudah Dihafal</label>
                <div class="select2-success">
                  <select class="select2" name="juz[]" multiple="multiple" data-placeholder="Pilih Juz" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    @foreach($juz as $data)
                      <option value="{{ $data->id }}"
                      @foreach($santri->juz as $value)
                        @if($data->id == $value->id)
                        selected
                        @endif
                      @endforeach
                      >{{ $data->juz_nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label>Pilih Surat Yang Sudah Dihafal</label>
                <div class="select2-primary">
                  <select class="select2" name="surat[]" multiple="multiple" data-placeholder="Pilih Surat" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    @foreach($surat as $data)
                      <option value="{{ $data->id }}"
                      @foreach($santri->surat as $value)
                        @if($data->id == $value->id)
                        selected
                        @endif
                      @endforeach
                      >{{ $loop->iteration }}. {{ $data->surat_nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-7">
                  <div class="form-group">
                    <label>Hafalan Surat Terakhir</label>
                    <select class="form-control select2bs4" name="surat_akhir" style="width: 100%;">
                      @foreach($surat as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $santri->surat_id ? 'selected':'' }}>{{ $loop->iteration }}. {{ $data->surat_nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="col-md-5">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-4">Simpan Hafalan</button>
                  </div>
                </div>
              </div>
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

<!-- Modal Hapus Data -->
@foreach($buku as $data)
<div class="modal fade" id="modal-hapus{{$data->id}}">
  <div class="modal-dialog modal-sm">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('santri.buku.delete', $data->id) }}" method="post" class="d-inline" id="id_form">
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
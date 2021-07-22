@extends('layouts.admin.master')
@section('dashboard', 'active')
@section('title', 'Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <!-- ===== -->
    <!-- Jumlah -->
    <!-- ===== -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-secondary">
          <div class="inner">
            <h3>{{ $santri->count() }}</h3>

            <p>Santri</p>
          </div>
          <div class="icon">
          <i class="fas fa-child"></i>
          </div>
          <a href="{{ route('santri.index') }}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-secondary">
          <div class="inner">
            <h3>{{ $guru->count() }}</h3>

            <p>Guru</p>
          </div>
          <div class="icon">
            <i class="fas fa-chalkboard-teacher"></i>
          </div>
          <a href="{{ route('guru.index') }}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-secondary">
          <div class="inner">
            <h3>{{ $buku->count() }}</h3>

            <p>Pembelajaran</p>
          </div>
          <div class="icon">
            <i class="fas fa-quran"></i>
          </div>
          <a href="#pembelajaran" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-secondary">
          <div class="inner">
            <h3>{{ $kelas->count() }}</h3>

            <p>Kelas</p>
          </div>
          <div class="icon">
            <i class="fas fa-table"></i>
          </div>
          <a href="{{ route('kelas.index') }}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    <!-- ===== -->
    <!-- Hafalan Surat -->
    <!-- ===== -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title text-success font-weight-bold">Hafalan Surat</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <p class="text-center font-weight-bold">Tabel Hafalan Surat Santri</p>
                <table class="table table-sm table-striped table-bordered">
                  <tr>
                    <td>Surat Hafal</td>
                    <td class="text-center">{{ $santri_surat->count() }}</td>
                  </tr>
                  <tr>
                    <td>Surat Belum Hafal</td>
                    <td class="text-center">{{ 114-$santri_surat->count() }}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Surat</td>
                    <td class="text-center">114</td>
                  </tr>
                </table>
              
                <strong>Surat Hafal:</strong><br>
                @foreach($surat as $data)
                  @foreach($santri_id->surat as $value)
                    @if($data->id == $value->id)
                      <span class="badge badge-success badge-sm">{{ $value->surat_nama }}</span>                  
                    @endif
                  @endforeach
                @endforeach
              </div>

              <div class="col-lg-6">
                <p class="text-center font-weight-bold">Grafik Hafalan Surat Santri</p>
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>

            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

    <!-- ===== -->
    <!-- Hafalan Juz -->
    <!-- ===== -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title text-success font-weight-bold">Hafalan Juz</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <p class="text-center font-weight-bold">Tabel Hafalan Juz Qur'an Santri</p>
                <table class="table table-sm table-striped table-bordered">
                  <tr>
                    <td>Jumlah Juz Hafal</td>
                    <td class="text-center">{{ $juz_santri->count() }}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Juz Belum Hafal</td>
                    <td class="text-center">{{ 30-$juz_santri->count() }}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Juz Qur'an</td>
                    <td class="text-center">30</td>
                  </tr>
                </table>
              
                <br><strong>Juz Hafal:</strong><br>
                @foreach($surat as $data)
                  @foreach($santri_id->juz as $value)
                    @if($data->id == $value->id)
                      <span class="badge badge-success badge-sm">{{ $value->juz_nama }}</span>                  
                    @endif
                  @endforeach
                @endforeach
              </div>

              <div class="col-lg-6">
                <p class="text-center font-weight-bold">Grafik Hafalan Juz Qur'an Santri</p>
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>        
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

    <!-- ===== -->
    <!-- chart Penilaian -->
    <!-- ===== -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title text-success font-weight-bold">Statistik Penilaian</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <p class="text-center font-weight-bold">Tabel Indeks Penilaian Santri</p>
                <table class="table table-sm table-striped table-bordered">
                  <tr class="text-center">
                    <th>#</th>
                    <th>Indeks Penilaian</th>
                    <th>Jumlah</th>
                  </tr>
                  @foreach($nilai as $data)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td><strong class="ml-5">{{ $data->nilai_nama }}</strong> : {{ $data->nilai_ket }}</td>
                    <td class="text-center">{{ $buku->where('nilai_id', $data->id)->count() }}</td>
                  </tr>
                  @endforeach
                  <tr class="text-center">
                    <td colspan="2">Jumlah</td>
                    <td>{{  $buku->count() }}</td>
                  </tr>
                </table>
              </div>

              <div class="col-lg-6">
                <p class="text-center font-weight-bold">Grafik Indeks Penilaian Santri</p>
                <div id="bar-chart" style="height: 300px;"></div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

    <!-- ===== -->
    <!-- pembelajaran -->
    <!-- ===== -->
    <div class="row" id="pembelajaran">
      <div class="col-md-12">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title text-success font-weight-bold">Pembelajaran</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
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
              </tr>
              </thead>
              <tbody>
                @foreach($buku as $data)
                <tr class="text-center">
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->buku_tgl }}</td>
                  <td>{{ $data->guru->user->name }}</td>
                  <td>{{ $data->buku_jilid }}</td>
                  <td>{{ $data->buku_halaman }}</td>
                  <td>{{ $data->buku_murajaah }}</td>
                  <td>{{ $data->buku_ziyadah }}</td>
                  <td>{{ $data->nilai->nilai_nama }}</td>
                  <td>{{ $data->buku_ket }}</td>
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

@push('css')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- FLOT CHARTS -->
<script src="{{ asset('plugins/flot/jquery.flot.js') }}"></script>
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

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Surat Hafal',
          'Surat Belum Hafal',
      ],
      datasets: [
        {
          data: [{{ $santri_surat->count() }},{{ 114-$santri_surat->count() }}],
          backgroundColor : ['#00a65a','#5a635b'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var juzData        = {
      labels: [
          'Jumlah Juz Hafal',
          'Jumlah Juz Belum Hafal',
      ],
      datasets: [
        {
          data: [{{ $juz_santri->count() }},{{ 30-$juz_santri->count() }}],
          backgroundColor : ['#00a65a','#5a635b'],
        }
      ]
    }
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = juzData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data : [
        @foreach($nilai as $data)
        [{{ $loop->iteration }},{{ $buku->where('nilai_id', $data->id)->count() }}],
        @endforeach
        ],
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#00a65a'],
      xaxis : {
        ticks: [
          @foreach($nilai as $data)
          [{{ $loop->iteration }},'{{ $data->nilai_nama }}'],
          @endforeach
          ]
      }
    })
    /* END BAR CHART */
  });
</script>
@endpush

@endsection
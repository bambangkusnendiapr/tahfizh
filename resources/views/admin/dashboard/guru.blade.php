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
    <!-- jumlah -->
    <!-- ===== -->
    <div class="row">

      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-gradient-secondary">
          <div class="inner">
            <h3>{{ $santri->where('santri_konfirmasi', 'sudah')->count() }}</h3>

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

              <p>Mengajar</p>
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
    <!-- Jenis kelamin santri -->
    <!-- ===== -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title text-success font-weight-bold">Santri</h3>

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
                <p class="text-center font-weight-bold">Tabel Santri</p>
                <table class="table table-lg table-striped table-bordered">
                  <tr>
                    <td>Laki-laki</td>
                    <td class="text-center">{{ $santri->where('santri_jk', 'Laki-laki')->count() }}</td>
                  </tr>
                  <tr>
                    <td>Perempuan</td>
                    <td class="text-center">{{ $santri->where('santri_jk', 'Perempuan')->count() }}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Santri</td>
                    <td class="text-center">{{ $santri->count() }}</td>
                  </tr>
                </table>
              </div>

              <div class="col-lg-6">
                <p class="text-center font-weight-bold">Grafik Santri</p>
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
    <!-- Jenis kelamin guru -->
    <!-- ===== -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title text-success font-weight-bold">Guru</h3>

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
                <p class="text-center font-weight-bold">Tabel Guru</p>
                <table class="table table-lg table-striped table-bordered">
                  <tr>
                    <td>Laki-laki</td>
                    <td class="text-center">{{ $guru->where('guru_jk', 'Laki-laki')->count() }}</td>
                  </tr>
                  <tr>
                    <td>Perempuan</td>
                    <td class="text-center">{{ $guru->where('guru_jk', 'Perempuan')->count() }}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Guru</td>
                    <td class="text-center">{{ $guru->count() }}</td>
                  </tr>
                </table>
              </div>

              <div class="col-lg-6">
                <p class="text-center font-weight-bold">Grafik Guru</p>
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
            <h3 class="card-title text-success font-weight-bold">Statistik Penilaian Mengajar</h3>

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
                <p class="text-center font-weight-bold">Tabel Indeks Penilaian Mengajar Santri</p>
                <table class="table table-sm table-striped table-bordered">
                  <tr class="text-center">
                    <th>#</th>
                    <th>Indeks Penilaian</th>
                    <th>Memberi Nilai</th>
                  </tr>
                  @foreach($nilai as $data)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td><strong class="ml-5">{{ $data->nilai_nama }}</strong> : {{ $data->nilai_ket }}</td>
                    <td class="text-center">{{ $buku->where('nilai_id', $data->id)->count() }} kali</td>
                  </tr>
                  @endforeach
                  <tr class="text-center">
                    <th colspan="2">Jumlah Mengajar</th>
                    <th>{{  $buku->count() }} kali</th>
                  </tr>
                </table>
              </div>

              <div class="col-lg-6">
                <p class="text-center font-weight-bold">Grafik Indeks Penilaian Mengajar Santri</p>
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
    <!-- Hafalan surat -->
    <!-- ===== -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title text-success font-weight-bold">Hafalan Surat Qur'an Santri</h3>

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
                <th>Nama Santri</th>
                <th>Hafalan</th>
                <th>Nama Surat Qur'an Hafal</th>
              </tr>
              </thead>
              <tbody>
                @foreach($santri->where('santri_konfirmasi', 'sudah') as $data)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td class="text-center">{{ $santri_surat->where('santri_id', $data->id)->count() }} Surat</td> 
                    <td>
                      @foreach($surat as $s)
                        @foreach($data->surat as $value)
                          @if($s->id == $value->id)
                            <span class="badge badge-success badge-sm">{{ $value->surat_nama }}</span>                  
                          @endif
                        @endforeach
                      @endforeach
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

    <!-- ===== -->
    <!-- Hafalan Juz -->
    <!-- ===== -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title text-success font-weight-bold">Hafalan Juz Qur'an Santri</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example3" class="table table-sm table-striped">
              <thead>
              <tr class="text-center">
                <th>#</th>
                <th>Nama Santri</th>
                <th>Hafalan</th>
                <th>Juz Qur'an Hafal</th>
              </tr>
              </thead>
              <tbody>
                @foreach($santri->where('santri_konfirmasi', 'sudah') as $data)
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td class="text-center">{{ $juz_santri->where('santri_id', $data->id)->count() }} Juz</td> 
                    <td>
                      @foreach($juz as $s)
                        @foreach($data->juz as $value)
                          @if($s->id == $value->id)
                            <span class="badge badge-success badge-sm">{{ $value->juz_nama }}</span>                  
                          @endif
                        @endforeach
                      @endforeach
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

    <!-- ===== -->
    <!-- Kelas -->
    <!-- ===== -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title text-success font-weight-bold">Kelas</h3>

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
                <p class="text-center font-weight-bold">Tabel Kelas</p>
                <table id="example3" class="table table-sm table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>#</th>
                    <th>Kelas</th>
                    <th>Jumlah</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($kelas as $data)
                      <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $data->kelas_nama }}</td>
                        <td class="text-center">{{ $santri->where('santri_konfirmasi', 'sudah')->where('kelas_id', $data->id)->count() }} Santri</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="col-lg-6">
                <p class="text-center font-weight-bold">Grafik Kelas</p>
                <canvas id="donutChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>

            
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
    $("#example1, #example3").DataTable({
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
          'Laki-laki',
          'Perempuan',
      ],
      datasets: [
        {
          data: [{{ $santri->where('santri_jk', 'Laki-laki')->count() }},{{ $santri->where('santri_jk', 'Perempuan')->count() }}],
          backgroundColor : ['#00a65a','#fdff80'],
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
          'Laki-laki',
          'Perempuan',
      ],
      datasets: [
        {
          data: [{{ $guru->where('guru_jk', 'Laki-laki')->count() }},{{ $guru->where('guru_jk', 'Perempuan')->count() }}],
          backgroundColor : ['#00a65a','#fdff80'],
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

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart2').get(0).getContext('2d')
    var donutData        = {
      labels: [
          @foreach($kelas as $data)
            '{{ $data->kelas_nama }}',
          @endforeach
      ],
      datasets: [
        {
          data: [
            @foreach($kelas as $data)
            {{ $santri->where('santri_konfirmasi', 'sudah')->where('kelas_id', $data->id)->count() }},
            @endforeach
            ],
          backgroundColor : [
            @foreach($kelas as $data)
            '{{ $data->kelas_warna }}',
            @endforeach
            ],
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
  });
</script>
@endpush

@endsection
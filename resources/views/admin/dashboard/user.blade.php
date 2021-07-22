@extends('layouts.admin.master')
@section('dashboard', 'active')
@section('title', 'Dashboard')
@section('content')
@php
use App\Models\Master\Profil;
$profil = Profil::find(1);
@endphp
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
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card card-outline card-success">
          <div class="card-header">
            <h3 class="card-title">Konfirmasi Pendaftaran</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            Data anda sedang kami proses. Jika ingin segera diproses silahkan hubungi nomer wahtsapp ini &nbsp;<a href="http://wa.me/{{ $profil->profil_no }}" target="_blank" class="btn btn-success btn-sm"><i class="fab fa-whatsapp"></i> Whatssapp</a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
<!-- /.content -->



@endsection
@extends('layouts.front.master')
@section('title', 'Artikel')
@section('description', "Taman tahfizh al-qur'an hamzah, tahfizh qur'an, taman tahfizh, hafizh qur'an, hafal qur'an, taman hamzah, taman qur'an, tempat menghafal al'quran")
@php
use App\Models\Master\Profil;
$profil = Profil::find(1);
@endphp
@section('logo', "{{ asset('images/profil/'.$profil->profil_logo) }}")
@section('content')

<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ route('front.index') }}">Home</a></li>
        <li>Artikel</li>
      </ol>
      <h2>Artikel @if(!empty($title)) - {{ $title }} @endif</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container">

      <div class="row">

        <div class="col-lg-8 entries">

          <div class="row">
            @foreach($artikel as $data)
            <div class="col-md-6 d-flex align-items-stretch">
              <article class="entry">

                <div class="entry-img">
                  <img src="{{ asset('images/artikel/'.$data->artikel_gambar) }}" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title">
                  <a href="{{ route('front.artikel.single',$data->artikel_slug) }}">{{ $data->artikel_judul }}</a>
                </h2>

                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="icofont-user"></i> @foreach($user->where('id', $data->penulis) as $value)
                      {{ $value->name }}
                    @endforeach</li>
                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> {{ Carbon\Carbon::parse($data->artikel_tgl)->format('d/M/Y') }}</li>
                  </ul>
                </div>

              </article><!-- End blog entry -->
            </div>
            @endforeach

          </div>

          <div class="d-flex justify-content-center">
              {!! $artikel->links() !!}
          </div>

          <!-- <div class="blog-pagination">
            <ul class="justify-content-center">
              <li class="disabled"><i class="icofont-rounded-left"></i></li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
            </ul>
          </div> -->

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Kategori</h3>
            <div class="sidebar-item categories">
              <ul>
                @foreach($kategori as $data)
                <li><a href="{{ route('artikel.kategori',$data->id) }}">{{ $data->kategori_nama }} <span>({{ $data->artikel->count() }})</span></a></li>
                @endforeach
              </ul>

            </div><!-- End sidebar categories-->

            <h3 class="sidebar-title">Artikel Baru</h3>
            <div class="sidebar-item recent-posts">
              @foreach($artikel_akhir as $data)
              <div class="post-item clearfix entry-img">
                <img src="{{ asset('images/artikel/'.$data->artikel_gambar) }}" alt="" class="img-fluid">
                <h4><a href="{{ route('front.artikel.single',$data->artikel_slug) }}">{{ $data->artikel_judul }}</a></h4>
                <time datetime="2020-01-01">{{ Carbon\Carbon::parse($data->artikel_tgl)->format('d/M/Y') }}</time>
              </div>
              @endforeach

            </div><!-- End sidebar recent posts-->

            <h3 class="sidebar-title">Tag</h3>
            <div class="sidebar-item tags">
              <ul>
                @foreach($tag as $data)
                <li><a href="{{ route('artikel.tag',$data->id) }}">{{ $data->tag_nama }}</a></li>
                @endforeach
              </ul>

            </div><!-- End sidebar tags-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->

@endsection
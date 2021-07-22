@extends('layouts.front.master')
@section('title', 'Artikel Single')
@section('description', $artikel->artikel_judul)
@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol class="mt-3">
          <li><a href="{{ route('front.index') }}">Home</a></li>
          <li><a href="{{ route('front.artikel') }}">Artikel</a></li>
          <li>Artikel Detail</li>
        </ol>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <!-- <img src="{{ asset('front/assets/img/aa.jpg') }}" alt="" class="img-fluid"> -->
                <img src="{{ asset('images/artikel/'.$artikel->artikel_gambar) }}" alt="" class="img-fluid">
              </div>

              <h1 class="entry-title">
                {{ $artikel->artikel_judul }}
              </h1>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> @foreach($user->where('id', $artikel->penulis) as $value)
                      {{ $value->name }}
                    @endforeach</li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <time datetime="2020-01-01">{{ Carbon\Carbon::parse($artikel->artikel_tgl)->format('d/M/Y') }}</time></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> {{ $artikel->komentar->count() }}</li>
                </ul>
              </div>

              <div class="entry-content">
                <h3>{{ $artikel->artikel_judul }}</h3>
                <p>
                  {{ $artikel->artikel_isi }}
                </p>

              </div>

              <div class="entry-footer clearfix">
                <div class="float-left">
                  <i class="icofont-folder"></i>
                  <ul class="cats">
                    <li><a href="{{ route('artikel.kategori',$artikel->kategori->id) }}">{{ $artikel->kategori->kategori_nama }}</a></li>
                  </ul>

                  <i class="icofont-tags"></i>
                  <ul class="tags">
                   @foreach($artikel->tag as $artikel_tag)
                    <li><a href="{{ route('artikel.tag',$artikel_tag->id) }}">#{{ $artikel_tag->tag_nama }}</a></li>
                    @endforeach
                  </ul>
                </div>

              </div>

            </article><!-- End blog entry -->

            <div class="blog-comments" id="komen">

              <h4 class="comments-count">{{ $artikel->komentar->count() }} Komentar</h4>

              @foreach($artikel->komentar as $komentar)
              @if($komentar->id == $komentar_akhir->id) @endif
              <div id="comment-{{ $komentar->id }}" class="comment clearfix" @if($komentar->id == $komentar_akhir->id) style="background-color:#ccffcc;padding-top: 10px;padding-bottom: 10px;" @endif>
                <h5><strong>{{ $komentar->komentar_nama }}</strong></h5>
                <time datetime="2020-01-01">{{ Carbon\Carbon::parse($komentar->created_at)->format('d/M/Y') }}</time>
                <p>
                  {{ $komentar->komentar_isi }}
                </p>

              </div><!-- End comment #1 -->
              @endforeach

              <div class="reply-form">
                <h4>Beri Komentar</h4>
                <p>Isi nama, email dan no hp * </p>
                <form action="{{ route('komentar.store') }}" method="POST" id="form-komentar">
                  @csrf
                  <input name="id_artikel" type="hidden" value="{{ $artikel->id }}">
                  <input id="slug" type="hidden" value="{{ $artikel->artikel_slug }}">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input name="nama" type="text" required class="form-control" placeholder="Nama*">
                    </div>
                    <div class="col-md-6 form-group">
                      <input name="email" type="text" required class="form-control" placeholder="Email*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <input name="no" type="number" required class="form-control" placeholder="No HP*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="komentar" required class="form-control" placeholder="Isi komentar*"></textarea>
                    </div>
                  </div>
                  <button type="button" class="btn btn-primary tombol-komentar">Beri Komentar</button>

                </form>

              </div>

            </div><!-- End blog comments -->

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
                <div class="post-item clearfix">
                  <img src="{{ asset('images/artikel/'.$data->artikel_gambar) }}" alt="">
                  <h4><a href="{{ route('front.artikel.single',$data->artikel_slug) }}">{{ $data->artikel_judul }}</a></h4>
                  <time datetime="2020-01-01">{{ Carbon\Carbon::parse($data->artikel_tgl)->format('d/M/Y') }}</time>
                </div>
                @endforeach

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tag</h3>
              <div class="sidebar-item tags">
                <ul>
                  @foreach($tag as $value)
                  <li><a href="{{ route('artikel.tag',$value->id) }}">{{ $value->tag_nama }}</a></li>
                  @endforeach
                </ul>

              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
  @push('script')
  <script>
    $(function () {
      $('.tombol-komentar').click(function() {
        let slug = $('#form-komentar').find('#slug').val()
        // console.log(slug)
        // /mengambil semua data input
        let formData = $('#form-komentar').serialize()
        // console.log(formData)
        $.ajax({
          url:`/komentar`,
          method: "POST",
          data: formData,
          success: function(data) {
            // console.log(data)
            window.location.assign(`/artikel/${slug}/#komen`)
          },
        })
      })
    });
  </script>
  @endpush
  @include('sweetalert::alert')
@endsection
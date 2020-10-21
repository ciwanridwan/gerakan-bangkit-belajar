@extends('layouts.home', ['title' => 'Portal Berita', 'activePage' => 'berita'])

@section('css-paragraf')
<style>
  .paragraf {
    word-spacing: normal;
  }
</style>
@endsection

@section('content')
<section id="advanced-features">

  <div class="features-row section-bg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <img class="advanced-feature-img-right wow fadeInRight" src="{{asset('storage/gambars/'. $berita->gambar)}}"
            alt="" height="400px">
          <div class="wow fadeInLeft">
            <h2>{{$berita->judul}}</h2>
            {{-- <h3></h3> --}}
            {!! $berita->isi !!}

          </div>
        </div>
      </div>
    </div>
  </div>

  @if ($berita->deskripsi1 != null)
  <div class="features-row">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <img class="advanced-feature-img-left" src="" alt="">
          <div class="wow fadeInRight">
            <p>{{$berita->deskripisi1}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if ($berita->deskripsi2 != null)
  <div class="features-row section-bg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <img class="advanced-feature-img-right wow fadeInRight" src="" alt="">
          <div class="wow fadeInLeft">
            <p>{{$berita->deskripisi2}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</section><!-- End Advanced Featuress Section -->

@endsection
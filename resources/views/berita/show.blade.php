@extends('layouts.home', ['title' => 'Portal Berita', 'activePage' => 'berita'])

@section('content')
<!-- ======= Breadcrumbs Section ======= -->
{{-- <section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Inner Page</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Inner Page</li>
      </ol>
    </div>

  </div>
</section> --}}
<!-- End Breadcrumbs Section -->

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
            <p>{{$berita->isi}}</p>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="features-row">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <img class="advanced-feature-img-left" src="" alt="">
          <div class="wow fadeInRight">
            <h2>Isi yang kedua</h2>
            {{-- <i class="ion-ios-paper-outline" class="wow fadeInRight" data-wow-duration="0.5s"></i>
            <p class="wow fadeInRight" data-wow-duration="0.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <i class="ion-ios-color-filter-outline wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s"></i>
            <p class="wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s">Quis nostrud exercitation ullamco
              laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
              esse cillum.</p>
            <i class="ion-ios-barcode-outline wow fadeInRight" data-wow-delay="0.4" data-wow-duration="0.5s"></i>
            <p class="wow fadeInRight" data-wow-delay="0.4s" data-wow-duration="0.5s">Quis nostrud exercitation ullamco
              laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
              esse cillum.</p> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="features-row section-bg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <img class="advanced-feature-img-right wow fadeInRight" src="" alt="">
          <div class="wow fadeInLeft">
            <h2>Isi yang ketiga</h2>
            {{-- <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
              laborum.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam</p>
            <i class="ion-ios-albums-outline"></i>
            <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
              cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Advanced Featuress Section -->

@endsection
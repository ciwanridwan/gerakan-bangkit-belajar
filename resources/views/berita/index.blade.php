@extends('layouts.home', ['title' => 'Portal Berita', 'activePage' => 'berita'])

@section('content')
<!-- ======= About Section ======= -->
<section id="about" class="section-bg">
    <div class="container-fluid">
        <div class="section-header">
            <h3 class="section-title">Portal Berita</h3>
            <span class="section-divider"></span>
            <p class="section-description">
                Kami Menyediakan Informasi Dan Berita<br>
            </p>
        </div>
        
        @foreach ($berita as $item)
        @if ($item->status == 1)
        <div class="row">
            <div class="col-lg-6 about-img wow fadeInLeft">
                <img src="{{ asset('storage/gambars/'. $item->gambar)}}" alt="{{$item->judul}}">
            </div>

            <div class="col-lg-6 content wow fadeInRight">
                <h2>{{$item->judul}}</h2>
                <p>{{$item->isi}}</p>
                <a href="{{route('show-berita', $item->seo_judul)}}" class="get-started-btn"> Lihat Selebihnya</a>
            </div>
        </div>

        @else 
        <p class="section-description" style="text-align: center">
            Mohon maaf, untuk saat ini belum ada berita yang di publish<br>
        </p>
        @endif
        @endforeach
    </div>
</section><!-- End About Section -->
@endsection
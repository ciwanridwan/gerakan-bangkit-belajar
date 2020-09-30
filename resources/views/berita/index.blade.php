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
        <div class="row">
            <div class="col-lg-6 about-img wow fadeInLeft">
                <img src="{{ asset('storage/gambars/'. $item->gambar)}}" alt="{{$item->judul}}">
            </div>

            <div class="col-lg-6 content wow fadeInRight">
                <h2>{{$item->isi}}</h2>
                
                <p>
                    {{$item->deskripsi}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</section><!-- End About Section -->
@endsection
<!-- ======= About Section ======= -->
<section id="about" class="section-bg">
  <div class="container-fluid">
    @if ($about->status == 1)
    <div class="section-header">
      <h3 class="section-title">Tentang Kami</h3>
      <span class="section-divider"></span>
      <p class="section-description">
        {{$about->judul}}<br>
      </p>
    </div>

    <div class="row">
      <div class="col-lg-6 about-img wow fadeInLeft">
        <img src="{{ asset('assets/img/tentangkami.jpeg')}}" alt="">
      </div>

      <div class="col-lg-6 content wow fadeInRight">
        <h2>Gerakan Bangkit Belajar</h2>
        <h3>{{$about->isi}}</h3>
        <p>
          {{$about->deskripsi}}
        </p>
      </div>
    </div>
    @endif
  </div>
</section>
<!-- End About Section -->
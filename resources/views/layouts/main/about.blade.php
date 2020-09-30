<!-- ======= About Section ======= -->
<section id="about" class="section-bg">
  <div class="container-fluid">
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

        {{-- <ul>
          <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
          <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
          </li>
          <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
            aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
            pariatur.</li>
        </ul> --}}
      </div>
    </div>

  </div>
</section><!-- End About Section -->
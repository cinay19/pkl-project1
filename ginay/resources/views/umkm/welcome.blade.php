@extends('layouts.main')
@section('content')
<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section">

      <div class="container" id="login">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
          <h1 class="" >Selamat Datang Sobat UMKM</h1>
          <p class="">Tidak hanya event, ini adalah pengalaman</p>
          <div class="d-flex">
            <a href="#gallery" class="btn-get-started">Get Started</a>
            <a href="https://youtu.be/Opksxsx8Sjw?si=_VC7S_Qhmo-mnNZT" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{asset('assets/img/animasi2.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- /Hero Section -->

  <!-- Clients Section -->
  <section id="portfolio" class="portfolio section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2 id="gallery">Gallery</h2>
      <p></p>
    </div><!-- End Section Title -->


  </section><!-- /Portfolio Section -->

  <!-- Testimonials Section -->
</section><!-- /Why Us Section -->
<!-- Services Section -->
  <!-- Contact Section -->
  <section id="contact" class="contact section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>KRITIK & SARAN</h2>
      <p></p>
  </div><!-- End Section Title -->
  
  <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4 justify-content-center"> <!-- Center the content within the row -->
          <div class="col-lg-7">
                  <div class="row gy-4">
                      <div class="col-md-15">
                          
                      <div class="col-md-12 text-center">
                          
                          <a href="#login" class="php-email-form" data-aos="fade-up" data-aos-delay="200"><button type="submit">Send Massages</button></a>
                      </div>
                  </div>
              </form>
          </div><!-- End Contact Form -->
      </div>
  </div>
  

      </div>

    </div>

  </section><!-- /Contact Section -->
</main>
@endsection
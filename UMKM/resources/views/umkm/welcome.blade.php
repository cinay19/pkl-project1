@extends('layouts.main')

@section('content')
<main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="container" id="login">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-start" data-aos="zoom-out">
                    <h1>Welcome, {{ auth()->user()->name }} !</h1>
                    <p>More Experience! More Money!</p>
                    <a href="https://www.gramedia.com/literasi/umkm/" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets/img/Animasi6.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- Gallery Section -->
    <section id="portfolio" class="portfolio section">
        <div class="container section-title" data-aos="fade-up">
            <h2 id="gallery" class="mt-3">Event Gallery</h2>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($events as $index => $event)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach($events as $index => $event)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ Storage::url($event->image) }}" class="d-block w-100 carousel-image" alt="{{ $event->title }}">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 p-3">
                    @foreach($events as $index => $event)
                        <div class="slide-description d-flex flex-column justify-content-between {{ $index == 0 ? 'active' : 'd-none' }}" id="slide-description-{{ $index }}">
                            <h3 class="mt-3">{{ $event->title }}</h3>
                            <p class="mt-3 event-description">{{ $event->description }}</p>
                            <div class="d-flex justify-content-center mt-3 mb-3">
                                <a href="{{ route('regis.form-registrasi', $event->id) }}" class="btn btn-primary me-2">Daftar</a>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrationsModal{{ $event->id }}">List</button>
                            </div>
                        </div>

                        <!-- Modal for Event Registrations -->
                        <div class="modal fade" id="registrationsModal{{ $event->id }}" tabindex="-1" aria-labelledby="registrationsModalLabel{{ $event->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="registrationsModalLabel{{ $event->id }}">List Yang mengikuti {{ $event->title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>UMKM</th>
                                                    <th>Number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($event->approvedRegistrations as $registration)
                                                    <tr>
                                                        <td>{{ $registration->name }}</td>
                                                        <td>{{ $registration->umkm }}</td>
                                                        <td>{{ $registration->number }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact Us</h2>
        <p></p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-7">
            <div class="row gy-4">
              <div class="col-md-15">
                <div class="col-md-12 text-center">
                  <a href={{ route('lina.contact-us.create') }} class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    <button type="submit">Send Messages</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Contact Section -->
</main>

<style>
    .carousel-image {
        max-height: 500px; /* Set maximum height for the image */
        max-width: 100%; /* Ensure image does not exceed container width */
        width: auto; /* Let the image adjust its width based on max-width */
        display: block; /* Ensure the image behaves as a block element */
        margin: 0 auto; /* Center the image horizontally */
    }

    .event-description {
        flex: 1; /* Take up remaining space */
        display: flex; /* Enable flexbox layout */
        align-items: center; /* Center align content vertically */
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 4; /* number of lines to show */
        -webkit-box-orient: vertical;
        margin-bottom: 0; /* Remove default margin */
        white-space: pre-wrap; /* Preserve white space and wrap text */
    }

    .slide-description {
        display: flex; /* Enable flexbox layout */
        flex-direction: column; /* Stack child elements vertically */
        height: 100%; /* Ensure the slide description takes the full height of the container */
    }

    .slide-description h3 {
        margin-top: 0; /* Remove default margin */
    }
</style>




<script>
    document.addEventListener('DOMContentLoaded', function() {
        const descriptions = document.querySelectorAll('.slide-description');
        const carousel = new bootstrap.Carousel(document.querySelector('#carouselExampleIndicators'));

        carousel._element.addEventListener('slide.bs.carousel', function (event) {
            descriptions.forEach((desc, index) => {
                if (index === event.to) {
                    desc.classList.remove('d-none');
                } else {
                    desc.classList.add('d-none');
                }
            });
        });
    });
</script>
@endsection

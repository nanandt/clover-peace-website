@extends('layouts.app')
@section('title', 'Clover Peace')

@section('content')
<!-- header -->
<header class="text-center">
    <h1>
        Let's Make Your Best
        <br>
        Trip Ever
    </h1>
    <p class="mt-3">
        The best travel for you journey
        <br>
        respectful of the environment
    </p>
    <a href="#popularContent" class="btn btn-get-started px-4 mt-4">
        Sign Up Now
    </a>
</header>
<!-- end of header -->

<!-- main -->
<main>
    <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>50</h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>8</h2>
                <p>Cities</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>30</h2>
                <p>Hotels</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>72</h2>
                <p>Partners</p>
            </div>
        </section>
    </div>

    <section class="section-popular" id="popular">
        <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="500">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Wisata Popular</h2>
                    <p>
                        Something that you never try
                        <br>
                        before in this world
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-popular-content" id="popularContent">
        <div class="container">
            <div class="section-popular-travel row justify-content-center">
                @foreach ($items as $item)
                <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-offset="300" data-aos-delay="550">
                    <div class="card-travel text-center d-flex flex-column"
                        style="background-image: url('{{ $item->pictures->count() ? Storage::url($item->pictures->first()->image) : '' }} ');">
                        <div class="travel-country">
                            {{ $item->location }}
                        </div>
                        <div class="travel-location">
                            {{ $item->title }}
                        </div>
                        <div class="travel-button mt-auto">
                            <a href="{{ route('detail', $item->slug )}}" class="btn btn-travel-details px-4">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-testimonial-heading" id="testimonialHeading">
        <div class="container">
            <div class="row">
                <div class="col text-center" data-aos="fade-right" data-aos-offset="300" data-aos-duration="1000"
                    data-aos-delay="650">
                    <h2>They Loving Us</h2>
                    <p>
                        Moments were giving them
                        <br>
                        the best experience
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-testimonial-content" id="testimonialContent">
        <div class="container" data-aos="fade-up" data-aos-offset="300" data-aos-duration="1000"
            data-aos-delay="800">
            <div class="section-popular-travel row justify-content-center">
                <div class="col-sm6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testimonial-1.png" alt="User" class="mb-4 rounded circle">
                            <h3 class="mb-4">Angga Riski</h3>
                            <p class="testimonial">
                                “ Perjalanan yang menyenangkan dan pelayananya lengkap bat “
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to Labuan Bajo
                        </p>
                    </div>
                </div>
                <div class="col-sm6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testimonial-2.png" alt="User" class="mb-4 rounded circle">
                            <h3 class="mb-4">Shayna</h3>
                            <p class="testimonial">
                                “ The trip was amazing and
                                I saw something beautiful in
                                that Island that makes me
                                want to learn more “
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to Nusa Peninda
                        </p>
                    </div>
                </div>
                <div class="col-sm6 col-md-6 col-lg-4">
                    <div class="card card-testimonial text-center">
                        <div class="testimonial-content">
                            <img src="frontend/images/testimonial-3.png" alt="User" class="mb-4 rounded circle">
                            <h3 class="mb-4">Shabrina</h3>
                            <p class="testimonial">
                                “ I loved it when the waves
                                was shaking harder — I was
                                scared too “
                            </p>
                        </div>
                        <hr>
                        <p class="trip-to mt-2">
                            Trip to Karimun Jawa
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-offset="100" data-aos-duration="1000"
                    data-aos-delay="400">
                    <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                        I Need Help
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">
                        Sign Up Now
                    </a>
                </div>
            </div>
        </div>
    </section>


</main>
<!-- end of main -->
@endsection

@push('addon-script')
<script>
    AOS.init({});
</script>
@endpush
@php
use App\Models\Homea;
$homeas = Homea::first();
@endphp

@php
use App\Models\Homeb;
$homebs = Homeb::first();
@endphp

<main>
<!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset($homeas->image1) }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">{{ $homeas->slogan}}</h5>
                                <h1 class="display-3 text-white animated slideInDown">{{ $homeas->judul}}</h1>
                                <p class="fs-5 text-white mb-4 pb-2">{{ $homeas->desc}}</p>
                                <a href="{{ url('contact') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset($homeas->image2) }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">{{ $homeas->slogan2}}</h5>
                                <h1 class="display-3 text-white animated slideInDown">{{ $homeas->judul2}}</h1>
                                <p class="fs-5 text-white mb-4 pb-2">{{ $homeas->desc2}}</p>
                                <a href="{{ url('contact') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="{{ $homebs->icon1}}"></i>
                            <h5 class="mb-3">{{ $homebs->isi1}}</h5>
                            <p>{{ $homebs->desc1}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="{{ $homebs->icon2}}"></i>
                            <h5 class="mb-3">{{ $homebs->isi2}}</h5>
                            <p>{{ $homebs->desc2}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="{{ $homebs->icon3}}"></i>
                            <h5 class="mb-3">{{ $homebs->isi3}}</h5>
                            <p>{{ $homebs->desc3}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="{{ $homebs->icon4}}"></i>
                            <h5 class="mb-3">{{ $homebs->isi4}}</h5>
                            <p>{{ $homebs->desc4}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Service End -->
</main>
@php
use App\Models\Homec;
$homecs = Homec::first();
@endphp

@php
use App\Models\Title;
$titles = Title::first();
@endphp

@php
use App\Models\Homea;
$homeas = Homea::first();
@endphp

<main>
<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Contact Us</h6>
            <h1 class="mb-5">Contact {{ $titles->title }}</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5>Welcome to {{ $titles->title }}</h5>
                <p class="mb-4">{{ $homeas->desc}} {{ $homeas->desc2}}</p>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Office</h5>
                        <p class="mb-0">{{ $homecs->location }}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Mobile</h5>
                        <p class="mb-0">{{ $homecs->telpon }}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Email</h5>
                        <p class="mb-0">{{ $homecs->email }}</p>
                    </div>
                </div>
            </div>

<!-- Middle column with Google Map and Info -->
<div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
    <div class="bg-light p-4 rounded shadow-sm h-100">
        <div class="ratio ratio-16x9 mb-3 rounded">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.916547451829!2d-122.0842494846902!3d37.422065779825265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb733bb3f0f0b%3A0x400ffb1d0dd1eec!2sGoogleplex!5e0!3m2!1sen!2sid!4v1616625731444!5m2!1sen!2sid"
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>
</div>


        </div>
    </div>
</div>
<!-- Contact End -->
</main>

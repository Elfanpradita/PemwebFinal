@php
use App\Models\Media;
$medias = Media::first();
@endphp

@php
use App\Models\Homec;
$homecs = Homec::first();
@endphp

@php
use App\Models\Title;
$titles = Title::first();
@endphp

<main>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ $homecs->location}}</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $homecs->telpon}}</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $homecs->email}}</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="{{ $medias->twitter }}"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="{{ $medias->facebook }}"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="{{ $medias->youtube }}"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="{{ $medias->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="{{ url("#") }}">2025</a> {{ $titles->title}}
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
</main>
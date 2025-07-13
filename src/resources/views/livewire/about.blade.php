@php
use App\Models\Title;
$titles = Title::first();
@endphp

@php
use App\Models\Homea;
$homeas = Homea::first();
@endphp

@php
use App\Models\Abtpoint;
$abtpoints = Abtpoint::all();
@endphp

<main>
<!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container"> 
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset($homeas->image) }}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to {{ $titles->title}}</h1>
                    <p class="mb-4">{{ $homeas->desc}} {{ $homeas->desc2}}</p>
                    <div class="row gy-2 gx-4 mb-4">
                        @foreach ($abtpoints as $skill)
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{ $skill->point}}</p>
                        </div>
                        @endforeach
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="{{ url("") }}">Read More</a>
                </div>
            </div>
        </div>
    </div>
<!-- About End -->
</main>
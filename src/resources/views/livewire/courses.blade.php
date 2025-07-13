@php
    // Mengambil data dari model Kegiatan
    // Eager load relasi 'eventCourse' dan 'pengajar.user' untuk performa yang lebih baik
    use App\Models\Kegiatan;
    $kegiatans = Kegiatan::with(['eventCourse', 'pengajar.user'])->get();
@endphp

<main>
    <!-- Sessions Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Sesi Pembelajaran</h6>
                <h1 class="mb-5">Sesi Populer</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($kegiatans as $key => $kegiatan)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $key + 1 }}s">
                        <div class="course-item bg-light">
                            <div class="position-relative overflow-hidden">
                                {{-- PERUBAHAN: Menggunakan gambar online acak dari picsum.photos --}}
                                {{-- Angka random ditambahkan agar setiap kartu mendapat gambar yang berbeda --}}
                                <img class="img-fluid" src="https://picsum.photos/600/400?random={{ $key }}" alt="{{ $kegiatan->nama }}">
                            </div>
                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0">Rp {{ number_format($kegiatan->eventCourse->price ?? 0, 0, ',', '.') }}</h3>
                                
                                <h5 class="mb-4 mt-4">{{ $kegiatan->nama }}</h5>
                                <p class="text-muted">Bagian dari: {{ $kegiatan->eventCourse->name ?? 'N/A' }}</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-user-tie text-primary me-2"></i>
                                    {{ $kegiatan->pengajar->user->name ?? 'N/A' }}
                                </small>
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-clock text-primary me-2"></i>
                                    {{ \Carbon\Carbon::parse($kegiatan->start)->format('H:i') }} - {{ \Carbon\Carbon::parse($kegiatan->end)->format('H:i') }}
                                </small>
                                <small class="flex-fill text-center py-2">
                                    <i class="fa fa-calendar-alt text-primary me-2"></i>
                                    {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Sessions End -->
</main>

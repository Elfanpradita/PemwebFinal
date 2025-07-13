<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($this->courses as $course)
            <x-filament::card>
                <h2 class="text-xl font-bold">{{ $course->name }}</h2>
                <p class="text-sm text-gray-500 mb-2">{{ $course->description }}</p>
                <p><strong>Harga:</strong> Rp{{ number_format($course->price) }}</p>
                <p><strong>Periode:</strong> {{ $course->start }} - {{ $course->end }}</p>

                @if (!Auth::user()->eventCourses->contains($course->id))
                    <a href="{{ route('bayar.kursus', $course->id) }}">
                        <x-filament::button color="primary" class="mt-3">
                            Daftar Kursus Ini
                        </x-filament::button>
                    </a>
                @else
                    <span class="text-green-600 font-semibold">Sudah Terdaftar</span>
                @endif
            </x-filament::card>
        @endforeach
    </div>
</x-filament::page>

<?php

namespace App\Filament\Admin\Pages;

use App\Models\EventCourse;
use App\Models\Payment;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class EventCoursePage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static string $view = 'filament.admin.pages.event-course-page';
    protected static ?string $title = 'Daftar Kursus';

    public $courses;
    public $snapToken = null;

    public static function canAccess(): bool
    {
        $user = auth()->user();

        // ❌ Pengajar tidak boleh akses
        if ($user->hasRole('pengajar')) {
            return false;
        }

        return true;
    }

    public function mount(): void
    {
        $this->courses = EventCourse::all();
    }

    public function beliKursus($courseId): void
    {
        $user = Auth::user();
        $course = EventCourse::findOrFail($courseId);

        // Cek apakah sudah beli
        if ($user->eventCourses()->where('event_course_id', $courseId)->exists()) {
            return;
        }

        // Simpan pembayaran ke DB
        $nomorPembayaran = 'INV-' . strtoupper(uniqid());
        Payment::create([
            'event_course_id' => $course->id,
            'user_id' => $user->id,
            'nomor_pembayaran' => $nomorPembayaran,
            'amount' => $course->price,
            'status' => 'pending',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Generate Snap Token
        $this->snapToken = Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $nomorPembayaran,
                'gross_amount' => $course->price,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\EventCourse;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Midtrans\Config;
use Midtrans\Snap;

class BayarKursusController extends Controller
{
    public function index($id): View
    {
        $user = Auth::user();
        $course = EventCourse::findOrFail($id);

        // Cek sudah beli belum
        if ($user->eventCourses()->where('event_course_id', $id)->exists()) {
            return view('bayar.already-registered');
        }

        // Buat invoice
        $nomorPembayaran = 'INV-' . strtoupper(uniqid());

        Payment::create([
            'event_course_id' => $course->id,
            'user_id' => $user->id,
            'nomor_pembayaran' => $nomorPembayaran,
            'amount' => $course->price,
            'status' => 'pending',
        ]);

        // Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $snapToken = Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $nomorPembayaran,
                'gross_amount' => $course->price,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ]);

        return view('bayar.index', compact('course', 'snapToken'));
    }
}

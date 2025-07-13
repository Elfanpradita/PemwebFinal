<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoicePaidMail;

/**
 * @OA\Tag(
 *     name="Midtrans",
 *     description="Endpoint terkait pembayaran Midtrans"
 * )
 */
class MidtransCallbackController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/midtrans/manual",
     *     summary="Midtrans manual callback (kirim invoice email)",
     *     tags={"Midtrans"},
     *     description="Endpoint ini menangani callback manual dari Midtrans. Jika status transaksi adalah `settlement`, maka sistem akan memperbarui status pembayaran, mendaftarkan user ke kursus terkait, dan mengirimkan invoice melalui email.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"order_id", "transaction_status"},
     *             @OA\Property(property="order_id", type="string", example="INV-ABC1234567"),
     *             @OA\Property(property="transaction_status", type="string", example="settlement")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Berhasil memproses transaksi dan mengirim email invoice",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true)
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Transaksi tidak ditemukan",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Payment not found")
     *         )
     *     )
     * )
     */
    public function manual(Request $request)
    {
        $orderId = $request->order_id;
        $status = $request->transaction_status;

        $payment = Payment::where('nomor_pembayaran', $orderId)->first();

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found'
            ], 404);
        }

        if ($status === 'settlement') {
            $payment->status = 'paid';
            $payment->save();

            $user = $payment->user;
            if (!$user->eventCourses->contains($payment->event_course_id)) {
                $user->eventCourses()->attach($payment->event_course_id);
            }

            Mail::to($user->email)->send(new InvoicePaidMail($payment));
        }

        return response()->json(['success' => true]);
    }
}

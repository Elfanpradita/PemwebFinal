<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="API Calon Sukses",
 *     description="Dokumentasi endpoint Midtrans Webhook"
 * )
 */
class MidtransWebhookController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/midtrans/webhook",
     *     tags={"Midtrans"},
     *     summary="Handle Midtrans webhook",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="order_id", type="string"),
     *             @OA\Property(property="transaction_status", type="string"),
     *             @OA\Property(property="payment_type", type="string"),
     *             @OA\Property(property="transaction_id", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not found"
     *     )
     * )
     */
    public function handle(Request $request)
    {
        $payload = $request->all();
        $orderId = $payload['order_id'];
        $statusCode = $payload['transaction_status'];
        $refrence = $payload['payment_type'] ?? null;

        $payment = Payment::where('nomor_pembayaran', $orderId)->first();
        if (!$payment) {
            return response()->json(['message' => 'Not found'], 404);
        }

        $payment->status = $statusCode === 'settlement' ? 'paid' : $statusCode;
        $payment->metode_pembayaran = $payload['payment_type'] ?? null;
        $payment->refrence = $payload['transaction_id'] ?? null;
        $payment->save();

        return response()->json(['message' => 'OK']);
    }
}

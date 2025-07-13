<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

class RegisterSwaggerController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/register",
     *     summary="Register user baru dan kirim notifikasi WhatsApp",
     *     tags={"Auth"},
     *     description="Endpoint ini melakukan pendaftaran user baru dan mengirimkan notifikasi WhatsApp ke nomor yang didaftarkan (jika tersedia).",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password", "password_confirmation"},
     *             @OA\Property(property="name", type="string", example="Budi Santoso"),
     *             @OA\Property(property="email", type="string", format="email", example="budi@example.com"),
     *             @OA\Property(property="no_wa", type="string", example="081234567890"),
     *             @OA\Property(property="password", type="string", format="password", example="password123"),
     *             @OA\Property(property="password_confirmation", type="string", format="password", example="password123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=302,
     *         description="Redirect ke dashboard setelah berhasil register"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validasi gagal"
     *     )
     * )
     */
    public function dummy() {}
}

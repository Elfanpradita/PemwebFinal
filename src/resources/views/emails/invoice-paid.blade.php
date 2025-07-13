@component('mail::message')
# Invoice Pembayaran Kursus

Halo {{ $payment->user->name }},<br>
Berikut adalah detail pembayaran kursusmu:

- **Nomor Invoice:** {{ $payment->nomor_pembayaran }}
- **Kursus:** {{ $payment->eventCourse->name }}
- **Harga:** Rp{{ number_format($payment->amount) }}
- **Status:** {{ ucfirst($payment->status) }}

@component('mail::button', ['url' => url('/edu')])
Masuk ke Kelas
@endcomponent

Terima kasih telah mendaftar di euAcademy!<br>
{{ config('app.name') }}
@endcomponent

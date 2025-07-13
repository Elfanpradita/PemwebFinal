<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Kursus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" 
        data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <h2>Mohon tunggu, membuka pembayaran Midtrans...</h2>

    <script type="text/javascript">
        window.onload = function () {
            window.snap.pay(@json($snapToken), {
                onSuccess: function(result) {
                    fetch('/midtrans/callback', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            order_id: result.order_id,
                            transaction_status: result.transaction_status,
                        }),
                    }).then(() => {
                        alert("Pembayaran berhasil!");
                        window.location.href = "{{ route('filament.edu.pages.event-course-page') }}";
                    });
                },
                onPending: function(result) {
                    alert("Menunggu pembayaran...");
                    window.location.href = "{{ route('filament.edu.pages.event-course-page') }}";
                },
                onError: function(result) {
                    alert("Pembayaran gagal.");
                    window.location.href = "{{ route('filament.edu.pages.event-course-page') }}";
                },
                onClose: function() {
                    alert('Popup ditutup.');
                    window.location.href = "{{ route('filament.edu.pages.event-course-page') }}";
                }
            });
        };
    </script>
</body>
</html>

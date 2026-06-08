<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Booking #{{ $booking->id }}</title>
    <style>body{font-family:Arial,Helvetica,sans-serif;background:#f4f7fb;color:#16324a;margin:0;padding:20px}.wrap{width:min(900px,96%);margin:0 auto;background:#fff;padding:20px;border-radius:8px}.row{display:flex;gap:20px}.col{flex:1}</style>
</head>
<body>
<div class="wrap">
    <h1>Booking #{{ $booking->id }}</h1>
    <p><strong>Vendor:</strong> {{ $booking->jasa->nama_usaha ?? '-' }}</p>
    <p><strong>User:</strong> {{ $booking->user->name ?? $booking->full_name }} ({{ $booking->email }})</p>
    <p><strong>Service:</strong> {{ $booking->service_name }}</p>
    <p><strong>Schedule:</strong> {{ $booking->date }} {{ $booking->time }}</p>
    <p><strong>Price:</strong> Rp {{ number_format($booking->price,0,',','.') }}</p>
    <p><strong>Phone:</strong> {{ $booking->phone }}</p>
    <p><strong>Address:</strong> {{ $booking->address }}, {{ $booking->city }}</p>
    <p><strong>Payment:</strong> {{ $booking->payment_method }}</p>
    <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
    <p><strong>Notes:</strong> {{ $booking->notes ?? '-' }}</p>

    <div style="margin-top:20px">
        <a href="{{ route('bookings.index') }}" style="padding:8px 12px;background:#2563eb;color:#fff;border-radius:6px;text-decoration:none">Back</a>
        <a href="{{ route('bookings.edit', $booking->id) }}" style="padding:8px 12px;background:#059669;color:#fff;border-radius:6px;text-decoration:none;margin-left:8px">Edit</a>
    </div>
</div>
</body>
</html>

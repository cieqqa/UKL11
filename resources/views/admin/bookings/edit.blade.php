<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edit Booking #{{ $booking->id }}</title>
    <style>body{font-family:Arial,Helvetica,sans-serif;background:#f4f7fb;color:#16324a;margin:0;padding:20px}.wrap{width:min(900px,96%);margin:0 auto;background:#fff;padding:20px;border-radius:8px}label{display:block;margin-top:10px;font-weight:600}input,select,textarea{width:100%;padding:8px;margin-top:6px;border:1px solid #e5e7eb;border-radius:6px}</style>
</head>
<body>
<div class="wrap">
    <h1>Edit Booking #{{ $booking->id }}</h1>
    <form method="post" action="{{ route('bookings.update', $booking->id) }}">
        @csrf
        @method('PATCH')

        <label>Status</label>
        <select name="status">
            <option value="pending" {{ $booking->status=='pending'?'selected':'' }}>Pending</option>
            <option value="confirmed" {{ $booking->status=='confirmed'?'selected':'' }}>Confirmed</option>
            <option value="completed" {{ $booking->status=='completed'?'selected':'' }}>Completed</option>
        </select>

        <label>Price (optional)</label>
        <input type="text" name="price" value="{{ $booking->price }}">

        <label>Notes</label>
        <textarea name="notes" rows="4">{{ $booking->notes }}</textarea>

        <div style="margin-top:12px">
            <button style="padding:8px 12px;background:#2563eb;color:#fff;border-radius:6px;border:none">Save</button>
            <a href="{{ route('bookings.index') }}" style="padding:8px 12px;margin-left:8px;background:#9ca3af;color:#fff;border-radius:6px;text-decoration:none">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>

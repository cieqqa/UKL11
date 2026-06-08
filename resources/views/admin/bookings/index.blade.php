<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin - Bookings</title>
    <style>body{font-family:Arial,Helvetica,sans-serif;background:#f4f7fb;color:#16324a;margin:0;padding:20px}.wrap{width:min(1200px,96%);margin:0 auto}table{width:100%;border-collapse:collapse;background:#fff;border-radius:8px;overflow:hidden}th,td{padding:12px 14px;border-bottom:1px solid #eef2f8}th{background:#f8fafc;text-align:left}.status{padding:6px 10px;border-radius:8px;color:#fff;font-weight:700}.pending{background:#f59e0b}.confirmed{background:#10b981}.completed{background:#3b82f6}.btn{background:#2563eb;color:#fff;padding:8px 12px;border-radius:8px;border:none;cursor:pointer}.muted{color:#6b7280;font-size:13px}</style>
</head>
<body>
<div class="wrap">
    <h1>Bookings</h1>
    <a href="{{ url('/admin') }}" class="btn" style="background:#6b7280;margin:12px 0 18px;display:inline-block;">Back to Dashboard</a>
    @if(session('success'))<div style="margin:10px 0;padding:10px;background:#ecfdf5;border:1px solid #bbf7d0;color:#065f46">{{ session('success') }}</div>@endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vendor</th>
                <th>User</th>
                <th>Service</th>
                <th>Schedule</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $b)
                <tr>
                    <td>#{{ $b->id }}</td>
                    <td>{{ $b->jasa->nama_usaha ?? '-' }}<div class="muted">{{ $b->jasa->kota ?? '' }}</div></td>
                    <td>{{ $b->user->name ?? $b->full_name }}<div class="muted">{{ $b->email }}</div></td>
                    <td>{{ $b->service_name }}</td>
                    <td>{{ $b->date }} {{ $b->time }}</td>
                    <td>Rp {{ number_format($b->price,0,',','.') }}</td>
                    <td><span class="status {{ $b->status }}">{{ ucfirst($b->status) }}</span></td>
                    <td>
                        <a class="btn" href="{{ route('bookings.show', $b->id) }}">View</a>
                        <a class="btn" style="background:#059669;margin-left:6px" href="{{ route('bookings.edit', $b->id) }}">Edit</a>
                        <form method="post" action="{{ route('bookings.destroy', $b->id) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn" style="background:#ef4444;margin-left:6px">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

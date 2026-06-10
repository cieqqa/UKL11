<x-app-layout>
    <div class="wrap" style="max-width:900px; margin:40px auto;">
        <div style="background:#fff; padding:20px; border-radius:12px; box-shadow:0 12px 28px rgba(10,30,80,0.04);">
            <h2>Notifikasi Saya</h2>
            <p style="color:#6b7280; margin-bottom:12px;">Semua notifikasi terkait akun Anda.</p>

            @if(isset($notifications) && $notifications->isNotEmpty())
                <div id="notifications-list">
                    @foreach($notifications as $notif)
                        @php $data = json_decode($notif->data, true); $status = $data['status'] ?? 'info'; $message = $data['message'] ?? 'Notifikasi'; @endphp
                        <div class="p-3 border-b" style="display:flex; gap:12px; align-items:flex-start;">
                            <div style="width:8px; height:24px; border-radius:6px; background: {{ $status === 'approved' ? '#10b981' : ($status === 'rejected' ? '#ef4444' : '#f59e0b') }};"></div>
                            <div style="flex:1;">
                                <div style="font-weight:700;">{{ $message }}</div>
                                <div style="color:#6b7280; font-size:13px; margin-top:6px;">{{ $notif->created_at->diffForHumans() }}</div>
                            </div>
                            <div style="min-width:120px; text-align:right;">
                                @if(!$notif->is_read)
                                    <span style="background:#eef2ff; color:#3730a3; padding:6px 8px; border-radius:8px; font-weight:700; font-size:12px;">Baru</span>
                                @else
                                    <span style="color:#6b7280; font-size:12px;">Terbaca</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="padding:20px; text-align:center; color:#6b7280;">Belum ada notifikasi</div>
            @endif

            <div style="margin-top:20px; text-align:right;">
                <a href="{{ url('/redirect') }}" class="btn" style="background:#2563eb; color:#fff; padding:10px 14px; border-radius:8px;">Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>

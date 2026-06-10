<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Business Request Status</title>
</head>
<body style="font-family:Arial, Helvetica, sans-serif; color:#111;">
  <h2>@if($status === 'approved') Pendaftaran Anda Disetujui @else Pendaftaran Anda Ditolak @endif</h2>

  <p>Halo {{ $req->user->name }},</p>

  @if($status === 'approved')
    <p>Permintaan pendaftaran untuk <strong>{{ $req->nama_usaha }}</strong> telah disetujui oleh admin.</p>
    <p>Akun Vendor sekarang dibuat dengan email perusahaan berikut:</p>
    <ul>
      <li>Email: {{ $req->company_email ?? $req->user->email }}</li>
    </ul>

    @if($needsPasswordReset)
      <p>Karena akun perusahaan ini sudah ada, kami telah mengirimkan tautan reset password ke alamat email tersebut. Silakan gunakan tautan itu untuk membuat password baru dan masuk ke dashboard vendor.</p>
    @else
      @if(!empty($password))
        <p>Silakan gunakan kredensial ini untuk masuk ke dashboard vendor:</p>
        <ul>
          <li>Email: {{ $req->company_email ?? $req->user->email }}</li>
          <li>Password: <strong>{{ $password }}</strong></li>
        </ul>
        <p>Silakan ubah kata sandi setelah login dari halaman profil.</p>
      @elseif(!empty($req->initial_password))
        <p>Anda sudah memilih password saat pendaftaran. Silakan login dengan email perusahaan dan password yang Anda buat.</p>
      @else
        <p>Akun dibuat, namun tidak ada kata sandi yang dikirim. Jika Anda tidak menerima instruksi login, hubungi admin.</p>
      @endif
    @endif
  @else
    <p>Permintaan pendaftaran untuk <strong>{{ $req->nama_usaha }}</strong> tidak disetujui.</p>
    <p>Jika Anda membutuhkan klarifikasi, silakan hubungi admin.</p>
  @endif

  <hr>
  <p>Terima kasih,<br>Tim Klik n Clean</p>
</body>
</html>

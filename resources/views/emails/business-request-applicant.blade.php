<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Notifikasi Permintaan Pendaftaran</title>
  <style>body{font-family:Arial, Helvetica, sans-serif;color:#111}</style>
</head>
<body>
  <h2>Status Permintaan Pendaftaran</h2>

  <p>Halo {{ $req->user->name }},</p>
  @if(isset($status) && $status === 'approved')
    <p>Permintaan pendaftaran untuk <strong>{{ $req->nama_usaha }}</strong> telah disetujui oleh admin.</p>

    @if($isExistingAccount)
      <p>Akun perusahaan sudah terdaftar sebelumnya dengan email: <strong>{{ $req->company_email ?? $req->user->email }}</strong>.</p>
      <p>Kami telah mengirimkan tautan reset password ke email tersebut. Silakan ikuti tautan reset untuk membuat kata sandi baru agar dapat login ke dashboard vendor.</p>
    @else
      <p>Kami telah membuat akun vendor untuk perusahaan Anda menggunakan email: <strong>{{ $req->company_email ?? $req->user->email }}</strong>.</p>
      @if(!empty($req->initial_password))
        <p>Anda telah membuat password saat mendaftar. Setelah admin menyetujui, silakan login dengan email perusahaan dan password yang Anda buat.</p>
      @else
        <p>Silakan cek email perusahaan tersebut untuk kredensial (email + password) yang dikirimkan. Setelah login, ubah kata sandi dari halaman profil.</p>
      @endif
    @endif
  @elseif(isset($status) && $status === 'rejected')
    <p>Permintaan pendaftaran untuk <strong>{{ $req->nama_usaha }}</strong> <strong>ditolak</strong> oleh admin.</p>
    @if(!empty($req->deskripsi))
      <p>Catatan admin: {{ $req->deskripsi }}</p>
    @endif
    <p>Jika Anda merasa ini adalah kesalahan atau ingin mengajukan ulang, silakan periksa data dan kirim permintaan lagi atau hubungi admin.</p>
  @else
    <p>Status permintaan Anda: <strong>{{ $status ?? 'tidak diketahui' }}</strong>.</p>
  @endif

  <p>Jika Anda tidak menerima email, periksa folder spam atau hubungi admin.</p>

  <hr>
  <p>Terima kasih,<br>Tim Klik n Clean</p>
</body>
</html>

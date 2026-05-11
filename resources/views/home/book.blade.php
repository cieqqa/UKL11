<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book - {{ $jasa->nama_usaha }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#f4f7fb;--card:#fff;--muted:#6b7a93;--accent:#2a62e6;--line:#e6eef9}
        *{box-sizing:border-box}
        body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);margin:0;color:#17324a}
        .wrap{width:min(1100px,96%);margin:0 auto;padding:28px 0}
        .header{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px}
        .brand{font-weight:800;color:inherit;text-decoration:none}
        .page-title{text-align:center;margin:8px 0 16px}
        .page-title h1{margin:0;font-family:Manrope,system-ui,Arial;font-size:26px}
        .page-title p{margin:6px 0 0;color:var(--muted)}

        .steps{display:flex;gap:18px;justify-content:center;margin:18px 0 26px}
        .step{display:flex;flex-direction:column;align-items:center;font-size:13px;color:var(--muted)}
        .step .dot{width:46px;height:46px;border-radius:50%;display:grid;place-items:center;background:#eef6ff;color:var(--accent);font-weight:800}
        .step.active .dot{background:var(--accent);color:#fff}

        .layout{display:grid;grid-template-columns:1fr 360px;gap:22px}
        .card{background:var(--card);border-radius:12px;padding:20px;border:1px solid var(--line);box-shadow:0 6px 20px rgba(16,40,80,0.04)}

        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Book - {{ $jasa->nama_usaha }}</title>
            <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
            <style>
                :root{--bg:#f4f7fb;--card:#fff;--muted:#6b7a93;--accent:#2a62e6;--line:#e6eef9}
                *{box-sizing:border-box}
                body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--bg);margin:0;color:#17324a}
                .wrap{width:min(1100px,96%);margin:0 auto;padding:28px 0}
                .header{display:flex;align-items:center;justify-content:space-between;margin-bottom:10px}
                .brand{font-weight:800;color:inherit;text-decoration:none}
                .page-title{text-align:center;margin:8px 0 16px}
                .page-title h1{margin:0;font-family:Manrope,system-ui,Arial;font-size:26px}
                .page-title p{margin:6px 0 0;color:var(--muted)}

                .steps{display:flex;gap:18px;justify-content:center;margin:18px 0 26px}
                .step{display:flex;flex-direction:column;align-items:center;font-size:13px;color:var(--muted)}
                .step .dot{width:46px;height:46px;border-radius:50%;display:grid;place-items:center;background:#eef6ff;color:var(--accent);font-weight:800}
                .step.active .dot{background:var(--accent);color:#fff}

                .layout{display:grid;grid-template-columns:1fr 360px;gap:22px}
                .card{background:var(--card);border-radius:12px;padding:20px;border:1px solid var(--line);box-shadow:0 6px 20px rgba(16,40,80,0.04)}

                label{display:block;font-weight:700;margin-bottom:8px;color:#243754;font-size:14px}
                input[type=text],input[type=email],select,textarea,input[type=date]{width:100%;padding:12px;border-radius:10px;border:1px solid #d9e7fb;background:#fff;color:#16324a}
                textarea{min-height:84px}
                input:focus,select:focus,textarea:focus{outline:none;box-shadow:0 6px 18px rgba(42,98,230,0.08);border-color:var(--accent)}

                .row{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:12px}
                .full{grid-column:1/-1}

                .controls{display:flex;justify-content:space-between;gap:12px;margin-top:8px}
                .btn{background:var(--accent);color:#fff;padding:11px 16px;border-radius:10px;border:none;font-weight:700;cursor:pointer}
                .btn.ghost{background:transparent;border:1px solid #d9e7fb;color:var(--accent);padding:10px 14px}

                .summary h4{margin:0 0 8px}
                .summary .muted{color:var(--muted);font-size:14px}
                .summary .row{display:flex;justify-content:space-between;margin:8px 0}

                .hidden{display:none}
                @media(max-width:980px){.layout{grid-template-columns:1fr}.steps{flex-wrap:wrap}}
            </style>
        </head>
        <body>
            <div class="wrap">
                <div class="header">
                    <a href="{{ route('home') }}" class="brand">Klik n Clean</a>
                    <div style="color:var(--muted)">Booking • {{ $jasa->nama_usaha }}</div>
                </div>

                <div class="page-title">
                    <h1>Book a Service</h1>
                    <p>Lengkapi data dan pilih jadwal untuk melanjutkan</p>
                </div>

                <div class="steps" id="steps">
                    <div class="step active" data-step="1"><div class="dot">1</div><div>Personal Info</div></div>
                    <div class="step" data-step="2"><div class="dot">2</div><div>Select Service</div></div>
                    <div class="step" data-step="3"><div class="dot">3</div><div>Schedule</div></div>
                    <div class="step" data-step="4"><div class="dot">4</div><div>Payment</div></div>
                </div>

                <form method="post" action="{{ route('book.store') }}" id="bookingForm">
                    @csrf
                    <input type="hidden" name="jasa_id" value="{{ $jasa->id }}">
                    <div class="layout">
                        <div>
                            <div class="card">
                                <!-- Step 1: Personal -->
                                <div class="step-panel" data-panel="1">
                                    <h3 style="margin-top:0">Personal Information</h3>
                                    <div class="row">
                                        <div>
                                            <label>Full Name *</label>
                                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" placeholder="John Doe" required>
                                        </div>
                                        <div>
                                            <label>Email Address *</label>
                                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div>
                                            <label>Phone Number *</label>
                                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="0812xxxx" required>
                                        </div>
                                        <div>
                                            <label>City *</label>
                                            <input type="text" name="city" id="city" value="{{ old('city') }}" placeholder="City" required>
                                        </div>
                                    </div>
                                    <div class="full">
                                        <label>Service Address *</label>
                                        <textarea name="address" id="address" required>{{ old('address') }}</textarea>
                                    </div>
                                </div>

                                <!-- Step 2: Service -->
                                <div class="step-panel hidden" data-panel="2">
                                    <h3 style="margin-top:0">Select Service</h3>
                                    <div>
                                        <label>Choose Service *</label>
                                        <select name="service_name" id="service_name">
                                            <option value="{{ $jasa->kategori->nama_kategori ?? 'General' }}">{{ $jasa->kategori->nama_kategori ?? 'General' }} - Rp {{ number_format($jasa->estimasi_harga ?? 0,0,',','.') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Step 3: Schedule -->
                                <div class="step-panel hidden" data-panel="3">
                                    <h3 style="margin-top:0">Schedule Your Service</h3>
                                    <div style="margin-bottom:12px">
                                        <label>Preferred Date *</label>
                                        <input type="date" name="date" id="date" required>
                                    </div>
                                    <div style="margin-bottom:12px">
                                        <label>Preferred Time *</label>
                                        <select name="time" id="time" required>
                                            <option value="09:00">09:00 - 11:00</option>
                                            <option value="12:00">12:00 - 14:00</option>
                                            <option value="15:00">15:00 - 17:00</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label>Additional Notes (Optional)</label>
                                        <textarea name="notes" id="notes"></textarea>
                                    </div>
                                </div>

                                <!-- Step 4: Payment (placeholder) -->
                                <div class="step-panel hidden" data-panel="4">
                                    <h3 style="margin-top:0">Payment</h3>
                                    <p style="color:var(--muted)">Metode pembayaran akan disediakan setelah konfirmasi. Ini adalah placeholder untuk alur pembayaran.</p>
                                    <div style="margin-top:12px">
                                        <label>Payment Method</label>
                                        <select name="payment_method" id="payment_method">
                                            <option value="cod">Pay on Arrival (COD)</option>
                                            <option value="transfer">Transfer Bank</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="controls" style="margin-top:18px">
                                    <button type="button" class="btn ghost" id="prevBtn">Previous</button>
                                    <div style="display:flex;gap:10px">
                                        <button type="button" class="btn" id="nextBtn">Next</button>
                                        <button type="submit" class="btn hidden" id="submitBtn">Confirm & Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <aside>
                            <div class="card summary">
                                <h4>Booking Summary</h4>
                                <div style="margin-top:10px"><strong id="s_vendor">{{ $jasa->nama_usaha }}</strong></div>
                                <div class="muted" style="margin-bottom:10px">⭐ <span id="s_rating">{{ number_format($jasa->rating ?? 0,1) }}</span></div>

                                <div class="row"><div class="muted">Service</div><div class="muted" id="s_service">{{ $jasa->kategori->nama_kategori ?? 'General' }}</div></div>
                                <div class="row"><div class="muted">Estimate</div><div class="muted" id="s_estimate">Rp {{ number_format($jasa->estimasi_harga ?? 0,0,',','.') }}</div></div>

                                <hr style="border:none;border-top:1px solid var(--line);margin:12px 0">

                                <div style="font-weight:700;margin-bottom:6px">Service Address</div>
                                <div class="muted" id="s_address">{{ $jasa->kota }}, {{ \Illuminate\Support\Str::limit($jasa->alamat, 60) }}</div>

                                <div style="margin-top:12px">
                                    <div class="muted">Preferred Date</div><div id="s_date" class="muted">-</div>
                                    <div class="muted" style="margin-top:6px">Preferred Time</div><div id="s_time" class="muted">-</div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </form>
            </div>

            <script>
                (function(){
                    const steps = Array.from(document.querySelectorAll('.step'));
                    const panels = Array.from(document.querySelectorAll('.step-panel'));
                    let current = 1;

                    const updateSteps = ()=>{
                        steps.forEach(s=> s.classList.toggle('active', Number(s.dataset.step)===current));
                        panels.forEach(p=> p.classList.toggle('hidden', Number(p.dataset.panel)!==current));

                        document.getElementById('prevBtn').style.display = current===1? 'none':'inline-flex';
                        document.getElementById('nextBtn').classList.toggle('hidden', current===4);
                        document.getElementById('submitBtn').classList.toggle('hidden', current!==4);
                    };

                    const nextBtn = document.getElementById('nextBtn');
                    const prevBtn = document.getElementById('prevBtn');

                    nextBtn.addEventListener('click', ()=>{
                        // simple client validation for required fields per step
                        if (current===1){
                            const required = ['full_name','email','phone','city','address'];
                            for (let id of required){
                                const el = document.getElementsByName(id)[0];
                                if (!el || !el.value.trim()){ alert('Please fill all required personal fields.'); return; }
                            }
                        }
                        if (current<4) current++; updateSteps(); updateSummary();
                    });

                    prevBtn.addEventListener('click', ()=>{ if (current>1) {current--; updateSteps(); updateSummary();} });

                    // update summary live
                    function updateSummary(){
                        const service = document.getElementById('service_name')?.value || '{{ $jasa->kategori->nama_kategori ?? "General" }}';
                        document.getElementById('s_service').textContent = service;
                        document.getElementById('s_estimate').textContent = 'Rp {{ number_format($jasa->estimasi_harga ?? 0,0,',','.') }}';
                        const address = document.getElementById('address')?.value || '{{ $jasa->kota }}, {{ \Illuminate\Support\Str::limit($jasa->alamat, 60) }}';
                        document.getElementById('s_address').textContent = address;
                        document.getElementById('s_date').textContent = document.getElementById('date')?.value || '-';
                        document.getElementById('s_time').textContent = document.getElementById('time')?.value || '-';
                    }

                    // wire inputs to update summary
                    ['full_name','email','phone','city','address','service_name','date','time','notes','payment_method'].forEach(id=>{
                        const el = document.getElementById(id);
                        if (el) el.addEventListener('input', updateSummary);
                    });

                    // init
                    updateSteps(); updateSummary();
                })();
            </script>
        </body>
        </html>

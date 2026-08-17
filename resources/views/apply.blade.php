<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto-Apply Mailer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5" style="max-width: 800px;">
        <h2 class="mb-4 text-center">🚀 Auto-Apply Mailer</h2>

        <!-- Tempat Notifikasi Sukses/Error -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            ✅ <strong>Berhasil!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            ❌ <strong>Gagal!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- Akhir Notifikasi -->

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('apply.send') }}" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label class="form-label">Email HRD Tujuan</label>
                            <input type="email" name="email_hrd" class="form-control" required placeholder="hrd@perusahaan.com" value="{{ $selectedHistory->email_hrd ?? '' }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Perusahaan (PT)</label>
                            <input type="text" name="nama_pt" id="nama_pt" class="form-control" required placeholder="PT Maju Mundur" value="{{ $selectedHistory->nama_pt ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Posisi yang Dilamar</label>
                            <input type="text" name="posisi" id="posisi" class="form-control" required placeholder="Backend Developer" value="{{ $selectedHistory->posisi ?? '' }}">
                        </div>
                    </div>

                    <div class="mb-3 border p-3 rounded bg-light">
                        <label class="form-label fw-bold">Pengaturan Subjek Email</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipe_subjek" id="subjek_auto" value="auto" checked onchange="toggleSubject()">
                            <label class="form-check-label" for="subjek_auto">Otomatis ([Posisi] - [Nama Anda] - [Jombang])</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="tipe_subjek" id="subjek_manual" value="manual" onchange="toggleSubject()">
                            <label class="form-check-label" for="subjek_manual">Manual (Kustom)</label>
                        </div>
                        <input type="text" name="subjek_custom" id="input_subjek_manual" class="form-control d-none" placeholder="Ketik subjek khusus di sini...">
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-flex justify-content-between">
                            <span>Isi Email (Bisa diedit manual)</span>
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="updateTemplate()">🔄 Reset Template</button>
                        </label>
                        <textarea name="body_email" id="body_email" class="form-control" rows="10" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold d-flex justify-content-between">
                            <span>Isi Surat Lamaran PDF (Bisa diedit seperti MS Word)</span>
                        </label>
                        <!-- Textarea ini akan diubah menjadi Editor Word oleh Summernote -->
                        <textarea name="body_pdf" id="body_pdf" class="form-control"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Lampiran Berkas (Centang yang diperlukan)</label>
                        @forelse($files as $file)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="lampiran[]" value="{{ $file }}" id="file_{{ $loop->index }}" checked>
                            <label class="form-check-label" for="file_{{ $loop->index }}">
                                {{ $file }}
                            </label>
                        </div>
                        @empty
                        <div class="alert alert-warning py-2 text-sm">Tidak ada berkas di folder storage/app/public/berkas/</div>
                        @endforelse
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Kirim Lamaran 🚀</button>
                </form>
            </div>
        </div>

        <!-- TABEL RIWAYAT LAMARAN -->
        <div class="card shadow-sm mt-5">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">📋 Riwayat Lamaran Terkirim</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu Kirim</th>
                                <th>Perusahaan (PT)</th>
                                <th>Posisi</th>
                                <th>Email HRD</th>
                                <th>Status Lamaran</th>
                                <th>Subjek</th>
                                <th>Hari Berlalu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($histories as $history)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><small>{{ $history->created_at->format('d/m/Y H:i') }}</small></td>
                                <td><strong>{{ $history->nama_pt }}</strong></td>
                                <td><span class="badge bg-primary">{{ $history->posisi }}</span></td>
                                <td>{{ $history->email_hrd }}</td>
                                <td>
                                    <form action="{{ route('history.update-status', $history->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="form-select form-select-sm 
                                                @if($history->status == 'Terkirim') bg-light text-dark 
                                                @elseif($history->status == 'Interview') bg-warning text-dark 
                                                @elseif($history->status == 'Diterima') bg-success text-white 
                                                @elseif($history->status == 'Ditolak') bg-danger text-white 
                                                @endif"
                                            onchange="this.form.submit()">
                                            <option value="Terkirim" {{ $history->status == 'Terkirim' ? 'selected' : '' }}>📤 Terkirim</option>
                                            <option value="Interview" {{ $history->status == 'Interview' ? 'selected' : '' }}>🤝 Interview</option>
                                            <option value="Diterima" {{ $history->status == 'Diterima' ? 'selected' : '' }}>🎉 Diterima</option>
                                            <option value="Ditolak" {{ $history->status == 'Ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
                                        </select>
                                    </form>
                                </td>
                                <td><small>{{ $history->subjek }}</small></td>

                                <!-- Logika Penghitungan Hari (Dibulatkan) -->
                                <td>
                                    @php
                                    $days = floor($history->created_at->diffInDays(now()));
                                    @endphp

                                    @if($days == 0)
                                    <span class="badge bg-success">Hari ini</span>
                                    @elseif($days == 1)
                                    <span class="badge bg-info text-dark">1 hari lalu</span>
                                    @else
                                    <span class="badge bg-secondary">{{ $days }} hari lalu</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <!-- Tombol Kirim Ulang -->
                                        <a href="{{ route('history.resend', $history->id) }}" class="btn btn-warning btn-sm">🔄 Kirim Ulang</a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('history.destroy', $history->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus riwayat ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-3">Belum ada riwayat lamaran yang dikirim.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Library jQuery & Summernote untuk Editor -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            // Mengaktifkan editor Summernote pada kotak PDF
            $('#body_pdf').summernote({
                height: 400,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });

            // Template Email Pengantar (Dinamis)
            let emailTemplate = `Yth. HRD / Tim Rekrutmen [NAMA_PT],

Perkenalkan nama saya Ahmad Stevent Andreuw. Menanggapi lowongan pekerjaan yang Bapak/Ibu terbitkan, saya bermaksud ingin mengajukan lamaran pekerjaan di perusahaan yang Bapak/Ibu pimpin sebagai [POSISI].

Background pendidikan saya sebelumnya adalah Teknik Informatika yang terfokus pada program dan pengolahan data informasi. Yang mana masih memiliki keterkaitan dengan persyaratan dari lowongan yang Bapak/Ibu terbitkan.

Saya memiliki kemampuan pengolahan data yang bagi saya familiar layaknya Database pada program aplikasi, Aplikasi pengolahan data yang saya kuasai salah satu contohnya Microsoft Excel dengan memakai berbagai rumus yang tersedia dibuktikan dengan ada sertifikat yang telah saya ampu. Rumus-rumus yang saya kuasai seperti hal nya Sum, If, Average, Hlookup, Vlookup, Mid, Right, Left, Index, Match, Pivot, dll. Saya juga siap jika nantinya ada test saat proses rekrutmen pada posisi tersebut.

Sebagai bahan pertimbangan Bapak/Ibu. saya telah melampirkan Curriculum Vitae (CV) beserta dokumen pendukung lainnya pada email ini. Saya sangat menantikan kesempatan untuk mengikuti tahapan wawancara agar dapat mendiskusikan lebih rinci mengenai potensi yang saya miliki.

Terima kasih atas waktu dan perhatian Bapak/Ibu.
Hormat saya,

Ahmad Stevent Andreuw
0896 2027 6245
ahmadstevent3@gmail.com`;

            // Template Surat Lamaran Lengkap untuk PDF
            let pdfTemplate = `
<div style="text-align: right; margin-bottom: 20px;">Jombang, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
<table style="margin-bottom: 20px;">
    <tr><td style="width: 80px; vertical-align: top;">Hal</td><td style="width: 15px; vertical-align: top;">:</td><td>Lamaran Pekerjaan</td></tr>
    <tr><td style="vertical-align: top;">Lampiran</td><td style="vertical-align: top;">:</td><td>-</td></tr>
</table>
<p>Yth. HRD <strong>[NAMA_PT]</strong>.</p>
<p>Dengan Hormat.</p>
<p>Saya yang bertanda tangan di bawah ini :</p>
<table style="margin-left: 30px; margin-bottom: 15px; margin-top: 15px;">
    <tr><td style="width: 170px; vertical-align: top;">Nama</td><td style="width: 15px; vertical-align: top;">:</td><td>Ahmad Stevent Andreuw</td></tr>
    <tr><td style="vertical-align: top;">Tempat, Tanggal Lahir</td><td style="vertical-align: top;">:</td><td>Jombang, 26 November 2000</td></tr>
    <tr><td style="vertical-align: top;">Pendidikan</td><td style="vertical-align: top;">:</td><td>S1 Teknik Informatika</td></tr>
    <tr><td style="vertical-align: top;">Alamat</td><td style="vertical-align: top;">:</td><td>Ds. Gajah, Kecamatan Ngoro, Kabupaten Jombang</td></tr>
    <tr><td style="vertical-align: top;">No. Hp</td><td style="vertical-align: top;">:</td><td>(+62) 896 20276245</td></tr>
    <tr><td style="vertical-align: top;">Email</td><td style="vertical-align: top;">:</td><td>Ahmadstevent3@gmail.com</td></tr>
</table>
<p style="text-align: justify;">Dengan segala hormat, saya ingin mengajukan lamaran pekerjaan di perusahaan yang dipimpin oleh Bapak/Ibu sebagai <strong>[POSISI]</strong>. Saya sangat antusias untuk bergabung dengan tim perusahaan ini dan berkontribusi dalam mencapai visi dan misi yang telah ditetapkan. Bersama dengan surat lamaran ini, saya melampirkan semua dokumen yang relevan dan berharap agar diberikan kesempatan untuk mengikuti proses seleksi lebih lanjut.</p>
<p style="text-align: justify; margin-bottom: 5px;">Terima kasih atas perhatian Bapak/Ibu, sebagai bahan pertimbangan bersama ini saya lampirkan :</p>
<ol style="margin-top: 5px; margin-bottom: 15px; padding-left: 20px;">
    <li>Riwayat Hidup</li>
    <li>Pas Foto</li>
    <li>KTP</li>
    <li>KK</li>
    <li>SKCK</li>
    <li>Fotokopi Ijazah</li>
    <li>Fotokopi Transkrip Nilai</li>
</ol>
<p style="text-align: justify;">Demikian surat lamaran ini saya buat. Atas perhatian dan pertimbangan Ibu/Bapak, saya ucapkan terima kasih.</p>
<table style="width: 100%; margin-top: 40px;">
    <tr>
        <td style="width: 65%;"></td>
        <td style="width: 35%; text-align: center;">
            Hormat saya,<br><br><br><br><br>
            (Ahmad Stevent Andreuw)
        </td>
    </tr>
</table>`;

            // Isi kotak teks saat halaman pertama dibuka
            document.getElementById('body_email').value = emailTemplate;
            $('#body_pdf').summernote('code', pdfTemplate);
        });

        // Script subjek manual tetap sama
        function toggleSubject() {
            let isManual = document.getElementById('subjek_manual').checked;
            let inputManual = document.getElementById('input_subjek_manual');
            if (isManual) {
                inputManual.classList.remove('d-none');
                inputManual.required = true;
            } else {
                inputManual.classList.add('d-none');
                inputManual.required = false;
            }
        }
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Lamaran - Ahmad Stevent Andreuw</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 11pt;
            /* Ukuran font sedikit dikecilkan agar lebih hemat tempat */
            line-height: 1.3;
            /* Jarak antar baris lebih rapat */
            margin: 25px 40px;
            color: #000;
        }

        /* Mengatur agar setiap paragraf tidak memiliki jarak spasi bawah yang terlalu jauh */
        p {
            margin-top: 0;
            margin-bottom: 6px;
            /* Jarak antar paragraf dibuat tipis */
            text-align: justify;
        }

        /* Mengatur jarak tabel dan list agar rapat */
        table {
            margin-bottom: 10px;
        }

        ol {
            margin-top: 0;
            margin-bottom: 10px;
            padding-left: 20px;
        }

        ol li {
            margin-bottom: 2px;
            /* Jarak antar poin list diperapat */
        }
    </style>
</head>

<body>
    <!-- Mencetak HTML mentah dari Editor Summernote web Anda -->
    {!! $content !!}
</body>

</html>
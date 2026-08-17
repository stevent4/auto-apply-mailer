<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    public function run(): void
    {
        Template::query()
            ->whereNull('user_id')
            ->delete();


        /*
        |--------------------------------------------------------------------------
        | EMAIL TEMPLATE 1
        |--------------------------------------------------------------------------
        */

        Template::create([
            'name' => 'Formal Profesional',
            'type' => 'email',
            'category' => 'formal',
            'subject' => 'Lamaran {{posisi}} - {{nama}}',
            'body' => <<<'TEXT'
Yth. HRD / Tim Rekrutmen {{perusahaan}},

Perkenalkan, nama saya {{nama}}. Menanggapi informasi mengenai lowongan pekerjaan yang sedang dibuka, saya bermaksud mengajukan lamaran untuk posisi {{posisi}} di perusahaan yang Bapak/Ibu pimpin.

Saya memiliki latar belakang pendidikan {{pendidikan}} dan memiliki ketertarikan untuk mengembangkan kemampuan serta memberikan kontribusi terbaik melalui posisi tersebut.

Saya memiliki kemampuan yang relevan dengan kebutuhan pekerjaan dan siap mengikuti seluruh proses seleksi yang ditetapkan oleh perusahaan.

Sebagai bahan pertimbangan Bapak/Ibu, saya telah melampirkan Curriculum Vitae (CV) beserta dokumen pendukung lainnya pada email ini.

Saya sangat mengharapkan kesempatan untuk dapat mengikuti tahapan seleksi dan wawancara agar dapat menjelaskan kemampuan serta pengalaman yang saya miliki secara lebih lanjut.

Terima kasih atas waktu dan perhatian Bapak/Ibu.

Hormat saya,
{{nama}}
{{phone}}
{{email}}
TEXT,
            'is_default' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | EMAIL TEMPLATE 2
        |--------------------------------------------------------------------------
        */

        Template::create([
            'name' => 'Singkat & Profesional',
            'type' => 'email',
            'category' => 'simple',
            'subject' => 'Lamaran Pekerjaan - {{posisi}} - {{nama}}',
            'body' => <<<'TEXT'
Yth. HRD {{perusahaan}},

Perkenalkan, saya {{nama}}.

Saya bermaksud mengajukan lamaran pekerjaan untuk posisi {{posisi}} di perusahaan Bapak/Ibu.

Saya memiliki latar belakang pendidikan {{pendidikan}} dan siap mengikuti proses rekrutmen serta memberikan kontribusi terbaik apabila diberikan kesempatan.

Sebagai bahan pertimbangan, saya melampirkan CV dan dokumen pendukung pada email ini.

Terima kasih atas perhatian Bapak/Ibu.

Hormat saya,
{{nama}}
{{phone}}
{{email}}
TEXT,
            'is_default' => false,
        ]);


        /*
        |--------------------------------------------------------------------------
        | EMAIL TEMPLATE 3
        |--------------------------------------------------------------------------
        */

        Template::create([
            'name' => 'Fresh Graduate',
            'type' => 'email',
            'category' => 'fresh_graduate',
            'subject' => 'Lamaran {{posisi}} - Fresh Graduate - {{nama}}',
            'body' => <<<'TEXT'
Yth. HRD / Tim Rekrutmen {{perusahaan}},

Perkenalkan, saya {{nama}}, lulusan {{pendidikan}}.

Saya mengetahui adanya kesempatan untuk posisi {{posisi}} dan bermaksud mengajukan lamaran untuk posisi tersebut.

Sebagai fresh graduate, saya memiliki semangat belajar yang tinggi, mampu beradaptasi dengan lingkungan baru, serta memiliki keinginan untuk terus mengembangkan kemampuan yang saya miliki.

Saya berharap mendapatkan kesempatan untuk mengikuti proses seleksi dan membuktikan kemampuan saya secara langsung.

CV dan dokumen pendukung telah saya lampirkan sebagai bahan pertimbangan.

Terima kasih atas waktu dan perhatian Bapak/Ibu.

Hormat saya,
{{nama}}
{{phone}}
{{email}}
TEXT,
            'is_default' => false,
        ]);


        /*
        |--------------------------------------------------------------------------
        | EMAIL TEMPLATE 4
        |--------------------------------------------------------------------------
        */

        Template::create([
            'name' => 'IT / Programmer',
            'type' => 'email',
            'category' => 'it',
            'subject' => 'Application for {{posisi}} - {{nama}}',
            'body' => <<<'TEXT'
Yth. HRD / Recruitment Team {{perusahaan}},

Perkenalkan, saya {{nama}}, dengan latar belakang pendidikan {{pendidikan}}.

Saya bermaksud mengajukan lamaran untuk posisi {{posisi}} di perusahaan Bapak/Ibu.

Saya memiliki ketertarikan pada bidang teknologi dan pengembangan sistem, serta memiliki kemampuan untuk mempelajari teknologi baru sesuai dengan kebutuhan pekerjaan.

Saya juga memiliki kemampuan pengolahan data dan terbiasa menggunakan berbagai tools pendukung pekerjaan.

CV dan dokumen pendukung telah saya lampirkan pada email ini sebagai bahan pertimbangan.

Saya sangat terbuka untuk mengikuti technical test, interview, maupun tahapan seleksi lainnya.

Terima kasih atas perhatian Bapak/Ibu.

Hormat saya,
{{nama}}
{{phone}}
{{email}}
TEXT,
            'is_default' => false,
        ]);


        /*
        |--------------------------------------------------------------------------
        | PDF TEMPLATE 1
        |--------------------------------------------------------------------------
        */

        Template::create([
            'name' => 'Formal Standar',
            'type' => 'pdf',
            'category' => 'formal',
            'subject' => null,
            'body' => <<<'HTML'
<div style="font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.6;">

    <div style="text-align: right; margin-bottom: 20px;">
        {{kota}}, {{tanggal}}
    </div>

    <table style="margin-bottom: 20px; border-collapse: collapse;">

        <tr>
            <td style="width: 80px;">Hal</td>
            <td style="width: 15px;">:</td>
            <td>Lamaran Pekerjaan</td>
        </tr>

        <tr>
            <td>Lampiran</td>
            <td>:</td>
            <td>-</td>
        </tr>

    </table>

    <p>
        Yth. HRD <strong>{{perusahaan}}</strong>
    </p>

    <p>
        Dengan Hormat,
    </p>

    <p>
        Saya yang bertanda tangan di bawah ini:
    </p>

    <table style="margin-left: 30px; border-collapse: collapse;">

        <tr>
            <td style="width: 170px;">Nama</td>
            <td style="width: 15px;">:</td>
            <td>{{nama}}</td>
        </tr>

        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td>{{tempat_lahir}}, {{tanggal_lahir}}</td>
        </tr>

        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td>{{pendidikan}}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{alamat}}</td>
        </tr>

        <tr>
            <td>No. HP</td>
            <td>:</td>
            <td>{{phone}}</td>
        </tr>

        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{email}}</td>
        </tr>

    </table>

    <p style="text-align: justify;">
        Dengan segala hormat, saya bermaksud mengajukan lamaran pekerjaan
        di perusahaan yang dipimpin oleh Bapak/Ibu sebagai
        <strong>{{posisi}}</strong>.
    </p>

    <p style="text-align: justify;">
        Saya memiliki latar belakang pendidikan {{pendidikan}}
        dan memiliki motivasi untuk memberikan kontribusi terbaik
        bagi perusahaan.
    </p>

    <p style="text-align: justify;">
        Sebagai bahan pertimbangan, bersama surat ini saya melampirkan
        dokumen pendukung yang diperlukan.
    </p>

    <ol style="padding-left: 24px;">
        <li>Riwayat Hidup</li>
        <li>Pas Foto</li>
        <li>KTP</li>
        <li>KK</li>
        <li>SKCK</li>
        <li>Fotokopi Ijazah</li>
        <li>Fotokopi Transkrip Nilai</li>
    </ol>

    <p style="text-align: justify;">
        Demikian surat lamaran ini saya buat.
        Atas perhatian dan pertimbangan Bapak/Ibu,
        saya ucapkan terima kasih.
    </p>

    <table style="width: 100%; margin-top: 40px;">
        <tr>
            <td style="width: 65%;"></td>

            <td style="width: 35%; text-align: center;">
                Hormat saya,
                <br><br><br><br><br>
                ({{nama}})
            </td>
        </tr>
    </table>

</div>
HTML,
            'is_default' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | PDF TEMPLATE 2
        |--------------------------------------------------------------------------
        */

        Template::create([
            'name' => 'Profesional Modern',
            'type' => 'pdf',
            'category' => 'professional',
            'subject' => null,
            'body' => <<<'HTML'
<div style="
    font-family: Arial, Helvetica, sans-serif;
    font-size: 11.5pt;
    line-height: 1.65;
    color: #222;
">

    {{-- Tanggal --}}
    <div style="
        text-align: right;
        margin-bottom: 28px;
    ">
        {{kota}}, {{tanggal}}
    </div>


    {{-- Tujuan --}}
    <div style="
        margin-bottom: 22px;
    ">
        <p style="margin: 0;">
            Kepada Yth.
        </p>

        <p style="
            margin: 2px 0 0 0;
            font-weight: bold;
        ">
            HRD {{perusahaan}}
        </p>
    </div>


    {{-- Salam --}}
    <p style="
        margin-top: 0;
        margin-bottom: 18px;
    ">
        Dengan hormat,
    </p>


    {{-- Pembuka --}}
    <p style="
        text-align: justify;
        margin-top: 0;
        margin-bottom: 14px;
    ">
        Saya yang bertanda tangan di bawah ini:
    </p>


    {{-- Biodata --}}
    <table style="
        border-collapse: collapse;
        margin: 0 0 20px 28px;
        width: auto;
    ">

        <tr>
            <td style="
                width: 165px;
                padding: 2px 0;
                vertical-align: top;
            ">
                Nama
            </td>

            <td style="
                width: 18px;
                padding: 2px 0;
                vertical-align: top;
            ">
                :
            </td>

            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                {{nama}}
            </td>
        </tr>


        <tr>
            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                Tempat, Tanggal Lahir
            </td>

            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                :
            </td>

            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                {{tempat_lahir}}, {{tanggal_lahir}}
            </td>
        </tr>


        <tr>
            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                Pendidikan
            </td>

            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                :
            </td>

            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                {{pendidikan}}
            </td>
        </tr>


        <tr>
            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                Alamat
            </td>

            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                :
            </td>

            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                {{alamat}}
            </td>
        </tr>


        <tr>
            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                No. HP
            </td>

            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                :
            </td>

            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                {{phone}}
            </td>
        </tr>


        <tr>
            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                Email
            </td>

            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                :
            </td>

            <td style="
                padding: 2px 0;
                vertical-align: top;
            ">
                {{email}}
            </td>
        </tr>

    </table>


    {{-- Isi surat --}}
    <p style="
        text-align: justify;
        margin-top: 0;
        margin-bottom: 14px;
    ">
        Dengan surat ini, saya bermaksud mengajukan lamaran pekerjaan
        untuk posisi <strong>{{posisi}}</strong> di perusahaan
        {{perusahaan}}. Saya memiliki latar belakang pendidikan
        <strong>{{pendidikan}}</strong> serta memiliki motivasi untuk
        mengembangkan kemampuan dan memberikan kontribusi terbaik bagi
        perusahaan.
    </p>


    <p style="
        text-align: justify;
        margin-top: 0;
        margin-bottom: 14px;
    ">
        Saya memiliki semangat belajar, mampu beradaptasi dengan
        lingkungan kerja baru, serta siap mengikuti seluruh tahapan
        seleksi yang ditetapkan oleh perusahaan. Saya berharap dapat
        diberikan kesempatan untuk mengikuti proses seleksi lebih lanjut
        dan menjelaskan kemampuan yang saya miliki secara langsung.
    </p>


    <p style="
        text-align: justify;
        margin-top: 0;
        margin-bottom: 14px;
    ">
        Sebagai bahan pertimbangan, bersama surat lamaran ini saya
        melampirkan beberapa dokumen pendukung sebagai berikut:
    </p>


    {{-- Lampiran --}}
    <ol style="
        margin-top: 6px;
        margin-bottom: 18px;
        padding-left: 30px;
    ">
        <li style="margin-bottom: 3px;">
            Curriculum Vitae (CV)
        </li>

        <li style="margin-bottom: 3px;">
            Pas Foto
        </li>

        <li style="margin-bottom: 3px;">
            Kartu Tanda Penduduk (KTP)
        </li>

        <li style="margin-bottom: 3px;">
            Kartu Keluarga (KK)
        </li>

        <li style="margin-bottom: 3px;">
            SKCK
        </li>

        <li style="margin-bottom: 3px;">
            Fotokopi Ijazah
        </li>

        <li style="margin-bottom: 3px;">
            Fotokopi Transkrip Nilai
        </li>
    </ol>


    {{-- Penutup --}}
    <p style="
        text-align: justify;
        margin-top: 0;
        margin-bottom: 14px;
    ">
        Demikian surat lamaran ini saya sampaikan. Besar harapan saya
        untuk dapat diberikan kesempatan bergabung dan berkontribusi
        di perusahaan {{perusahaan}}. Atas perhatian dan pertimbangan
        Bapak/Ibu, saya ucapkan terima kasih.
    </p>


    {{-- Tanda tangan --}}
    <table style="
        width: 100%;
        border-collapse: collapse;
        margin-top: 38px;
    ">

        <tr>

            <td style="
                width: 62%;
            ">
            </td>


            <td style="
                width: 38%;
                text-align: center;
                vertical-align: top;
            ">

                Hormat saya,

                <br>
                <br>
                <br>
                <br>

                <strong>
                    {{nama}}
                </strong>

            </td>

        </tr>

    </table>

</div>
HTML,
            'is_default' => false,
        ]);


        /*
        |--------------------------------------------------------------------------
        | PDF TEMPLATE 3
        |--------------------------------------------------------------------------
        */

        Template::create([
            'name' => 'Fresh Graduate',
            'type' => 'pdf',
            'category' => 'fresh_graduate',
            'subject' => null,
            'body' => <<<'HTML'
<div style="font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.65;">

    <div style="text-align: right; margin-bottom: 20px;">
        {{kota}}, {{tanggal}}
    </div>

    <p>
        Yth. HRD <strong>{{perusahaan}}</strong>
    </p>

    <p>
        Dengan Hormat,
    </p>

    <p style="text-align: justify;">
        Saya yang bertanda tangan di bawah ini:
    </p>

    <table style="margin-left: 30px; border-collapse: collapse;">

        <tr>
            <td style="width: 170px;">Nama</td>
            <td style="width: 15px;">:</td>
            <td>{{nama}}</td>
        </tr>

        <tr>
            <td>Pendidikan</td>
            <td>:</td>
            <td>{{pendidikan}}</td>
        </tr>

        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{alamat}}</td>
        </tr>

        <tr>
            <td>No. HP</td>
            <td>:</td>
            <td>{{phone}}</td>
        </tr>

        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{email}}</td>
        </tr>

    </table>

    <p style="text-align: justify;">
        Dengan ini saya bermaksud mengajukan lamaran pekerjaan
        sebagai <strong>{{posisi}}</strong>.
    </p>

    <p style="text-align: justify;">
        Sebagai lulusan {{pendidikan}}, saya memiliki semangat belajar
        yang tinggi dan siap mengembangkan kemampuan melalui pengalaman
        profesional di perusahaan Bapak/Ibu.
    </p>

    <p style="text-align: justify;">
        Saya siap mengikuti seluruh tahapan seleksi yang ditetapkan
        perusahaan dan berharap mendapat kesempatan untuk bergabung
        serta memberikan kontribusi terbaik.
    </p>

    <p>
        Terima kasih atas perhatian Bapak/Ibu.
    </p>

    <table style="width: 100%; margin-top: 40px;">
        <tr>
            <td style="width: 65%;"></td>

            <td style="width: 35%; text-align: center;">
                Hormat saya,
                <br><br><br><br><br>
                <strong>{{nama}}</strong>
            </td>
        </tr>
    </table>

</div>
HTML,
            'is_default' => false,
        ]);
    }
}

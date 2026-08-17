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
<div style="font-family: Arial, sans-serif; font-size: 12pt; line-height: 1.65;">

    <div style="text-align: right; margin-bottom: 25px;">
        {{kota}}, {{tanggal}}
    </div>

    <p>
        Kepada Yth.<br>
        <strong>HRD {{perusahaan}}</strong>
    </p>

    <p>
        Dengan Hormat,
    </p>

    <p style="text-align: justify;">
        Perkenalkan, saya <strong>{{nama}}</strong>,
        lulusan <strong>{{pendidikan}}</strong>.
        Melalui surat ini saya ingin mengajukan lamaran untuk posisi
        <strong>{{posisi}}</strong> di perusahaan Bapak/Ibu.
    </p>

    <p style="text-align: justify;">
        Saya memiliki semangat belajar, kemampuan beradaptasi,
        serta motivasi untuk berkembang dan memberikan kontribusi
        positif terhadap perusahaan.
    </p>

    <p style="text-align: justify;">
        Bersama surat ini saya melampirkan CV dan dokumen pendukung
        sebagai bahan pertimbangan.
    </p>

    <p style="text-align: justify;">
        Saya berharap dapat diberikan kesempatan untuk mengikuti
        proses seleksi lebih lanjut.
    </p>

    <p style="text-align: justify;">
        Demikian surat lamaran ini saya sampaikan.
        Terima kasih atas perhatian Bapak/Ibu.
    </p>

    <table style="width: 100%; margin-top: 45px;">
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

        /*
|--------------------------------------------------------------------------
| PDF TEMPLATE 4
|--------------------------------------------------------------------------
*/
        Template::create([
            'name' => 'Surat Lamaran Lengkap',
            'type' => 'pdf',
            'category' => 'formal_lengkap',
            'subject' => null,
            'body' => <<<'HTML'
<div style="
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12pt;
    line-height: 1.4;
    color: #111;
">

    <!-- TANGGAL -->
    <div style="
        text-align: right;
        margin-top: 0;
        margin-bottom: 10px;
    ">
        {{kota}}, {{tanggal}}
    </div>

    <!-- PERIHAL -->
    <table style="
        border-collapse: collapse;
        margin-top: 0;
        margin-bottom: 10px;
    ">
        <tr>
            <td style="width: 80px; padding: 0;">
                Hal
            </td>

            <td style="width: 15px; padding: 0;">
                :
            </td>

            <td style="padding: 0;">
                Lamaran Pekerjaan
            </td>
        </tr>

        <tr>
            <td style="padding: 0;">
                Lampiran
            </td>

            <td style="padding: 0;">
                :
            </td>

            <td style="padding: 0;">
                -
            </td>
        </tr>
    </table>

    <!-- TUJUAN -->
    <p style="
        margin-top: 0;
        margin-bottom: 10px;
    ">
        Yth. HRD <strong>{{perusahaan}}</strong>
    </p>

    <!-- SALAM -->
    <p style="
        margin-top: 0;
        margin-bottom: 0px;
    ">
        Dengan Hormat,
    </p>

    <!-- PEMBUKA -->
    <p style="
        margin-top: 0;
        margin-bottom: 10px;
        text-align: justify;
    ">
        Saya yang bertanda tangan di bawah ini:
    </p>

    <!-- BIODATA -->
    <table style="
        border-collapse: collapse;
        margin-top: 0;
        margin-left: 30px;
        margin-bottom: 10px;
    ">

        <tr>
            <td style="
                width: 170px;
                padding: 0;
            ">
                Nama
            </td>

            <td style="
                width: 15px;
                padding: 0;
            ">
                :
            </td>

            <td style="padding: 0;">
                {{nama}}
            </td>
        </tr>

        <tr>
            <td style="padding: 0;">
                Tempat, Tanggal Lahir
            </td>

            <td style="padding: 0;">
                :
            </td>

            <td style="padding: 0;">
                {{tempat_lahir}}, {{tanggal_lahir}}
            </td>
        </tr>

        <tr>
            <td style="padding: 0;">
                Pendidikan
            </td>

            <td style="padding: 0;">
                :
            </td>

            <td style="padding: 0;">
                {{pendidikan}}
            </td>
        </tr>

        <tr>
            <td style="padding: 0;">
                Alamat
            </td>

            <td style="padding: 0;">
                :
            </td>

            <td style="padding: 0;">
                {{alamat}}
            </td>
        </tr>

        <tr>
            <td style="padding: 0;">
                No. HP
            </td>

            <td style="padding: 0;">
                :
            </td>

            <td style="padding: 0;">
                {{phone}}
            </td>
        </tr>

        <tr>
            <td style="padding: 0;">
                Email
            </td>

            <td style="padding: 0;">
                :
            </td>

            <td style="padding: 0;">
                {{email}}
            </td>
        </tr>

    </table>

    <!-- PARAGRAF 1 -->
    <p style="
        margin-top: 0;
        margin-bottom: 10px;
        text-align: justify;
    ">
        Dengan segala hormat, saya ingin mengajukan lamaran pekerjaan
        di perusahaan yang dipimpin oleh Bapak/Ibu sebagai
        <strong>{{posisi}}</strong>.
        Saya sangat antusias untuk bergabung dengan tim
        <strong>{{perusahaan}}</strong> dan berkontribusi dalam mencapai
        visi dan misi yang telah ditetapkan.
    </p>

    <!-- PARAGRAF 2 -->
    <p style="
        margin-top: 0;
        margin-bottom: 10px;
        text-align: justify;
    ">
        Bersama dengan surat lamaran ini, saya melampirkan semua
        dokumen yang relevan dan berharap agar diberikan kesempatan
        untuk mengikuti proses seleksi lebih lanjut.
    </p>

    <!-- PARAGRAF 3 -->
    <p style="
        margin-top: 0;
        margin-bottom: 10px;
        text-align: justify;
    ">
        Terima kasih atas perhatian Bapak/Ibu, sebagai bahan
        pertimbangan bersama ini saya lampirkan:
    </p>

    <!-- LAMPIRAN -->
    <ol style="
        margin-top: 0;
        margin-bottom: 10px;
        padding-left: 28px;
        line-height: 1.35;
    ">

        <li style="margin: 0; padding: 0;">
            Riwayat Hidup
        </li>

        <li style="margin: 0; padding: 0;">
            Pas Foto
        </li>

        <li style="margin: 0; padding: 0;">
            KTP
        </li>

        <li style="margin: 0; padding: 0;">
            KK
        </li>

        <li style="margin: 0; padding: 0;">
            SKCK
        </li>

        <li style="margin: 0; padding: 0;">
            Fotokopi Ijazah
        </li>

        <li style="margin: 0; padding: 0;">
            Fotokopi Transkrip Nilai
        </li>

    </ol>

    <!-- PENUTUP -->
    <p style="
        margin-top: 0;
        margin-bottom: 6px;
        text-align: justify;
    ">
        Demikian surat lamaran ini saya buat.
        Atas perhatian dan pertimbangan Ibu/Bapak,
        saya ucapkan terima kasih.
    </p>

    <!-- TANDA TANGAN -->
    <table style="
        width: 100%;
        border-collapse: collapse;
        margin-top: 25px;
    ">

        <tr>

            <td style="
                width: 65%;
                padding: 0;
            ">
            </td>

            <td style="
                width: 35%;
                padding: 0;
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
    }
}

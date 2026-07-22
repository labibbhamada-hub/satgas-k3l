<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Laporan Insiden Kecelakaan Kerja</title>
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
            text-align: justify;
            text-justify: inter-word;
        }

        body {
            padding: 0px;
            font-size: 14px;
            line-height: 1.5;
        }

        .logo {
            width: 60px;
            border: 1px solid black;
            padding: 12px;
            position: absolute;
        }

        .header {
            margin-left: 100px;
            border: 1px solid black;
        }

        .header .h1 {
            font-size: 24px;
            font-weight: bold;
            display: block;
            text-align: center;
            text-justify: none;
            margin-bottom: 2px;
        }

        .header .h2 {
            font-size: 16px;
            font-weight: bold;
            display: block;
            text-align: center;
            text-justify: none;
            margin-bottom: 2px;
        }

        .header .p {
            font-weight: bold;
            display: block;
            text-align: center;
            text-justify: none;
            margin-bottom: 2px;
        }

        .h1-title {
            font-size: 16px;
            font-weight: bold;
            display: block;
            text-align: center;
            text-justify: none;
        }

        .h1-num {
            font-size: 14px;
            display: block;
            text-align: center;
            text-justify: none;
        }

        .h1-sm {
            font-size: 14px;
            font-weight: bold;
            display: block;
            text-align: center;
            text-justify: none;
        }

        .hr {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .tanggal {
            display: flex;
            float: right;
        }

        .table {
            width: 100%;
        }

        .table .td {
            padding-bottom: 4px;
            text-align: left;
            vertical-align: top;
        }

        .table .td-sm {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
        }

        .text-center {
            text-align: center
        }

        .text-header {
            font-size: 18px;
            font-weight: 500;
        }

        .layout-ttd {
            display: inline-flex;
            text-align: center;
        }

        .ttd-p {
            text-align: center;
            text-justify: none;
        }

        .text-muted {
            font-size: 14px;
            opacity: 80%;
        }

        .page-break {
            page-break-after: always;
        }

        .border {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table width="100%" style="border-bottom: 2px solid black; padding-bottom: 10px;">
        <tr>
            <td width="15%" align="left" class="logo">
                <img src="{{ public_path('storage/asset/logo-satgask3l.png') }}" alt="Logo Kiri" style="width: 60px;">
            </td>
            <td width="70%">
                <div style="font-weight: bold; text-align: center;">
                    UNIVERSITAS BHAMADA SLAWI
                </div>
                <div style="font-weight: bold; text-align: center;">
                    SATGAS SMK3L
                </div>
                <div style="text-align: center;">
                    Alamat : Jl. Cut Nyak Dhien No. 16, Kalisapu, Kecamatan Slawi - Kabupaten Tegal
                </div>
                <div style="text-align: center;">
                    Telp. (0283) 6197570, 6197571 Fax. (0283) 6198450
                </div>
            </td>
            <td width="15%" align="right" class="logo" style="text-align: right;">
                <img src="{{ public_path('storage/asset/logo-bhamada-sm.png') }}" alt="Logo Kanan" style="width: 60px;">
            </td>
        </tr>
    </table>
    <br>
    <div style="text-align: center">
        <span style="font-weight: bold;">FORMAT LAPORAN INSIDEN KECELAKAAN KERJA</span>
        <br>
        <span style="font-weight: bold;">LAPORAN INSIDEN KESEHATAN DAN KESELAMATAN KERJA</span>
    </div>
    <br>
    <table class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td class="td" style="font-weight: bold; width: 20px;">A.</td>
            <td class="td" style="font-weight: bold;" colspan="4">IDENTITAS MAHASISWA</td>
        </tr>
        <tr>
            <td class="td">&nbsp;</td>
            <td class="td" style="width: 20px;">1.</td>
            <td class="td" style="width: 140px;">Nama Mahasiswa</td>
            <td class="td" style="width: 20px;">:</td>
            <td class="td">{{ $laporan->korban_nama }}</td>
        </tr>
        <tr>
            <td class="td">&nbsp;</td>
            <td class="td">2.</td>
            <td class="td">Unit / Program Studi</td>
            <td class="td">:</td>
            <td class="td">{{ $laporan->korban_bagian }}</td>
        </tr>
        <tr>
            <td class="td">&nbsp;</td>
            <td class="td">3.</td>
            <td class="td">Tanggal Laporan</td>
            <td class="td">:</td>
            <td class="td">{{ Carbon\Carbon::parse($laporan->tanggal_laporan)->translatedFormat('l, d F Y') }}</td>
        </tr>
    </table>
    <table class="table" cellspacing="0" cellpadding="0" style="margin-top: 10px;">
        <tr>
            <td class="td" style="font-weight: bold; width: 20px;">B.</td>
            <td class="td" style="font-weight: bold;" colspan="2">RINCIAN KEJADIAN</td>
            <td class="td" style="font-weight: bold;" colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td class="td">&nbsp;</td>
            <td class="td" style="width: 20px;">1.</td>
            <td class="td" style="width: 260px;">Tanggal dan Jam Kejadian</td>
            <td class="td" style="width: 20px;">:</td>
            <td class="td">
                {{ Carbon\Carbon::parse($laporan->kejadian_tanggal)->translatedFormat('l, d F Y') }}
                pukul
                {{ Carbon\Carbon::parse($laporan->kejadian_jam)->format('H.i') }}
                WIB
            </td>
        </tr>
        <tr>
            <td class="td">&nbsp;</td>
            <td class="td">2.</td>
            <td class="td">Lokasi Kejadian</td>
            <td class="td">:</td>
            <td class="td">{{ $laporan->kejadian_lokasi }}</td>
        </tr>
        <tr>
            <td class="td">&nbsp;</td>
            <td class="td">3.</td>
            <td class="td">Jenis Insiden</td>
            <td class="td">:</td>
            <td class="td">{{ $laporan->kejadian_jenis }}</td>
        </tr>
        <tr>
            <td class="td">&nbsp;</td>
            <td class="td">4.</td>
            <td class="td">Kronologi Kejadian</td>
            <td class="td">:</td>
            <td class="td">&nbsp;</td>
        </tr>
        <tr>
            <td class="td" colspan="2">&nbsp;</td>
            <td class="td" colspan="3">{!! nl2br(e($laporan->kejadian_kronologi)) !!}</td>
        </tr>
        <tr>
            <td class="td">&nbsp;</td>
            <td class="td">5.</td>
            <td class="td">Dampak / Cedera Yang Dialami</td>
            <td class="td">:</td>
            <td class="td">&nbsp;</td>
        </tr>
        <tr>
            <td class="td" colspan="2">&nbsp;</td>
            <td class="td" colspan="3">{!! nl2br(e($laporan->kejadian_dampak)) !!}</td>
        </tr>
        <tr>
            <td class="td">&nbsp;</td>
            <td class="td">7.</td>
            <td class="td">Tindakan Yang Dilakukan Setelah Insiden</td>
            <td class="td">:</td>
            <td class="td">&nbsp;</td>
        </tr>
        <tr>
            <td class="td" colspan="2">&nbsp;</td>
            <td class="td" colspan="3">{!! nl2br(e($laporan->penanganan_tindakan)) !!}</td>
        </tr>
        <tr>
            <td class="td">&nbsp;</td>
            <td class="td">8.</td>
            <td class="td">Penanganan Dilakukan Oleh</td>
            <td class="td">:</td>
            <td class="td">{{ $laporan->penanganan_oleh }}</td>
        </tr>
        <tr>
            <td class="td">&nbsp;</td>
            <td class="td">9.</td>
            <td class="td">Apakah Kejadian Serupa Pernah Terjadi?</td>
            <td class="td">:</td>
            <td class="td">
                @if ($laporan->kejadian_serupa)
                    Ya
                @else
                    Tidak
                @endif
            </td>
        </tr>
    </table>
    <br><br>
    <table width="100%">
        <tr>
            <td colspan="2" style="text-align: center;">Mengetahui,</td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <div style="display: inline-block; text-align: center;">
                    Pelapor
                    <br><br><br>
                    ({{ $laporan->pelapor_nama }})
                </div>
            </td>
            <td style="text-align: right;">
                <div style="display: inline-block; text-align: center;">
                    Petugas Satgas K3L
                    <br><br><br>
                    ({{ $satgas->nama }})
                </div>
            </td>
        </tr>
    </table>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
        .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}

        .table  {border-collapse:collapse;border-spacing:0;border-color:#fff;width: 100%; }
        .table .table-right{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;text-align:right}
        .table .table-center{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;text-align:center}
        .table .table-left{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;text-align:left}
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <center>
                        <img src="{{ url('images/logo_stmik_baru_20081.jpg') }}" alt="STMIK Banjarbaru" style="width:auto; height:80px; float: left; margin: 15px 10px 15px 30px;">
                            <strong>SEKOLAH TINGGI MANAJEMEN INFORMATIKA DAN KOMPUTER <br>
                            (STMIK) BANJARBARU <br>
                            LEMBAGA JAMINAN MUTU (LJM)</strong> <br>
                            Jl. Akhmad Yani Km 33,3 Loktabat Banjarbaru Telp (0511) 4782881 - 4781374 <br>
                            Jl. Sultan Adam No. 12 Banjarmasin Telp. (0511) 3303254
                        </center>
                    </div>
                    <hr>
                    <div style="font-family:Arial; font-size:12px;">
                        <center>
                            <h3>
                                HASIL PENILAIAN KINERJA DOSEN STMIK BANJARBARU <br>
                                TAHUN AKADEMIK {{ $periode->name }} <br>
                                SEMESTER {{ strtoupper($semes->jenis) }}
                            </h3>
                        </center>
                    </div>
                    
                    <div class="">
                            <table class="tg">
                                <thead>
                                    <tr>
                                        <th class="tg-3wr7">No</th>
                                        <th class="tg-3wr7">Jurusan</th>
                                        <th class="tg-3wr7">Smt</th>
                                        <th class="tg-3wr7">Matakuliah</th>
                                        <th class="tg-3wr7">Dosen</th>
                                        <th class="tg-3wr7">Mhs</th>
                                        <th class="tg-3wr7">Skor</th>
                                        <th class="tg-3wr7">Rerata</th>
                                        <th class="tg-3wr7">Kesimpulan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registrasiMatakuliahs as $regMk)
                                        <tr>
                                            <td class="tg-ti5e" width="5%">{{ $no++ }}</td>
                                            <td class="tg-rv4w" width="8%">{{ $regMk->jurusan }}</td>
                                            <td class="tg-ti5e" width="3%">{{ $regMk->semes }}</td>
                                            <td class="tg-rv4w" width="21%">{{ $regMk->kd_mk }} - {{ $regMk->matakuliah }}</td>
                                            <td class="tg-rv4w" width="18%">{{ $regMk->dosen }}</td>
                                            <td class="tg-ti5e" width="5%">{{ $regMk->registrasi_mahasiswa->count() }}</td>
                                            <td class="tg-ti5e" width="7%">{{ $regMk->skor }}</td>
                                            <td class="tg-ti5e" width="7%">{{ $regMk->rerata }}</td>
                                            <td class="tg-rv4w" width="10%">
                                                @if($regMk->rerata >= 28.0 AND $regMk->rerata <= 50.4)
                                                    Sangat Tidak Baik
                                                @elseif(($regMk->rerata >= 50.5 AND $regMk->rerata <= 72.8))
                                                    Tidak Baik
                                                @elseif(($regMk->rerata >= 72.9 AND $regMk->rerata <= 95.2))
                                                    Cukup Baik
                                                @elseif(($regMk->rerata >= 95.3 AND $regMk->rerata <= 117.6))
                                                    Baik
                                                @elseif(($regMk->rerata >= 117.7 AND $regMk->rerata <= 140.0))
                                                    Sangat Baik
                                                @else
                                                  Unknown  
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <br><br>

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td colspan="2" class="table-right">
                                            Banjarbaru, 
                                            @if(date('n') == 1)
                                                {{ date('d') }} Januari {{ date('Y') }}
                                            @elseif(date('n') == 2)
                                                {{ date('d') }} Februari {{ date('Y') }}
                                            @elseif(date('n') == 3)
                                                {{ date('d') }} Maret {{ date('Y') }}
                                            @elseif(date('n') == 4)
                                                {{ date('d') }} April {{ date('Y') }}
                                            @elseif(date('n') == 5)
                                                {{ date('d') }} Mei {{ date('Y') }}
                                            @elseif(date('n') == 6)
                                                {{ date('d') }} Juni {{ date('Y') }}
                                            @elseif(date('n') == 7)
                                                {{ date('d') }} Juli {{ date('Y') }}
                                            @elseif(date('n') == 8)
                                                {{ date('d') }} Agustus {{ date('Y') }}
                                            @elseif(date('n') == 9)
                                                {{ date('d') }} September {{ date('Y') }}
                                            @elseif(date('n') == 10)
                                                {{ date('d') }} Oktober {{ date('Y') }}
                                            @elseif(date('n') == 11)
                                                {{ date('d') }} November {{ date('Y') }}
                                            @else
                                                {{ date('d') }} Desember {{ date('Y') }}
                                            @endif
                                            <br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-left" width="80%">
                                            Direktur, <br><br><br><br>
                                            <u>Drs. H. Syahib Natarsyah, MM.M.Kom</u><br>
                                            NIP. 19560828 198503 1 001
                                        </td>
                                        <td class="table-left">
                                            Sekretaris, <br><br><br><br>
                                            <u>H. Sogiarto, M.Kom</u> <br>
                                            NIK. 1002 0106
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

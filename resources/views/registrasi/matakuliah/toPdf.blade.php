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
                    <div style="font-family:Arial; font-size:12px;">
                        <center>
                            <h3>
                                HASIL PENILAIAN KINERJA DOSEN STMIK BANJARBARU <br>
                                TAHUN AKADEMIK {{ $periode->name }}
                            </h3>
                        </center>
                    </div>
                    
                    <div class="">
                            <table class="tg">
                                <thead>
                                    <tr>
                                        <th class="tg-3wr7">No</th>
                                        <th class="tg-3wr7">Semeser</th>
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
                                            <td class="tg-rv4w" width="6%">{{ $regMk->semester }}</td>
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
                                        <td colspan="2" class="table-right">Banjarbaru, ................................... <br></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="table-center">
                                            Lembaga Jaminan Mutu (LJM) <br>
                                            STMIK BANJARBARU <br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-left" width="80%">
                                            Direktur, <br><br><br><br>
                                            (Nama....................................) <br>
                                            NIP/NIK..................................
                                        </td>
                                        <td class="table-left">
                                            Sekretaris, <br><br><br><br>
                                            (Nama....................................) <br>
                                            NIP/NIK..................................
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

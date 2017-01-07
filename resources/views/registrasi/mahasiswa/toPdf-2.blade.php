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

        .table  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
    </style>
    
    <style>
        .page-break {
            page-break-after: always;
        }
        
        .header,
        .footer {
            width: 100%;
            text-align: center;
            position: fixed;
        }
        .header {
            top: 0px;
        }
        .footer {
            bottom: 0px;
        }
        .pagenum:before {
            content: counter(page);
        }
    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div style="font-family:Arial; font-size:12px;">
        <center>
            <h3>
            HASIL PENILAIAN KINERJA DOSEN STMIK BANJARBARU <br>
            SEMESTER {{ strtoupper($reg->semester->jenis) }} TAHUN AKADEMIK {{ $reg->semester->periode->name }} <br>
            (Menurut Persepsi Mahasiswa)
            </h3>
        </center>
    </div>

    <table class="tg">
        <tbody>
            <tr>
                <td class="tg-rv4w" width="50%">No. Induk</td>
                <td class="tg-rv4w" width="50%">{{ $reg->dosen->no_induk }}</td>
            </tr>

            <tr>
                <td class="tg-rv4w" width="50%">Nama Dosen</td>
                <td class="tg-rv4w" width="50%">{{ $reg->dosen->name }}</td>
            </tr>

            <tr>
                <td class="tg-rv4w" width="50%">Nama Matakuliah yang diasuh</td>
                <td class="tg-rv4w" width="50%">{{ $reg->matakuliah_kd }} - {{ $reg->matakuliah->name }}</td>
            </tr>

            <tr>
                <td class="tg-rv4w" width="50%">Pada Semester</td>
                <td class="tg-rv4w" width="50%">{{ $reg->semes }}</td>
            </tr>

            <tr>
                <td class="tg-rv4w" width="50%">Program Studi</td>
                <td class="tg-rv4w" width="50%">{{ $reg->jurusan->name }}</td>
            </tr>

            <tr>
                <td class="tg-rv4w" width="50%">Tahun Akademik</td>
                <td class="tg-rv4w" width="50%">{{ $reg->semester->periode->name }}</td>
            </tr>

            <tr>
                <td class="tg-rv4w" width="50%">Jumlah Responden</td>
                <td class="tg-rv4w" width="50%">{{$reg->registrasi_mahasiswa->count() }}</td>
            </tr>

            <tr>
                <td class="tg-rv4w" width="50%">Nilai Rerata Kompetensi :</td>
                <td class="tg-rv4w" width="50%"></td>
            </tr>
            @foreach($nilai as $skor)
                <tr>
                    <td class="tg-rv4w" width="50%">{{ $skor->kompetensi }}</td>
                    <td class="tg-rv4w" width="50%"> : {{ $skor->rerataSkor }}</td>
                </tr>
            @endforeach

            <tr>
                <td class="tg-rv4w" width="50%">Rerata Nilai Total (RNT)</td>
                <td class="tg-rv4w" width="50%"> : {{ $nilai->sum('rerataSkor') }}</td>
            </tr>

            <tr>
                <td class="tg-rv4w" width="50%"><strong>KESIMPULAN AKHIR</strong></td>
                <td class="tg-rv4w" width="50%"> : 
                    @if($nilai->sum('rerataSkor') >= 28.0 AND $nilai->sum('rerataSkor') <= 50.4)
                        <strong>SANGAT TIDAK BAIK</strong>
                    @elseif(($nilai->sum('rerataSkor') >= 50.5 AND $nilai->sum('rerataSkor') <= 72.8))
                        <strong>TIDAK BAIK</strong>
                    @elseif(($nilai->sum('rerataSkor') >= 72.9 AND $nilai->sum('rerataSkor') <= 95.2))
                        <strong>CUKUP BAIK</strong>
                    @elseif(($nilai->sum('rerataSkor') >= 95.3 AND $nilai->sum('rerataSkor') <= 117.6))
                        <strong>BAIK</strong>
                    @elseif(($nilai->sum('rerataSkor') >= 117.7 AND $nilai->sum('rerataSkor') <= 140.0))
                        <strong>SANGAT BAIK</strong>
                    @else
                      <strong>UNKNOWN</strong>  
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <div class="page-break"></div>

    <div style="font-family:Arial; font-size:12px; text-align:center;">
        <h3>TABEL TABULASI DATA RESPONDEN </h3>
    </div>

    <table class="tg">
        <thead>
            <tr>
                <th class="tg-3wr7">No</th>
                <th class="tg-3wr7">Aspek</th>
                @php
                    $n1 = 1;
                @endphp
                @foreach($masterSkor[0]->skor_mhs as $mhs)
                    <th class="tg-3wr7">{{ $n1++ }}</th>
                @endforeach
                <th class="tg-3wr7">TotNil</th>
                <th class="tg-3wr7">Rerata</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totNilai = 0;
                $rerata = 0;
            @endphp 

            @foreach($masterSkor as $aspek)
                @php
                    $totNilai += $aspek->skor_mhs->sum('skor');
                    $rerata += round($aspek->skor_mhs->sum('skor')/$aspek->skor_mhs->count(), 2);
                @endphp 

                <tr>
                    <td class="tg-rv4w" width="2%">{{ $no++ }}</td>
                    <td class="tg-rv4w" width="20%">{{ $aspek->kompetensi->name }} - {{ $aspek->name }}</td>
                    @foreach($aspek->skor_mhs as $skor)
                        <td class="tg-ti5e">{{ $skor->pivot->skor }}</td>
                    @endforeach
                    <td class="tg-ti5e" width="4%">{{ $aspek->skor_mhs->sum('skor') }}</td>
                    <td class="tg-ti5e" width="5%">{{ round($aspek->skor_mhs->sum('skor')/$aspek->skor_mhs->count(), 2) }}</td>
                </tr>
            @endforeach
                <tr>
                    <td class="tg-ti5e" colspan="2"><strong>TOTAL</strong></td>
                    @foreach($masterSumSkor as $sum)
                        <td class="tg-ti5e"><strong>{{ $sum->sumSkor }}</strong></td>
                    @endforeach
                    <td class="tg-ti5e"><strong>{{ $totNilai }}</strong></td>
                    <td class="tg-ti5e"><strong>{{ $rerata }}</strong></td>
                </tr>
                <tr>
                    <td colspan="{{ $masterSkor[0]->skor_mhs->count()+4 }}" class="tg-ti5e">
                        <strong>KESIMPULAN AKHIR = </strong>
                        @if($rerata >= 28.0 AND $rerata <= 50.4)
                            <strong>SANGAT TIDAK BAIK</strong>
                        @elseif(($rerata >= 50.5 AND $rerata <= 72.8))
                            <strong>TIDAK BAIK</strong>
                        @elseif(($rerata >= 72.9 AND $rerata <= 95.2))
                            <strong>CUKUP BAIK</strong>
                        @elseif(($rerata >= 95.3 AND $rerata <= 117.6))
                            <strong>BAIK</strong>
                        @elseif(($rerata >= 117.7 AND $rerata <= 140.0))
                            <strong>SANGAT BAIK</strong>
                        @else
                          <strong>UNKNOWN</strong>  
                        @endif
                    </td>
                </tr>
        </tbody>
    </table>
</body>
</html>

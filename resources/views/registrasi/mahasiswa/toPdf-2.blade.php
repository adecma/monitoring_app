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
        .tg .tg-ti5b{font-weight: bold; font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
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
                    <td class="tg-rv4w" width="50%">
                        @if($skor->kompetensi_id == 1)
                            @if($skor->rerataSkor >= 9.0 AND $skor->rerataSkor <= 16.2)
                                : {{ $skor->rerataSkor }}  (Sangat Tidak Baik)
                            @elseif($skor->rerataSkor >= 16.3 AND $skor->rerataSkor <= 23.4)
                                : {{ $skor->rerataSkor }}  (Tidak Baik)
                            @elseif($skor->rerataSkor >= 23.5 AND $skor->rerataSkor <= 30.6)
                                : {{ $skor->rerataSkor }}  (Cukup Baik)
                            @elseif($skor->rerataSkor >= 30.7 AND $skor->rerataSkor <= 37.8)
                                : {{ $skor->rerataSkor }}  (Baik)
                            @elseif($skor->rerataSkor >= 37.9 AND $skor->rerataSkor <= 45.0)
                                : {{ $skor->rerataSkor }}  (Sangat Baik)
                            @else
                                : {{ $skor->rerataSkor }}  (Unknown)
                            @endif                            
                        @elseif($skor->kompetensi_id == 2)
                            @if($skor->rerataSkor >= 8.0 AND $skor->rerataSkor <= 14.4)
                                : {{ $skor->rerataSkor }}  (Sangat Tidak Baik)
                            @elseif($skor->rerataSkor >= 14.5 AND $skor->rerataSkor <= 20.8)
                                : {{ $skor->rerataSkor }}  (Tidak Baik)
                            @elseif($skor->rerataSkor >= 20.9 AND $skor->rerataSkor <= 27.2)
                                : {{ $skor->rerataSkor }}  (Cukup Baik)
                            @elseif($skor->rerataSkor >= 27.3 AND $skor->rerataSkor <= 33.6)
                                : {{ $skor->rerataSkor }}  (Baik)
                            @elseif($skor->rerataSkor >= 33.7 AND $skor->rerataSkor <= 40.0)
                                : {{ $skor->rerataSkor }}  (Sangat Baik)
                            @else
                                : {{ $skor->rerataSkor }}  (Unknown)
                            @endif
                        @elseif($skor->kompetensi_id == 3)
                            @if($skor->rerataSkor >= 6.0 AND $skor->rerataSkor <= 10.8)
                                : {{ $skor->rerataSkor }}  (Sangat Tidak Baik)
                            @elseif($skor->rerataSkor >= 10.9 AND $skor->rerataSkor <= 15.6)
                                : {{ $skor->rerataSkor }}  (Tidak Baik)
                            @elseif($skor->rerataSkor >= 15.7 AND $skor->rerataSkor <= 20.4)
                                : {{ $skor->rerataSkor }}  (Cukup Baik)
                            @elseif($skor->rerataSkor >= 20.5 AND $skor->rerataSkor <= 25.2)
                                : {{ $skor->rerataSkor }}  (Baik)
                            @elseif($skor->rerataSkor >= 25.3 AND $skor->rerataSkor <= 30.0)
                                : {{ $skor->rerataSkor }}  (Sangat Baik)
                            @else
                                : {{ $skor->rerataSkor }}  (Unknown)
                            @endif
                        @elseif($skor->kompetensi_id == 4)
                            @if($skor->rerataSkor >= 5.0 AND $skor->rerataSkor <= 9.0)
                                : {{ $skor->rerataSkor }}  (Sangat Tidak Baik)
                            @elseif($skor->rerataSkor >= 9.1 AND $skor->rerataSkor <= 13.0)
                                : {{ $skor->rerataSkor }}  (Tidak Baik)
                            @elseif($skor->rerataSkor >= 13.1 AND $skor->rerataSkor <= 17.0)
                                : {{ $skor->rerataSkor }}  (Cukup Baik)
                            @elseif($skor->rerataSkor >= 17.1 AND $skor->rerataSkor <= 21.0)
                                : {{ $skor->rerataSkor }}  (Baik)
                            @elseif($skor->rerataSkor >= 21.1 AND $skor->rerataSkor <= 25.0)
                                : {{ $skor->rerataSkor }}  (Sangat Baik)
                            @else
                                : {{ $skor->rerataSkor }}  (Unknown)
                            @endif
                        @else
                            : {{ $skor->rerataSkor }}  (Unknown)
                        @endif                         
                    </td>
                </tr>
            @endforeach

            <tr>
                <td class="tg-rv4w" width="50%">Rerata Nilai Total (RNT)</td>
                <td class="tg-rv4w" width="50%"> : {{ round($nilai->sum('rerataSkor'),2) }}</td>
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
                $kompetensiSkor = 'A';
                $batas = 0;

                $arr_a = array();
                $arr_b = array();
                $bb = 0;
                $arr_c = array();
                $cc = 0;
                $t = 0;
                $u = 0;
            @endphp 

            @foreach($masterSkor as $aspek)
                @php
                    $totNilai += $aspek->skor_mhs->sum('skor');
                    $rerata += round($aspek->skor_mhs->sum('skor')/$aspek->skor_mhs->count(), 2);
                @endphp 

                <tr>
                    <td class="tg-rv4w" width="2%">{{ $no++ }}</td>
                    <td class="tg-rv4w" width="20%">{{ $aspek->name }}</td>
                    @foreach($aspek->skor_mhs as $skor)
                        @php
                            $arr_a[$t][$u] = $skor->pivot->skor;
                        @endphp

                        <td class="tg-ti5e">{{ $arr_a[$t][$u] }}</td>

                        @php
                            $t++;
                        @endphp
                    @endforeach

                    @php
                        $u++;
                        $t = 0;

                        $arr_b[$bb] = $aspek->skor_mhs->sum('skor');
                        $arr_c[$cc] = $aspek->skor_mhs->sum('skor')/$aspek->skor_mhs->count();
                    @endphp

                    <td class="tg-ti5e" width="4%">{{ $arr_b[$bb] }}</td>
                    <td class="tg-ti5e" width="5%">{{ round($arr_c[$cc],2) }}</td>

                    @php
                        $bb++;
                        $cc++;
                    @endphp
                </tr>

                <!-- Baris sub total skor/kompetensi -->
                @for ($s = 0; $s < count($kompetensis); $s++)
                    @php
                        $batas += $kompetensis[$s]->countAspek;
                    @endphp

                    @if($loop->iteration == $batas)
                        <tr>
                            @php
                                $f = 0;
                            @endphp


                            <td class="tg-ti5b" colspan="2">Skor {{ $kompetensiSkor++ }}</td>
                            @foreach($aspek->skor_mhs as $skor)
                                <td class="tg-ti5b">{{ array_sum($arr_a[$f]) }}</td>

                                @php
                                    $f++;
                                @endphp
                            @endforeach
                            
                            
                            <td class="tg-ti5b">{{ array_sum($arr_b) }}</td>
                            <td class="tg-ti5b">
                                @php
                                    $sumSubRerata = round(array_sum($arr_c),2);
                                @endphp
                                {{ $sumSubRerata }}

                                <br>

                                @if($kompetensis[$s]->id == 1)
                                    @if($sumSubRerata >= 9.0 AND $sumSubRerata <= 16.2)
                                        (Sangat Tidak Baik)
                                    @elseif($sumSubRerata >= 16.3 AND $sumSubRerata <= 23.4)
                                        (Tidak Baik)
                                    @elseif($sumSubRerata >= 23.5 AND $sumSubRerata <= 30.6)
                                        (Cukup Baik)
                                    @elseif($sumSubRerata >= 30.7 AND $sumSubRerata <= 37.8)
                                        (Baik)
                                    @elseif($sumSubRerata >= 37.9 AND $sumSubRerata <= 45.0)
                                        (Sangat Baik)
                                    @else
                                        (Unknown)
                                    @endif                            
                                @elseif($kompetensis[$s]->id == 2)
                                    @if($sumSubRerata >= 8.0 AND $sumSubRerata <= 14.4)
                                        (Sangat Tidak Baik)
                                    @elseif($sumSubRerata >= 14.5 AND $sumSubRerata <= 20.8)
                                        (Tidak Baik)
                                    @elseif($sumSubRerata >= 20.9 AND $sumSubRerata <= 27.2)
                                        (Cukup Baik)
                                    @elseif($sumSubRerata >= 27.3 AND $sumSubRerata <= 33.6)
                                        (Baik)
                                    @elseif($sumSubRerata >= 33.7 AND $sumSubRerata <= 40.0)
                                        (Sangat Baik)
                                    @else
                                        (Unknown)
                                    @endif
                                @elseif($kompetensis[$s]->id == 3)
                                    @if($sumSubRerata >= 6.0 AND $sumSubRerata <= 10.8)
                                        (Sangat Tidak Baik)
                                    @elseif($sumSubRerata >= 10.9 AND $sumSubRerata <= 15.6)
                                        (Tidak Baik)
                                    @elseif($sumSubRerata >= 15.7 AND $sumSubRerata <= 20.4)
                                        (Cukup Baik)
                                    @elseif($sumSubRerata >= 20.5 AND $sumSubRerata <= 25.2)
                                        (Baik)
                                    @elseif($sumSubRerata >= 25.3 AND $sumSubRerata <= 30.0)
                                        (Sangat Baik)
                                    @else
                                        (Unknown)
                                    @endif
                                @elseif($kompetensis[$s]->id == 4)
                                    @if($sumSubRerata >= 5.0 AND $sumSubRerata <= 9.0)
                                        (Sangat Tidak Baik)
                                    @elseif($sumSubRerata >= 9.1 AND $sumSubRerata <= 13.0)
                                        (Tidak Baik)
                                    @elseif($sumSubRerata >= 13.1 AND $sumSubRerata <= 17.0)
                                        (Cukup Baik)
                                    @elseif($sumSubRerata >= 17.1 AND $sumSubRerata <= 21.0)
                                        (Baik)
                                    @elseif($sumSubRerata >= 21.1 AND $sumSubRerata <= 25.0)
                                        (Sangat Baik)
                                    @else
                                        (Unknown)
                                    @endif
                                @else
                                    (Unknown)
                                @endif
                            </td>

                            <!-- reset var $arr_a setelah dijumlahkan -->
                            @php
                                $arr_a = array();
                                $arr_b = array();
                                $arr_c = array();
                            @endphp
                        </tr>
                    @endif                    
                @endfor
                <!-- reset batas iterasi -->
                @php
                    $batas = 0;
                @endphp                
            @endforeach
                <tr>
                    <td class="tg-ti5e" colspan="2"><strong>TOTAL SKOR (A s/d D)</strong></td>
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

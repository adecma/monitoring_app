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
                        <center><h3>Laporan Kuisioner Matakuliah</h3></center>
                        <p class="text-center">
                            <span class="label label-success">{{ $reg->semester->periode->name }}</span>
                            <span class="label label-success">{{ $reg->semester->jenis }}</span>

                            <br>

                            <span class="label label-default">{{ $reg->jurusan->name }}</span>
                            <span class="label label-primary">{{ $reg->semes }}</span>
                            <span class="label label-info">{{ $reg->matakuliah_kd }}</span>
                            <span class="label label-info">{{ $reg->matakuliah->name }}</span>
                            <span class="label label-warning">{{ $reg->dosen->name }}</span>
                        </p>
                    </div>
                    
                    <div class="">
                            <table class="tg">
                                <thead>
                                    <tr>
                                        <th class="tg-3wr7">No</th>
                                        <th class="tg-3wr7">NIM</th>
                                        <th class="tg-3wr7">Name</th>
                                        <th class="tg-3wr7">Skor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mahasiswas as $mhs)
                                        <tr>
                                            <td class="tg-rv4w" width="5%">{{ $no++ }}</td>
                                            <td class="tg-rv4w" width="30%">{{ $mhs->no_induk }}</td>
                                            <td class="tg-rv4w" width="55%">{{ $mhs->name }}</td>
                                            <td class="tg-rv4w" width="10%">{{ $mhs->skor }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

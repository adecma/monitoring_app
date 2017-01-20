@extends('layouts.app')

@section('heading', '<h4>Selamat Datang</h4><hr>')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    Hai {{ Auth::user()->name }}, Anda telah berhasil masuk.

                    <hr>

                    <p class="text-center">
                        <img src="/images/2.jpg" style="height:250px; margin:0 auto; display: inline;" alt="STMIK Banjarbaru" class="img-responsive">
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

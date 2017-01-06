@extends('layouts.app')

@section('heading', '<h4>Selamat Datang</h4><hr>')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    Hai {{ Auth::user()->name }}, Anda telah berhasil masuk.
                </div>
            </div>
        </div>
    </div>
@endsection

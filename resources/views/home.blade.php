@extends('layouts.app')

@section('heading', '<h4>Dashboard</h4><hr>')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    Hello {{ Auth::user()->name }}, You are logged in!
                </div>
            </div>
        </div>
    </div>
@endsection

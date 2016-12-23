@extends('layouts.app_clean')

<!-- Main Content -->
@section('content')
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Reset Password</h3>
        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-lg btn-success btn-block">Send Password Reset Link</button>
            </form>

            <hr>
            
            <div class="text-center">
                <a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Back to Login page</a>
            </div>
        </div>
    </div>
@endsection

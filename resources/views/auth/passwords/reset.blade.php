@extends('layouts.app')

@section('content')

<article class="msg-block">
    <h1 class="msc-block__title">
        Reset Password
    </h1>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">


        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-3 control-label">E-Mail Address</label>
            <div class="col-sm-9">
                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-3 control-label">Password</label>
            <div class="col-sm-9">
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password-confirm" class="col-md-3 control-label">Confirm Password</label>
            <div class="col-sm-9">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-9 offset-md-3">
              <button type="submit" class="btn btn-primary">
                Reset Password
            </button>
        </div>
    </div>
</form>
</article>
@endsection

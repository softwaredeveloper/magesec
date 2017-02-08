@extends('layouts.app')

@section('content')

<article class="msc-block ">
    <h1 class="msc-block__title">
        Login
    </h1>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="col-sm-3 col-form-label">E-Mail Address</label>
          <div class="col-sm-9 {{ $errors->has('name') ? ' has-error' : '' }}">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password" class="col-sm-3 col-form-label">Password</label>
      <div class="col-sm-9 {{ $errors->has('password') ? ' has-error' : '' }}">
          <input id="password" type="password" class="form-control" name="password" required>

          @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group row">
  <div class="offset-sm-3 col-sm-9">
    <div class="checkbox">
        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label>
    </div>
</div>
</div>
<div class="form-group row">
  <div class="offset-sm-3 col-sm-9">
    <button type="submit" class="btn btn-primary">
        Login
    </button>

    <a class="btn btn-link" href="{{ url('/password/reset') }}">
        Forgot Your Password?
    </a>
</div>
</div>
</form>
</article>


@endsection

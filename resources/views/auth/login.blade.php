@extends('layouts.app')

@section('content')

<article class="msc-block ">
  <h1 class="msc-block__title">
    Login
  </h1>
  @if ($errors->has('email'))
  <div class="alert alert-danger alert-dismissible show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{ $errors->first('email') }}
  </div>
  @endif
  @if ($errors->has('password'))
  <div class="alert alert-danger alert-dismissible show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{ $errors->first('password') }}
  </div>
  @endif
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email" class="col-sm-3 col-form-label">E-Mail Address</label>
      <div class="col-sm-9 {{ $errors->has('name') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

      </div>
    </div>
    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password" class="col-sm-3 col-form-label">Password</label>
      <div class="col-sm-9 {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" name="password" required>
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

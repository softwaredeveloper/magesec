@extends('layouts.app')

@section('content')
<article class="msc-block ">
    <h1 class="msc-block__title">
        Register
    </h1>
    @if ($errors->has('name'))
    <div class="alert alert-danger alert-dismissible show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      {{ $errors->first('name') }}
  </div>
  @endif

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


<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
    <div class="form-group row">
      <label for="name" class="col-sm-3 col-form-label">Name</label>
      <div class="col-sm-9 {{ $errors->has('name') ? ' has-error' : '' }}">
          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

      </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-3 col-form-label">E-Mail</label>
    <div class="col-sm-9">
        <input id="email" class="form-control" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-sm-3 col-form-label">Password</label>
    <div class="col-sm-9 {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" name="password" required>
    </div>
</div>
<div class="form-group row">
    <label for="password-confirm" class="col-sm-3 col-form-label">Confirm Password</label>
    <div class="col-sm-9">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</div>
<div class="form-group row">
  <div class="offset-sm-3 col-sm-9">
    <button type="submit" class="btn btn-primary">
        Register
    </button>
</div>
</div>
</form>
</article>
@endsection

@extends('layouts.app')

<!-- Main Content -->
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

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

        @if ($errors->has('email'))
        <div class="alert alert-danger alert-dismissible show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $errors->first('email') }}
        </div>
        @endif
        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-3 control-label">E-Mail Address</label>
            <div class="col-sm-9">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-9 offset-md-3">
              <button type="submit" class="btn btn-primary">
                Send Password Reset Link
            </button>
            </div>
        </div>
    </form>
</article>
@endsection

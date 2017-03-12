@extends('layouts.email')

@section('content')
Name: {{ $name }}
<br/>
Email: {{ $email }}
<br/>
<br/>
{{ $body }}
@endsection
@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              Contribute Rules
            </h1>

<div class="msc-block-info">
<form name="rule" method="post" action="/scanner-rule-submit">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
Rule Name:<input type="text" name="name" size="20" maxchar="20"/>
<br/>Rule:<textarea name="rule"></textarea>
<input type="submit" value="Submit New Rule"/>
</form>
</div>
</article>
@endsection
@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              Edit Rule
            </h1>


@if ($errors->any())
        {{ implode('', $errors->all(':message')) }}
        <br/>
        <br/>
@endif


<div class="msc-block-info">
<form name="rule" method="post" action="/rule-save">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="entity_id" value="{{ $rule->entity_id }}">
Rule Name: <input type="text" name="name" size="20" maxchar="20" value="{{ $rule->name }}"/>
<br/>
Rule:<textarea name="rule">{{ $rule->rule }}</textarea>
<br/>
@if ($admin === 1)
  Approved:
  <input type="radio" name="approved" value="1" @if ($rule->approved_by !== 0) checked @endif> Yes
  <input type="radio" name="approved" value="0" @if ($rule->approved_by === 0) checked @endif> No
  <br/>
  Approved By: TODO
  <br/>
  Active:
  <input type="radio" name="active" value="1" @if ($rule->active === 1) checked @endif> Yes
  <input type="radio" name="active" value="0" @if ($rule->active === 0) checked @endif> No
  <br/>
  Type:
  <input type="radio" name="type" value="STANDARD" @if ($rule->type === 'STANDARD') checked @endif> Standard
  <input type="radio" name="type" value="DEEP" @if ($rule->type === 'DEEP') checked @endif> Deep
  <br/>
@endif
<input type="submit" value="Submit Rule"/>
</form>
</div>
</article>
@endsection
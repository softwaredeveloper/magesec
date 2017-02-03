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
<table>
<tr>
<td>Rule Name:</td>
<td><input type="text" name="name" size="20" maxchar="20" value="{{ $rule->name }}"/></td>
</tr>
@if ($admin === 1)
  <tr>
  <td>Approved:</td>
  <td>
  <input type="radio" name="approved" value="1" @if ($rule->approved_by !== 0) checked @endif> Yes
  <input type="radio" name="approved" value="0" @if ($rule->approved_by === 0) checked @endif> No
  </td>
  </tr>
  <tr>
  <td>Approved By:</td>
  <td>{{ $authorizedby }}</td>
  </tr>
  <tr>
  <td>Active:</td>
  <td>
  <input type="radio" name="active" value="1" @if ($rule->active === 1) checked @endif> Yes
  <input type="radio" name="active" value="0" @if ($rule->active === 0) checked @endif> No
  </td>
  </tr>
  <tr>
  <td>Type:</td>
  <td>
  <input type="radio" name="type" value="STANDARD" @if ($rule->type === 'STANDARD') checked @endif> Standard
  <input type="radio" name="type" value="DEEP" @if ($rule->type === 'DEEP') checked @endif> Deep
  <input type="radio" name="type" value="VULNERABILITY" @if ($rule->type === 'VULNERABILITY') checked @endif> Vulnerability
  </td>
  </tr>
@endif
<tr>
<td valign="top">Rule:</td>
<td><textarea rows="5" cols="50" name="rule">{{ $rule->rule }}</textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Submit Rule"/></td>
</tr>
</table>
</form>
</div>
</article>
@endsection
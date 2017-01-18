@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              Edit Whitelist
            </h1>


@if ($errors->any())
        {{ implode('', $errors->all(':message')) }}
        <br/>
        <br/>
@endif


<div class="msc-block-info">
<form name="rule" method="post" action="/whitelist-save">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="entity_id" value="{{ $rule->entity_id }}">
<table>
<tr>
<td>Application:</td>
<td><input type="text" name="application" size="20" maxchar="20" value="{{ $rule->application }}"/></td>
</tr>
<tr>
<td>Version:</td>
<td><input type="text" name="version" size="20" maxchar="20" value="{{ $rule->version }}"/></td>
</tr>
<tr>
<td>Filepath:</td>
<td><input type="text" name="filepath" size="20" maxchar="20" value="{{ $rule->filepath }}"/></td>
</tr>
<tr>
<td>Hash:</td>
<td><input type="text" name="hash" size="20" maxchar="20" value="{{ $rule->hash }}"/></td>
</tr>
<tr>
<td>Filesize:</td>
<td><input type="text" name="filesize" size="20" maxchar="20" value="{{ $rule->filesize }}"/></td>
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
@endif
<tr>
<td valign="top">Justification:</td>
<td><textarea rows="5" cols="50" name="justification">{{ $rule->justification }}</textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Submit Whitelist"/></td>
</tr>
</table>
</form>
</div>
</article>
@endsection
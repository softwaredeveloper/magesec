@extends('layouts.app')

@section('content')
<article class="msc-block">
<h1 class="msc-block__title">
Rules Pending Approval
</h1>
<div class="msc-block-info">
<table width="100%" border="1">
<tr>
<td>Name</td>
<td>Created</td>
<td>Updated</td>
<td>Actions</td>
</tr>
@foreach ($pending_rules as $rule)
  <tr>
  <td>{{ $rule->name }}</td>
  <td>{{ $rule->created_at }}</td>
  <td>{{ $rule->updated_at }}</td>
  <td>Approve / Reject</td>
  </tr>
@endforeach
</table>
</div>
</article>
@endsection

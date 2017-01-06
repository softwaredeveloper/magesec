@extends('layouts.app')

@section('content')
<article class="msc-block">
<h1 class="msc-block__title">
Rules I've Submitted
</h1>
<div class="msc-block-info">
<table width="100%" border="1">
<tr>
<td>Name</td>
<td>Created</td>
<td>Updated</td>
<td>Type</td>
<td>Status</td>
<td>Actions</td>
</tr>
@foreach ($my_rules as $rule)
  <tr>
  <td>{{ $rule->name }}</td>
  <td>{{ $rule->created_at }}</td>
  <td>{{ $rule->updated_at }}</td>
  <td>{{ $rule->type }}</td>
  @if ($rule->active === 1)
    <td>Approved</td>
  @elseif ($rule->rejected === 1)
    <td>Rejected</td>
  @else
    <td>Under Review</td>
  @endif
  <td><a href="/rule-edit?entity_id={{ $rule->entity_id }}">Edit</a></td>
  </tr>
@endforeach
</table>
</div>
</article>
@endsection

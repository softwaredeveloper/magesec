@extends('layouts.app')

@section('content')
@include('account')
<article class="msc-block">
<h1 class="msc-block__title">
Rules I've Submitted
</h1>
<div class="msc-block-info">
<table width="100%" border="1">
<tr>
<td><strong>Name</strong></td>
<td><strong>Created</strong></td>
<td><strong>Updated</strong></td>
<td><strong>Type</strong></td>
<td><strong>Status</strong></td>
<td><strong>Actions</strong></td>
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
{{ $my_rules->render() }}
</div>
</article>
<article class="msc-block">
<h1 class="msc-block__title">
Whitelist Rules I've Submitted
</h1>
<div class="msc-block-info">
<table width="100%" border="1">
<tr>
<td><strong>Filepath</strong></td>
<td><strong>Created</strong></td>
<td><strong>Updated</strong></td>
<td><strong>Status</strong></td>
<td><strong>Actions</strong></td>
</tr>
@foreach ($my_whitelist as $whitelist)
  <tr>
  <td>{{ $whitelist->filepath }}</td>
  <td>{{ $whitelist->created_at }}</td>
  <td>{{ $whitelist->updated_at }}</td>
  @if ($whitelist->active === 1)
    <td>Approved</td>
  @elseif ($whitelist->rejected === 1)
    <td>Rejected</td>
  @else
    <td>Under Review</td>
  @endif
  <td><a href="/whitelist-edit?entity_id={{ $whitelist->entity_id }}">Edit</a></td>
  </tr>
@endforeach
</table>
{{ $my_whitelist->render() }}
</div>
</article>
@endsection

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
  <td><a href="/rule-edit?entity_id={{ $rule->entity_id }}">Edit</a> |
    <a href="/rule-approve?entity_id={{ $rule->entity_id }}&approve=1">Approve</a> |
    <a href="/rule-approve?entity_id={{ $rule->entity_id }}&approve=0">Reject</a></td>
  </tr>
@endforeach
</table>
</div>
</article>
<article class="msc-block">
<h1 class="msc-block__title">
All Rules
</h1>
<div class="msc-block-info">
<table width="100%" border="1">
<tr>
<td>Name</td>
<td>Created</td>
<td>Updated</td>
<td>Actions</td>
</tr>
@foreach ($all_rules as $rule)
  <tr>
  <td>{{ $rule->name }}</td>
  <td>{{ $rule->created_at }}</td>
  <td>{{ $rule->updated_at }}</td>
  <td><a href="/rule-edit?entity_id={{ $rule->entity_id }}">Edit</a></td>
  </tr>
@endforeach
</table>
{{ $all_rules->render() }}
</div>
</article>
@endsection

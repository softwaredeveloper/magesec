@extends('layouts.app')

@section('content')
@include('account')
<article class="msc-block">
<h1 class="msc-block__title">
Rules Pending Approval
</h1>
<div class="msc-block-info">
<table width="100%" border="1">
<tr>
<td><strong>Name</strong></td>
<td><strong>Created</strong></td>
<td><strong>Updated</strong></td>
<td><strong>Actions</strong></td>
</tr>
@foreach ($pending_rules as $rule)
  <tr>
  <td>{{ $rule->name }}</td>
  <td>{{ $rule->created_at }}</td>
  <td>{{ $rule->updated_at }}</td>
  <td><a href="/rule-edit?entity_id={{ $rule->entity_id }}">Edit</a>&nbsp;|&nbsp;<a href="/rule-approve?entity_id={{ $rule->entity_id }}&approve=1">Approve</a>&nbsp;|&nbsp;<a href="/rule-approve?entity_id={{ $rule->entity_id }}&approve=0">Reject</a></td>
  </tr>
@endforeach
</table>
</div>
</article>
<article class="msc-block">
<h1 class="msc-block__title">
Whitelists Pending Approval
</h1>
<div class="msc-block-info">
<table width="100%" border="1">
<tr>
<td><strong>Filepath</strong></td>
<td><strong>Created</strong></td>
<td><strong>Updated</strong></td>
<td><strong>Actions</strong></td>
</tr>
@foreach ($pending_whitelist as $whitelist)
  <tr>
  <td>{{ $whitelist->filepath }}</td>
  <td>{{ $whitelist->created_at }}</td>
  <td>{{ $whitelist->updated_at }}</td>
  <td><a href="/whitelist-edit?entity_id={{ $whitelist->entity_id }}">Edit</a>&nbsp;|&nbsp;<a href="/whitelist-approve?entity_id={{ $whitelist->entity_id }}&approve=1">Approve</a>&nbsp;|&nbsp;<a href="/whitelist-approve?entity_id={{ $whitelist->entity_id }}&approve=0">Reject</a></td>
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
<td><strong>Name</strong></td>
<td><strong>Created</strong></td>
<td><strong>Updated</strong></td>
<td><strong>Status</strong></td>
<td><strong>Actions</strong></td>
</tr>
@foreach ($all_rules as $rule)
  <tr>
  <td>{{ $rule->name }}</td>
  <td>{{ $rule->created_at }}</td>
  <td>{{ $rule->updated_at }}</td>
  <td>
    @if ($rule->rejected === 1)
      Rejected
    @elseif ($rule->active === 1)
      Active
    @else
      Pending
    @endif
  </td>
  <td><a href="/rule-edit?entity_id={{ $rule->entity_id }}">Edit</a></td>
  </tr>
@endforeach
</table>
{{ $all_rules->render() }}
</div>
</article>
<article class="msc-block">
<h1 class="msc-block__title">
All Whitelists
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
@foreach ($all_whitelist as $rule)
  <tr>
  <td>{{ $rule->filepath }}</td>
  <td>{{ $rule->created_at }}</td>
  <td>{{ $rule->updated_at }}</td>
  <td>
    @if ($rule->rejected === 1)
      Rejected
    @elseif ($rule->active === 1)
      Active
    @else
      Pending
    @endif
  </td>
  <td><a href="/whitelist-edit?entity_id={{ $rule->entity_id }}">Edit</a></td>
  </tr>
@endforeach
</table>
{{ $all_whitelist->render() }}
</div>
</article>
@endsection

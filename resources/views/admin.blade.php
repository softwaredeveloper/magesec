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
@foreach ($pending_whitelist as $rule)
  <tr>
  <td>{{ $rule->filepath }}</td>
  <td>{{ $rule->created_at }}</td>
  <td>{{ $rule->updated_at }}</td>
  <td><a href="/whitelist-edit?entity_id={{ $rule->entity_id }}">Edit</a>&nbsp;|&nbsp;<a href="/whitelist-approve?entity_id={{ $rule->entity_id }}&approve=1">Approve</a>&nbsp;|&nbsp;<a href="/whitelist-approve?entity_id={{ $rule->entity_id }}&approve=0">Reject</a></td>
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
<form name="whitelist" action="" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<span class="msc-block-info"><strong>Search by Name:</strong></span>
<input type="text" name="rulename" size="30" maxchar="50">
<input type="submit" value="Search">
</form>
<br/>
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
Whitelist Search
</h1>
<form name="whitelist" action="" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
<tr>
<td><strong>Filename:</strong></td>
<td><input type="text" name="file" size="30" machar="500" value=""></td>
</tr>
<tr>
<td><strong>Hash:</strong></td>
<td><input type="text" name="hash" size="50" machar="50" value=""></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Search Whitelist"></td>
</tr>
</table>
</form>
<br/>
@if (count(@whitelist) > 0)
  <table width="100%" border="1">
  <tr>
  <td><strong>Filename</strong></td>
  <td><strong>Created</strong></td>
  <td><strong>Updated</strong></td>
  <td><strong>Status</strong></td>
  <td><strong>Actions</strong></td>
  </tr>
  @foreach ($whitelist as $rule)
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
  {{ $whitelist->render() }}
@endif
</article>
@endsection

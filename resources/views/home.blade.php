@extends('layouts.app')

@section('content')
@include('account')
<article class="msc-block msc-block--highlight">
  <h1 class="msc-block__title">
    Rules I've Submitted
  </h1>
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th><strong>Name</strong></th>
          <th><strong>Created</strong></th>
          <th><strong>Updated</strong></th>
          <th><strong>Type</strong></th>
          <th><strong>Status</strong></th>
          <th><strong>Actions</strong></th>
        </tr>
      </thead>
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
  <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th><strong>Filepath</strong></th>
        <th><strong>Created</strong></th>
        <th><strong>Updated</strong></th>
        <th><strong>Status</strong></th>
        <th><strong>Actions</strong></th>
      </tr>
    </thead>
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

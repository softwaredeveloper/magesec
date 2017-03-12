@extends('layouts.app')

@section('content')
@include('account')
<article class="msc-block">
  <h1 class="msc-block__title">
    Rules Pending Approval
  </h1>
  <div class="msc-block-info">
    <div class="table-responsive">
      <table width="100%" border="1" class="table table-bordered table-striped table-hover">
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
  </div>
</article>
<article class="msc-block">
  <h1 class="msc-block__title">
    Whitelists Pending Approval
  </h1>
  <div class="msc-block-info">
    <div class="table-responsive">
      <table width="100%" border="1" class="table table-bordered table-striped table-hover">
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
  </div>
</article>
<article class="msc-block">
  <h1 class="msc-block__title">
    All Rules
  </h1>
  <div class="msc-block-info">
    <form name="whitelist" action="" method="POST">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group row">
        <label for="rulename" class="col-sm-3 col-form-label">Search by Name:</label>
        <div class="col-sm-9">
          <div class="input-group">
            <input type="text" name="rulename" id="rulename" size="30" maxchar="50" class="form-control"> 
            <span class="input-group-btn">
              <input type="submit" value="Search" class="btn btn-primary">
            </span>
          </div>
        </div>
      </div>      
    </form>
    <div class="table-responsive">
      <table width="100%" border="1" class="table table-bordered table-hover">
      <thead class="thead-default">
          <tr>
            <td><strong>Name</strong></td>
            <td><strong>Created</strong></td>
            <td><strong>Updated</strong></td>
            <td><strong>Status</strong></td>
            <td><strong>Actions</strong></td>
          </tr>
        </thead>
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
  </div>
</article>
<article class="msc-block">
  <h1 class="msc-block__title">
    Whitelist Search
  </h1>
  <form name="whitelist" action="" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group row">
      <label for="filename" class="col-sm-3 col-form-label">Filename:</label>
      <div class="col-sm-9">
        <input id="filename" type="text" name="file" size="30" machar="500" value="" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <label for="hash" class="col-sm-3 col-form-label">Hash:</label>
      <div class="col-sm-9">
        <input type="text" name="hash" id="hash" size="50" machar="50" value="" class="form-control">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-9 offset-sm-3">
        <input type="submit" value="Search Whitelist" class="btn btn-primary">
      </div>
    </div>
    <table>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </table>
  </form>
  @if (count(@whitelist) > 0)
  <div class="table-responsive">
    <table width="100%" border="1" class="table table-bordered table-striped table-hover">
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
  </div>
  @endif
</article>
@endsection

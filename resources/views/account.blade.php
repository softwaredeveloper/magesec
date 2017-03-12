<article class="msc-block">
  <h1 class="msc-block__title">
    My Account
  </h1>  
  <script language="javascript">
    <!--
    function showAccountEdit(){
      document.getElementById('accountinfo').style.display = 'none';
      document.getElementById('accountedit').style.display = 'block';
    }
    function showAccountInfo(){
      document.getElementById('accountinfo').style.display = 'block';
      document.getElementById('accountedit').style.display = 'none';
    }
//-->
</script>
<div class="msc-block-info">
  @if ($errors->any())
  {{ implode('', $errors->all(':message')) }}
  <br/>
  <br/>
  @endif
  @if (!empty($success))
  {{ $success }}
  <br/>
  <br/>
  @endif
  <div id="accountinfo" class="msc-account-info">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label"><strong>Email:</strong></label>
      <div class="col-sm-9">
        <p class="form-control-static">{{ Auth::user()->email }}</p>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label"><strong>Name:</strong></label>
      <div class="col-sm-9">
        <p class="form-control-static">{{ Auth::user()->name }}</p>
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-3 col-sm-9">
        <a href="#" class="btn btn-primary" onClick="showAccountEdit()">Update Account Information</a>
      </div>
    </div>
  </div>
  <div id="accountedit" class="hide msc-account-info">
    <form name="account" action="/account-update" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group row">
        <label for="email" class="col-sm-3 col-form-label"><strong>E-Mail:</strong></label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="email" name="email" size="30" maxchar="50" value="{{ Auth::user()->email }}">
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label"><strong>Name:</strong></label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="name" name="name" size="30" maxchar="50" value="{{ Auth::user()->name }}">
        </div>
      </div>
      <div class="form-group row">
      <label for="password" class="col-sm-3 col-form-label"><strong>New Password:</strong></label>
        <div class="col-sm-9">
          <input class="form-control" id="password" type="password" name="password" size="30" maxchar="50" value="">
        </div>
      </div>
      <div class="form-group row">
        <label for="password_confirmation" class="col-sm-3 col-form-label"><strong>Confirm Password:</strong></label>
        <div class="col-sm-9">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" size="30" maxchar="50" value="">
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-sm-3 col-sm-9">
          <a href="#" class="btn btn-secondary" onClick="showAccountInfo()">Cancel</a>
          <input type="submit" class="btn btn-primary" value="Update Account">
          
        </div>
      </div>
    </form>
  </div>
</div>
</article>
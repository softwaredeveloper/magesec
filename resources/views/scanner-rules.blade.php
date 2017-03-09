@extends('layouts.app')

@section('content')
<script language="javascript">
  <!--
  function showString(){
    document.getElementById('rulediv').style.display = 'none';
    document.getElementById('stringdiv').style.display = 'block';
  }
  function showRule(){
    document.getElementById('rulediv').style.display = 'block';
    document.getElementById('stringdiv').style.display = 'none';
  }
//-->
</script>
<article class="msc-block msc-slider">
  <h1 class="msc-block__title">
    Contribute Rules
  </h1>
  <div>
    @if ($errors->any())
    <span style="color:red">{{ implode('', $errors->all(':message')) }}</span>
    <br/>
    <br/>
    @endif
    <p>Rules can be submitted two ways, by either a single matching string or as a yara formatted rule. You can submit rules anonymously or if logged into your account you will be listed as the author of the rule.</p>
    <br/>
    <p><strong>Example string:</strong>
      <br/>
      <code>{'yMk'}=$ {"_REQUEST"};</code>
    </p>
    <br/>
    <p><strong>Example Yara Rule:</strong>
      <br/>
      <code>strings: <br/>
        $ = "{'yMk'}=$ {\"_REQUEST\"};"<br/>
        condition: any of them</code><br/><br/></p>
        <form name="rule" method="post" action="/scanner-rule-submit" class="msc-rule">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
          <div class="form-group row">
            <label class="col-sm-3 col-form-label"><strong>Rule Type:<span style="color:red">*</span></strong></label>
            <div class="col-sm-9 radio-group">
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="ruletype" value="string" onClick="showString()"> String
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="ruletype" value="yararule" onClick="showRule()"> Yara Rule
                </label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">
              <strong>Rule Name:<span style="color:red">*</span></strong>
            </label>
            <div class="col-sm-9">
              <input type="text" class="form-control"  name="name" size="20" maxchar="50"/>
              <small class="form-text text-muted">The rule name must only contain alphanumeric characters, underscores and dashes and cannot begin with a letter.</small>
            </div>
          </div>
          <div id="stringdiv" class="hide">
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">
                <strong>String:<span style="color:red">*</span></strong>
              </label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="string" size="50" maxchar="500"/>
              </div>
            </div>
          </div>
          <div id="rulediv" class="hide">
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">
              <strong>Rule: <span style="color:red">*</span></strong>
              </label>
              <div class="col-sm-9">
                <textarea class="form-control" name="rule" cols="50" rows="6"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
              <input type="submit" value="Submit New Rule" class="btn btn-primary"/>
            </div>
          </div>
        </form>
      </div>
    </article>
    @endsection
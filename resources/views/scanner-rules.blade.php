@extends('layouts.app')

@section('content')
<style>
.hide {
  display: none;
}
</style>
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

<div class="msc-block-info">

@if ($errors->any())
        {{ implode('', $errors->all(':message')) }}
        <br/>
        <br/>
@endif

<p>Rules can be submitted two ways, by either a single matching string or as a yara formatted rule. You can submit rules anonymously or if logged into your account you will be listed as the author of the rule.</p>
<p>Example string:
<br/><br/>
{'yMk'}=$ {"_REQUEST"};
</p>
<br/>
<p>Example Yara Rule:
<br/>
strings: <br/>
$ = "{'yMk'}=$ {\"_REQUEST\"};"<br/>
condition: any of them<br/><br/></p>
<form name="rule" method="post" action="/scanner-rule-submit">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
Rule Type:
<input type="radio" name="ruletype" value="string" onClick="showString()"> String
<input type="radio" name="ruletype" value="yararule" onClick="showRule()"> Yara Rule
<br/>
Rule Name: <input type="text" name="name" size="20" maxchar="20"/>
<br/>
<div id="stringdiv" class="hide">
String: <input type="text" name="string" size="50" maxchar="500"/>
</div>
<div id="rulediv" class="hide">
Rule:<textarea name="rule"></textarea>
</div>
<br/>
<input type="submit" value="Submit New Rule"/>
</form>
</div>
</article>
@endsection
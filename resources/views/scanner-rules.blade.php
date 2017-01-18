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
<form name="rule" method="post" action="/scanner-rule-submit">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
<tr>
<td width="100"><strong>Rule Type:<span style="color:red">*</span></strong></td>
<td>
<input type="radio" name="ruletype" value="string" onClick="showString()"> String
<input type="radio" name="ruletype" value="yararule" onClick="showRule()"> Yara Rule
</td>
</tr>
<tr>
<td width="100"><strong>Rule Name:<span style="color:red">*</span></strong></td>
<td><input type="text" name="name" size="20" maxchar="50"/></td>
</tr>
<tr>
<td width="100"></td>
<td style="padding-left: 12px; background: url(images/note.gif) left center no-repeat;"><span class="small">The rule name must only contain alphanumeric characters, underscores and dashes and cannot begin with a letter.</span></td>
</tr>
</table>
<div id="stringdiv" class="hide">
<table>
<tr>
<td width="100"><strong>String:<span style="color:red">*</span></strong></td>
<td><input type="text" name="string" size="50" maxchar="500"/></td>
</tr>
</table>
</div>
<div id="rulediv" class="hide">
<table>
<tr>
<td width="100" valign="top"><strong>Rule:<span style="color:red">*</span></strong></td>
<td><textarea name="rule" cols="50" rows="6"></textarea></td>
</tr>
</table>
</div>
<table>
<tr>
<td width="100"></td>
<td><input type="submit" value="Submit New Rule"/></td>
</tr>
</table>
</form>
</div>
</article>
@endsection
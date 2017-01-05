@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              Contribute Rules
            </h1>

<div class="msc-block-info">
<p>Rules can be submitted two ways, by either a single matching string or as a yara formatted rule. You can submit rules anonymously or if logged into your account you will be listed as the author of the rule.</p>
<p>Example string:
<br/><br/>
@${'yMk'}=$ {"_REQUEST"};
</p>
<br/><br/>
<p>Example Yara Rule:
<br/><br/>
strings: <br/>
$ = "@${'yMk'}=$ {\"_REQUEST\"};"<br/>
condition: any of them</p>
<form name="rule" method="post" action="/scanner-rule-submit">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
Rule Type: <input type="radiobutton" name="type" value="string"> String <input type="radiobutton" name="type" value="rule"> Yara Rule
Rule Name: <input type="text" name="name" size="20" maxchar="20"/>
<br/>
String: <input type="text" name="name" size="50" maxchar="500"/>
<br/>
Rule:<textarea name="rule"></textarea>
<input type="submit" value="Submit New Rule"/>
</form>
</div>
</article>
@endsection
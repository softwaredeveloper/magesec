@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              Contribute Whitelist Rules
            </h1>
          </article>
<div class="msc-block-info">

@if ($errors->any())
        <span style="color:red">{{ implode('', $errors->all(':message')) }}</span>
        <br/>
        <br/>
@endif

<p>While the malware scan rules are quite precise they will sometimes pick up legitimate coding projects. Typically these false positives are due to code that is obfuscated in the same way hackers oftern use. To submit a file that is getting a false positive fill out the form below for each file.</p>
<form name="rule" method="post" action="/scanner-whitelist-submit">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
<tr>
<td width="100"><strong>Application:<span style="color:red">*</span></strong></td>
<td><input type="text" name="application" size="20" maxchar="50"/></td>
</tr>
<tr>
<td width="100"></td>
<td style="padding-left: 12px; background: url(images/note.gif) left center no-repeat;"><span class="small">The name of the developer or application the file belongs to.</span></td>
</tr>
<tr>
<td width="100"><strong>Version:<span style="color:red">*</span></strong></td>
<td><input type="text" name="version" size="20" maxchar="50"/></td>
</tr>
<tr>
<td width="100"></td>
<td style="padding-left: 12px; background: url(images/note.gif) left center no-repeat;"><span class="small">The application version.</span></td>
</tr>
<tr>
<td width="100"><strong>Filepath:<span style="color:red">*</span></strong></td>
<td><input type="text" name="filepath" size="20" maxchar="500"/></td>
</tr>
<tr>
<td width="100"></td>
<td style="padding-left: 12px; background: url(images/note.gif) left center no-repeat;"><span class="small">Relative file path.</span></td>
</tr>
<tr>
<td width="100"><strong>Filesize:<span style="color:red">*</span></strong></td>
<td><input type="text" name="filesize" size="20" maxchar="20"/></td>
</tr>
<tr>
<td width="100"></td>
<td style="padding-left: 12px; background: url(images/note.gif) left center no-repeat;"><span class="small">Expected filesize in bytes</span></td>
</tr>
<tr>
<td width="100"><strong>SHA1 Hash:<span style="color:red">*</span></strong></td>
<td><input type="text" name="hash" size="20" maxchar="500"/></td>
</tr>
<tr>
<td width="100"></td>
<td style="padding-left: 12px; background: url(images/note.gif) left center no-repeat;"><span class="small">File hash for whitelisting. To get a hash run sha1sum <filename> from the command line.</span></td>
</tr>
<tr>
<td width="100" valign="top"><strong>Justification:<span style="color:red">*</span></strong></td>
<td><textarea name="justification" rows="6" cols="50"></textarea></td>
</tr>
<tr>
<td width="100"></td>
<td style="padding-left: 12px; background: url(images/note.gif) left center no-repeat;"><span class="small">The reason why this file needs to be whitelisted. Please include the rule name that was picking this file up.</span></td>
</tr>
<tr>
<td width="100"></td>
<td><input type="submit" value="Submit New Rule"/></td>
</tr>
</table>
</form>
</div>
</article>@endsection
<style>
.hide {
  display: none;
}
</style>
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

<article class="msc-block">
<h1 class="msc-block__title">
My Account
</h1>
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
<div id="accountinfo">
<table>
<tr>
<td><strong>Email:</strong></td>
<td>{{ Auth::user()->email }}</td>
</tr>
<tr>
<td><strong>Name:</strong></td>
<td>{{ Auth::user()->name }}</td>
</tr>
<tr>
<td colspan="2"><a href="#" onClick="showAccountEdit()">Update Account Information</a></td>
</tr>
</table>
</div>
<div id="accountedit" class="hide">
<form name="account" action="/account-update" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
<tr>
<td>Email:</td>
<td><input type="text" name="email" size="30" maxchar="50" value="{{ Auth::user()->email }}"></td>
</tr>
<tr>
<td>Name:</td>
<td><input type="text" name="name" size="30" maxchar="50" value="{{ Auth::user()->name }}"></td>
</tr>
<tr>
<td>New Password:</td>
<td><input type="password" name="password" size="30" maxchar="50" value=""></td>
</tr>
<tr>
<td>Confirm Password:</td>
<td><input type="password" name="password_confirmation" size="30" maxchar="50" value=""></td>
</tr>
<tr>
<td><a href="#" onClick="showAccountInfo()">Cancel</a></td>
<td><input type="submit" value="Update Account"></td>
</tr>
</table>
</form>
</div>
</div>
</article>
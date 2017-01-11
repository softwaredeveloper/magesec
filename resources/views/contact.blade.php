@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              Contact
            </h1>
            <div class="msc-block-info">
			 <p>To contact the Mage Security Council fill out the form below with your query.</p>
			 @if ($errors->any())
			         <br/>
			         <br/>
			         {{ implode('', $errors->all(':message')) }}
			         <br/>
			         <br/>
             @endif
			 <form name"contact" action="contact-send" method="post">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			 <table>
			 <tr>
			 <td>Subject:</td>
			 <td><input type="text" name="subject" size="30" maxchar="50"></td>
			 </tr>
			 <tr>
			 <td valign="top">Body:</td>
			 <td><textarea name="body" rows="7" cols="50"></textarea></td>
			 </tr>
			 <tr>
			 <td></td>
			 <td><input type="submit" value="Submit"></td>
			 </tr>
			 </table>
			 </form>
            </div>
          </article>
@endsection
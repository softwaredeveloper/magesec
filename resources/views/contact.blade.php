@extends('layouts.app')

@section('content')
<article class="msc-block msc-slider">
	<h1 class="msc-block__title">
		Contact
	</h1>
	<div class="msc-block-info">
		<p>To contact the Mage Security Council fill out the form below with your query.</p>
		@if ($errors->any())
		<div class="alert alert-danger alert-dismissible show mt-1" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			{{ implode('', $errors->all(':message')) }}
		</div>
		@endif
		<br/>
		<form name"contact" action="contact-send" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group row">
				<label for="email" class="col-sm-3 col-form-label">Name</label>
				<div class="col-sm-9">
					<input type="text" name="name" size="30" maxchar="50" class="form-control">
				</div>
			</div>

			<div class="form-group row">
				<label for="email" class="col-sm-3 col-form-label">Email</label>
				<div class="col-sm-9">
					<input type="text" name="email" size="30" maxchar="80" class="form-control">
				</div>
			</div>

			<div class="form-group row">
				<label for="email" class="col-sm-3 col-form-label">Subject</label>
				<div class="col-sm-9">
					<input type="text" name="subject" size="30" maxchar="50" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label for="email" class="col-sm-3 col-form-label">Body</label>
				<div class="col-sm-9">
					<textarea name="body" rows="7" cols="50" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="offset-sm-3 col-sm-9">
					<input type="submit" value="Submit" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</article>
@endsection
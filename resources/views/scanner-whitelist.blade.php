@extends('layouts.app')

@section('content')
<article class="msc-block msc-slider">
	<h1 class="msc-block__title">
		Contribute Whitelist Rules
	</h1>
</article>
<div class="msc-block-info">
	@if ($errors->any())
	<div class="alert alert-danger alert-dismissible show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<strong>{{ implode('<br/>', $errors->all(':message')) }}
		</div>
		@endif
		<p>While the malware scan rules are quite precise they will sometimes pick up legitimate coding projects. Typically these false positives are due to code that is obfuscated in the same way hackers oftern use. To submit a file that is getting a false positive fill out the form below for each file.</p><br/>
		<form name="rule" method="post" action="/scanner-whitelist-submit">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group row">
				<label for="application" class="col-md-3 col-form-label">Application: <span style="color:red">*</span></label>
				<div class="col-md-9">
					<input type="text" id="application" name="application" size="20" maxchar="50" class="form-control" />
					<p class="form-text text-muted">
						The name of the developer or application the file belongs to.
					</p>
				</div>
			</div>
			<div class="form-group row">
				<label for="version" class="col-md-3 col-form-label">Version:<span style="color:red">*</span></label>
				<div class="col-md-9">
					<input type="text" name="version" id="version" size="20" maxchar="50" class="form-control" />
					<p class="form-text text-muted">
						The application version.
					</p>
				</div>
			</div>
			<div class="form-group row">
				<label for="filepath" class="col-md-3 col-form-label">Filepath:<span style="color:red">*</span></label>
				<div class="col-md-9">
					<input type="text" name="filepath" id="filepath" size="20" maxchar="500" class="form-control" />
					<p class="form-text text-muted">
						Relative file path.
					</p>
				</div>
			</div>
			<div class="form-group row">
				<label for="filesize" class="col-md-3 col-form-label">Filesize:<span style="color:red">*</span></label>
				<div class="col-md-9">
					<input type="text" name="filesize" id="filesize" size="20" maxchar="20" class="form-control" />
					<p class="form-text text-muted">
						Expected filesize in bytes
					</p>
				</div>
			</div>
			<div class="form-group row">
				<label for="hash" class="col-md-3 col-form-label">SHA1 Hash:<span style="color:red">*</span></label>
				<div class="col-md-9">
					<input type="text" name="hash" id="hash" size="20" maxchar="500" class="form-control" />
					<p class="form-text text-muted">
						File hash for whitelisting. To get a hash run sha1sum from the command line.
					</p>
				</div>
			</div>
			<div class="form-group row">
				<label for="justification" class="col-md-3 col-form-label">Justification:<span style="color:red">*</span></label>
				<div class="col-md-9">
					<textarea name="justification" id="justification" rows="6" cols="50" class="form-control"></textarea>
					<p class="form-text text-muted">
						The reason why this file needs to be whitelisted. Please include the rule name that was picking this file up.
					</p>
				</div>
			</div>
			<div class="form-group row">
				<div class="offset-sm-3 col-sm-9">
					<input type="submit" value="Submit New Rule" class="btn btn-primary" />
				</div>
			</div>
		</form>
	</div>
</article>@endsection
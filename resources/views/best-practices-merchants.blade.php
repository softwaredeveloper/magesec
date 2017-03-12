@extends('layouts.app')

@section('content')
<article class="msc-block">
	<h1 class="msc-block__title">
		Best Security Practices for Merchants
	</h1>
	<div class="msc-block">
		<p>Get a Magento security review done</p>
		<p>Magento developers are not necessarily security experts. Yes, many of them are good at coding but only few know the intricacies of Magento site security. </p>
		<p>This is why once (or perhaps, twice) a year, you should get your website analyzed for apparent loopholes and security shortcomings. </p>
		<p>If properly done, these reviews help in further hardening of your Magento security measures.<br/>
		Run <a href="https://www.magereport.com/" target="_blank">https://www.magereport.com/</a></p>			
			<ul class="msc-listing">
				<li>Make sure that the computer that is used to access the Magento Admin is secure.</li>
				<li>Keep your antivirus software up to date, and use a malware scanner. Do not install any unknown programs, or click suspicious links.</li>
				<li>Use a strong password to log into the computer, and change it periodically. Use a password manager to create and manage secure, unique passwords.</li>
				<li>Do not save FTP passwords in FTP programs, because they are often harvested by malware and used to infect servers.</li>
				<li>Have an <a href="https://github.com/talesh/response" target="_blank">incident response plan</a>.</li>
			</ul>
		</div>
	</article>
	@endsection
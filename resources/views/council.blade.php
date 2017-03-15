@extends('layouts.app')

@section('content')
<article class="msc-block msc-block--members">
	<h1 class="msc-block__title">
		Members
	</h1>

		@php
		$mains = array();
		$members = array();
		$dh = opendir('../resources/views/members/');
		while (($file = readdir($dh)) !== false){
		  if (strpos($file,'.blade.php') > -1) {
		    if (strpos($file,'main.') > -1) {
		      array_push($mains,$file);
		    } else {
		      array_push($members,$file);
		    }
		  }
		}
    	closedir($dh);

    	shuffle($mains);
    	shuffle($members);
    	print '<div class="row">';
		foreach($mains as $main) {
			include('../resources/views/members/'.$main);
		}
		print '</div>';
		foreach($members as $row=>$member) {
		  if ($row % 2 == 0) {
		    print '<div class="row">';
		  }
		  include('../resources/views/members/'.$member);
		  if ($row % 2 == 1) {
		    print '</div>';
		  }
		}
		if ($row % 2 == 0) {
		  print '</div>';
		}
		@endphp

</article>
<article class="msc-block">
	<h1 class="msc-block__title">
		Becoming a Mage Security Council Member
	</h1>
	<div class="msc-block-info">
		<p>To become a security council member, an organization must demonstrate an exceptional commitment to ecommerce security. Requirements include PCI compliancy, proactive intrusion prevention controls, solid incident response processes and security contributions towards the broader Magento community.</p>
		<p>In addition to the above requirements, members must also do the following:</p>
		<p>
			<h1 class="msc-block__title"><strong>Hosting Providers</strong></h1>
		</p>
		<p>
			<ul class="msc-listing">
				<li>Run Mage Malware Scanner on all Magento customers every 24 hours by default.</li>
				<li>Identify and contribute new malware rules to the council.</li>
				<li>Notify all clients of infected stores within 24 hours.</li>
				<li>Disable public access to infected stores within 24 hours if no response from store owners.</li>
			</ul>
		</p>
		<p>
			<h1 class="msc-block__title"><strong>Agencies / Developers</strong></h1>
		</p>
		<p>
			<ul class="msc-listing">
				<li>Run Mage Malware Scanner on all Magento customers.</li>
				<li>Patch all customers within 5 business days of patch release.</li>
			</ul>
		</p>
	</div>
</article>
@endsection
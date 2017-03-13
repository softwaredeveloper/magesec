@extends('layouts.app')

@section('content')
<article class="msc-block msc-block--members">
	<h1 class="msc-block__title">
		Members
	</h1>
	<div class="row">
		<div class="col-md-6">
			<a href="https://www.byte.nl" target="_blank"><img src="images/byte-logo.png" alt="byte" height="50" /></a>
			<p>Founded in 1999, Byte is the Dutch and Belgian market leader. Thousands of agencies and merchants rely on its innovative Magento platform-as-a-service called Hypernode. Our mission is to "save developers time" so they can focus on creating the best online stores.
				<br/><br/>
				Byte also operates the free <a href="https://www.magereport.com">MageReport</a> service to verify patch and vulnerability status. Byte has 50 staff and is member of the <a href="https://www.intelli.gent/">Intelligent Group</a>.
			</p>
		</div>
		<div class="col-md-6">
			<a href="https://www.magemojo.com" target="_blank"><img src="images/magemojo-logo.png" alt="magemojo" height="50" /></a>
			<p>Founded in 2009, MageMojo specializes exclusively in hosting for Magento. MageMojo was the first hosting company to be created exclusively to only host and support the Magento platform. By focusing solely on Magento they are able to provide Merchants with higher Magento performance, deeper Magento support, and lower hosting costs then their competitors.    
			</p>
		</div>
	</div>
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
				<li>Run Mage Malware Scanner on all Magento customers, every 24 hours, by default.</li>
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
@extends('layouts.app')

@section('content')
<article class="msc-block">
	<h1 class="msc-block__title">
		Best Security Practices for Hosting Providers
	</h1>
	<div class="msc-block">

    <p>Protecting the environment is the most critical aspect of ensuring the security of your store. Keep all software on the server up to date, and apply security patches as recommended. This applies not only to Magento, but to any other software that is installed on the server, including database software and other websites that use the same server. Any system is only as secure as the weakest link.</p>
    <p>Willem de Groot sample NGINX CONFIGURATION.</p>
    <p><a href="https://gist.github.com/gwillem/cd5ae6845fa33aa0d481" target="_blank">https://gist.github.com/gwillem/cd5ae6845fa33aa0d481</a></p>
    <p>Follow the PCI DSS guidelines to build right security processes </p>
    <p>Every merchant falls under PCI, even if you do not handle a large volume of transactions or use external providers to outsource your credit card information.</p>
    <p>Good collection of related information for e-commerce:</p>
    <p><a href="https://blog.sucuri.net/tag/pci-compliance/" target="_blank">https://blog.sucuri.net/tag/pci-compliance/</a></p>
    <p>Official PCI DSS documentation page: </p>
    <p><a href="https://www.pcisecuritystandards.org/document_library" target="_blank">https://www.pcisecuritystandards.org/document_library</a></p>
    <p>Magento PCI Compliance Checklist</p>

    <p><a href="https://magento.com/security/best-practices/pci-compliance-checklist-ecommerce-businesses" target="_blank">https://magento.com/security/best-practices/pci-compliance-checklist-ecommerce-businesses</a></p>

	</div>
</article>
@endsection
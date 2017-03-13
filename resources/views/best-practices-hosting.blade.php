@extends('layouts.app')

@section('content')
<article class="msc-block">
	<h1 class="msc-block__title">
		Best Security Practices for Hosting Providers
	</h1>
	<div class="msc-block">
    <p>Protecting the environment is the most critical aspect of ensuring the security of your store. Keep all software on the server up to date, and apply security patches as recommended. This applies not only to Magento, but to any other software that is installed on the server, including database software and other websites that use the same server. Any system is only as secure as the weakest link.</p>
    <p>Follow the PCI DSS guidelines to build right security processes. </p>
    <p>Every merchant falls under PCI, even if you do not handle a large volume of transactions or use external providers to outsource your credit card information.</p>
    <!--
    <p class="mb-0">Willem de Groot sample NGINX CONFIGURATION.</p>
    <p><a href="https://gist.github.com/gwillem/cd5ae6845fa33aa0d481" target="_blank">https://gist.github.com/gwillem/cd5ae6845fa33aa0d481</a></p>
    <p class="mb-0">Good collection of related information for e-commerce:</p>
    <p><a href="https://blog.sucuri.net/tag/pci-compliance/" target="_blank">https://blog.sucuri.net/tag/pci-compliance/</a></p>
    <p class="mb-0">Official PCI DSS documentation page: </p>
    <p><a href="https://www.pcisecuritystandards.org/document_library" target="_blank">https://www.pcisecuritystandards.org/document_library</a></p>
    <p class="mb-0">Magento PCI Compliance Checklist</p>
    <p><a href="https://magento.com/security/best-practices/pci-compliance-checklist-ecommerce-businesses" target="_blank">https://magento.com/security/best-practices/pci-compliance-checklist-ecommerce-businesses</a></p>
-->
    <ul class="msc-listing">
        <li>Willem de Groot sample Nginx configuration:<br/>
        <a href="https://gist.github.com/gwillem/cd5ae6845fa33aa0d481" target="_blank">https://gist.github.com/gwillem/cd5ae6845fa33aa0d481</a></li>
        <li>Good collection of related information for e-commerce:<br/>
        <a href="https://blog.sucuri.net/tag/pci-compliance/" target="_blank">https://blog.sucuri.net/tag/pci-compliance/</a></li>
        <li>Official PCI DSS documentation page:<br/>
        <a href="https://www.pcisecuritystandards.org/document_library" target="_blank">https://www.pcisecuritystandards.org/document_library</a></li>
        <li>Magento PCI Compliance Checklist:<br/>
        <a href="https://magento.com/security/best-practices/pci-compliance-checklist-ecommerce-businesses" target="_blank">https://magento.com/security/best-practices/pci-compliance-checklist-ecommerce-businesses</a></li>
    </ul>

	</div>
</article>
@endsection
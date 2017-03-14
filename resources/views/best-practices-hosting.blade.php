@extends('layouts.app')

@section('content')
<article class="msc-block">
	<h1 class="msc-block__title">
		Best Security Practices for Hosting Providers
	</h1>
	<div class="msc-block">

    <p>Protecting the environment is the most critical aspect of ensuring the security of your store. Keep all software on the server up to date, and apply security patches as recommended. This applies not only to Magento, but to any other software that is installed on the server, including database software and other websites that use the same server. Any system is only as secure as the weakest link.</p>

    <p>Follow the PCI DSS guidelines to build the right security processes. Every one of your clients falls under PCI, even if they do not handle a large volume of transactions or outsource credit card payments.</p>

    <p>In addition to implementing the PCI requirements, we provide specific suggestions to implement prevention, discovery and mitigation processes.</p>

  <h2 id="prevention">
   Prevention
  </h2>
  <p>
   A hosting provider should install attack filtering on the following components. Together they form the attack surface of a typical Magento store.
  </p>
  <ol>
   <li>
    Public HTTP requests that execute the Magento core and installed extensions. Known and unknown exploits target common software bugs that allow PHP Object Injection, SQL Injection, Cross Site Scripting and several others. One could filter generic attack patterns, for example using a web application firewall such as mod_security or naxsi. One could scan its customer's stores for known vulnerable extensions. 
   </li>
   <li>
    Private HTTP requests for authenticated Magento endpoints, such as the backend panel, the API and various RSS feeds. Brute force attacks on these endpoints to harvest administrative accounts are ubiquitous. One should implement IP based access-control where possible, and otherwise implement adaptive filtering to restrict repeated login attempts.
   </li>
   <li>
    Authenticated file access such as FTP and SSH. A merchant’s laptop can be compromised and malicious code uploaded through an authenticated channel. One can filter this by on-demand scanning of uploaded files.
   </li>
  </ol>
  <h2 id="discovery">
   Discovery
  </h2>
  <p>
   As new attack vectors are developed continuously, a hosting provider should allocate resources and implement a process to track and discover new techniques. Individual efforts should entail anomaly detection (both automated and manual) of logfiles and derived metrics.
  </p>
  <h2 id="mitigation">
   Mitigation
  </h2>
  <p>
   Despite all your measures, security incidents will occur, so you should be prepared. Some considerations to help you design your mitigation process:
  </p>
  <ul>
   <li>
    How can we deduct useful information from an incident that will prevent future cases?
   </li>
   <li>
    What do we do when the merchant refuses to fix the vulnerable component?
   </li>
   <li>
    Who is responsible in our organisation for collaboration with law-enforcement?
   </li>
   <li>
    What is the monetary and reputational damage from an incident? What is the net result of shutting down the affected store versus leaving it running as-is?
   </li>
   <li>
    How do we communicate with our customer to discuss next steps? During out-of-office hours? What if the customer is unavailable? Can we implement a default action to contain the damage?
   </li>
   <li>
    How can we facilitate the forensics process? Can we easily deduct file and database modifications between specific dates? Do we enforce versioning?
   </li>
  </ul>
  <h2 id="further-reading">
   Further reading
  </h2>

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
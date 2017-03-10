@extends('layouts.app')

@section('content')
<article class="msc-block">
	<h1 class="msc-block__title">
		Best Security Practices for Developers
	</h1>
	<div class="msc-block">

      <p>Make your store secure with next steps:</p>
      <p>1. Keep your store updated and follow  Magento Security best practices:</p>
      <p>Missing security patches is the most popular vector of compromising your store.</p>
      <p>Keep Magento up-to-date, keep extensions, modules and themes up-to-date, delete any extensions, modules or themes you're not using.
        Monitoring for the Magento security updates and implementing security patches is very important to protect from the most of the infections.
        Once a stable release or security update is out, test it and get it implemented.</p>
        <p>How to apply security patches:</p>
        <p><a href="https://support.hypernode.com/knowledgebase/how-to-apply-magento-patches/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-apply-magento-patches/</a></p>
        <p>How to update Magento:</p>
        <p><a href="https://support.hypernode.com/knowledgebase/updating-magento/" target="_blank">https://support.hypernode.com/knowledgebase/updating-magento/</a></p>
        <p>Follow Magento Security best practices:</p>
        <p><a href="https://magento.com/security/best-practices/security-best-practices" target="_blank">https://magento.com/security/best-practices/security-best-practices</a></p>
        <p>2. Protect WP blogs and pages</p>
        
        <p>Second actual vector by popularity is Word Press compromisation. </p>
        <p>Keep WordPress up-to-date, Keep plugins and themes up-to-date, Delete any plugins or themes you're not using.</p>
        <p>Regularity is the key!</p>
        
        <p>More information about hardening the WP: </p>
        <p><a href="https://codex.wordpress.org/Hardening_WordPress" target="_blank">https://codex.wordpress.org/Hardening_WordPress</a></p>
        
        <p>3. Protect from the brute force attack</p>
        
        <p>Each Magento shop comes standard with several sections for administrative purposes (also called "back-end" or "admin panel"). </p>
        <p>These are by default located at /admin, /downloader and various /rss endpoints (such as /rss/catalog/notifystock/) and can be abused in several ways.</p>
        
        <p>Good recommendations from byte.nl, Magento and Magemojo can be found here:</p>
        <p><a href="https://support.hypernode.com/knowledgebase/how-to-protect-your-magento-store-against-brute-force/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-protect-your-magento-store-against-brute-force/</a></p>
        <p><a href="https://magento.com/security/best-practices/protect-your-magento-installation-password-guessing-new-update" target="_blank">https://magento.com/security/best-practices/protect-your-magento-installation-password-guessing-new-update</a></p>
        <p><a href="http://kb.magemojo.com/display/CK/Securing+Magento+1.x+against+malware+and+brute+force+attacks" target="_blank">http://kb.magemojo.com/display/CK/Securing+Magento+1.x+against+malware+and+brute+force+attacks</a></p>
        
        <p>Use strong passwords!!!</p>
        
        <p>4. Protect Magmi</p>
        <p>Magmi, the Magento mass importer, is an alternative product importer offering better performance over the default Magento importer.
          This makes it a very powerful yet also dangerous tool as it effectively offers full access to your Magento webshop database.
          Tips to protect Magmi:</p>
          
          <p><a href="https://support.hypernode.com/knowledgebase/how-to-secure-magmi-2/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-secure-magmi-2/</a></p>
          
          <p>5. While under development follow next recommendations</p>
          
          <p><a href="https://support.hypernode.com/knowledgebase/how-to-secure-development-files/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-secure-development-files/</a></p>
          
          <p>6. How to secure Magento version control systems/platforms</p>
          
          <p><a href="https://support.hypernode.com/knowledgebase/how-to-secure-version-control-systemsplatforms/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-secure-version-control-systemsplatforms/</a></p>
          
          <p>7. Read the security topics at Magento community forum</p>
          
          <p><a href="https://community.magento.com/" target="_blank">https://community.magento.com/</a></p>

	</div>
</article>
@endsection
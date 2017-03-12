@extends('layouts.app')

@section('content')
<article class="msc-block">
	<h1 class="msc-block__title">
		Best Security Practices for Developers
	</h1>
	<div class="msc-block">
    <h2><strong>Keep your store updated and follow  Magento Security best practices.</strong></h2>
    <p>Missing security patches is the most popular vector of compromising your store.</p>
    <p>Keep Magento up-to-date, keep extensions, modules and themes up-to-date, delete any extensions, modules or themes you're not using.
      Monitoring for the Magento security updates and implementing security patches is very important to protect from the most of the infections.
      Once a stable release or security update is out, test it and get it implemented.</p>
      <ul class="msc-listing">
        <li>
          How to apply security patches:
          <br/><a href="https://support.hypernode.com/knowledgebase/how-to-apply-magento-patches/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-apply-magento-patches/</a>
        </li>
        <li>
          How to update Magento:<br/>
          <a href="https://support.hypernode.com/knowledgebase/updating-magento/" target="_blank">https://support.hypernode.com/knowledgebase/updating-magento/</a>
        </li>
        <li>
          Follow Magento Security best practices:<br/>
          <a href="https://magento.com/security/best-practices/security-best-practices" target="_blank">https://magento.com/security/best-practices/security-best-practices</a>
        </li>
      </ul><br/>

      <h2><strong>Protect WP blogs and pages.</strong></h2>
      <p>Second actual vector by popularity is Word Press compromisation. </p>
      <p>Keep WordPress up-to-date, Keep plugins and themes up-to-date, Delete any plugins or themes you're not using. Regularity is the key!</p>
      <ul class="msc-listing">
        <li>
          More information about hardening the WP:<br/>
          <a href="https://codex.wordpress.org/Hardening_WordPress" target="_blank">https://codex.wordpress.org/Hardening_WordPress</a>
        </li>
      </ul> <br/>

      <h2><strong>Protect from brute force attacks.</strong></h2>
      <p>Each Magento shop comes standard with several sections for administrative purposes (also called "back-end" or "admin panel"). </p>
      <p>These are by default located at /admin, /downloader and various /rss endpoints (such as /rss/catalog/notifystock/) and can be abused in several ways. Good recommendations from byte.nl, Magento and Magemojo can be found here:</p>
      <ul class="msc-listing">
        <li><a href="https://support.hypernode.com/knowledgebase/how-to-protect-your-magento-store-against-brute-force/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-protect-your-magento-store-against-brute-force/</a></li>
        <li>
          <a href="https://magento.com/security/best-practices/protect-your-magento-installation-password-guessing-new-update" target="_blank">https://magento.com/security/best-practices/protect-your-magento-installation-password-guessing-new-update</a>
        </li>
        <li>
          <a href="http://kb.magemojo.com/display/CK/Securing+Magento+1.x+against+malware+and+brute+force+attacks" target="_blank">http://kb.magemojo.com/display/CK/Securing+Magento+1.x+against+malware+and+brute+force+attacks</a>
        </li>
      </ul>
      <h2><strong>Protect Magmi.</strong></h2>
      <p>Magmi, the Magento mass importer, is an alternative product importer offering better performance over the default Magento importer.
        This makes it a very powerful yet also dangerous tool as it effectively offers full access to your Magento webshop database.
        Tips to protect Magmi:
      </p>
      <ul class="msc-listing">
        <li><a href="https://support.hypernode.com/knowledgebase/how-to-secure-magmi-2/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-secure-magmi-2/</a></li>
      </ul><br/>
      <h2><strong>While under development follow next recommendations:</strong></h2>
      <ul class="msc-listing">
        <li><a href="https://support.hypernode.com/knowledgebase/how-to-secure-development-files/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-secure-development-files/</a>
        </li>
      </ul><br/>
      <h2><strong>How to secure Magento version control systems/platforms:</strong></h2>
      <ul class="msc-listing">
        <li>
          <a href="https://support.hypernode.com/knowledgebase/how-to-secure-version-control-systemsplatforms/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-secure-version-control-systemsplatforms/</a>
        </li>
      </ul><br/>
      <h2><strong>Read the security topics at Magento community forum:</strong></h2>
      <ul class="msc-listing">
        <li>
          <a href="https://community.magento.com/" target="_blank">https://community.magento.com/</a>
        </li>
      </ul>
    </div>
  </article>
  @endsection
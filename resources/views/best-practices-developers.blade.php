@extends('layouts.app')

@section('content')
<article class="msc-block">
	<h1 class="msc-block__title">
		Best Security Practices for Developers
	</h1>
	<div class="msc-block">
    <p>Magento development Best practices start with development processes. Your internal processes are more important than the technology you use. e.g.: You can have the absolute best security scanning tools but if you don’t have a regular established process of using it, you’ll be less secure than another development team that uses a mediocre tool in a consistent and pragmatic manner. Focus on your processes first then the tools second.</p>
    <p>The easiest way to follow Magento use of your security best practices is to document your implementation of them for your team. Once it is documented, then your team has a consistent reference to follow on every single project and new members have a template to get up to speed. You are free to implement the resources provided by MageSec as provided or adapt them to your internal processes. 
</p><br />
    <h2><strong>Magento patch strategies for Development Agencies</strong></h2>
    <p>The most popular vector of compromising Magento stores is via exploiting unpatched stores. If you are missing core patches then you are leaving your site vulnerable to the most common drive by attacks. </p>
    <p>Magento patches are commonly released on Tuesdays. This is something to keep in mind when planning your weekly development workload. If you have notification of a pending patch, schedule your tasks accordingly so you have the time and resources to test the patch immediately. </p>
    <p>Always test the Magento patch on a testing server. Since patches may affect integrations with 3rd party services and modules, it would be a good idea to test it on a staging server so you can verify that all connections to other services are still fully functional before deploying live. </p>
    <p>Subscribe to the Magento security email list for Magento patch notifications. This is a zero-marketing security focused notification service from Magento meant for system integrators and developers so that they are aware of patches as soon as they are available. URL: https://magento.com/security/sign-up</p>
    <p>Sometimes Magento core development team will also update Magento to a new version at the same time a patch is released. Historically the new version always contains fixes for any vulnerabilities listed in the patch.</p>
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
      </ul>

        <br />
    <h2><strong>Use Magento features to protect inputs effectively</strong></h2>
    <p>Although the practise of putting SQL statements directly into customizations to Magento has pretty much disappeared from 3rd party modules it still occurs from time to time. Unfortunately not using the existing Database abstractions may leave you vulnerable to SQL injection attacks. </p>
    <p>The Magento framework already does robust server side input validation and in almost all cases, relying on the existing systems will protect you from SQL injection attacks. Consider casting any inputs that you accept into the type you require, this way if you expect an integer input, an attacker would be hard pressed to force a SQL injection into that variable if it is cast into an integer after passing server side validation. </p>
    <p>Due to the nature of being an eCommerce system it is possible that your code will also be interacting with 3rd party services via API’s also. Never forget to properly validate any data coming in via an external API request to your site. This is still an attack vector despite not being publicly visible on your site.</p>
        
                <br />
    <h2><strong>Using Magento features to protect outputs effectively</strong></h2>
    <p>Even after you have protected all your custom inputs, sometimes malicious strings (XSS attacks) can get into your system via database imports of older sites, unprotected 3rd party inputs or a malicious privileged actor ( e.g.: resentful employee with limited admin access etc ) These vectors can compromise the privacy of your customers and visitors to your site so it is best to use the inbuilt tools to protect your variables. Two examples of these are the escapeHtml and escapeURL functions  e.g.: 
</p>
    <pre>&lt;?php echo $this->escapeHtml(__($this->variable); ?&gt;
&lt;?php echo $this->escapeURL(__($this->variable); ?&gt;
</pre>
              
                <br />
    <h2><strong>CSRF Anti-forgery tokens</strong></h2>
    <p>CSRF (Cross Site Request Forgery) is an up and coming attack vector on websites.  Luckily you can easily prevent it using anti-forgery tokens in all the forms you create in the Magento site. You can add an anti-forgery token as a hidden input into any of your custom forms using the following snippet:</p>
        <pre>&lt;?php echo $this->getBlockHtml('formkey')?&gt;</pre>
    <p>To verify the anti-forgery token was valid you use the  _validateFormKey() function in the POST action of your controller before processing the request.</p>
        
          <br />
    <h2><strong>Use necessary flags on your cookies</strong></h2>
    <p>Sometimes your Magento store customers and users can be attacked in vectors beyond your control like MITM (Man in the middle) attacks happening on the browser end of the connection. The vast majority of the times TLS encryption will protect your customers, however if you are doing so make sure that you set the HTTPOnly and Secure flags on any custom cookies you are using to ensure that these cookies are only available to the browser instead of malicious client-side scripts and also they are only transferred via an HTTPS connection.</p>
                      
                <br />
    <h2><strong>Don’t roll your own crypto</strong></h2>
        <p>Magento provides an inbuilt encryption system to save your sensitive API keys and similar data into the database. All you have to do is specify the backend model of your field as Encrypted. e.g.:</p>p>
        <pre>&lt;backend_model&gt;Magento\Config\Model\Config\Backend\Encrypted&lt;/backend_model&gt;
</pre>
        
          <br />
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

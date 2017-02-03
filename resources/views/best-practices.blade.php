@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              Best Security Practices
            </h1>
          </article>
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              <a href="/best-practices-hosting">For Hosting Providers</a>
            </h1>
            <div class="msc-block-info">
            <p>Protecting the environment is the most critical aspect of ensuring the security of your store. Keep all software on the server up to date, and apply security patches as recommended. This applies not only to Magento, but to any other software that is installed on the server, including database software and other websites that use the same server. Any system is only as secure as the weakest link.</p>
<br/>
<p>Willem de Groot sample NGINX CONFIGURATION.</p>
<br/>
<p><a href="https://gist.github.com/gwillem/cd5ae6845fa33aa0d481" target="_blank">https://gist.github.com/gwillem/cd5ae6845fa33aa0d481</a></p>
<br/>

<p>Follow the PCI DSS guidelines to build right security processes </p>
<br/>
<p>Every merchant falls under PCI, even if you do not handle a large volume of transactions or use external providers to outsource your credit card information.</p>
<br/>
<p>Good collection of related information for e-commerce:</p>
<br/>
<p><a href="https://blog.sucuri.net/tag/pci-compliance/" target="_blank">https://blog.sucuri.net/tag/pci-compliance/</a></p>
<br/>
<p>Official PCI DSS documentation page: </p>
<br/>
<p><a href="https://www.pcisecuritystandards.org/document_library" target="_blank">https://www.pcisecuritystandards.org/document_library</a></p>
<br/>
<p>Magento PCI Compliance Checklist</p>

<p><a href="https://magento.com/security/best-practices/pci-compliance-checklist-ecommerce-businesses" target="_blank">https://magento.com/security/best-practices/pci-compliance-checklist-ecommerce-businesses</a></p>
            </div>
          </article>
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              <a href="/best-practices-developers">For Developers<a>
            </h1>
            <div class="msc-block-info">
            <p>Make your store secure with next steps:</p>
<br/>
<p>1. Keep your store updated and follow  Magento Security best practices:</p>
<br/>
<p>Missing security patches is the most popular vector of compromising your store.</p>
<p>Keep Magento up-to-date, keep extensions, modules and themes up-to-date, delete any extensions, modules or themes you're not using.
Monitoring for the Magento security updates and implementing security patches is very important to protect from the most of the infections.
Once a stable release or security update is out, test it and get it implemented.</p>
<br/>
<p>How to apply security patches:</p>
<p><a href="https://support.hypernode.com/knowledgebase/how-to-apply-magento-patches/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-apply-magento-patches/</a></p>
<p>How to update Magento:</p>
<p><a href="https://support.hypernode.com/knowledgebase/updating-magento/" target="_blank">https://support.hypernode.com/knowledgebase/updating-magento/</a></p>
<br/>
<p>Follow Magento Security best practices:</p>
<br/>
<p><a href="https://magento.com/security/best-practices/security-best-practices" target="_blank">https://magento.com/security/best-practices/security-best-practices</a></p>
<br/>
<p>2. Protect WP blogs and pages</p>
<br/>
<p>Second actual vector by popularity is Word Press compromisation. </p>
<p>Keep WordPress up-to-date, Keep plugins and themes up-to-date, Delete any plugins or themes you're not using.</p>
<p>Regularity is the key!</p>
<br/>
<p>More information about hardening the WP: </p>
<p><a href="https://codex.wordpress.org/Hardening_WordPress" target="_blank">https://codex.wordpress.org/Hardening_WordPress</a></p>
<br/>
<p>3. Protect from the brute force attack</p>
<br/>
<p>Each Magento shop comes standard with several sections for administrative purposes (also called “back-end” or “admin panel”). </p>
<p>These are by default located at /admin, /downloader and various /rss endpoints (such as /rss/catalog/notifystock/) and can be abused in several ways.</p>
<br/>
<p>Good recommendations from byte.nl, Magento and Magemojo can be found here:</p>
<p><a href="https://support.hypernode.com/knowledgebase/how-to-protect-your-magento-store-against-brute-force/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-protect-your-magento-store-against-brute-force/</a></p>
<p><a href="https://magento.com/security/best-practices/protect-your-magento-installation-password-guessing-new-update" target="_blank">https://magento.com/security/best-practices/protect-your-magento-installation-password-guessing-new-update</a></p>
<p><a href="http://kb.magemojo.com/display/CK/Securing+Magento+1.x+against+malware+and+brute+force+attacks" target="_blank">http://kb.magemojo.com/display/CK/Securing+Magento+1.x+against+malware+and+brute+force+attacks</a></p>
<br/>
<p>Use strong passwords!!!</p>
<br/>
<p>4. Protect Magmi</p>
<p>Magmi, the Magento mass importer, is an alternative product importer offering better performance over the default Magento importer.
This makes it a very powerful yet also dangerous tool as it effectively offers full access to your Magento webshop database.
Tips to protect Magmi:</p>
<br/>
<p><a href="https://support.hypernode.com/knowledgebase/how-to-secure-magmi-2/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-secure-magmi-2/</a></p>
<br/>
<p>5. While under development follow next recommendations</p>
<br/>
<p><a href="https://support.hypernode.com/knowledgebase/how-to-secure-development-files/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-secure-development-files/</a></p>
<br/>
<p>6. How to secure Magento version control systems/platforms</p>
<br/>
<p><a href="https://support.hypernode.com/knowledgebase/how-to-secure-version-control-systemsplatforms/" target="_blank">https://support.hypernode.com/knowledgebase/how-to-secure-version-control-systemsplatforms/</a></p>
<br/>
<p>7. Read the security topics at Magento community forum</p>
<br/>
<p><a href="https://community.magento.com/" target="_blank">https://community.magento.com/</a></p>
            </div>
          </article>
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              <a href="/best-practices-mechants">For Merchants / End Users</a>
            </h1>
            <div class="msc-block-info">
            <p>Get a Magento security review done</p>
<br/>
<p>Magento developers are not necessarily security experts. Yes, many of them are good at coding but only few know the intricacies of Magento site security. </p>
<br/>
<p>This is why once (or perhaps, twice) a year, you should get your website analyzed for apparent loopholes and security shortcomings. </p>
<p>If properly done, these reviews help in further hardening of your Magento security measures.</p>
<br/>
<p>Run <a href="https://www.magereport.com/" target="_blank">https://www.magereport.com/</a></p>
<br/>
<p><ul>
    <li>Make sure that the computer that is used to access the Magento Admin is secure.</li>
    <li>Keep your antivirus software up to date, and use a malware scanner. Do not install any unknown programs, or click suspicious links.</li>
    <li>Use a strong password to log into the computer, and change it periodically. Use a password manager to create and manage secure, unique passwords.</li>
    <li>Do not save FTP passwords in FTP programs, because they are often harvested by malware and used to infect servers.</li>
    <li>Have an <a href="https://github.com/talesh/response" target="_blank">incident response plan</a>.</li>
</ul></p>
            </div>
          </article>
@endsection
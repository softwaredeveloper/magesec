@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title code">
              Mage Malware Scanner Instructions
            </h1>

          <div class="msc-block-info">



<p>
<p><h1 class="msc-block__title code"><strong>Quickstart &amp; Run Anywhere</strong></h1></p>
<p><pre class="prettyprint language-bash code"><code>wget https://magesec.org/download/grep-standard.txt
grep -Erlf grep-standard.txt /path/to/magento</code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title code"><strong>Install on Debian/Ubuntu</strong></h1></p>
<p><pre class="prettyprint language-bash code"><code># Install prerequisites on Debian/Ubuntu flavoured server
sudo apt install -qy python-pip gcc python-dev
sudo pip install --upgrade mwscan</code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title code"><strong>Install on Centos</strong></h1></p>
<p><pre class="prettyprint language-bash code"><code># If you don't have EPEL yet, for CentOS 6:
wget https://dl.fedoraproject.org/pub/epel/epel-release-latest-6.noarch.rpm
sudo rpm -ivh epel-release-latest-6.noarch.rpm
# Install prerequisites on Centos flavoured server
sudo yum -y install python-pip python-devel gcc
sudo pip install --upgrade mwscan </code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title code"><strong>Install on OSX</strong></h1></p>
<p><pre class="prettyprint language-bash code"><code># Install prerequisites on a Mac OSX environemnt
brew install yara python
sudo pip install --upgrade mwscan</code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title code"><strong>Run Manually</strong></h1></p>
<p>Once installed using the instructions above, you can now run  and any hits will appear:</p>
<p><pre class="prettyprint language-bash code"><code>mwscan --ruleset magesec /path/to/magento</code></pre>
<p>Example results:</p>
<p><pre class="prettyprint language-bash code"><code>eval_post /path/to/magento/media/dhl/info.php
obfuscated_eval /path/to/magento/skin/backdoor1.php</code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title code"><strong>Run Automatically Using Cron</strong></h1></p>
<p>It is recommended to follow the installation instructions above and then run nightly from cron. This will update the latest rules every night, run a scan on your Magento store and mail you if anything was found:</p>
<p><pre class="prettyprint language-bash code"><code>cat &lt;&lt;'EOM' | sudo tee /etc/cron.d/mwscan

MAILTO=you@yourdomain.com
MAGENTO=/path/to/magento

10 2 * * * root /usr/bin/mwscan --ruleset magesec --quiet --newonly $MAGENTO
EOM
</code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title code"><strong>Run Automatically Using Advanced Cron</strong></h1></p>
<p>This cron will ensure only a single concurrent scan, will log timestamped new finds to /var/log/mwscan.log and mail them to the supplied address. Requires <code class="prettyprint">util-linux</code>, <code class="prettyprint">moreutils</code> and <code class="prettyprint">mailutils</code> on Ubuntu/Debian for <code class="prettyprint">flock</code>, <code class="prettyprint">ifne</code>, <code class="prettyprint">ts</code>, and <code class="prettyprint">mail</code>:</p>
<p><pre class="prettyprint language-bash code"><code>cat &lt;&lt;'EOM' | sudo tee /etc/cron.d/mwscan

MAILTO=you@yourdomain.com
MAGENTO=/var/www/magento

MWSCAN=/usr/bin/mwscan
MWSCANLOCK=~/.mwscan.lock
MWSCANLOG=/var/log/mwscan.log
MWSCANFROM="From: Malware Scanner &lt;noreply@yoursite.com&gt;"
PATH=/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin

0 2 * * * root flock -n $MWSCANLOCK $MWSCAN --ruleset magesec --newonly --quiet $MAGENTO | ts | tee -a $MWSCANLOG | ifne mail -s "Malware found at $(hostname)" -a $MWSCANFROM $MAILTO
EOM</code></pre></p>
</p>

<p>
<p><h1 class="msc-block__title code"><strong>IPS in Apache/Nginx</strong></h1></p>
<p>The malware fingerprints are also published as mod_security rules to be used as an Intrusion Prevention System in Apache and Nginx:</p>
<p><pre class="prettyprint language-bash code"><code>wget https://magesec.org/download/modsecurity.conf</code></pre></p>
</p>

<p><h1 class="msc-block__title code"><strong>Troubleshooting</strong></h1></p>
<p>When you receive the error <code class="prettyprint">pkg_resources.DistributionNotFound: requests</code> try to upgrade the <code class="prettyprint">request</code> package as follows:</p>
<p><pre class="prettyprint language-bash code"><code>pip install --upgrade requests</code></pre></p>


</div>
</article>
@endsection

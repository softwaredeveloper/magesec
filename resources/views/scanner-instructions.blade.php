@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              Mage Malware Scanner Instructions
            </h1>

          <div class="msc-block-info">



<p>
<p><h1 class="msc-block__title"><strong>Quickstart & Run Anywhere</strong></h1></p>
<p><pre class="prettyprint code"><code class="language-bash">wget https://magesec.org/download/grep-standard.txt
grep -Erlf grep-standard.txt /path/to/magento</code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title"><strong>Install on Debian/Ubuntu</strong></h1></p>
<p><pre class="prettyprint code"><code class="language-bash"># Install prerequisites on Debian/Ubuntu flavoured server
sudo apt install -qy python-pip gcc python-dev
sudo pip install --no-cache-dir --upgrade mwscan</code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title"><strong>Install on Centos</strong></h1></p>
<p><pre class="prettyprint code"><code class="language-bash"># If you don't have EPEL yet, for CentOS 6:
wget https://dl.fedoraproject.org/pub/epel/epel-release-latest-6.noarch.rpm
sudo rpm -ivh epel-release-latest-6.noarch.rpm
# Install prerequisites on Centos flavoured server
sudo yum -y install python-pip python-devel gcc
sudo pip install --no-cache-dir --upgrade mwscan </code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title"><strong>Install on OSX</strong></h1></p>
<p><pre class="prettyprint code"><code class="language-bash"># Install prerequisites on a Mac OSX environemnt
brew install yara python
sudo pip install --no-cache-dir --upgrade mwscan</code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title"><strong>Run Manually</strong></h1></p>
<p>Once installed using the instructions above, you can now run  and any hits will appear:</p>
<p><pre class="prettyprint code"><code class="language-bash">mwscan /path/to/magento</code></pre>
<p>Example results:</p>
<p><pre class="prettyprint code"><code class="language-bash">eval_post /path/to/magento/media/dhl/info.php
obfuscated_eval /path/to/magento/skin/backdoor1.php</code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title"><strong>Run Automatically Using Cron</strong></h1></p>
<p>It is recommended to follow the installation instructions above and then run nightly from cron. This will download the latest rules every night, run a scan on your Magento store and mail you if anything was found:</p>
<p><pre class="prettyprint code"><code class="language-bash">cat &lt;&lt;EOM | sudo tee /etc/cron.d/mwscan

MAILTO=you@yourdomain.com
RULESURL=https://magesec.org/download/yara-standard.yar
RULEFILE=/var/cache/rules.yar
MAGENTO=/path/to/magento
MWSCAN=/usr/bin/mwscan

10 2 * * * root /usr/bin/curl -s $RULESURL -o $RULEFILE &amp;&amp; $MWSCAN --quiet --newonly --rules $RULEFILE $MAGENTO
EOM
</code></pre></p>
</p>
<p>
<p><h1 class="msc-block__title"><strong>Run Automatically Using Advanced Cron</strong></h1></p>
<p>This cron will ensure only a single concurrent scan, will log timestamped new finds to /var/log/mwscan.log and mail them to the supplied address. Requires <code class="prettyprint">util-linux</code>, <code class="prettyprint">moreutils</code> and <code class="prettyprint">mailutils</code> on Ubuntu/Debian for <code class="prettyprint">flock</code>, <code class="prettyprint">ifne</code>, <code class="prettyprint">ts</code>, and <code class="prettyprint">mail</code>:</p>
<p><pre class="prettyprint code"><code class="language-bash">MAILTO=you@yourdomain.com
RULESURL=https://magesec.org/download/yara-standard.yar
RULEFILE=/var/cache/rules.yar
MAGENTO=/var/www/magento
MWSCAN=/usr/bin/mwscan
MWSCANLOCK=~/.mwscan.lock
MWSCANLOG=/var/log/mwscan.log
MWSCANFROM="From: Malware Scanner &lt;noreply@yoursite.com&gt;"
PATH=/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin

0 2 * * * root /usr/bin/curl -s $RULESURL -o $RULEFILE && flock -n $MWSCANKLOCK $MWSCAN --newonly --quiet $MAGENTO | ts | tee -a $MWSCANLOG | ifne mail -s "Malware found at $(hostname)" -a $MWSCANFROM $MAILTO</code></pre></p>
</p>

<p>
<p><h1 class="msc-block__title"><strong>IPS in Apache/Nginx</strong></h1></p>
<p>The malware fingerprints are also published as mod_security rules to be used as an Intrusion Prevention System in Apache and Nginx:</p>
<p><pre class="prettyprint code"><code class="language-bash">wget https://magesec.org/download/modsecurity.conf</code></pre></p>
</p>

<p><h1 class="msc-block__title"><strong>Troubleshooting</strong></h1></p>
<p>When you receive the error <code class="prettyprint">pkg_resources.DistributionNotFound: requests</code> try to upgrade the <code class="prettyprint">request</code> package as follows:</p>
<p><pre class="prettyprint code"><code class="language-bash">easy_install --upgrade requests</code></pre></p>


</div>
</article>
@endsection
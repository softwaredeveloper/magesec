@extends('layouts.app')

@section('content')
<article class="msc-block">
  <h1 class="msc-block__title">
    Mage Malware Scanner
  </h1>
</article>
<article class="msc-block">
  <h2>Malware Detection Suite for Magento</h2>
  <p>The Mage Malware Scanner project is a scanner for known Magento malware. The scanner uses yara (<a href="http://virustotal.github.io/yara/" target="_blank">http://virustotal.github.io/yara/</a>) for malware scanning as well as customized whitelisting for known good magento core files to speed up scanning. If yara is not installed it will default back to using grep to find malware strings, however yara is recommened to be installed for more granular scanning.</p>
  <p><a href="https://github.com/gwillem/magento-malware-scanner/" target"_blank">Download the Scanner from Github</a></p>
  <p><a href="http://magesec.org/download/rules-latest.tar.gz">Download latest Rules</a></p>
</article>
<article class="msc-block">
  <h2>Project Contributors</h2>
  <ul>
   @foreach ($rules as $rule)
   <li>{{ $rule->name }}</li>
   @endforeach
 </ul>
</article>


@endsection
@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              Malware Detection Suite for Magento
            </h1>

          <div class="msc-block-info">
<p>The scanner uses yara (http://virustotal.github.io/yara/) for malware scanning as well as customized whitelisting for known good magento core files to speed up scanning. If yara is not installed it will default back to using grep to find malware strings, however yara is recommened to be installed for more granular scanning.

<h1>Usage: ./magescecurityscan.sh [fast|standard|deep] [all|code] [ hash|size|none]</h1>
<h1>Path to Scan</h1>
<p>Defines the path to scan, recursively scans all subfolders</p>
<h1>Rules File</h1>
<p>The rules file to use, yararules.yar and yararules-deep.yar are supplied. The deep scan file can include false positives and is used primarily for discovery of new malware.</p>
<h1>Scan Type</h1>
<p>deep ..* scans files with all rules, includes loose rules for code obfuscation ..* includes sha1 whitelist ..* defaults to all precision</p>
<p>standard ..* scans files with rules with no known false positives ..* includes sha1 whitelist ..* defaults to code only precision</p>
<p>fast ..* scans files with rules with no known false positives ..* includes file size whitelist ..* defaults to code only precision</p>
<h1>Scan Precision</h1>
<p>all - scans all files and subdirectories regardless of type</p>
<p>code - scans files with the following extensions php,phtml,js,html</p>
<h1>Whitelist Option</h1>
<p>Defines the type of whitelist to use. Scans based on filesize could potentially be decieved however are mush faster than the hash method. Specifing none will scan all files.</p>
</div>
</article>
@endsection
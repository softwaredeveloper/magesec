@extends('layouts.app')

@section('content')
<article class="msc-block">
  <h1 class="msc-block__title">
    Security Tools
  </h1>
</article>
<article class="msc-block">
  <h1 class="msc-block__title">
    <a href="https://www.magereport.com" target="blank">Mage Report<a>
    </h1>
    <div class="msc-block-info">
      <p>MageReport checks your Magento site for missing or incomplete patches, server misconfigurations and other vulnerabilities. MageReport has generated already more than 5 million reports, to help merchants and agencies improve the security of their e-commerce presence.</p>
    </div>
  </article>
<article class="msc-block">
  <h1 class="msc-block__title">
    <a href="/scanner">Mage Malware Scanner</a>
  </h1>
  <div class="msc-block-info">
    <p>A server-side malware detection suite for Magento. Continually evolving to add in detection of the latest threats found in the Magento platform.</p>
  </div>
</article>
  <article class="msc-block">
    <h1 class="msc-block__title">
      <a href="https://github.com/magesec/magesecuritypatcher">Mage Security Patcher</a>
    </h1>
    <div class="msc-block-info">
      <p>A more effective alternative to the standard magento patches. Instead of working on diffs of files it updates the entire file to the fully patched version. The complete patch also adds in form keys into custom templates that would not be included in the standard patch libraries.</p>
    </div>
  </article>
  @endsection
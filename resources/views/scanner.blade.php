@extends('layouts.app')

@section('content')
<article class="msc-block">
  <h1 class="msc-block__title">
    About Mage Malware Scanner
  </h1>
</article>
<article class="msc-block">
  <p>
  <em>"Together we can combine our malware findings from the wild and share our knowledge with one another to defend and protect our fellow Magento community members." - Eric Hileman, CEO MageMojo</em>
  </p>
  <p>
  The Mage Malware Scanner project is based on Willem de Groot's local filesystem malware scanner. By working together with fellow council members, his scanner was extended to work in all environments, and auto update from a central repository of rules maintained here on the magesec.org website.
  </p>
  <p>
  The central rule repository is maintained here in the magesec.org database.  When a rule is submitted it is automatically scanned for a pre-check to confirm the rule does not trigger any false positives.  If pre-checks pass, the rule is then automatically submitted to the Council Members for approval.  The Council Members review and approve the rule which is then automatically included into the downloadable ruleset. You, the Contributor, will appear below in the list of Project Contributors.  You can upload and edit your rules by registering an account on <a href="/register">magesec.org</a>.
  </p>
  <p>
  <a href="/scanner-instructions">Getting Started Guide</a>
  </p>  
   <p>
  <a href="/scanner-rules">How To Contribute Malware</a>
  </p>  
  <p>
  <a href="/scanner-whitelist">How To Whitelist A File</a>
  </p>    
  <p>
  <a href="https://github.com/gwillem/magento-malware-scanner/blob/master/docs/usage.md" target"_blank">Mage Malware Scanner Github Project</a>
  </p>
  <p>
  <a href="http://magesec.org/download/rules-latest.tar.gz">Download Latest Definitions</a>
  </p>
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
@extends('layouts.app')

@section('content')
<article class="msc-block">
  <h1 class="msc-block__title">
    Magento Security News
  </h1>
  <div class="msc-block--news">
    <p><em>February 1, 2017</em></p>
    <p>A security vulnerability has been found in the following extensions:</p>
    <ul>
      <li><strong>Cart2Quote</strong> - Ophirah_Qquoteadv</li>
      <li><strong>Ajax Cart Pro</strong> - EM_Ajaxcart</li>
    </ul>
    <p>Exploits have been found in the wild. Contact each vendor for a patched version.</p>
  </div>            
  <div class="msc-block--news">
    <p><em>January 13, 2017</em></p>
    <p>Magento has acknowledged a new potential remote code execution vulnerability in both Magento 1 and 2. This security risk is easily mitigated by changing the follwing setting in the magento admin. The values 'No/Specified' are not vulnerable. Approximately 5% of MAgento stores have this option enabled and are at risk.</p>
    <ul>
      <li><strong>Magento 1:</strong> System-> Configuration-> Advanced-> System-> Mail Sending Settings-> Set Return-Path</li>
      <li><strong>Magento 2:</strong> Stores-> Configuration-> Advanced-> System-> Mail Sending Settings-> Set Return-Path</li>
    </ul>

    <p>Full exploit details are here:<br/> <a href="https://magento.com/security/news/new-zend-framework-1-security-vulnerability" target="_blank">https://magento.com/security/news/new-zend-framework-1-security-vulnerability</a></p>
  </div>            
</article>

@endsection
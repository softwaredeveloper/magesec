@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              Mage Security Scanner
            </h1>
            <div class="msc-block-info">
              <h2>Malware Detection Suite for Magento</h2>
              <p>The magesecurityscanner project is a scanner for known Magento malware. The scanner uses yara (<a href="http://virustotal.github.io/yara/" target="_blank">http://virustotal.github.io/yara/</a>) for malware scanning as well as customized whitelisting for known good magento core files to speed up scanning. If yara is not installed it will default back to using grep to find malware strings, however yara is recommened to be installed for more granular scanning.</p>
			  <h2><a href="https://github.com/magesec/magesecurityscanner" target"_blank">Download the Scanner from Github</a></h2>
			  <h2><a href="">Download latest Rules</a></h2>
			  <h2>Top Rule Contributors</h2>
			  <ul>
			  <li>Hulk Hogan - 100 Rules</li>
			  <li>Mark Twain - 50 Rules</li>
			  </ul>
            </div>
          </article>


@endsection
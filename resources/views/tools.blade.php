@extends('layouts.app')

@section('content')
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              Security Tools
            </h1>
          </article>
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              <a href="/scanner">Site Malware Scanner</a>
            </h1>
            <div class="msc-block-info">
            <p>A malware detection suite for Magento. Continually evolving to add in detection of the latest threats found in the Magento platform.</p>
            </div>
          </article>
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              <a href="http://magereport.com" target="blank">Magereport<a>
            </h1>
            <div class="msc-block-info">
            <p>Desc</p>
            </div>
          </article>
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              <a href="https://github.com/magesec/magesecuritypatcher">Magemojo Complete Patch</a>
            </h1>
            <div class="msc-block-info">
            <p>A more effective alternative to the standard magento patches. Instead of working on diffs of files it updates the entire file to the fully patched version. The complete patch also adds in form keys into custom templates that would not be included in the standard patch libraries.</p>
            </div>
          </article>
          <article class="msc-block msc-slider">
            <h1 class="msc-block__title">
              <a href="https://github.com/netz98/n98-magerun" target="_blank">n98-magerun</a>
            </h1>
            <div class="msc-block-info">
            <p>The n98 magerun cli tools provides some handy tools to work with Magento from command line.</p>
            </div>
          </article>
@endsection
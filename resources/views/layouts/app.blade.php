<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Mage Security Council</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.min.css">
  <style>
  .pagination {
      list-style-type: none;
      margin: 0;
      padding: 0;
  }
  .pagination li {
      display: inline;
  }
  </style>
</head>

<body>
  <header class="msc-head">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-light msc-nav">
            <a href="/" class="msc-logo"><img src="images/msc-logo.png" alt="msc-logo" class="msc-logo"></a>
            <button class="navbar-toggler hidden-sm-up float-xs-right" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-toggleable-xs msc-navbar" id="navbar-header">
              <ul class="nav navbar-nav msc-nav-list msc-nav-uset float-xs-right">
                @if (Auth::check())
                <li class="nav-item">
				  <a class="nav-link" href="/home">Account</a>
                </li>
                <li class="nav-item">
				  <a class="nav-link" href="/logout">Logout</a>
                </li>
                @else
                <li class="nav-item">
                  <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/login">Login</a>
                </li>
                @endif
              </ul>
              <ul class="nav navbar-nav msc-nav-list float-xs-right">
                @php
                if (!isset($nav)) {
                  $nav = 'none';
                }
                @endphp
                @if ($nav === 'index')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                  <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                @if ($nav === 'scanner')
                <li class="nav-item active">
                @else
				<li class="nav-item">
                @endif
                <a class="nav-link dropdown-toggle" href="./page.html" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Site Scanner</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/scanner">Scanner Home</a>
                    <a class="dropdown-item" href="/scanner-instructions">Instructions</a>
                    <a class="dropdown-item" href="/scanner-rules">Contribute Rules</a>
                    <!--<a class="dropdown-item" href="/scanner-whitelist">Contribute Whitelisting</a>//-->
                  </div>
                </li>
                @if ($nav === 'tools')
                <li class="nav-item active">
                @else
				<li class="nav-item">
                @endif
                  <a class="nav-link" href="/tools">Tools</a>
                </li>
                @if ($nav === 'practices')
                <li class="nav-item active">
                @else
				<li class="nav-item">
                @endif
                  <a class="nav-link" href="/best-practices">Best Practices</a>
                </li>
                @if ($nav === 'council')
                <li class="nav-item active">
                @else
				<li class="nav-item">
                @endif
                  <a class="nav-link" href="council">Security Council</a>
                </li>
                @if ($nav === 'about')
                <li class="nav-item active">
                @else
				<li class="nav-item">
                @endif
                  <a class="nav-link" href="/about">About</a>
                </li>
              </ul>
            </div>
          </nav> <!-- /navbar -->
        </div>
      </div>
    </div>
  </header> <!-- Header -->
    <main class="msc-content">
      <div class="container">
        <div class="row">
          <div class="col-md-8 msc-content__left">

           @yield('content')

          </div>
          @include('sidebar')
        </div>
      </div>
  </main>
  <footer class="msc-foot">
    <div class="container">
      <div class="col-md-12">
        <ul class="msc-list msc-list--inline">
          <li><a href="/contact">Contact</a></li>
          <li><a href="/tos">Terms of Service</a></li>
          <li><a href="/privacy">Privacy Policy</a></li>
        </ul>
        <p>Copyright &copy; @php print date('Y'); @endphp Mage Security Council. All Rights Reserved.</p>
      </div>
    </div>
  </footer>
  <!--
  -- Localizing the resources --
  <script src="js/jquery-1.12.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  -->
  <script
  src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/jquery.flexslider-min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>

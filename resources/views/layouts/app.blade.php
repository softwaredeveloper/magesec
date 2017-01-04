<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Mage Security Council</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.min.css">
</head>

<body>
  <header class="msc-head">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-light msc-nav">
            <a href="./index.html" class="msc-logo"><img src="images/msc-logo.png" alt="msc-logo" class="msc-logo"></a>
            <button class="navbar-toggler hidden-sm-up float-xs-right" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-toggleable-xs msc-navbar" id="navbar-header">
              <ul class="nav navbar-nav msc-nav-list msc-nav-uset float-xs-right">
                @if (Auth::check())
                <li class="nav-item">
				  <a class="nav-link" href="/home">Account</a>
                </li>
                @else
                <li class="nav-item">
                  <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/register">Register</a>
                </li>
                @endif
              </ul>
              <ul class="nav navbar-nav msc-nav-list float-xs-right">
                <li class="nav-item active">
                  <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="./page.html" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Site Scanner</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/scanner">Scanner Home</a>
                    <a class="dropdown-item" href="./page.html">Instructions</a>
                    <a class="dropdown-item" href="./page.html">Contribute Roles</a>
                    <a class="dropdown-item" href="./page.html">Contribute Whitelisting</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./page.html">Security Council</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./page.html">Faq</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./page.html">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./page.html">Label</a>
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
          <article class="msc-block msc-slider">
           @yield('content')
            </article>
          </div>
          @include('sidebar')
        </div>
      </div>
  </main>
  <footer class="msc-foot">
    <div class="container">
      <div class="col-md-12">
        <ul class="msc-list msc-list--inline">
          <li><a href="#">Contact</a></li>
          <li><a href="#">TOS</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
        <p>&copy; Copyright Mage Security Council. All Rights Reserved.</p>
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

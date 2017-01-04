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
                  <a class="nav-link" href="/home">Home</a>
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
                  <a class="nav-link" href="./page.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="./page.html" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Site Scanner</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="./page.html">Scanner Home</a>
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
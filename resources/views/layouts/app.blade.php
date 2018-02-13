<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('includes.head')
</head>
<body>
<div id="app">
    <div class="container-fluid no-padding">
        <nav id='main-nav' class="header row navbar navbar-expand-lg navbar-dark fixed-top" role="navigation">
            <h1 class="text-center">{{ config('constants.SITE_NAME') }}</h1>
            <div class="collapse navbar-collapse" id="navbar">
                <div class="nav navbar-nav justify-content-center">
                    <a class="nav-item active nav-link" href="/">Home</a>
                    <a class="nav-item nav-link" href="/next_tournament">Current Tournament</a>
                    <a class="nav-item nav-link" href="/previous_tournament">Past Tournaments</a>
                    <a class="nav-item nav-link" href="/gallery">Gallery</a>
                </div>
                <div class="nav navbar-nav ml-auto">
                    @if(Auth::guest())
                        <a class="nav-item nav-link" href="/register"><span class="glyphicon glyphicon-user"></span>
                            Sign Up</a>
                        <a class="nav-item nav-link" href="/login"><span class="glyphicon glyphicon-log-in"></span>
                            Login</a>
                    @else
                        <a class="nav-item nav-link" href="/profile/display"><span
                                    class="glyphicon glyphicon-user"></span> Profile</a>
                        <a class="nav-item nav-link" href="/logout"><span class="glyphicon glyphicon-log-in"></span>
                            Logout</a></li>
                    @endif
                </div>
            </div>

            </header>
        </nav>


        <div id="main" class="row content"> @yield('content') </div>


    </div>
</div>
<footer class="row"> @include('includes.footer') </footer>
</body>
</html>


<!doctype html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <header> @include('includes.header') </header>
            </div>

            <div id="main" class="row"> @yield('content') </div>

            <div class="row">
                <footer> @include('includes.footer') </footer>
            </div>
        </div>
    </body>
</html>


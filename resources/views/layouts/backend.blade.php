<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('includes.head')
    <link rel="stylesheet" href="/css/backend.css">
</head>
<body>
<div id="app">
    <div id="backend-main" class="row content"> @yield('content') </div>
</div>
<footer class="row"> @include('includes.footer') </footer>
</body>
</html>


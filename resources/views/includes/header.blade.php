<title> {{ SITE_NAME }}</title>
<div class="header">
    <div class="header_text"><h1>{{ config('constant.SITE_NAME') }}</h1></div>
</div>

<div class="container-fluid">
    <div id="main-nav">
        @include('layouts.main-nav')
    </div>
    <div id="auth-nav">
        @if((Auth::check()) && Auth::user()->isAdmin)
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/backend/home">Site Control</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="/backend/pages/browse">Manage Pages</a></li>
                        <li><a href="/backend/tournament/browse">Manage Tournaments</a></li>
                        <li><a href="/backend/users/browse">Manage Users</a></li>
                    </ul>
                </div>
            </nav>
        @endif
    </div>
</div>


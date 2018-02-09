<nav class="navbar navbar-expand-lg navbar-dark bg-primary" role="navigation">
    <a class="navbar-brand" href="/">{{config('constants.site_name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <div class="nav navbar-nav">
            <a class="nav-item active nav-link" href="/">Home</a>
            <a class="nav-item nav-link" href="/next_tournament">Current Tournament</a>
            <a class="nav-item nav-link" href="/previous_tournament">Past Tournaments</a>
            <a class="nav-item nav-link" href="/gallery">Gallery</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            @if(Auth::guest())
                <a class="nav-item nav-link" href="/register"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
                <a class="nav-item nav-link" href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a>
            @else
                <a class="nav-item nav-link" href="/profile/display"><span class="glyphicon glyphicon-user"></span>
                    Profile</a>
                <a class="nav-item nav-link" href="/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
            @endif
        </div>
    </div
</nav>
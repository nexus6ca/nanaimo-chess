@extends('layouts.backend')
@section('content')
    <div class="container-fluid">
        <div class="section-white-backend">
            <div class="section-heading row"><h2 class="text-center">Site Controls</h2></div>
            <div class="row justify-content-center" id="site-controls">
                <display-site-page csrf='@csrf'></display-site-page>
           </div>
        </div>
    </div>
@endsection

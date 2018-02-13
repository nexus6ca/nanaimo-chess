@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="first section-white row">
            {!!  $home['news']->entry !!}

        </div>

        <div class="section-grey row">
            Our Next Tournament
        </div>

        <div class="section-white row">
            Upcoming Tournaments
        </div>

        <div class="section-grey row">
            Last Tournament Report
        </div>

        <div class="section-blue row">
            Slider section
        </div>
    </div>
@endsection
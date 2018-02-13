@extends('layouts.backend')

@section('content')
    <div class="container-fluid no-padding" id="add-form">
        <div class="section-white">
            <h2 class="section-heading">Add Page</h2>
            <div class="row">
                <div class="col-lg-9">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal card-text" role="form" method="POST" action="/backend/add-page">
                        @csrf
                        <div class="form-group-lg row">
                            <div class="col-lg-6">
                                <label for="page-name">Page Name</label>
                                <input id="page-name" class="form-control" name="page-name" value="{{ old('page-name') }}">
                                @if ($errors->has('page-name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('page-name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label for="page-category">Page Category</label>
                                <select id="page-category" class="form-control" name="page-category" value="{{ old('page-category') }}">
                                    <option value="news">News</option>
                                    <option value="upcoming">Upcoming Tournaments</option>
                                    <option value="next">Next Tournament</option>
                                    <option value="last">Last Tournament</option>
                                    <option value="club">Clubs</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group-lg">
                            <label for="page-content">Page Content</label>
                            <textarea id="page-content" class="form-control" name="page-content" value=" {{ old('page-content') }}"></textarea>
                            @if ($errors->has('page-name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('page-content') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <button type="submit">Submit</button>
                    </form>
                </div>
                <div class="col-lg-3">

                </div>
            </div>
        </div>
    </div>
@endsection
{{--@extends('baselayout._layout')--}}
{{--@section('body')--}}
    <div class="container">
        <form method="get" action="{{route('video.search')}}">
            <div class="form-control">
                <label>Search</label>
                <input type="text" name="query">
            </div>
            <div class="form-control">
                <input type="submit" name="search" value="Search" class="btn btn-primary">
            </div>
        </form>

    </div>
{{--@endsection--}}
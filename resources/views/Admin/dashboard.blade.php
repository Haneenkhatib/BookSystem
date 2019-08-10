@extends('baselayout._layout')
@section('body')
    <h1 class="page-title"> Admin Dashboard
        <small>Requests & users info</small>
    </h1>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="details">
                <div class="dashboard-stat dashboard-stat-v2 blue">
                <div class="number">
                    <span data-counter="counterup">{{$requestsNum}}</span>
                </div>
                <div class="desc"> Requests </div>
                </div>
            </div>
        </div>
    </div>
@endsection

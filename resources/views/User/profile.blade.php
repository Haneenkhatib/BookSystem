@extends('baselayout._layout')
@section('style')
    <style>
        .btn-info{
            margin-left: 10px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
@endsection
@section('body')
    <div class="row">
        <div class="profile-header-wrapper">
            <div class="container">
                @if($user->image != '')
                    <img class="img-thumbnail img-responsive center-block" width="180" src="{{ $user->image }}">
                @endif
                    Name : <h1>{{ $user->name }}</h1>
                    UserName : <h2>@ {{ $user->username }}</h2>
                    Phone : <h2>{{ $user->phone }}</h2>
                    Email : <h2>{{ $user->email }}</h2>
            </div>
            <div >
            <a href="{{route('user.requests',['$id'=>$user->id])}}"
               class="btn btn-info"
            >View Requests</a>
            </div><br><br>
            <div class="col-lg-12">
                <a href="{{route('user.index')}}" class="btn btn-default">Back</a>

            </div>
        </div>
    </div>

@endsection

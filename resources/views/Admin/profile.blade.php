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
                <h2>Admin Profile</h2>
                Name : <h1>{{ $admin->name }}</h1>
                UserName : <h2>@ {{ $admin->username }}</h2>
                Phone : <h2>{{ $admin->phone }}</h2>
                Email : <h2>{{ $admin->email }}</h2>
                <a class="btn btn-primary" href="{{route('admin.edit',['id'=>$admin->id])}}">Edit</a>
            </div>
        </div>
    </div>

@endsection

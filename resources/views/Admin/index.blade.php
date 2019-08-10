@extends('baselayout._layout')
@section('style')
    <style>
        .fa-book,.fa-search{
            margin-left: 10px;
        }
        td,th{
            text-align: center;
        }
    </style>

@endsection
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel panel-heading"><i class="fa fa-search"></i>@lang('lang.Search')</div>
                <div class="panel panel-body">
                    <form action="{{route('admin.index')}}" method="get">
                        <div class=" form-group col-sm-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{app('request')->get('name')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="{{app('request')->get('username')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="email">	Email</label>
                            <input type="text" name="email" value="{{app('request')->get('email')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" value="{{app('request')->get('phone')}}">
                        </div>
                        <div class=" form-group col-md-12">
                            <input type="submit" value="@lang('lang.Search')" class="btn btn-primary">
                            <a class=" btn btn-default" href="{{route('admin.index')}}">@lang('lang.cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel panel-heading"><i class="fa fa-diamond"></i>Requests</div>
                <div class="panel panel-body">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead>
                        <tr>
                            <td>Name</td>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->username}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->phone}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        {{$admins->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

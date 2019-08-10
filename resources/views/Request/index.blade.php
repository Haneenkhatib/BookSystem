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
                    <form action="{{route('request.index')}}" method="get">
                        <div class=" form-group col-sm-4">
                            <label for="request_identifier">Book Identifier</label>
                            <input type="text" name="request_identifier" value="{{app('request')->get('request_identifier')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="book_amount">Book Amount</label>
                            <input type="text" name="book_amount" value="{{app('request')->get('book_amount')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="book_id">Book Id</label>
                            <input type="text" name="book_id" value="{{app('request')->get('book_id')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="user_id">User Id</label>
                            <input type="text" name="user_id" value="{{app('request')->get('user_id')}}">
                        </div>
                        <div class=" form-group col-md-12">
                            <input type="submit" value="@lang('lang.Search')" class="btn btn-primary">
                            <a class=" btn btn-default" href="{{route('request.index')}}">@lang('lang.cancel')</a>
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
                            <td>Request Identifier</td>
                            <td>User</td>
                            <th>book_amount</th>
                            <th>book_id</th>
                            <th>user_id</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{$request->request_identifier}}</td>
                                <td>
                                  <a href="{{route('request.userProfile',['id'=>$request->user_id])}}"> {{\App\User::findOrFail($request->user_id)->username}}</a>
                                </td>
                                <td>{{$request->book_amount}}</td>
                                <td>{{$request->book_id}}</td>
                                <td>{{$request->user_id}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        {{$requests->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('baselayout._layout')
@section('body')
    <div class="panel panel-success">
        <div class="panel panel-heading"><i class="fa fa-diamond"></i>Requests</div>
        <div class="panel panel-body">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead>
                <tr>
                    <th>Request Identifier</th>
                    <th>book_id</th>
                    <th>book amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{$request->request_identifier}}</td>
                        <td>{{$request->book_id}}</td>
                        <td>{{$request->book_amount}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <a href="{{route('user.profile',['$id'=>$request->user_id])}}"
       class="btn btn-info"
    >Back</a>

@endsection

@extends('baselayout._layout')
@section('style')
    <style>
        .fa-book, .fa-search {
            margin-left: 10px;
        }

        td, th {
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
                    <form action="{{route('user.index')}}" method="get">
                        <div class=" form-group col-sm-4">
                            <label for="name">@lang('userLang.Name')</label>
                            <input type="text" name="name" value="{{app('request')->get('name')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="username">@lang('userLang.Username')</label>
                            <input type="text" name="username" value="{{app('request')->get('username')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="email">@lang('userLang.Email')</label>
                            <input type="text" name="email" value="{{app('request')->get('email')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="phone">@lang('userLang.Phone')</label>
                            <input type="text" name="phone" value="{{app('request')->get('phone')}}">
                        </div>
                        <div class=" form-group col-md-12">
                            <input type="submit" value="@lang('lang.Search')" class="btn btn-primary">
                            <a class=" btn btn-default" href="{{route('user.index')}}">@lang('lang.cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel panel-heading"><i class="fa fa-user"></i>@lang('userLang.Users')</div>
                <div class="panel panel-body">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead>
                        <tr>
                            <th>@lang('userLang.Name')</th>
                            <th>@lang('userLang.Username')</th>
                            <th>@lang('userLang.Phone')</th>
                            <th>@lang('userLang.Email')</th>
                            <th># of requests</th>
                            <th>Enabled</th>
                            <th>@lang('lang.Options')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->RequestCount($user->id) }}</td>
                                <td>
                                    <input type="checkbox" class="make-switch" name="statues"
                                           data-value="{{$user->id}}"
                                           data-size="mini"
                                           id="switch"
                                            {{$user->enabled == '1' ?'checked ' :''}} />
                                </td>
                                <td>
                                    <a class="btn btn-danger delete-user"
                                       data-value="{{$user->id}}"
                                       data-name="{{$user->name}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a class="btn btn-primary" href="{{route('user.edit',['id' => $user->id])}}"><i
                                                class="fa fa-edit"></i></a>
                                    <a class="btn btn-primary" href="{{route('user.profile',['id' => $user->id])}}"><i
                                                class="fa fa-user"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.delete-user').click(function () {
            var name = $(this).data('name')
            var id = $(this).data('value')
            swal({
                    title: "@lang('lang.Are you sure?')",
                    text: "@lang('userLang.Do you want to delete user') " + name + " ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "@lang('lang.Yes, delete it!')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: false
                },
                function () {
                    window.location = '{{route('user.destroy')}}/' + id
                });
        })
    </script>


    <script>

        $(document).ready(function(){
            $('#switch').click(function () {
                var id = $(this).data('value')
                alert('hi')
                //     var checkbox = $(this).siblings('input[type=checkbox]')[0];
                // var toggle = $(this);
                {{--if (checkbox.checked) {--}}
                {{--window.location = '{{route('user.userEnabled')}}/' + id+'/1'--}}
                {{--} else {--}}
                {{--window.location = '{{route('user.userEnabled')}}/' + id+'/0'--}}
                {{--};--}}
            });
        })

    </script>
@endsection
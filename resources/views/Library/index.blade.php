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
                    <form action="{{route('library.index')}}" method="get">
                        <div class=" form-group col-sm-4">
                            <label for="name">@lang('libraryLang.Name')</label>
                            <input type="text" name="name" value="{{app('request')->get('name')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="phone">@lang('libraryLang.Phone')</label>
                            <input type="text" name="phone" value="{{app('request')->get('phone')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="email">@lang('libraryLang.Email')</label>
                            <input type="text" name="email" value="{{app('request')->get('email')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="fax">@lang('libraryLang.Fax')</label>
                            <input type="text" name="fax" value="{{app('request')->get('fax')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="address">@lang('libraryLang.Address')</label>
                            <input type="text" name="address" value="{{app('request')->get('address')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <select name="lang" id="lang" class="form-control">
                                <option value="-1">@lang('lang.choose_language')</option>
                                <option value="ar" {{app('request')->has('ar') ? 'selected' : ''}}>@lang('lang.Arabic')</option>
                                <option value="en" {{app('request')->has('en') ? 'selected' : ''}}>@lang('lang.English')</option>
                            </select>                        </div>
                        <div class=" form-group col-md-12">
                            <input type="submit" value="@lang('lang.Search')" class="btn btn-primary">
                            <a class=" btn btn-default" href="{{route('library.index')}}">@lang('lang.cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel panel-heading"><i class="fa fa-link"></i>@lang('libraryLang.Libraries')</div>
                <div class="panel panel-body">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead>
                        <tr>
                            <th>@lang('libraryLang.Name')</th>
                            <th>@lang('libraryLang.Phone')</th>
                            <th>@lang('libraryLang.Email')</th>
                            <th>@lang('libraryLang.Fax')</th>
                            <th>@lang('libraryLang.Address')</th>
                            <th>@lang('lang.Language')</th>
                            <th>@lang('lang.Options')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($libraries as $library)
                            <tr>
                                <td>{{$library->name}}</td>
                                <td>{{$library->phone}}</td>
                                <td>{{$library->email}}</td>
                                <td>{{$library->fax}}</td>
                                <td>{{$library->address}}</td>
                                <td>{{$library->lang}}</td>
                                <td>
                                    <a class="btn btn-danger delete-library"
                                       data-value="{{$library->id}}"
                                       data-name="{{$library->name}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a  class="btn btn-primary"  href="{{route('library.edit',['id' => $library->id])}}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        {{$libraries->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.delete-library').click(function () {
            var name = $(this).data('name')
            var id = $(this).data('value')
            swal({
                    title: "@lang('lang.Are you sure?')",
                    text: "@lang('libraryLang.Do you want to delete library') " + name + " ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "@lang('lang.Yes, delete it!')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: false
                },
                function () {
                    window.location = '{{route('library.destroy')}}/' + id
                });
        })
    </script>
@endsection
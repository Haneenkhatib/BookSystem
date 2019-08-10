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
                <div class="panel panel-heading"><i class="fa fa-search"></i> @lang('lang.Search')</div>
                <div class="panel panel-body">
                    <form action="{{route('category.index')}}" method="get">
                        <div class=" form-group col-sm-4">
                            <label for="name">@lang('categoryLang.Name')</label>
                            <input type="text" name="name" value="{{app('request')->get('name')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <select name="lang" id="lang" class="form-control">
                                <option value="-1">@lang('lang.choose_language')</option>
                                <option value="ar" {{app('request')->has('ar') ? 'selected' : ''}}>@lang('lang.Arabic')</option>
                                <option value="en" {{app('request')->has('en') ? 'selected' : ''}}>@lang('lang.English')</option>
                            </select>
                        </div>
                        <div class=" form-group col-md-12">
                            <input type="submit" value="@lang('lang.Search')" class="btn btn-primary">
                            <a class=" btn btn-default" href="{{route('category.index')}}">@lang('lang.cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel panel-heading"><i class="fa fa-circle"></i>@lang('categoryLang.Categories')</div>
                <div class="panel panel-body">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead>
                        <tr>
                            <th>@lang('categoryLang.Name')</th>
                            <th>@lang('lang.Language')</th>
                            <th>@lang('lang.Options')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->lang}}</td>
                                <td>
                                    <a class="btn btn-danger delete-category"
                                       data-value="{{$category->id}}"
                                       data-name="{{$category->name}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a  class="btn btn-primary"  href="{{route('category.edit',['id' => $category->id])}}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.delete-category').click(function () {
            var name = $(this).data('name')
            var id = $(this).data('value')
            swal({
                    title: "@lang('lang.Are you sure?')",
                    text: "@lang('categoryLang.Do you want to delete category')" + name + "@lang('lang.?')",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "@lang('lang.Yes, delete it!')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: false
                },
                function () {
                    window.location = '{{route('category.destroy')}}/' + id
                });
        })
    </script>
@endsection
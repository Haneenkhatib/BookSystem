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
                    <form action="{{route('book.index')}}" method="get">
                        <div class=" form-group col-sm-4">
                            <label for="title">@lang('bookLang.Title')</label>
                            <input type="text" name="title" value="{{app('request')->get('title')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="author">@lang('bookLang.Author')</label>
                            <input type="text" name="author" value="{{app('request')->get('author')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="isbn">@lang('bookLang.ISBN')</label>
                            <input type="text" name="isbn" value="{{app('request')->get('isbn')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="writer">@lang('bookLang.Writer')</label>
                            <input type="text" name="writer" value="{{app('request')->get('writer')}}">
                        </div>
                        <div class=" form-group col-sm-4">
                            <label for="publish_date">@lang('bookLang.Publish date')</label>
                            <input type="text" name="publish_date" value="{{app('request')->get('publish_date')}}">
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
                            <a class=" btn btn-default" href="{{route('book.index')}}">@lang('lang.cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel panel-heading"><i class="fa fa-book"></i>@lang('bookLang.Books')</div>
                <div class="panel panel-body">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead>
                        <tr>
                            <th>@lang('bookLang.Title')</th>
                            <th>@lang('bookLang.Author')</th>
                            <th>@lang('bookLang.ISBN')</th>
                            <th>@lang('bookLang.Publisher')</th>
                            <th>@lang('bookLang.Publish date')</th>
                            <th>@lang('bookLang.Writer')</th>
                            <th>@lang('bookLang.Category ID')</th>
                            <th>@lang('bookLang.Library ID')</th>
                            <th>@lang('lang.Language')</th>
                            <th>@lang('lang.Options')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{$book->title}}</td>
                                <td>{{$book->author}}</td>
                                <td>{{$book->isbn}}</td>
                                <td>{{$book->publisher}}</td>
                                <td>{{$book->publish_date}}</td>
                                <td>{{$book->writer}}</td>
                                <td>{{$book->category_id}}</td>
                                <td>{{$book->library_id}}</td>
                                <td>{{$book->lang}}</td>
                                <td>
                                    <a class="btn btn-danger delete-book"
                                       data-value="{{$book->id}}"
                                       data-title="{{$book->title}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a  class="btn btn-primary"  href="{{route('book.edit',['id' => $book->id])}}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        {{$books->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.delete-book').click(function () {
            var title = $(this).data('title')
            var id = $(this).data('value')
            swal({
                    title: "@lang('lang.Are you sure?')",
                    text: "@lang('bookLang.Do you want to delete book') " + title + " @lang('lang.?')",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "@lang('lang.Yes, delete it!')",
                    cancelButtonText: "@lang('lang.cancel')",
                    closeOnConfirm: false
                },
                function () {
                    window.location = '{{route('book.destroy')}}/' + id
                });
        })
    </script>
@endsection
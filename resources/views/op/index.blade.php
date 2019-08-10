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
                    window.location = '{{route('op.destroy')}}/' + id
                });
        })
    </script>
@endsection
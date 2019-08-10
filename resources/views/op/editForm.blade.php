<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<form action="{{route('op.update',['id'=>$book->id])}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group "style="text-align: center">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput"  style="width: 200px; height: 150px;">
                    <img src="{{asset($book->getImage())}}">
                </div>
                <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> @lang('lang.Select image')</span>
                                                                <span class="fileinput-exists"> @lang('lang.Change')</span>
                                                                <input type="file" name="book_image"> </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> @lang('lang.Remove') </a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="title">@lang('bookLang.Title')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="title" value="{{$book->title}}">
        </div>
        <div class="form-group">
            <label for="author">@lang('bookLang.Author')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="author" value="{{$book->author}}">
        </div>
        <div class="form-group">
            <label for="publisher">@lang('bookLang.Publisher')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="publisher" value="{{$book->publisher}}">
        </div>
        <div class="form-group">
            <label for="writer">@lang('bookLang.Writer')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="writer" value="{{$book->writer}}">
        </div>
        <div class="form-group">
            <label for="isbn">@lang('bookLang.ISBN')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="isbn" value="{{$book->isbn}}">
        </div>
        <div class="form-group">
            <label for="lang">@lang('lang.Language')</label><span class="danger">*</span>
            <select name="lang" id="lang" class="form-control">
                <option value="-1">@lang('lang.choose_language')</option>
                <option value="ar" {{$book->lang == 'ar' ?'selected' :''}}>@lang('lang.Arabic')</option>
                <option value="en" {{$book->lang == 'en' ?'selected' :''}}>@lang('lang.English')</option>
            </select>
        </div>
        <div class="form-group">
            <label for="category_id">@lang('bookLang.Category ID')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="category_id" value="{{$book->category_id}}">
        </div>
        <div class="form-group">
            <label for="library_id">@lang('bookLang.Library ID')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="library_id" value="{{$book->library_id}}">
        </div>
        <div class="form-group">
            <label for="publish_date">@lang('bookLang.Publish date')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="publish_date" value="{{$book->publish_date}}">
        </div>
        <button type="submit" class="btn btn-primary">@lang('lang.Submit')</button>
        <button type="submit" class="btn btn-default">@lang('lang.cancel')</button>
    </div>
</form>
</body>
</html>

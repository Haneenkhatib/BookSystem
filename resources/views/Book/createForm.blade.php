<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<form action="{{route('book.create')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group "style="text-align: center">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput"  style="width: 200px; height: 150px;"> </div>
                <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> @lang('lang.Select image') </span>
                                                                <span class="fileinput-exists">@lang('lang.Change')  </span>
                                                                <input type="file" name="book_image"> </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">@lang('lang.Remove') </a>
                </div>
            </div>
            <span class="error col-md-12" style="color: red;">
                @if($err=$errors->first('book_image'))
                    @lang("lang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="title">@lang('bookLang.Title')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
            <span class="errors">
                 @if($err=$errors->first('title'))
                    @lang("bookLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="author">@lang('bookLang.Author')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="author" value="{{old('author')}}">
            <span class="errors">
                @if($err=$errors->first('author'))
                    @lang("bookLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="publisher">@lang('bookLang.Publisher')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="publisher" value="{{old('publisher')}}">
            <span class="errors">
                @if($err=$errors->first('publisher'))
                    @lang("bookLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="writer">@lang('bookLang.Writer')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="writer" value="{{old('writer')}}">
            <span class="errors">
                @if($err=$errors->first('writer'))
                    @lang("bookLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="isbn">@lang('bookLang.ISBN')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="isbn" value="{{old('isbn')}}">
            <span class="errors">
                @if($err=$errors->first('isbn'))
                    @lang("bookLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="lang">@lang('lang.Language')</label><span class="danger">*</span>
            <select name="lang" id="lang" class="form-control">
                <option value="-1">@lang('lang.choose_language')</option>
                <option value="ar">@lang('lang.Arabic')</option>
                <option value="en">@lang('lang.English')</option>
            </select>
            <span class="errors">
                @if($err=$errors->first('lang'))
                    @lang("lang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="category_id">@lang('bookLang.Category ID')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="category_id" value="{{old('category_id')}}">
            <span class="errors">
                @if($err=$errors->first('category_id'))
                    @lang("bookLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="library_id">@lang('bookLang.Library ID')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="library_id" value="{{old('library_id')}}">
            <span class="errors">
                @if($err=$errors->first('library_id'))
                    @lang("bookLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="publish_date">@lang('bookLang.Publish date')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="publish_date" value="{{old('publish_date')}}">
            <span class="errors">
                @if($err=$errors->first('publish_date'))
                    @lang("bookLang.$err")
                @endif
            </span>
        </div>
        <button type="submit" class="btn btn-primary">@lang('lang.Submit')</button>
        <button type="submit" class="btn btn-default">@lang('lang.cancel')</button>
    </div>
</form>
</body>
</html>

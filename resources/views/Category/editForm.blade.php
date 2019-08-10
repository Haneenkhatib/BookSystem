<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<form action="{{route('category.update',['id'=>$category->id])}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group "style="text-align: center">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput"  style="width: 200px; height: 150px;">
                    <img src="{{asset($category->getImage())}}">
                </div>
                <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new">@lang('lang.Select image') </span>
                                                                <span class="fileinput-exists"> @lang('lang.Change') </span>
                                                                <input type="file" name="category_image"> </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> @lang('lang.Remove') </a>
                </div>
            </div>
            <span class="error col-md-12" style="color: red;">
                @if($err=$errors->first('category_image'))
                    @lang("lang.$err")
                @endif
            </span>        </div>
        <div class="form-group">
            <label for="name">@lang('categoryLang.Name')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
            <span class="errors">
                @if($err=$errors->first('name'))
                    @lang("categoryLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="lang">@lang('lang.Language')</label><span class="danger">*</span>
            <select name="lang" id="lang" class="form-control">
                <option value="-1">@lang('lang.choose_language')</option>
                <option value="ar" {{$category->lang == 'ar' ?'selected' :''}}>@lang('lang.Arabic')</option>
                <option value="en" {{$category->lang == 'en' ?'selected' :''}}>@lang('lang.English')</option>
            </select>
            <span class="errors">
                @if($err=$errors->first('lang'))
                    @lang("lang.$err")
                @endif
            </span>
        </div>
        <button type="submit" class="btn btn-primary">@lang('lang.Submit')</button>
        <button type="submit" class="btn btn-default">@lang('lang.cancel')</button>
    </div>
</form>
</body>
</html>

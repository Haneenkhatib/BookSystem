<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<form action="{{route('user.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group "style="text-align: center">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput"  style="width: 200px; height: 150px;">
                    <img src="{{asset($user->getImage())}}">
                </div>
                <div>
                                                            <span class="btn red btn-outline btn-file">
                                                                <span class="fileinput-new"> @lang('lang.Select image')</span>
                                                                <span class="fileinput-exists"> @lang('lang.Change')</span>
                                                                <input type="file" name="user_image"> </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> @lang('lang.Remove') </a>
                </div>
            </div>
            <span class="error col-md-12" style="color: red;">
                @if($err=$errors->first('user_image'))
                    @lang("lang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="name">@lang('userLang.Name')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
            <span class="errors">
                 @if($err=$errors->first('name'))
                    @lang("userLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="username">@lang('userLang.Username')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="username" value="{{$user->username}}">
            <span class="errors">
                @if($err=$errors->first('username'))
                    @lang("userLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="email">@lang('userLang.Email')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="email" value="{{$user->email}}">
            <span class="errors">
                @if($err=$errors->first('email'))
                    @lang("userLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="phone">@lang('userLang.Phone')</label><span class="danger">*</span>
            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
            <span class="errors">
                @if($err=$errors->first('phone'))
                    @lang("userLang.$err")
                @endif
            </span>
        </div>
        <button type="submit" class="btn btn-primary">@lang('lang.Submit')</button>
        <button type="submit" class="btn btn-default">@lang('lang.cancel')</button>
    </div>
</form>
</body>
</html>

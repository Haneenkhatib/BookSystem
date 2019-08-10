<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<form action="{{route('admin.update',['id'=>$admin->id])}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    {{csrf_field()}}
    <div class="row">
        <div class="form-group">
            <label for="name">Name</label><span class="danger">*</span>
            <input type="text" class="form-control" name="name" value="{{$admin->name}}">
            <span class="errors">
                 @if($err=$errors->first('name'))
                    @lang("userLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="username">username</label><span class="danger">*</span>
            <input type="text" class="form-control" name="username" value="{{$admin->username}}">
            <span class="errors">
                @if($err=$errors->first('username'))
                    @lang("userLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="email">Email</label><span class="danger">*</span>
            <input type="text" class="form-control" name="email" value="{{$admin->email}}">
            <span class="errors">
                @if($err=$errors->first('email'))
                    @lang("userLang.$err")
                @endif
            </span>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label><span class="danger">*</span>
            <input type="text" class="form-control" name="phone" value="{{$admin->phone}}">
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

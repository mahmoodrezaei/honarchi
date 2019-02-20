<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="flex-center position-ref full-height">
    <form action="{{route('about_store')}}" method="post">
        {{csrf_field()}}
        <input type="text" name="title1">
        <textarea name="body1" rows="3"></textarea>
        <input type="text" name="title2">
        <textarea name="body2" rows="3"></textarea>

    </form>
</div>
</body>
</html>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
    </head>
    <body>
        <form method="post" action="http://upload.qiniup.com/"
              enctype="multipart/form-data">
            <input name="token" type="hidden" value={{$token}}>
            <input name="file" type="file" />
            <input type="submit" value="上传文件" />
        </form>
    </body>
</html>

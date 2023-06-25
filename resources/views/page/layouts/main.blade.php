
<!doctype html>
<html lang="en">

<head>
    <title>
        {{ config("app.name") }} | @yield("title")
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    @include("page.layouts.partials.css.style_css")

    @yield("css")

</head>

<body>
    <div id="wrapper">
        @include("page.layouts.header")

        @include("page.layouts.sidebar")

        <div class="main">
            @yield("content")
        </div>

        <div class="clearfix"></div>

        @include("page.layouts.footer")
    </div>

    @include("page.layouts.partials.javascript.style_javascript")

    @yield("javascript")
</body>

</html>

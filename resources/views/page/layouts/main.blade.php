
<!doctype html>
<html lang="en">

<head>
    <title>
        {{ config("app.name") }} | @yield("title")
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    @include("page.layouts.partials.css.style_css")

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
</body>

</html>

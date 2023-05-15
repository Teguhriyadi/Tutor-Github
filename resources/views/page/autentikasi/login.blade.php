<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Login | Klorofil - Free Bootstrap Dashboard Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/main.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/demo.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('') }}/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('') }}/assets/img/favicon.png">
</head>

<body>
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="assets/img/logo-dark.png" alt="Klorofil Logo">
                                </div>
                                <p class="lead">Login to your account</p>
                            </div>
                            <form class="form-auth-small" method="POST" action="{{ url('/login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">Perizinan Ormawa</h1>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Redirect</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top: 50px">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-signin" role="form" action="/addurl" method="POST">
                    <h2 class="form-signin-heading">Paste your long URL here:</h2>
                    <div class="form-group">
                        <input class="form-control" placeholder="http://www.example.com" name="url">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Shorten URL</button>
                    <div>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                </form>

                @if (session('redirecturl'))
                        <h2 class="form-signin-heading" style="margin-top: 50px">Your URL:</h2>
                        <div class="alert alert-success">
                            {{ session('redirecturl') }}
                        </div>
                @endif

            </div>
        </div>
    </div>
</body>
</html>
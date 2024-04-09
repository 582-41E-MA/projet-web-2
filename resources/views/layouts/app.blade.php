<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}" media="screen">

</head>
<body>
<header>
    <div class="div-header">
            <div class="line-1"></div>
            <div class="line-2"></div>
            <div class="div-nav">
                <img src="{{asset('assets/img/svg/logo.svg')}}" alt="">
                <div class="div-list-nav">
                    <nav>
                        <ul>
                            <li><a href="" class="active">List of cars</a></li>
                            <li><a href="">About us</a></li>
                            <li><a href="">Sales Policies</a></li>
                        </ul>
                    </nav>
                </div>           
            </div>
            <div class="div-lang">
                <button class="btn btn-primaire">FR</button>
                <div class="div-lien">
                    <a href="">Sign in</a>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
</body>
</html>
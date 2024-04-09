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
    @yield('content')
</body>
</html>
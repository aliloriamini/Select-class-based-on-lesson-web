<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../../../favicon.ico">

    <title>سامانه جامع مدیریت آموزشی</title>

    <link href="/css/admin.css" rel="stylesheet">
</head>

<body>
    @include('Admin.section.nav')
    <div class="container-fluid">
        <div class="row">
            @include('Admin.section.side_bar_nav')
            @yield('content')
        </div>
    </div>
    @include('Admin.section.script')
    @include('sweet::alert')
</body>
</html>

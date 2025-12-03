<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Home</title>

    @include('admin.layouts.style')
    @include('admin.layouts.script')
    
</head>
<body class="light-dark">
    <div class="wrapper">
        @yield('main_content')
    </div>

    @include('admin.layouts.script-footer')
</body>
</html>
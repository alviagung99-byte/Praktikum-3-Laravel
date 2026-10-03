<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SmartEduInclusion')</title>
    <link rel="stylesheet" href="/css/app.css">
    @stack('styles')
</head>
<body>
    @yield('content')
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>

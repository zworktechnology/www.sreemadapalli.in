<!doctype html>
<html lang="en">

<head>
    @include('layouts.general.head')
</head>

<body data-sidebar="dark" data-layout-mode="light">

    <main>
        @yield('content')
    </main>

    @include('layouts.general.script')
</body>

</html>

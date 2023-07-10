<!doctype html>
<html lang="en">

<head>
    @include('layouts.general.head')
</head>

<body data-sidebar="dark" data-layout-mode="light">

    <main style="font-family: Roboto">
        @yield('content')
    </main>

    @include('layouts.general.script')
</body>

</html>

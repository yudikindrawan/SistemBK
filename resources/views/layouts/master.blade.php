<!DOCTYPE html>
<html dir="ltr" lang="en">

    @include('layouts.head')

<body>
    @include('layouts.header')
    @include('layouts.sidebar')
            @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
</body>
    @jquery
    @toastr_js
    @toastr_render
</html>
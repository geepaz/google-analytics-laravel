<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Analytics</title>

    <meta name="robots" content="noindex">
    <!-- App CSS -->
    <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/css/app.rtl.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/vendor/simplebar.css') }}" rel="stylesheet">
</head>

<body>
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-has-scrolling-region>
        <div class="mdk-drawer-layout__content mdk-header-layout__content--scrollable" style="overflow-y: auto;" data-simplebar data-simplebar-force-enabled="true">

            <div class="container h-vh d-flex justify-content-center align-items-center flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <a href="index.html" class="drawer-brand-circle mr-2">A</a>
                    <h2 class="ml-2 text-bg mb-0"><strong>Analytics</strong></h2>
                </div>

                @yield('content')
                
            </div>
        </div>
    </div>

    <script>
        (function() {
            'use strict';
            domFactory.handler.autoInit();
        });
    </script>
</body>

</html>
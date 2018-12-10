<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="url" content="{{ url('/') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Google Analytics</title>
        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots" content="noindex">
        <!-- App CSS -->
        <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/css/app.rtl.css') }}" rel="stylesheet">
        <!-- Simplebar -->
        <link type="text/css" href="{{ asset('assets/vendor/simplebar.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        
        <!-- header -->
        @include('layouts.partial.header')

        <!-- main content -->
        <div class="top-navbar">
            <div class="container mt-20 pb-3">
                <h1 class="h2 mb-0">{{ $title['title'] }}</h1>

                @include('layouts.partial.breadcrumb')                
                
                <hr>
                @include('layouts.partial.alert')
                @yield('content')
            </div>
        </div>
        <!-- drawer -->
        

        <!-- // END drawer -->
        <!-- jQuery -->
        <script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('assets/vendor/popper.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>
        <!-- APP -->
        <script src="{{ asset('assets/js/color_variables.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>
        <!-- DOM Factory -->
        <script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>
        <script src="{{ asset('js/delete.js') }}"></script>
        <!-- MDK -->
        <script>
            (function() {
                'use strict';
                // Self Initialize DOM Factory Components
                domFactory.handler.autoInit()
            
            
                // Connect button(s) to drawer(s)
                var sidebarToggle = document.querySelectorAll('[data-toggle="sidebar"]')
            
                sidebarToggle.forEach(function(toggle) {
                    toggle.addEventListener('click', function(e) {
                        var selector = e.currentTarget.getAttribute('data-target') || '#default-drawer'
                        var drawer = document.querySelector(selector)
                        if (drawer) {
                            if (selector == '#default-drawer') {
                                $('.container-fluid').toggleClass('container--max');
                            }
                            drawer.mdkDrawer.toggle();
                        }
                    })
                })
            })()
        </script>
        @yield('script')
    </body>
</html>
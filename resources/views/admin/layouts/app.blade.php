<!--
=========================================================
 Paper Dashboard - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 UPDIVISION (https://updivision.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.html_head')
</head>

<body class="{{ $class }}">

    @auth()
        @include('admin.layouts.page_templates.auth')
    @endauth

    @guest
        @include('admin.layouts.page_templates.guest')
    @endguest

    @include('admin.layouts.scripts')

    @stack('scripts')

    @include('admin.layouts.navbars.fixed-plugin-js')


</body>

</html>

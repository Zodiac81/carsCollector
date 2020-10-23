<div class="wrapper">

    @include('admin.layouts.navbars.auth')

    <div id="app" class="main-panel">

        @include('admin.layouts.navbars.navs.auth')
        <div class="content">
            <div class="row">
                @yield('content')
            </div>
        </div>
        @include('admin.layouts.footer')


    </div>
</div>

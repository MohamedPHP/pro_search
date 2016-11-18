@include('backend.includes.header')
<div class="wrapper">
    @include('backend.includes.sidebar')
    <div class="main-panel">
        @include('backend.includes.navbar')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('backend.includes.footer')
    </div>
</div>

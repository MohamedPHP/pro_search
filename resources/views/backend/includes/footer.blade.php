<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        Company
                    </a>
                </li>
                <li>
                    <a href="#">
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#">
                        Blog
                    </a>
                </li>
            </ul>
        </nav>
        <p class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
        </p>
    </div>
</footer>


</body>

<!--   Core JS Files   -->
<script src="{{asset('admin/assets/js/jquery-3.1.0.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/js/material.min.js')}}" type="text/javascript"></script>

<!--  Notifications Plugin    -->
<script src="{{asset('admin/assets/js/bootstrap-notify.js')}}"></script>

<!-- Material Dashboard javascript methods -->
<script src="{{asset('admin/assets/js/material-dashboard.js')}}"></script>

@yield('scripts')

</html>

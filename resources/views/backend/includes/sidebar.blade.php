<div class="sidebar" data-color="purple" data-image="{{asset('admin/assets/img/sidebar-1.jpg')}}">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            Creative Tim
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $pagename == 'Dashboard' ? 'active' : '' }}">
                <a href="{{ url('/admin/dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ $pagename == 'Users' ? 'active' : '' }}">
                <a href="{{ url('/admin/users') }}">
                    <i class="material-icons">schedule</i>
                    <p>Users</p>
                </a>
            </li>
            <li class="{{ $pagename == 'Users-Create' ? 'active' : '' }}">
                <a href="{{ url('/admin/users/create') }}">
                    <i class="material-icons">schedule</i>
                    <p>Users-Create</p>
                </a>
            </li>
            <li class="{{ $pagename == 'Companies' ? 'active' : '' }}">
                <a href="{{ url('/admin/companies') }}">
                    <i class="material-icons">schedule</i>
                    <p>Companies</p>
                </a>
            </li>
            <li class="{{ $pagename == 'Companies-Create' ? 'active' : '' }}">
                <a href="{{ url('/admin/companies/create') }}">
                    <i class="material-icons">schedule</i>
                    <p>Companies-Create</p>
                </a>
            </li>
            <li class="{{ $pagename == 'Jops' ? 'active' : '' }}">
                <a href="{{ url('/admin/jops') }}">
                    <i class="material-icons">schedule</i>
                    <p>Jops</p>
                </a>
            </li>
            <li class="{{ $pagename == 'Jops-Create' ? 'active' : '' }}">
                <a href="{{ url('/admin/jops/create') }}">
                    <i class="material-icons">schedule</i>
                    <p>Jops-Create</p>
                </a>
            </li>
        </ul>
    </div>
</div>

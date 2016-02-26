
<aside class="main-sidebar">
  
    <section class="sidebar">

        <!-- /.sidebar -->
        <ul class="sidebar-menu">
            <li class="header">OPTIONS</li>
            <li class= "{{{ (Request::is('addRestaurantPanel') ? 'active' : '') }}}">
                <a href="{{ url('addRestaurantPanel') }}">
                <i class="fa fa-dashboard"></i> <span>Add Restaurant</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li class= "{{{ (Request::is('manageRestaurantPanel') ? 'active' : '') }}}">
                <a href="{{ url('manageRestaurantPanel') }}">
                <i class="fa fa-dashboard"></i> <span>Manage Restaurant</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!--Sidebar-area start-->
<div class="col-lg-2 col-md-3 sideFix ">
    <div class="list-group shadow-sm">
        <a href="/recep/dashboard" class="list-group-item side-bar {{Request::is('recep/dashboard') ? "active" : ""}}"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
        <a href="/recep/profile" class="list-group-item  side-bar {{Request::is('recep/profile') ? "active" : ""}}"><i class="fa fa-user fa-lg mr-1"></i> Profile</a>
        <a href="/recep/customers" class="list-group-item side-bar {{Request::is('recep/customers') ? "active" : ""}}"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
        <a href="/admin/schedules" class="list-group-item side-bar {{Request::is('recep/schedules') ? "active" : ""}}"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>
        <a href="/recep/fees" class="list-group-item side-bar {{Request::is('recep/fees') ? "active" : ""}}"><i class="fa fa-dollar fa-lg mr-1"></i> Registration Fees</a>
        <a href="/recep/payments" class="list-group-item side-bar {{Request::is('recep/payments') ? "active" : ""}}"><i class="fa fa-money fa-lg mr-1"></i> Monthly Payments</a>
        <a href="/recep/reports" class="list-group-item side-bar {{Request::is('recep/reports') ? "active" : ""}}"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>
    </div>
</div>
<!--Sidebar-area end-->



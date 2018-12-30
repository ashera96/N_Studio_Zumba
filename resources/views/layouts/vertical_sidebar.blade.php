<!--Sidebar-area start-->
<div class="col-lg-2 col-md-3 sideFix ">
    <div class="list-group shadow-sm">
        <a href="/admin/dashboard" class="list-group-item side-bar {{Request::is('admin/dashboard') ? "active" : ""}}"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
        <a href="/admin/receptionist" class="list-group-item  side-bar {{Request::is('admin/receptionist') ? "active" : ""}}"><i class="fa fa-user fa-lg mr-1"></i> Receptionist</a>
        <a href="/admin/customers" class="list-group-item side-bar {{Request::is('admin/customers') ? "active" : ""}}"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>

        <a href="/admin/create_notifications" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
        <a href="/admin/payments" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
        <a href="/admin/reports" class="list-group-item side-bar {{Request::is('admin/reports') ? "active" : ""}}"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>
        <a href="/admin/dashboard/admin_gallery" class="list-group-item side-bar {{Request::is('admin/dashboard/admin_gallery') ? "active" : ""}}""><i class="fa fa-image fa-lg mr-1"></i> Gallery</a>
        <a href="/admin/class_packages" class="list-group-item side-bar"><i class="fa fa-clipboard fa-lg mr-1"></i> Classes</a>
        <a href="/admin/schedules" class="list-group-item side-bar"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>


    </div>
</div>
<!--Sidebar-area end-->



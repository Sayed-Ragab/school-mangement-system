<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            
            @if(Auth('web')->check())

            @include('Dashboard.layouts.main-sidebar.Admin-sidebar')

         @endif

         @if(Auth('student')->check())
         @include('Dashboard.layouts.main-sidebar.Student-Sidebar')
         @endif

         @if(Auth('teacher')->check())
         @include('Dashboard.layouts.main-sidebar.Teacher-sidebar')
         @endif


         @if(Auth('parent')->check())
         @include('Dashboard.layouts.main-sidebar.parent-sidebar')
         @endif

        </div>

        <!-- Left Sidebar End-->

        <!--=================================

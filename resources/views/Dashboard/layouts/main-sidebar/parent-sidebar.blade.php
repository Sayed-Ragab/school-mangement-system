<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
<a href="{{ url('/dashboard') }}">
<div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
</div>
<div class="clearfix"></div>
</a>
</li>
        <!-- menu title -->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.programname')}} </li>

        <!-- Grades-->
        <li>
            <a href="{{route('parent.index')}}"><i class="fas fa-book-open"></i><span
                    class="right-nav-text">{{__('Dashboard.Children')}}</span></a>
        </li>

        <!-- classes-->
        <li>
            <a href="{{route('parent.create')}}"><i class="fas fa-book-open"></i><span
                    class="right-nav-text">{{__('Dashboard.Attendance_and_Absence_Report')}}</span></a>
        </li>


        <!-- sections-->
        <li>
            <a href="{{route('fees')}}"><i class="fas fa-book-open"></i><span
                    class="right-nav-text">{{__('Dashboard.Financial_Reports')}}</span></a>
        </li>


        <!-- students-->
        <li>
            <a href="{{route('profile.index')}}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">{{__('Dashboard.profile')}}</span></a>
        </li>



    

    </ul>
</div>
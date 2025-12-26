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
      
        <!-- classes-->
        <li>
            <a href="{{route('Exam.index')}}"><i class="fas fa-book-open"></i><span
                    class="right-nav-text">{{__('Dashboard.quizze')}}</span></a>
        </li>


        <!-- Settings-->
        <li>
            <a href="{{Route('profile-student.index')}}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">{{__('Dashboard.profile')}}</span></a>
        </li>

        <!-- Users-->
       

    </ul>
</div>
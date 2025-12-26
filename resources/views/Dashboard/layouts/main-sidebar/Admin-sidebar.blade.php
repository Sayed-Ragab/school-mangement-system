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
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                <div class="pull-left"><i class="fas fa-school"></i><span
                        class="right-nav-text">{{trans('main_trans.Grades')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Grades.index')}}">{{trans('main_trans.Grades_list')}}</a></li>

            </ul>
        </li>
        <!-- classes-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                <div class="pull-left"><i class="fa fa-building"></i><span
                        class="right-nav-text">{{trans('main_trans.classes')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Classrooms.index')}}">{{trans('main_trans.List_classes')}}</a></li>
            </ul>
        </li>


        <!-- sections-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span
                        class="right-nav-text">{{trans('main_trans.sections')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Sections.index')}}">{{trans('main_trans.List_sections')}}</a></li>
            </ul>
        </li>


        <!-- students-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
                <div class="pull-left"><i class="fas fa-user-graduate"></i><span
                        class="right-nav-text">{{trans('main_trans.students')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{url('Students')}}">{{trans('main_trans.list_students')}}</a> </li>
                <li> <a href="{{route('Promotion.create')}}">{{trans('main_trans.Students_Promotions')}}</a> </li>
                <li><a href="{{route('Graduated.index')}}">{{trans('main_trans.list_Graduate')}}</a></li>
            </ul>
        </li>



        <!-- Teachers-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                        class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Teachers.index')}}">{{trans('main_trans.List_Teachers')}}</a> </li>
            </ul>
        </li>


        <!-- Parents-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                <div class="pull-left"><i class="fas fa-user-tie"></i><span
                        class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{url('add_parent')}}">{{trans('main_trans.List_Parents')}}</a> </li>
            </ul>
        </li>

        <!-- Accounts-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                        class="right-nav-text">{{trans('main_trans.Accounts')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Fees.index')}}">{{__('Fees.fees')}}</a> </li>
                <li> <a href="{{route('Fees_Invoices.index')}}">{{__('Fees.invoices')}}</a> </li>
                <li> <a href="{{route('receipt_students.index')}}"> {{__('main_trans.Receipt')}}</a> </li>
                <li> <a href="{{route('ProcessingFee.index')}}">{{__('main_trans.exclude_fees')}}</a> </li>
                <li> <a href="{{url('Pyment_Students')}}"> {{__('main_trans.Exchange')}}</a> </li>
            </ul>
        </li>

        <!-- Attendance-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                <div class="pull-left"><i class="fas fa-calendar-alt"></i><span class="right-nav-text">{{trans('main_trans.Attendance')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Attendance.index')}}">{{trans('main_trans.list_students')}}</a> </li>
            
            </ul>
        </li>


        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#books-icon">
                <div class="pull-left"><i class="fas fa-books"></i><span class="right-nav-text">{{__('subject.subject')}} </span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="books-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{url( 'Subject' )}}">{{__('subject.subject')}}</a> </li>
            </ul>
        </li>

        <!-- Exams-->
        
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Exams-icon">
                <div class="pull-left"><i class="fas fa-pen"></i><span class="right-nav-text">{{trans('main_trans.Exams')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Exams-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{route('Quizze.index')}}">{{__('Sections_trans.list_Exam')}}</a> </li>
                <li> <a href="{{route('questions.index')}}">{{__('subject.List_questions')}}</a> </li>
              
            </ul>
        </li>

        <!-- library-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
                <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">{{trans('main_trans.library')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{url('Library')}}"> {{trans('Sidebar_trans.library_list')}}</a> </li>
              
            </ul>
        </li>


        <!-- Onlinec lasses-->
        {{-- <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Onlineclasses-icon">
                <div class="pull-left"><i class="fas fa-video"></i><span class="right-nav-text">{{trans('main_trans.Onlineclasses')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Onlineclasses-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{url('online_classes')}}">{{trans('subject.zoom_1')}}</a> </li>
                <li> <a href="themify-icons.html">{{trans('subject.zoom_2')}} </a></li>
             
            </ul>
        </li> --}}


        <!-- Settings-->
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Settings-icon">
                <div class="pull-left"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main_trans.Settings')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="Settings-icon" class="collapse" data-parent="#sidebarnav">
                <li> <a href="{{url('setting')}}">{{trans('main_trans.Settings')}}</a> </li>
             
            </ul>
        </li>


        <!-- Users-->
 

    </ul>
</div>
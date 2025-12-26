<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('Dashboard.layouts.head')
    @livewireStyles
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{URL::asset('assets/images/pre-loader/loader-01.svg')}}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('Dashboard.layouts.main-header')

        @include('Dashboard.layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0" style="font-family: 'cairo' ,sans-serif"> {{__('Dashboard.Administrator_Control_Panel')}}</h4><br>
                        <h5 class="mg-b-0">{{__('Dashboard.welcome')}} :{{auth()->User()->name}}</h5>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{__('Dashboard.s1')}}</p>
                                    <h4>{{App\Models\Student::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('Students.index')}}" target="_blank"><span class="text-success">{{__('Dashboard.view_data')}}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{__('Dashboard.n1')}}</p>
                                    <h4>{{\App\Models\Teacher::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('Teachers.index')}}" target="_blank"><span class="text-warning">{{__('Dashboard.view_data')}} </span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{__('Dashboard.Number_of_Parents')}}</p>
                                    <h4>{{\App\Models\My_Parent::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('add_parent')}}" target="_blank"><span class="text-success">{{__('Dashboard.view_data')}}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{__('Dashboard.Number_of_Classrooms')}}</p>
                                    <h4>{{\App\Models\Section::count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('Sections.index')}}" target="_blank"><span class="text-primary">{{__('Dashboard.view_data')}}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->
          
            <div class="row">

                <div  style="height: 400px;" class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">{{__('Dashboard.Recent_System_Transactions')}}</h5>
                                    </div>
                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                   href="#students" role="tab" aria-controls="students"
                                                   aria-selected="true"> {{__('Dashboard.students')}}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                                   role="tab" aria-controls="teachers" aria-selected="false">{{__('Dashboard.teachers')}}
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                   role="tab" aria-controls="parents" aria-selected="false">{{__('Dashboard.parents')}}
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                                   role="tab" aria-controls="fee_invoices" aria-selected="false">{{__('Dashboard.invoices')}}
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-content" id="myTabContent">

                                    {{--students Table--}}
                                    <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{__('Students_trans.name')}}</th>
                                                    <th>{{__('Students_trans.email')}}</th>
                                                    <th>{{__('Students_trans.gender')}}</th>
                                                    <th>{{__('Students_trans.Grade')}}</th>
                                                    <th>{{__('Students_trans.classrooms')}}</th>
                                                    <th>{{__('Students_trans.section')}}</th>
                                                    <th>{{__('Students_trans.Date')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$student->name}}</td>
                                                        <td>{{$student->email}}</td>
                                                        <td>{{$student->Genders->Name}}</td>
                                                        <td>{{$student->Grades->Name}}</td>
                                                        <td>{{$student->classroom->Name}}</td>
                                                        <td>{{$student->section->Name}}</td>
                                                        <td class="text-success">{{$student->created_at}}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8">{{__('Dashboard.not_data')}}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--teachers Table--}}
                                    <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{__('Teacher_trans.Name_Teacher')}}</th>
                                                    <th>{{__('Teacher_trans.Gender')}}</th>
                                                    <th> {{__('Teacher_trans.Joining_Date')}}</th>
                                                    <th>{{__('Teacher_trans.specialization')}}</th>
                                                    <th>{{__('Students_trans.Date')}}</th>
                                                </tr>
                                                </thead>

                                                @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$teacher->name}}</td>
                                                        <td>{{$teacher->genders->Name}}</td>
                                                        <td>{{$teacher->Joining_Date}}</td>
                                                        <td>{{$teacher->specializations->Name}}</td>
                                                        <td class="text-success">{{$teacher->created_at}}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8">{{__('Dashboard.not_data')}} </td>
                                                    </tr>
                                                    </tbody>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>

                                    {{--parents Table--}}
                                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{__('parent_trans.name')}}</th>
                                                    <th>{{__('parent_trans.Email')}}</th>
                                                    <th>{{__('parent_trans.National_ID_Father')}}</th>
                                                    <th>{{__('parent_trans.Phone_Father')}}</th>
                                                    <th>{{__('Students_trans.Date')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\My_Parent::latest()->take(5)->get() as $parent)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$parent->Name_Father}}</td>
                                                        <td>{{$parent->email}}</td>
                                                        <td>{{$parent->National_ID_Father}}</td>
                                                        <td>{{$parent->Phone_Father}}</td>
                                                        <td class="text-success">{{$parent->created_at}}</td>
                                                        @empty
                                                            <td class="alert-danger" colspan="8">{{__('Dashboard.not_data')}}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    {{--sections Table--}}
                                    <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                                        <div class="table-responsive mt-15">
                                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                                <thead>
                                                <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{__('Fees.invoice_date')}}</th>
                                                    <th>{{__('Students_trans.name')}}</th>
                                                    <th>{{__('Grades_trans.Academic_stage')}}</th>
                                                    <th>{{__('My_Classes_trans.class_room')}}</th>
                                                    <th>{{__('Sections_trans.Name_Section')}}</th>
                                                    <th>{{__('Fees.type_fess')}}</th>
                                                    <th>{{__('Fees.Amount')}}</th>
                                                    <th>{{__('Students_trans.Date')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(\App\Models\Fee_invoice::latest()->take(10)->get() as $section)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$section->invoice_date}}</td>
                                                        <td>{{$section->classroom->Name}}</td>
                                                        <td class="text-success">{{$section->created_at}}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="alert-danger" colspan="9">{{__('Dashboard.not_data')}} </td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <livewire:calender.calender>
            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('Dashboard.layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('Dashboard.layouts.footer-scripts')
    @livewireScripts
    @stack('scripts')

</body>

</html>

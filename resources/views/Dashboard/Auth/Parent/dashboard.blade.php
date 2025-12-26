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
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">{{__('Dashboard.welcome')}} : {{auth()->user()->Name_Father}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row justify-content-center">
                         @foreach($sons as $son)
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <a href="">
                                    <div class="card text-black">
                                        <img src="{{URL::asset('assets/images/my_son.png')}}"/>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <h5 style="font-family: 'Cairo', sans-serif"
                                                    class="card-title">{{$son->name}}</h5>
                                                <p class="text-muted mb-4">{{__('Dashboard.Student_Information')}}</p>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <span>{{__('Grades_trans.Academic_stage')}}</span><span>{{$son->Grades->Name}}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>{{__('My_Classes_trans.class_room')}}</span><span>{{$son->classroom->Name}}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>{{__('Sections_trans.section')}}</span><span>{{$son->section->Name}}</span>
                                                </div>

                                                <div class="d-flex justify-content-between">
{{--                                                    @if(\App\Models\Degree::where('student_id',$son->id)->count() == 0)--}}
{{--                                                        <span>عدد الاختبارات</span><span--}}
{{--                                                            class="text-danger">{{\App\Models\Degree::where('student_id',$son->id)->count()}}</span>--}}
{{--                                                    @else--}}
{{--                                                        <span>عدد الاختبارات</span><span--}}
{{--                                                            class="text-success">{{\App\Models\Degree::where('student_id',$son->id)->count()}}</span>--}}
{{--                                                    @endif--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>


          
          

          
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

</body>

</html>

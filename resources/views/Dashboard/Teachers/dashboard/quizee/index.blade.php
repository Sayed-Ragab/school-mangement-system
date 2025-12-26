@extends('Dashboard.layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo"> ncvlxcnvxcnvxcv</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <a href="{{route('quizze.create')}}" class="btn btn-success btn-sm" role="button"
                               aria-pressed="true">اضافة اختبار جديد</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الاختبار</th>
                                        <th>اسم المعلم</th>
                                        <th>المرحلة الدراسية</th>
                                        <th>الصف الدراسي</th>
                                        <th>القسم</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($quizzes as $quizze)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{$quizze->name}}</td>
                                            <td>{{$quizze->teachers->name}}</td>
                                            <td>{{$quizze->Grades->Name}}</td>
                                            <td>{{$quizze->classroom->Name}}</td>
                                            <td>{{$quizze->section->Name}}</td>
                                            <td>
                                                <a href="{{route('quizze.edit',$quizze->id)}}"
                                                   class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                        class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#delete_exam{{ $quizze->id }}" title="حذف"><i
                                                        class="fa fa-trash"></i></button>

                                                        <a href="{{route('quizze.show',$quizze->id)}}"
                                                            class="btn btn-warning btn-sm" title="عرض الاسئلة" role="button" aria-pressed="true"><i
                                                                 class="fa fa-binoculars"></i></a>

                                                                 <a href="{{route('student.quizze',$quizze->id)}}"
                                                                    class="btn btn-primary btn-sm" title="عرض الطلاب المختبرين" role="button" aria-pressed="true"><i
                                                                         class="fa fa-street-view"></i></a>     
                                            </td>
                                        </tr>

                                       @include('Dashboard.Teachers.dashboard.quizee.delete')
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

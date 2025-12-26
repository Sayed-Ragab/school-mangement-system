
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
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الطالب</th>
                                        <th>عدد الاسئلة</th>
                                        <th>الدرجة</th>
                                        <th>تلاعب</th>
                                        <th>تاريخ اجراء الاختبار</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($degrees as $degree)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{$degree->student->name}}</td>
                                            <td>{{$degree->question_id}}</td>
                                            <td>{{$degree->score}}</td>
                                            @if($degree->abuse == 0)
                                                <td style="color: green">لا يوجد تلاعب</td>
                                            @else
                                                <td style="color: red"> يوجد تلاعب</td>
                                            @endif
                                            <td>{{$degree->Date}}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#repeat_quizze{{ $degree->quizze_id }}" title="إعادة">
                                                    <i class="fas fa-repeat"></i></button>
                                            </td>
                                        </tr>

                                       @include('Dashboard.Teachers.dashboard.quizee.repeat_quizze')
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




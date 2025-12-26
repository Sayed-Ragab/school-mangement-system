@extends('Dashboard.layouts.master')
@section('css')

@section('title')
{{__('main_trans.list_Graduate')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo"> {{__('main_trans.list_Graduate')}}</h4>
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
                <a href="{{route('Graduated.create')}}"  class="btn btn-success btn-bg" ole="button"
                aria-pressed="true">{{__('main_trans.add_Graduate')}}</a><br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                           data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr class="alert-success">
                            <th>#</th>
                            <th>{{trans('Students_trans.name')}}</th>
                            <th>{{trans('Students_trans.email')}}</th>
                            <th>{{trans('Students_trans.gender')}}</th>
                            <th>{{trans('Students_trans.Grade')}}</th>
                            <th>{{trans('Students_trans.classrooms')}}</th>
                            <th>{{trans('Students_trans.section')}}</th>
                            <th>{{trans('Students_trans.Processes')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->Genders->Name}}</td>
                            <td>{{$student->Grades->Name}}</td>
                            <td>{{$student->ClassRoom->Name}}</td>
                            <td>{{$student->section->Name}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#Return_Student{{ $student->id }}" title="{{ trans('Grades_trans.Delete') }}">ارجاع الطالب</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_Student{{ $student->id }}" title="{{ trans('Grades_trans.Delete') }}">حذف الطالب</button>

                                </td>
                            </tr>
                        @include('Dashboard.Students.Graduated.return')
                        @include('Dashboard.Students.Graduated.Delete')
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
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

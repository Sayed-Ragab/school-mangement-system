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
                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('status') }}</li>
            </ul>
        </div>
    @endif



    <h5 style="font-family: 'Cairo', sans-serif;color: red"> تاريخ اليوم : {{ date('Y-m-d') }}</h5>
    <form method="post" action="{{ route('Attendance.store') }}">

        @csrf
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                <th class="alert-success">{{ trans('Students_trans.email') }}</th>
                <th class="alert-success">{{ trans('Students_trans.gender') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                <th class="alert-success">{{ trans('Students_trans.classrooms') }}</th>
                <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Processes') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->Genders->Name }}</td>
                    <td>{{ $student->Grades->Name }}</td>
                    <td>{{ $student->ClassRoom->Name }}</td>
                    <td>{{ $student->section->Name }}</td>
                    <td>
                        @if(isset($student->attendance()->where('date',date('Y-m-d'))->first()->student_id))
                        <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                            <input type="radio" name="attendances[{{$student->id}}]" disabled {{$student->attendance()->first()->status == 1 ? 'checked' : ''}} class="leading-tight" 
                            value="presence">  
                            <span class="text-success">حضور</span> 
                        </label>                            
                        
                        <label class="ml-4 block text-gray-500 font-semibold"></label>
                        <input type="radio" name="attendance[{{$student->id}}]" disabled {{$student->attendance()->first()->status == 0 ? 'checked' : ''}} class="leading-tight" 
                        value="absent">  <span class="text-danger">غياب</span> 
                        @else
                        
                        <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                            <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio"
                                   value="presence">
                            <span class="text-success">حضور</span>
                        </label>

                        <label class="ml-4 block text-gray-500 font-semibold">
                            <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio"
                                   value="absent">
                            <span class="text-danger">غياب</span>
                        </label>

                        @endif
                        <input type="hidden" name="student_id[]" value="{{$student->id}}">
                        <input type="hidden" name="Grade_id" value="{{$student->Grade_id}}">
                        <input type="hidden" name="class_id" value="{{$student->class_id}}">
                        <input type="hidden" name="section_id" value="{{$student->section_id}}">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <P>
            <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
        </P>
    </form><br>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

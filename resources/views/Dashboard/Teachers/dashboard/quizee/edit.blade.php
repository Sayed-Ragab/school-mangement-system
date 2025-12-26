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
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('quizze.update','test')}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">اسم الاختبار باللغة العربية</label>
                                    <input type="text" name="Name_ar" value="{{$quizze->getTranslation('name','ar')}}" class="form-control">
                                    <input type="hidden" name="id" value="{{$quizze->id}}">
                                </div>

                                <div class="col">
                                    <label for="title">اسم الاختبار باللغة الانجليزية</label>
                                    <input type="text" name="Name_en" value="{{$quizze->getTranslation('name','en')}}" class="form-control">
                                </div>
                            </div>
                            <br>

                            <div class="form-row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">المادة الدراسية : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="supject_id">
                                            @foreach($subjects as $subject)
                                                <option value="{{ $subject->id }}" {{$subject->id == $quizze->supject_id ? "selected":""}}>{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="Grade_id">
                                            @foreach($Grades as $Grade)
                                                <option  value="{{ $Grade->id }}" {{$Grade->id == $quizze->Grade ? "selected":""}}>{{ $Grade->Name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="class_id">
                                            <option value="{{$quizze->class_id}}">{{$quizze->classRoom->Name}}</option>                                            </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="section_id">{{trans('Students_trans.section')}} : </label>
                                        <select class="custom-select mr-sm-2" name="section_id">
                                            <option value="{{$quizze->section_id}}">{{$quizze->section->Name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div><br>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">تاكيد البيانات</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

@endsection
@section('js')

@endsection

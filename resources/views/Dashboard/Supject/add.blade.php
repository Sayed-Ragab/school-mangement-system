@extends('Dashboard.layouts.master')
@section('css')

@section('title')
{{trans('subject.add_subject')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo"> {{trans('subject.add_subject')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('subject.add_subject')}}</a></li>
                <li class="breadcrumb-item active">{{trans('subject.home')}}</li>
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
                <form action="{{route('Subject.store')}}" method="POST" autocomplete="off">
                    @csrf

                    <div class="form-row">
                        <div class="col">
                            <label for="title">{{trans('subject.subject_ar')}} </label>
                            <input type="text" name="Name_ar" class="form-control">
                        </div>
                        <div class="col">
                            <label for="title">{{trans('subject.subject_en')}}</label>
                            <input type="text" name="Name_en" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">{{trans('subject.name_grade')}}</label>
                            <select class="custom-select my-1 mr-sm-2" name="Grade_id">
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($Grades as $Grade)
                                    <option value="{{$Grade->id}}">{{$Grade->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group col">
                            <label for="inputState">{{trans('subject.class_room')}}</label>
                            <select name="class_id" class="custom-select my-1 mr-sm-2"></select>
                        </div>
                    
                    <div class="form-group col">
                        <label for="inputState">{{trans('subject.Teacher_name')}}</label>
                        <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('subject.submit')}} </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

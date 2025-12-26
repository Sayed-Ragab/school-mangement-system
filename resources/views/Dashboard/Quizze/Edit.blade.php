@extends('Dashboard.layouts.master')
@section('css')

@section('title')
{{__('subject.Edit_Date')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo"> {{__('subject.Edit_quizze')}}</h4>
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
               <form action="{{route('Quizze.update',$quizze->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{__('subject.name_ar')}}</label>
                      <input type="hidden" name="id" value="{{$quizze->id}}">
                      <input type="text" name="Name_ar" value="{{$quizze->getTranslation('name','ar')}}" class="form-control"> 

                    </div>
                    <div class="col">
                        <label for="title">{{__('subject.name_en')}}</label>
                        <input type="hidden" name="id" value="{{$quizze->id}}">
                        <input type="text"  name="Name_en" value="{{$quizze->getTranslation('name','en')}}" class="form-control">
                      </div>      
                </div>
                <br>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="Grade_id">{{__('subject.name_subject')}} :<span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="supject_id">
                                <option selected disabled>حدد المادة الدراسية...</option>
                                @foreach($supjects as $supject)
                                    <option  value="{{ $supject->id }}" {{$supject->id == $quizze->supject_id ? 'selected':''}}>{{ $supject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="Grade_id">{{__('Teacher_trans.Name_Teacher')}}  : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="teacher_id">
                                <option selected disabled>حدد اسم المعلم...</option>
                                @foreach($teachers as $teacher)
                                    <option  value="{{ $teacher->id }}" {{$teacher->id == $quizze->teacher_id ?'selected':''}}>{{ $teacher->Name }}</option>
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
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($Grades as $Grade)
                                    <option  value="{{ $Grade->id }}" {{$Grade->id == $quizze->Grade_id ? 'selected' : ''}}>{{ $Grade->Name }}</option>
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
                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{__('subject.submit')}} </button>
                </div>
                    


               </form>
            </div>
        </div>
    </div>
<!-- row closed -->
@endsection
@section('js')

@endsection
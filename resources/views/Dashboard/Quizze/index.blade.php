@extends('Dashboard.layouts.master')
@section('css')

@section('title')
    {{__('main_trans.Exams')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo">     {{__('Sections_trans.list_Exam')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">

                <li class="breadcrumb-item active"> {{__('Sections_trans.list_Exam')}}</li>
                <li class="breadcrumb-item"><a href="#" class="default-color">{{__('Subject.home')}}</a></li>

            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">   
    <div class="col-xl-12 mb-30">     
      <div class="card card-statistics h-100"> 
        <div class="card-body">
            <a href="{{route('Quizze.create')}}" class="btn btn-success btn-sm" role="button"
            aria-pressed="true">  {{__('subject.Add_Quizze')}} </a><br><br>
          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('subject.exam_name')}}</th>
                    <th>{{trans('subject.Teacher_name')}}</th>
                    <th>{{trans('subject.name_grade')}}</th>
                    <th>{{trans('subject.class_room')}}</th>
                    <th>{{__('Sections_trans.Name_Section')}}</th>
                    <th>{{__('subject.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes  as $quizze )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$quizze->name}}</td>
                    <td>{{$quizze->Teachers->name}}</td>
                    <td>{{$quizze->Grades->Name}}</td>
                    <td>{{$quizze->classRoom->Name}}</td>
                    <td>{{$quizze->section->Name}}</td>
                    <td>
                        <a href="{{route('Quizze.edit',$quizze->id)}}"
                           class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-danger btn-sm"
                                data-toggle="modal"
                                data-target="#delete_exam{{ $quizze->id }}" title="حذف"><i
                                class="fa fa-trash"></i></button>
                    </td>
                </tr>
                @include('Dashboard.Quizze.Delete')
                @endforeach
            </tbody>
         

         </table>
        </div>
        </div>
      </div>   
    </div>
</div> 
<!-- row closed -->
@endsection
@section('js')

@endsection

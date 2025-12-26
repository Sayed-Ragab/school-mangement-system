@extends('Dashboard.layouts.master')
@section('css')

@section('title')
{{trans('Students_trans.Student_Edit')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo">    {{trans('Students_trans.Student_Edit')}}</h4>
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

            <form action="{{route('Students.update','test')}}" method="POST">
                @csrf
                @method('patch')
                <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.personal_information')}}</h6><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{trans('Students_trans.name_ar')}} : <span class="text-danger">*</span></label>
                            <input value="{{$Students->getTranslation('name','ar')}}" type="text" name="name_ar"  class="form-control">
                            <input type="hidden" name="id" value="{{$Students->id}}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{trans('Students_trans.name_en')}} : <span class="text-danger">*</span></label>
                            <input value="{{$Students->getTranslation('name','en')}}" class="form-control" name="name_en" type="text" >
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{trans('Students_trans.email')}} : </label>
                            <input type="email" value="{{ $Students->email }}" name="email" class="form-control" >
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{trans('Students_trans.password')}} :</label>
                            <input value="" type="password" name="password" class="form-control" >
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="gender">{{trans('Students_trans.gender')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="Gender_id">
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($Genders as $Gender)
                                    <option value="{{$Gender->id}}" {{$Gender->id == $Students->Gender_id ? 'selected' : ""}}>{{ $Gender->Name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nal_id">{{trans('Students_trans.Nationality')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="nationalitie_id">
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($nationals as $nal)
                                    <option value="{{ $nal->id }}" {{$nal->id == $Students->nationalitie_id ? 'selected' : ""}}>{{ $nal->Name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bg_id">{{trans('Students_trans.blood_type')}} : </label>
                            <select class="custom-select mr-sm-2" name="blood_id">
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($bloods as $bg)
                                    <option value="{{ $bg->id }}" {{$bg->id == $Students->blood_id ? 'selected' : ""}}>{{ $bg->Name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{trans('Students_trans.Date_of_Birth')}}  :</label>
                            <input class="form-control" type="text" value="{{$Students->Birth_Date}}" id="datepicker-action" name="Birth_Date" data-date-format="yyyy-mm-dd">
                        </div>
                    </div>

                </div>
                <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('Students_trans.Student_information')}}</h6><br>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="Grade_id">{{trans('Students_trans.Grade')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="Grade_id">
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($Grades as $Grade)
                                    <option value="{{ $Grade->id }}" {{$Grade->id == $Students->Grade_id ? 'selected' : ""}}>{{ $Grade->Name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="Classroom_id">{{trans('Students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="class_id">
                                <option value="{{$Students->class_id}}">{{$Students->ClassRoom->Name}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="section_id">{{trans('Students_trans.section')}} : </label>
                            <select class="custom-select mr-sm-2" name="section_id">
                                <option value="{{$Students->section_id}}"> {{$Students->section->Name}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="parent_id">{{trans('Students_trans.parent')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="parent_id">
                                <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                               @foreach($parents as $parent)
                                    <option value="{{ $parent->id }}" {{ $parent->id == $Students->parent_id ? 'selected' : ""}}>{{ $parent->Name_Father }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                        <select class="custom-select mr-sm-2" name="academic_year">
                            <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                            @php
                                $current_year = date("Y");
                            @endphp
                            @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                <option value="{{ $year}}" {{$year == $Students->academic_year ? 'selected' : ' '}}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                </div><br>
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

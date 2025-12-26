@extends('Dashboard.layouts.master')
@section('css')

@section('title')
{{trans('main_trans.Students_Promotions')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo"> {{trans('main_trans.Students_Promotions')}}</h4>
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
                        <a href="{{route('Promotion.index')}}" class="btn btn-success"> {{trans('Students_trans.Add_promotion')}}</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">{{trans('Students_trans.Recover_student')}}</button>
                            <br><br>


                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th class="alert-info">#</th>
                                        <th class="alert-info">{{trans('Students_trans.name')}}</th>
                                        <th class="alert-danger">{{trans('Students_trans.old_school')}}</th>
                                        <th class="alert-danger"> {{trans('Students_trans.previous_year')}}</th>
                                        <th class="alert-danger">{{trans('Students_trans.old_class')}}</th>
                                        <th class="alert-danger">{{trans('Students_trans.old_section')}}</th>
                                        <th class="alert-success">{{trans('Students_trans.new_school')}}</th>
                                        <th class="alert-success">{{trans('Students_trans.new_year')}}</th>
                                        <th class="alert-success">{{trans('Students_trans.new_class')}}</th>
                                        <th class="alert-success">{{trans('Students_trans.new_section')}}</th>
                                        <th>{{trans('Students_trans.Processes')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($promotions as $promotion)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{$promotion->Students->name}}</td>
                                            <td>{{$promotion->f_grade->Name}}</td>
                                            <td>{{$promotion->academic_year}}</td>
                                            <td>{{$promotion->f_classroom->Name}}</td>
                                            <td>{{$promotion->f_section->Name}}</td>
                                            <td>{{$promotion->t_grade->Name}}</td>
                                            <td>{{$promotion->academic_year_new}}</td>
                                            <td>{{$promotion->t_classroom->Name}}</td>
                                            <td>{{$promotion->t_section->Name}}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}">{{trans('Students_trans.retrve_student')}}</button>
                                            
                                            </td>
                                        </tr>
                                        @include('Dashboard.Students.promotion.Delete_all')
                                        @include('Dashboard.Students.promotion.Delete_one');
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

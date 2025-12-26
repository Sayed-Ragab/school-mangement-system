@extends('Dashboard.layouts.master')
@section('css')

@section('title')
{{trans('subject.subject')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo"> {{trans('subject.subject')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{trans('subject.list_subject')}}</a></li>
                <li class="breadcrumb-item active">{{trans('subject.home')}}<li>
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
                <a href="{{route('Subject.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('subject.add_subject') }}</a><br><br>
                <div class="row">   
                    <div class="col-xl-12 mb-30">     
                      <div class="card card-statistics h-100"> 
                        <div class="card-body">
                          <div class="table-responsive">
                          <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{trans('subject.name_subject')}}</th>
                                    <th>{{trans('subject.name_grade')}}</th>
                                    <th>{{trans('subject.class_room')}}</th>
                                    <th>{{trans('subject.Teacher_name')}}</th>
                                    <th> {{trans('subject.action')}}</th>
                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    
                                
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subject->name}}</td>
                                    <td>{{$subject->Grade->Name}}</td>
                                    <td>{{$subject->classRooms->Name}}</td>
                                    <td>{{$subject->Teachers->name}}</td>
                                    <td>
                                        <a href="{{route('Subject.edit',$subject->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_subject{{ $subject->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('Dashboard.Supject.Delete')
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
<!-- row closed -->
@endsection
@section('js')

@endsection

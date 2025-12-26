@extends('Dashboard.layouts.master')
@section('css')

@section('title')
{{ trans('main_trans.Teachers') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"style="font-family:Cairo"> {{__('main_trans.List_Teachers')}}</h4>
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
    <div class="col-xl-12 mb-30">     
      <div class="card card-statistics h-100"> 
        <div class="card-body">
            <a href="{{route('Teachers.create')}}" class="btn btn-success btn-sm" role="button"
            aria-pressed="true">{{ trans('Teacher_trans.Add_Teacher') }}</a><br><br>
          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{trans('Teacher_trans.Name_Teacher')}}</th>
                    <th>{{trans('Teacher_trans.Gender')}}</th>
                    <th>{{trans('Teacher_trans.Joining_Date')}}</th>
                    <th>{{trans('Teacher_trans.specialization')}}</th>
                    <th>{{__('Teacher_trans.Address')}}</th>
                    <th>{{trans('Teacher_trans.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Teachers as $Teacher)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$Teacher->name}}</td>
                    <td>{{$Teacher->genders->Name}}</td>
                    <td>{{$Teacher->Joining_Date}}</td>
                    <td>{{$Teacher->specializations->Name}}</td>
                    <td>{{$Teacher->address}}</td>
                    <td>
                        <a href="{{route('Teachers.edit',$Teacher->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher{{ $Teacher->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
          
               @include('Dashboard.Teachers.Delete')
               
                @endforeach 
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

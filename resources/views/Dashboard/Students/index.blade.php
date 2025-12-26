@extends('Dashboard.layouts.master')
@section('css')

@section('title')
{{trans('main_trans.list_students')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo">  {{trans('main_trans.list_students')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{__('main_trans.list_students')}}</a></li>
                <li class="breadcrumb-item active">{{__('main_trans.Dashboard')}}</li>
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
            <a href="{{route('Students.create')}}" class="btn btn-success btn-sm" role="button"
            aria-pressed="true">{{trans('main_trans.add_student')}}</a><br><br>
          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
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
                @foreach ($Students as $Student)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$Student->name}}</td>
                    <td>{{$Student->email}}</td>
                     <td>{{$Student->Genders->Name}}</td>
                     <td>{{$Student->Grades->Name}}</td>
                     <td>{{$Student->ClassRoom->Name}}</td>
                     <td>{{$Student->section->Name}}</td>
                     <td>
                        <div class="dropdown show">
                            <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('main_trans.processes')}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('Students.show',$Student->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;{{__('main_trans.View_student_data')}}</a>
                                <a class="dropdown-item" href="{{route('Students.edit',$Student->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp; {{__('main_trans.modify_student_data')}}</a>
                                <a class="dropdown-item" href="{{route('Fees_Invoices.show',$Student->id)}}"><i style="color: #0000cc" class="fa fa-edit"></i>&nbsp; {{__('main_trans.add_fee_Invoice')}}&nbsp;</a>
                                <a class="dropdown-item" href="{{route('receipt_students.show',$Student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;{{__('main_trans.Receipt')}}</a>
                                <a class="dropdown-item" href="{{route('Pyment_Students.show',$Student->id)}}"><i style="color:goldenrod" class="fas fa-donate"></i>&nbsp; &nbsp;{{__('main_trans.Exchange')}}</a>
                                <a class="dropdown-item" href="{{route('ProcessingFee.show',$Student->id)}}"><i style="color:red" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;{{__('main_trans.exclude_fees')}}</a>
                                <a class="dropdown-item" data-target="#Delete_Student{{ $Student->id }}" data-toggle="modal" href="#"><i style="color: red" class="fa fa-trash"></i>&nbsp;   {{__('main_trans.delete_student_data')}} </a>
                            </div>
                        </div>
                    </td>
                     
                     
                </tr> 
                @include('Dashboard.Students.delete')
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

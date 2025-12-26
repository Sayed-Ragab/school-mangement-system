@extends('Dashboard.layouts.master')
@section('css')

@section('title')
{{__('Fees.Edit_Exchange_bonds')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo">   {{__('Fees.Edit_Exchange_bonds')}} : <label style="color: red">{{$payments->student->name}}</label></h4>
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

                        <form action="{{route('Pyment_Students.update','test')}}" method="post" autocomplete="off">
                            @method('PUT')
                            @csrf
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Fees.Amount')}}: <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="Debit" value="{{$payments->amount}}" type="number" >
                                    <input  type="hidden" name="student_id" value="{{$payments->student->id}}" class="form-control">
                                    <input  type="hidden" name="id"  value="{{$payments->id}}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Fees.notes')}} : <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$payments->description}}</textarea>
                                </div>
                            </div>

                        </div>

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

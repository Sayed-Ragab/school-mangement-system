@extends('Dashboard.layouts.master')
@section('css')

@section('title')
{{__('fees.edit_fees')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo"> {{__('fees.edit_fees')}}</h4>
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
              <form action="{{route('Fees.update','test')}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputEmail4">{{__('Students_trans.name_ar')}}</label>   
                    <input type="hidden" name="id" value="{{$fee->id}}" class="form-control">
                    <input type="text" value="{{$fee->getTranslation('title','ar')}}" name="title_ar" class="form-control">
                    </div>
                    <div class="form-group col"> 
                        <label for="inputEmail4">{{__('Students_trans.name_en')}}</label>
                        <input type="tex" value="{{$fee->getTranslation('title','en')}}" name="title_en" class="form-control">
                    </div>
                    <div class="form-group col">
                        <label for="inputEmail4">{{__('Fees.Amount')}}</label>
                        <input type="number" value="{{$fee->amount}}" name="amount" class="form-control">
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col">
                        <label for="inputState">{{__('Grades_trans.title_page')}}</label>
                        <select class="custom-select mr-sm-2" name="Grade_id">
                            @foreach($Grades as $Grade)
                                <option value="{{ $Grade->id }}" {{$Grade->id == $fee->Grade_id ? 'selected' : ""}}>{{ $Grade->Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">{{__('My_Classes_trans.class_room')}}</label>
                        <select class="custom-select mr-sm-2" name="class_id">
                            <option value="{{$fee->class_id}}">{{$fee->classroom->Name}}</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="inputZip">{{__('Students_trans.Year')}}</label>
                        <select class="custom-select mr-sm-2" name="year">
                            @php
                                $current_year = date("Y")
                            @endphp
                            @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                <option value="{{ $year}}" {{$year == $fee->year ? 'selected' : ' '}}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                
                </div>
                <div class="form-group">
                    <label for="inputAddress">{{__('Grades_trans.description')}}</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                              rows="4">{{$fee->description}}</textarea>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">{{__('Grades_trans.save')}}</button>

              </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

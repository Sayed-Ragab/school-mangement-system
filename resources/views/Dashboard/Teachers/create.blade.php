@extends('Dashboard.layouts.master')
@section('css')

@section('title')
{{__('Teacher_trans.Add_Teacher')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo"> {{__('Teacher_trans.Add_Teacher')}}</h4>
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
             <form method="POST" action='{{route('Teachers.store')}}'>
                @csrf
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('Teacher_trans.Email')}}</label>
                        <input type="email" name="email" class="form-control">
                        @error('ثmail')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('Teacher_trans.Password')}}</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror    
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('Teacher_trans.Name_ar')}}</label>
                        <input type="text" name="Name_ar" class="form-control">
                        @error('Name_ar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="title">{{trans('Teacher_trans.Name_en')}}</label>
                        <input type="text" name="Name_en" class="form-control">
                        @error('Name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="inputCity">{{trans('Teacher_trans.specialization')}}</label>
                        <select class="custom-select my-1 mr-sm-2" name="specialization_id"> 
                        <option selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                        @foreach($specializations as $specialization)
                        <option value="{{$specialization->id}}">{{$specialization->Name}}</option>
                        @endforeach
                    </select>      
                    @error('Specialization_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group col">
                        <label for="inputState">{{trans('Teacher_trans.Gender')}}</label>
                        <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                              <option  selected disabled>{{trans('Parent_trans.Choose')}}...</option>
                                @foreach($Genders as $Gender)
                                <option value="{{$Gender->id}}">{{$Gender->Name}}</option>
                                @endforeach
                        </select>
                        @error('Gender_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <br><br>
                <div class="form-row">
                    <div class="col">
                        <label for="title">{{trans('Teacher_trans.Joining_Date')}}</label>
                        <div class='input-group date'>
                            <input class="form-control" type="text"  id="datepicker-action" name="Joining_Date" data-date-format="yyyy-mm-dd"  required>
                        </div>
                        @error('Joining_Date')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{trans('Teacher_trans.Address')}}</label>
                                <textarea class="form-control" name="address"
                                          id="exampleFormControlTextarea1" rows="4"></textarea>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Parent_trans.Next')}}</button>
             </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection

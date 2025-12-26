@extends('Dashboard.layouts.master')
@section('css')

    @section('title')
        {{__('main_trans.sections')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0" style="font-family:Cairo">  {{__('main_trans.sections')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                  
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
                  
                </div>
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="accordion gray plus-icon round">
                                @foreach($Grades as $Grade)
                                <div class="acd-group">
                                    <a href="#" class="acd-heading">{{ $Grade->Name }}</a>
                                    <div class="acd-des">
                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="datatable" class="table table-striped table-bordered p-0">
                                                                <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>{{ trans('Sections_trans.Name_Section') }}</th>
                                                                    <th>{{ trans('Sections_trans.Name_Class') }}</th>
                                                                    <th>{{ trans('Sections_trans.Status') }}</th>
                                                                    <th>{{ trans('Sections_trans.Processes') }}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($Grade->Sections as $list_Sections)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{ $list_Sections->Name }}</td>
                                                                    <td>{{ $list_Sections->classes->Name}}
                                                                  <td> 
                                                                    <label class="badge badge-{{$list_Sections->status == 1 ? 'success':'danger'}}">{{$list_Sections->status == 1 ? 'نشط':'غير نشط'}}</label>
                                                                </td>
                                                                  </td>
                                                                    <td>
                                                                        <a href="{{route('Attendance.show',$list_Sections->id)}}" class="btn btn-warning btn-sm" role="button" aria-pressed="true">قائمة الطلاب</a>
                                                                      
                                                                    </td>
                                                                </tr>
                                                              
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    <!-- row closed -->
@endsection


@section('js')

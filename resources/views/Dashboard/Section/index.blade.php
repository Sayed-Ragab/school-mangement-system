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
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{__('main_trans.List_sections')}}</a></li>
                    <li class="breadcrumb-item active">{{__('main_trans.sections')}}</li>
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
                    <a class="button x-small" data-target="#add" data-toggle="modal" href="">  {{ trans('Sections_trans.add_section') }}</a>
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
                                                                  <td> @if($list_Sections->status == 1)
                                                                            <label class="badge badge-success">{{ trans('Sections_trans.Status_Section_AC') }}</label>
                                                                        @else
                                                                            <label class="badge badge-danger">{{ trans('Sections_trans.Status_Section_No') }}</label>
                                                                    @endif
                                                                  </td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#edit{{ $list_Sections->id }}">{{ trans('Sections_trans.Edit') }}</a>
                                                                        <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal"  data-target="#delete{{ $list_Sections->id }}">{{ trans('Sections_trans.Delete') }}</a>
                                                                    </td>
                                                                </tr>
                                                                @include('Dashboard.Section.deleted')
                                                                @include('Dashboard.Section.edit')
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @include('Dashboard.Section.add')
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

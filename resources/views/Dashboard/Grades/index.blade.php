@extends('Dashboard.layouts.master')
@section('css')

    @section('title')
        {{ trans('Grades_trans.title_page') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0" style="font-family:Cairo"> {{ trans('main_trans.Grades') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{__('main_trans.Grades_list')}}</a></li>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#add">
                        {{ trans('Grades_trans.add_Grade') }}
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Grades_trans.Name') }}</th>
                                <th>{{ trans('Grades_trans.Notes') }}</th>
                                <th>{{ trans('Grades_trans.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Grades as $Grade)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$Grade->Name}}</td>
                                    <td>{{$Grade->Notes}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $Grade->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Grade->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @include('Dashboard.Grades.update')
                                @include('Dashboard.Grades.deleted')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('Dashboard.Grades.add')
    </div>

    <!-- row closed -->
@endsection
@section('js')

@endsection


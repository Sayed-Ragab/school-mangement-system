@extends('Dashboard.layouts.master')
@section('css')

@section('title')
    المكتبه
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo"> المكتبه</h4>
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
                            <a href="{{route('Library.create')}}" class="btn btn-success btn-sm" role="button"
                               aria-pressed="true">اضافة كتاب جديد</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اسم الكتب</th>
                                        <th>اسم المعلم</th>
                                        <th>المرحلة الدراسية</th>
                                        <th>الصف الدراسي</th>
                                        <th>القسم</th>
                                        <th>العمليات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{$book->title}}</td>
                                            <td>{{$book->teacher->name}}</td>
                                            <td>{{$book->grade->Name}}</td>
                                            <td>{{$book->classroom->Name}}</td>
                                            <td>{{$book->section->Name}}</td>
                                            <td>
                                                <a href="{{route('downloadAttachment',$book->file_name)}}" title="تحميل الكتاب" class="btn btn-warning btn-sm" role="button" aria-pressed="true"><i class="fas fa-download"></i></a>
                                                <a href="{{route('Library.edit',$book->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_book{{ $book->id }}" title="حذف"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        @include('Dashboard.library.destroy')
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
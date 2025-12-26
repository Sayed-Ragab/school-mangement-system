@extends('Dashboard.layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family:Cairo"> ncvlxcnvxcnvxcv</h4>
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

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المرحلة</th>
                            <th>اسم القسم</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $section->Grade->Name }}</td>
                                <td>{{ $section->Name }}</td>
                            </tr>
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

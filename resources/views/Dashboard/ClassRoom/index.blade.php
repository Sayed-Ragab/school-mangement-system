@extends('Dashboard.layouts.master')
@section('css')

    @section('title')
        {{ trans('My_Classes_trans.title_page') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0" style="font-family:Cairo"> {{ trans('My_Classes_trans.title_page') }}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{__('main_trans.List_classes')}}</a></li>
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
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('My_Classes_trans.add_class') }}
                    </button>

                    <button type="button" class="button x-small" id="btn_delete_all" data-target="#exampleModalLabel">
                        {{ trans('My_Classes_trans.delete_checkbox') }}
                    </button>
                    <br><br>

                        <form action="{{ route('Filter_Classes') }}" method="POST">
                            {{ csrf_field() }}
                            <select class="selectpicker" data-style="btn-info" name="Grade_id" required
                                    onchange="this.form.submit()">
                                <option value="" selected disabled>{{ trans('My_Classes_trans.Search_By_Grade') }}</option>
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                @endforeach
                            </select>
                        </form>
                        <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><input name="select_all" id="example-select-all" type="checkbox"
                                           onclick="CheckAll('box1', this)"/></th>
                                <th>{{ trans('My_Classes_trans.Name_class') }}</th>
                                <th>{{ trans('My_Classes_trans.Name_Grade') }}</th>
                                <th>{{ trans('My_Classes_trans.Processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($details))
                                    <?php $List_Classes = $details; ?>
                            @else
                                    <?php $List_Classes = $Classes; ?>
                            @endif

                            @foreach($List_Classes as $Class)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><input type="checkbox" value="{{ $Class->id }}" class="box1"></td>
                                    <td>{{$Class->Name}}</td>
                                    <td>{{$Class->Grades->Name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $Class->id }}"
                                                title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Class->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @include('Dashboard.ClassRoom.edit')
                            @include('Dashboard.ClassRoom.deleted')
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('Dashboard.ClassRoom.add')
        @include('Dashboard.ClassRoom.Delete_all')

    </div>
    

    <!-- row closed -->
@endsection

@section('js')

    <script type="text/javascript">
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = new Array();
                $("#datatable input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_all').modal('show')
                    $('input[id="delete_all_id"]').val(selected);
                }
            });
        });

    </script>
@endsection
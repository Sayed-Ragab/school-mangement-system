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
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form action="{{route('questions.update','test')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
    
                        <div class="col">
                            <label for="title">اسم السؤال</label>
                          
                            <input type="text" name="title" id="input-name" value="{{$question->title}}"
                                   class="form-control form-control-alternative" autofocus>
                                   <input type="hidden" name="id" value="{{$question->id}}">

                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label for="title">الاجابات</label>
                            <textarea name="answers" class="form-control" id="exampleFormControlTextarea1"
                                      rows="4">{{$question->answers}}</textarea>
                        </div>
                    </div>
    
                    <div class="form-row">
                        <div class="col">
                            <label for="title">الاجابة الصحيحة</label>
                            <input type="text" name="right_answer" id="input-name"
                                   class="form-control form-control-alternative" value="{{$question->right_answer}}" autofocus>
                        </div>
                    </div>
    
                    <div class="form-row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Grade_id">اسم الاختبار : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="quizze_id">
                                    <option selected disabled>حدد اسم الاختبار...</option>
                                    @foreach($quizzes as $quizze)
                                        <option value="{{ $quizze->id }}"  {{$quizze->id == $question->quizze_id ? 'selected' : ''}}>{{ $quizze->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Grade_id">الدرجة : <span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="score">
                                    <option selected disabled> حدد الدرجة...</option>
                                    <option value="5" {{$question->score == 5 ? 'selected' : ''}} >5</option>
                                    <option value="10" {{$question->score == 10 ? 'selected' : ''}}>10</option>
                                    <option value="15" {{$question->score == 15 ? 'selected' : ''}}>15</option>
                                    <option value="20" {{$question->score == 20 ? 'selected' : ''}}>20</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
    
    
                   </form>
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
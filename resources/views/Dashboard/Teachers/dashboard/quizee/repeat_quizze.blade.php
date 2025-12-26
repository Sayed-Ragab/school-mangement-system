
<div class="modal fade" id="repeat_quizze{{$degree->quizze_id}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <form action="{{route('repeat.quizze', $degree->quizze_id)}}" method="post">
           {{method_field('post')}}
           {{csrf_field()}}
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;"
                       class="modal-title" id="exampleModalLabel">فتح إعادة الاختبار للطالب</h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <h6>{{$degree->student->name}}</h6>
                   <input type="hidden" name="student_id" value="{{$degree->student_id}}">
                   <input type="hidden" name="quizze_id" value="{{$degree->quizze_id}}">
               </div>
               <div class="modal-footer">
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                       <button type="submit"
                               class="btn btn-info">{{ trans('My_Classes_trans.submit') }}</button>
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>
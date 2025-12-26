<div class="modal fade" id="delete_exam{{$quizze->id}}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <form action="{{route('Quizze.destroy','test')}}" method="post">
           {{method_field('delete')}}
           {{csrf_field()}}
           <div class="modal-content">
               <div class="modal-header">
                   <h5 style="font-family: 'Cairo', sans-serif;"
                       class="modal-title" id="exampleModalLabel">{{__('subject.Delete_Quizze')}} </h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p> {{ trans('My_Classes_trans.Warning_class') }}</p>
                   <input type="text" value="{{$quizze->name}}" class="form-control"> 
                   <input type="hidden" name="id" value="{{$quizze->id}}">
               </div>
               <div class="modal-footer">
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary"
                               data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                       <button type="submit"
                               class="btn btn-danger">{{ trans('subject.Delete') }}</button>
                   </div>
               </div>
           </div>
       </form>
   </div>
</div>
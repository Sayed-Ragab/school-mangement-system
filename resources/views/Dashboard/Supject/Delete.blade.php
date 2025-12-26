<div class="modal fade" id="delete_subject{{$subject->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('Subject.destroy','test')}}" method="post">
            @method('DELETE');
            {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{trans('subject.Delete_subject')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
          
            <div class="modal-body">
                <p>  {{trans('subject.Deleted')}} </p>
                <input type="text" name="Delete" class="form-control"  value="{{$subject->name}}">
                <input type="hidden" name="id"  value="{{$subject->id}}">
            </div>
            <div class="modal-footer">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('subject.close') }}</button>
                    <button type="submit"
                            class="btn btn-danger">{{ trans('subject.Delete') }}</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
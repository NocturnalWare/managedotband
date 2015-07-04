<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="{{$target}}" tabindex="-1" role="dialog" aria-labelledby="{{$target}}Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="{{$target}}Label">{{$title}}</h4>
      </div>
      <div class="modal-body">
          @include($content, ['Jesus' => 'oko'])
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">{{$save}}</button>
      </div>
        @if($type == 'form')
          {{Form::close()}}
        @endif
    </div>
  </div>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="formInput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Input {{($message)}}</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('member.input.event')}}">
                @csrf
                <div class="form-group">
                  <label for="event_id">Divisi</label>
                  <select class="form-control" id="event_id" name="event_id">
                    <option hidden>Select Divisi</option>
                    @foreach ($event as $event)
                        <option value="{{$event->id}}">{{$event->name}}</option>
                    @endforeach
                    <input type="text" name="user_id" value="{{$d->id}}" hidden>
                  </select>
                </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
</div>
</div>

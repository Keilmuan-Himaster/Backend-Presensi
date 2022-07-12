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
            <form method="POST" action="{{route('code.input')}}">
                @csrf
                <div class="form-group">
                  <label for="event_id">Kegiatan</label>
                  <select class="form-control" id="event_id" name="event_id">
                    <option hidden>Select Kegiatan</option>
                    @foreach ($event as $event)
                        <option value="{{$event->id}}">{{$event->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="title">Kegiatan</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="contoh : Tutorial Kalkulus ke-1">
                  <small id="nameHelp" class="form-text text-muted">Kegiatan yang keberapa</small>
                </div>
                <div class="form-group">
                  <label for="place">Tempat</label>
                  <input type="text" class="form-control" id="place" name="place" placeholder="contoh : Google Meet, Siskom 3" required>
                </div>
                <div class="form-group">
                  <label for="link">link (jika kosong beri tanda -)</label>
                  <input type="text" class="form-control" id="link" name="link" placeholder="contoh : Google Meet, Siskom 3">
                </div>
                <div class="form-group">
                  <label for="desc">desc (jika kosong beri tanda -)</label>
                  <input type="text" class="form-control" id="desc" name="desc" placeholder="contoh : Google Meet, Siskom 3">
                </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>
</div>
</div>

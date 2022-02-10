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
            <form method="POST" action="{{route('event.input')}}">
                @csrf
                <div class="form-group">
                  <label for="structure_id">Divisi</label>
                  <select class="form-control" id="structure_id" name="structure_id">
                    <option hidden>Select Divisi</option>
                    @foreach ($structure as $structure)
                        <option value="{{$structure->id}}">{{$structure->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="name">Kegiatan</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="contoh : Tutorial" aria-describedby="emailHelp">
                  <small id="nameHelp" class="form-text text-muted">Isi sesuai dengan bagian yang ada di Himaster</small>
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

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
            <form method="POST" action="{{route('structure.input')}}">
                @csrf
                <div class="form-group">
                  <label for="name">Divisi</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="contoh : keilmuan" aria-describedby="emailHelp">
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

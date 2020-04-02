 {{-- <div class="modal fade" id="exampleModal-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('admin-update',$admin->id)}}" enctype="multipart/form-data">                              
            <div class="form-group">
              <label class="col-form-label">Name</label>
              <input type="text" class="form-control" value="{{$admin->name}}">
            </div>
            <div class="form-group">
              <label class="col-form-label">Email</label>
              <input type="email" class="form-control" value="{{$admin->email}}">
            </div>
            <div class="form-group">
              <label class="col-form-label">Phone</label>
              <input type="number" class="form-control" value="{{$admin->phone}}">
            </div>
            <div class="form-group">
              <label  class="col-form-label">Address</label>
              <textarea class="form-control" rows="3">{{$admin->address}}</textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-dismiss="modal">Update</button>
        </div>
      </div>
    </div>
  </div> --}}

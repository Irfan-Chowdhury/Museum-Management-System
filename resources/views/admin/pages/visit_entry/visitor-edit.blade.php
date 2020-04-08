 <div class="modal fade" id="exampleModal-{{$visitor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('visitor-update',$visitor->id)}}"> 
              @csrf                             
              <div class="form-group">
                <label class="d-flex justify-content-start">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$visitor->name}}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label class="d-flex justify-content-start">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$visitor->email}}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label class="d-flex justify-content-start">Phone (+88)</label>
                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$visitor->phone}}">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label  class="d-flex justify-content-start">Address</label>
                <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3">{{$visitor->address}}</textarea>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  {{-- <div class="modal fade" id="exampleModal-{{$visitor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label class="d-flex justify-content-start">Recipient:</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Message:</label>
              <textarea class="form-control"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
        </div>
      </div>
    </div>
  </div> --}}


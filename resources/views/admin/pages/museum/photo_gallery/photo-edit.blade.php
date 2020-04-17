<div class="modal fade" id="exampleModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Photo Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('photo-update',$item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf  
            
            <div class="form-group">
              <label for="recipient-name" class="d-flex justify-content-start">Photo Title [Optional]</label>
              <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{$item->title}}">
              @error('title')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
  
            <div class="form-group">
              <label for="recipient-name" class="d-flex justify-content-start">About/Quote [Optional]</label>
              <textarea name="description" class="form-control  @error('description') is-invalid @enderror" rows="3">{{$item->description}}</textarea>
              @error('description')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="author" class="d-flex justify-content-start">Author [Optional]</label>
              <input type="text" name="author" class="form-control  @error('author') is-invalid @enderror" value="{{$item->author}}">
              @error('author')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
  
            <div class="form-group">
              <label for="recipient-name" class="d-flex justify-content-start">Type</label>
  
              <div class="row">
                  <div class="col-md-3">
                      <div class="form-check">
                          <input name="type" class="form-check-input" type="radio" value="general" {{$item->type=='general' ? 'checked':''}}>General
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-check">
                          <input name="type" class="form-check-input" type="radio" value="slider" {{$item->type=='slider' ? 'checked':''}}>Slider
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-check">
                          <input name="type" class="form-check-input" type="radio" value="about" {{$item->type=='about' ? 'checked':''}}>About
                      </div>
                  </div>
              </div>
            </div>
  
            <div class="form-group mt-3">
                <label class="d-flex justify-content-start">Upload Image</label><br>
                <img src="{{asset($item->photo)}}" class="d-flex justify-content-start" height="100px" width="100px" id="photoGallery" required>
                <input type="file" name="photo" class="form-control" onchange="showImage(this,'photoGallery')">
                @error('photo')
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
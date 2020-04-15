<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('photo-save')}}" method="POST" enctype="multipart/form-data">
          @csrf  
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Photo Title</label>
            <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" value="{{old('title')}}" placeholder="Type Photo Title">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Short Description</label>
            <textarea name="description" class="form-control  @error('description') is-invalid @enderror" rows="3">{{old('description')}}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Type</label>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-check">
                        <input name="type" class="form-check-input" type="radio" value="general" checked>General
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-check">
                        <input name="type" class="form-check-input" type="radio" value="slider">Slider
                    </div>
                </div>
            </div>
          </div>

          <div class="form-group mt-3">
              <label>Upload Image</label><br>
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS1gfHk6PkOcBMSZT0o_W2gp9zZ8gE5rGcQrzBAK42y_GiAvpRm&usqp=CAU" height="100px" width="100px" id="photoGallery" required>
              <input type="file" name="photo" class="form-control" onchange="showImage(this,'photoGallery')">
              @error('photo')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
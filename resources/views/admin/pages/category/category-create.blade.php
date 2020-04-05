<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Category Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('category-save')}}" method="POST">
          @csrf  
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category Name</label>
            <input type="text" name="category_name" class="form-control  @error('category_name') is-invalid @enderror" value="{{old('category_name')}}" placeholder="Type Category">
            @error('category_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Store of Direction</label>
            <input type="text" name="store_direction" class="form-control  @error('store_direction') is-invalid @enderror" value="{{old('store_direction')}}" placeholder="Type Direction">
            @error('store_direction')
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
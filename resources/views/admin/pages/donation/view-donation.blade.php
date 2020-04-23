<div class="modal fade" id="Donation-{{$key+1}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h3 class="modal-title" id="exampleModalLongTitle">Donation Info</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-info">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" value="{{$donation->item_name}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Item Details</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="10" readonly>{{$donation->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h3 class="modal-title" id="exampleModalLongTitle">Photos of Item</h3>
                <hr>

                <div class="row">
                    @foreach ($donation_images as $item)
                        @if ($donation->id==$item->donation_id)
                            <div class="col-md-4">
                                <img src="{{asset('public/images/donation/'.$item->photo)}}" class="m-1 rounded float-left" height="250px" width="250px">
                            </div>
                        @endif
                    @endforeach  
                </div>             
            </div>
        </div>
    </div>
</div>
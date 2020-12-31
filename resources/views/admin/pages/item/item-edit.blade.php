@extends('admin.layouts.admin-master')

@section('title','Edit Item Info')
    
@section('admin-content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Item</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Item</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
  


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                     <!-- general form elements -->
                    <div class="card card-primary">
                        <div>
                            @include('admin.includes.session_message')
                        </div>
                        <div class="card-header">
                            <h4 class="text-center">Edit Item Info</h4>
                        </div>
                        <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('item-update',$item->id)}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Item Name</label>
                                        <input type="text" name="item_name" class="form-control @error('item_name') is-invalid @enderror" id="" value="{{$item->item_name}}">
                                        @error('item_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group ">
                                        <label>Category</label> 
                                        <select name="category_id" class="form-control">
                                            <option value=""> -- Select Category --</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{ $category->id == $item->category_id ? 'selected="selected"' : '' }}>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Description</label> <span>[max 1500 character]</span>
                                        <textarea name="description" class="textarea @error('description') is-invalid @enderror">{{$item->description}}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload Image</label> <br>
                                        <img id="item_photo" src="{{asset("$item->photo")}}" height="100px" width="100px">
                                        <input type="file"  name="photo" class="form-control" onchange="showImage(this,'item_photo')"> <!--must be added "multiple" word for using multiple  image -->
                                        @error('photo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                            {{-- <div>
                                @include('admin.includes.session_message')
                            </div> --}}
                        </div>
                        <!-- /.card -->
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
@endsection
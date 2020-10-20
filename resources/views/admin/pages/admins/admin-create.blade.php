@extends('admin.layouts.admin-master')

@section('title','Admin Create')
    
@section('admin-content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Sub-admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
  

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @include('admin.includes.session_message')
        </div>
        <div class="col-md-2"></div>
    </div>
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                     <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="text-center">New Sub-admin Create</h4>
                        </div>
                        <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('admin-save')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="" placeholder="Type Name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="" placeholder="Type Email">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone (+880)</label>
                                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="" placeholder="Type Phone">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror"  id="" rows="3"></textarea>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group ">
                                        <label>Role</label> 
                                        <select name="role" class="form-control @error('role') is-invalid @enderror">
                                            <option value=""> -- Select Role --</option>
                                            <option value="sub-admin">Sub-Admin</option>
                                            <option value="entry-operator">Entry Operator</option>
                                        </select>
                                        @error('role')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Type Password">
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload Image</label> <br>
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS1gfHk6PkOcBMSZT0o_W2gp9zZ8gE5rGcQrzBAK42y_GiAvpRm&usqp=CAU" height="100px" width="100px" id="admin_photo">
                                        <input type="file" name="photo" class="form-control" onchange="showImage(this,'admin_photo')">
                                        @error('photo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="exampleInputFile">Upload Image</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
@endsection
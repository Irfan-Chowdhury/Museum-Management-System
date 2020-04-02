@extends('admin.admin_template')

@section('title','Admin Edit')
    
@section('admin-content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit  Admin Data</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                     <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="text-center">{{$admin->name}}'s' - Info Edit</h4>
                        </div>
                        <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('admin-update',$admin->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$admin->name}}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$admin->email}}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$admin->phone}}">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror"  rows="3">{{$admin->address}}</textarea>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Update Image</label> <br>
                                        <img src="{{asset("$admin->photo")}}" height="100px" width="100px" id="admin_photo">
                                        <input type="file" name="photo" class="form-control" onchange="showImage(this,'admin_photo')">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                            <div>
                                @include('admin.includes.session_message')
                            </div>
                        </div>
                        <!-- /.card -->
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

     {{-- The below script in this path-  public/admin/js/style.js || & I was attached it in resource/view/admin/admin_template.blade.php in js section--}}

<script>
        // //Image Show Before Upload Start
        // $(document).ready(function(){
        //     $('input[type="file"]').change(function(e){
        //         var fileName = e.target.files[0].name;
        //         if (fileName){
        //             $('#fileLabel').html(fileName);
        //         }
        //     });
        // });

        // function showImage(data, imgId){
        //     if(data.files && data.files[0]){
        //         var obj = new FileReader();

        //         obj.onload = function(d){
        //             var image = document.getElementById(imgId);
        //             image.src = d.target.result;
        //         }
        //         obj.readAsDataURL(data.files[0]);
        //     }
        // }
        // //Image Show Before Upload End
    </script>
@endsection
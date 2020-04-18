@extends('admin.layouts.admin-master')

@section('title','Rule Edit')
    
@section('admin-content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Rule</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Rule</a></li>
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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                     <!-- general form elements -->
                    <div class="card card-primary">
                        <div>
                            @include('admin.includes.session_message')
                        </div>
                        <div class="card-header">
                            <h5 class="text-center">{{$rule->title}}'s - Info Edit</h5>
                        </div>
                        <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('rule-update',$rule->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$rule->title}}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{$rule->description}}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
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
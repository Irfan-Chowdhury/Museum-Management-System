@extends('admin.layouts.admin-master')

@section('title','Visitor Create')
    
@section('admin-content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Visitor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Visitor</a></li>
                <li class="breadcrumb-item active">Create</li>
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
                            <h4 class="text-center">Add New Visitor</h4>
                        </div>
                        <!-- /.card-header -->

                            <!-- form start -->
                            <form method="POST" action="{{route('visitor-save')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Full Name</label> <span class="text-danger">*</span>
                                        <input type="text" name="visitor_name" class="form-control @error('visitor_name') is-invalid @enderror" value="{{old('visitor_name')}}" placeholder="Type Name">
                                        @error('visitor_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label> [Optional]
                                        <input type="visitor_email" name="visitor_email" class="form-control @error('visitor_email') is-invalid @enderror" value="{{old('email')}}" placeholder="Type Email">
                                        @error('visitor_email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone (+88)</label> <span class="text-danger">*</span>
                                        <input type="number" name="visitor_phone" class="form-control @error('visitor_phone') is-invalid @enderror" value="{{old('visitor_phone')}}" placeholder="Type Phone">
                                        @error('visitor_phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label> <span class="text-danger">*</span>
                                        <textarea name="visitor_address" class="form-control @error('visitor_address') is-invalid @enderror"  rows="3">{{old('visitor_address')}}</textarea>
                                        @error('visitor_address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>                                   
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
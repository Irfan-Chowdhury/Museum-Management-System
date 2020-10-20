@extends('admin.layouts.admin-master')

@section('title','Visit Entry')
    
@section('admin-content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Visit Entry</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Visit</a></li>
                <li class="breadcrumb-item active">Entry</li>
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
                    <div class="card card-info">
                        <div>
                            @include('admin.includes.session_message')
                        </div>
                        <div class="card-header">
                            <h4 class="text-center">Add New Visit</h4>
                        </div>
                        <!-- /.card-header -->

                            <!-- form start -->
                            <form method="POST" action="{{route('visit-entry-save')}}">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label>Visitor ID</label>
                                            </div>
                                            <div class="col-md-1">
                                                <h5 class="text-info text-bold">OR</h5>
                                            </div>
                                            <div class="col-md-6">
                                                <label>User ID</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <select name="visitor_id" class="form-control select2bs4">
                                                {{-- <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;"> --}}
                                                        <option value="">-- Select Visitor-ID --</option>
                                                    @foreach ($visitors as $visitor)
                                                        <option value="{{$visitor->id}}">{{$visitor->visitor_id_no}}</option>
                                                    @endforeach    
                                                </select>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-5">
                                                <select name="user_id" class="form-control select2bs4">
                                                {{-- <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;"> --}}
                                                        <option value="">-- Select User-ID --</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}">{{$user->user_id_no}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="card text-center">
                                        <div class="card-header"></div>
                                        <div class="card-header">
                                            <h5 class="text-info text-bold">OR Manually Insert Visitor Info</h5> 
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Full  Name <span class="text-danger">*</span></label> 
                                        <div class="col-sm-9">
                                            <input type="text" name="visitor_name" class="form-control @error('visitor_name') is-invalid @enderror" value="{{old('visitor_name')}}" placeholder="Type Name">
                                        </div>
                                        @error('visitor_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email   <span class="text-secondary">  [Optional]</span></label> 
                                        <div class="col-sm-9">
                                            <input type="email" name="visitor_email" class="form-control @error('visitor_email') is-invalid @enderror" value="{{old('visitor_email')}}" placeholder="Type Email">
                                        </div>
                                        @error('visitor_email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Phone (+880)  <span class="text-danger">*</span></label> 
                                        <div class="col-sm-9">
                                            <input type="number" name="visitor_phone" class="form-control @error('visitor_phone') is-invalid @enderror" value="{{old('visitor_phone')}}" placeholder="Type Phone">
                                        </div>
                                        @error('visitor_phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Address <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea name="visitor_address" class="form-control @error('visitor_address') is-invalid @enderror"  rows="3">{{old('visitor_address')}}</textarea>
                                        </div>
                                        @error('visitor_address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="card"><div class="card-header"></div></div>

                                    <div class="form-group row pt-2">
                                        <label class="col-sm-3 col-form-label">Ticket <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-check">
                                                            <input name="quantity" class="form-check-input" type="radio" checked value="1">1
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-check">
                                                            <input name="quantity" class="form-check-input" type="radio" value="2">2
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-check">
                                                            <input name="quantity" class="form-check-input" type="radio" value="3">3
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-check">
                                                            <input name="quantity" class="form-check-input" type="radio" value="4">4
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card"><div class="card-header"></div></div>

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


{{-- Already added in admin-master --}}


{{-- 
 <!-- Select2 -->
 <link rel="stylesheet" href="{{asset('admin/admin-lte/plugins/select2/css/select2.min.css')}}">
 <link rel="stylesheet" href="{{asset('admin/admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> --}}




<!-- Select2 -->
{{-- <script src="{{asset('admin/admin-lte/plugins/select2/js/select2.full.min.js')}}"></script>

$(document).ready(function(){

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('#tableId').DataTable();
}); --}}



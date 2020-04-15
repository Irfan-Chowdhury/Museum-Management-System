@extends('admin.layouts.admin-master')

@section('title','Museum Manage')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
       
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">Museum Manage</h2>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        @include('admin.includes.session_message') <!--Session Message-->
                    </div>
                    <div class="col-md-3"></div>
                </div>
                {{-- <div>
                    @include('admin.includes.session_message')
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tableId" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center table-primary">
                                <th>SL</th>
                                <th>Museum Name</th>
                                <th>About Museum</th>
                                <th>Address</th>
                                <th>Late Long</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                                             
                                <tr>
                                    <td>1</td>
                                    <td class="text-center">{{$museum->museum_name}}</td> <!--String Limit type-1 [can't convert html to string]-->
                                    <td>{{substr(strip_tags($museum->description), 0, 20)}} ...</td> <!--String Limit type-2 [it can convert html to string]-->
                                    <td>{{Str::limit($museum->address,20,' ...')}}</td>
                                    <td><a href="{{$museum->late_long}}" target="_blank">Click Here</a></td>
                                    <td>
                                        <a href="{{route('museum-edit',$museum->id)}}" class="m-1 btn btn-info fa fa-edit" title="Edit"></a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>
    </div>
</section>

{{-- <i class="fas fa-arrow-circle-up"></i> --}}
@endsection



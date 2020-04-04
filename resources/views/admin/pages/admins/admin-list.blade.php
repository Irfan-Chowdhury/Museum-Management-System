@extends('admin.layouts.admin-master')

@section('title','Admin List')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
       
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">Admins Data List</h2>
                </div>
                <div>
                    @include('admin.includes.session_message')
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tableId" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center table-primary">
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Photo</th>
                                <th >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $key => $admin)                                    
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->phone}}</td>
                                        <td>{{substr(strip_tags($admin->address), 0, 15)}}</td> <!--String Limit-->
                                        <td><img src="{{asset("$admin->photo")}}" height="50px" width="50px" alt="" srcset=""></td>
                                        <td>
                                            {{-- <button type="button" title="Edit" class="m-1 btn btn-info fa fa-edit" data-toggle="modal" data-target="#exampleModal-{{$admin->id}}"></button>
                                                    @include('admin.pages.admins.admin-view') --}}
                                            <a href="{{route('admin-edit',$admin->id)}}" class="m-1 btn btn-info fa fa-edit" title="Edit"></a>
                                            <a href="{{route('admin-delete',$admin->id)}}" onclick="return confirm('Are You Sure to delete ?')" class="btn btn-danger fa fa-trash-alt" title="Delete"></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>
    </div>
</section>


@endsection



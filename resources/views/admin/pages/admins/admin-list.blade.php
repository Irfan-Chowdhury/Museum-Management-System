@extends('admin.admin_template')

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
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tableId" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
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
                                @foreach ($users as $key => $item)                                    
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{substr(strip_tags($item->address), 0, 15)}}</td> <!--String Limit-->
                                        <td><img src="{{asset("$item->photo")}}" height="50px" width="50px" alt="" srcset=""></td>
                                        <td>
                                            <a href="#" class="m-1 btn btn-info fa fa-edit" title="Edit" ></a>
                                            <a href="#" class="m-1 btn btn-danger fa fa-trash-alt" title="Delete"></a>
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
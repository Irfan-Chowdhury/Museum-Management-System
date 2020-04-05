@extends('admin.layouts.admin-master')

@section('title','Item List')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
       
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">Item List</h2>
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
                                <th>Category</th>
                                <th>Item Name</th>
                                <th>About the Item</th>
                                <th>Direction Path</th>
                                <th>Photo</th>
                                <th>Operator</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)               
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td class="text-center">{{$item->category->category_name}}</td> 
                                        <td class="text-center">{{$item->item_name}}</td>
                                        <td>{{substr(strip_tags($item->description), 0, 20)}} ...</td> <!--String Limit type-2 [it can convert html to string]-->
                                        <td class="text-center">{{$item->category->store_direction}}</td>
                                        <td><img src="{{asset("$item->photo")}}" height="60px" width="80px" alt="" srcset=""></td>
                                        <td class="text-center">{{$item->user->name}}</td> 
                                        <td>
                                            <a href="{{route('item-edit',$item->id)}}" class="m-1 btn btn-info fa fa-edit" title="Edit"></a>
                                            <a href="{{route('item-delete',$item->id)}}" onclick="return confirm('Are You Sure to delete ?')" class="btn btn-danger fa fa-trash-alt" title="Delete"></a>
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

{{-- <i class="fas fa-arrow-circle-up"></i> --}}
@endsection



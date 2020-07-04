@extends('admin.layouts.admin-master')

@section('title','Category List')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
       
            <div class="card">
                <div class="card-header d-flex">
                  <h2 class="text-secondary">Category List</h2>
                  <button type="button" class="ml-auto btn btn-primary" data-toggle="modal" data-target="#exampleModal">+ Add New Category</button>
                  @include('admin.pages.category.category-create')
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        @include('admin.includes.session_message') <!--Session Message-->
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="card-body">
                    <table id="tableId" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center table-primary">
                                <th>SL</th>
                                <th>Category Name</th>
                                <th>Store Room (Direction)</th>
                                <th>Total Items</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)                                    
                                    <tr class="text-center">
                                        <td>{{$key+1}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td>{{$category->store_direction}}</td>
                                        <td> ( {{count($category->items)}} )</td>
                                        <td>
                                             <button type="button" title="Edit" class="m-1 btn btn-info fa fa-edit" data-toggle="modal" data-target="#exampleModal-{{$category->id}}"></button>
                                                    @include('admin.pages.category.category-edit')

                                            <a href="{{route('category-delete',$category->id)}}" onclick="return confirm('Are You Sure to delete ?')" class="btn btn-danger fa fa-trash-alt" title="Delete"></a>
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
        <div class="col-1"></div>
    </div>
</section>

{{-- <i class="fas fa-arrow-circle-up"></i> --}}
@endsection



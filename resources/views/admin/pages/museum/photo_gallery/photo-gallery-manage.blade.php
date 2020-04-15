@extends('admin.layouts.admin-master')

@section('title','Photo Gallery Manage')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        {{-- <div class="col-1"></div> --}}
        <div class="col-12">
       
            <div class="card">
                <div class="card-header d-flex">
                  <h2 class="text-secondary">List of Gallery-Photos</h2>
                  <button type="button" class="ml-auto btn btn-primary" data-toggle="modal" data-target="#exampleModal">+ Add New Photo</button>
                    <!-- Photo Create -->
                    @include('admin.pages.museum.photo_gallery.photo-create')
                
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
                                <th>Image</th>
                                <th>Title of Photo</th>
                                <th>About</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($photoGalleries as $key => $item)                                    
                                    <tr>
                                        <td class="text-center">{{$key+1}}</td>
                                        <td class="text-center"><img src="{{asset("$item->photo")}}" height="60px" width="80px" alt="" srcset=""></td>
                                        <td>{{Str::limit($item->title,20,' ...')}}</td>
                                        <td>{{Str::limit($item->description,30,' ...')}}</td>
                                        <td class="text-center">{{$item->type}}</td>
                                        <td class="text-center">{{$item->status}}</td>
                                        <td class="text-center">

                                            @if ($item->status == 'published')
                                                <a href="{{route('photo-unpublished',$item->id)}}" class="btn btn-warning fa fa-arrow-alt-circle-down" title="Unpublish"></a>
                                            @else
                                                <a href="{{route('photo-published',$item->id)}}" class="btn btn-success fa fa fa-arrow-alt-circle-up" title="Published"></a>
                                            @endif

                                             <button type="button" title="Edit" class="m-1 btn btn-info fa fa-edit" data-toggle="modal" data-target="#exampleModal-{{$item->id}}"></button>
                                                    @include('admin.pages.museum.photo_gallery.photo-edit')

                                            <a href="{{route('photo-delete',$item->id)}}" onclick="return confirm('Are You Sure to delete ?')" class="btn btn-danger fa fa-trash-alt" title="Delete"></a>
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
        {{-- <div class="col-1"></div> --}}
    </div>
</section>

{{-- <i class="fas fa-arrow-circle-up"></i> --}}
@endsection



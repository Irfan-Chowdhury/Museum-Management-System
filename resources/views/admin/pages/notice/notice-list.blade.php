@extends('admin.layouts.admin-master')

@section('title','Notice List')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
       
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">Notice List</h2>
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
                            <tr class="text-center">
                                <th>SL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Status</th>
                                <th >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($notices as $key => $notice)                                    
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{Str::limit($notice->title,20,' ...')}}</td> <!--String Limit type-1 [can't convert html to string]-->
                                        <td>{{substr(strip_tags($notice->description), 0, 35)}} ...</td> <!--String Limit type-2 [it can convert html to string]-->
                                        <td><img src="{{asset("$notice->photo")}}" height="60px" width="80px" alt="" srcset=""></td>
                                        <td>{{$notice->status}}</td>
                                        <td>
                                            @if ($notice->status == 'published')
                                                <a href="{{route('notice-unpublished',$notice->id)}}" class="btn btn-warning fa fa-arrow-alt-circle-down" title="Unpublish"></a>
                                            @else
                                                <a href="{{route('notice-published',$notice->id)}}" class="btn btn-success fa fa fa-arrow-alt-circle-up" title="Published"></a>
                                            @endif
                                            <a href="{{route('notice-edit',$notice->id)}}" class="m-1 btn btn-info fa fa-edit" title="Edit"></a>
                                            <a href="{{route('notice-delete',$notice->id)}}" onclick="return confirm('Are You Sure to delete ?')" class="btn btn-danger fa fa-trash-alt" title="Delete"></a>
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



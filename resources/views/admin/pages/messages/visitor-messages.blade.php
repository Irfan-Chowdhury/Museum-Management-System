@extends('admin.layouts.admin-master')

@section('title','Visitors Message')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
       
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">All Visitor Messages</h2>
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
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Subject - Message</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($visitor_messages as $key => $item)
                                    @if ($item->status=='unread')
                                        <tr style="background:#343A40">
                                            <td class="text-center"><a href="{{route('message-delete',$item->id)}}" onclick="return confirm('Are You Sure to delete ?')" class="fa fa-trash-alt text-danger" title="Delete"></a></td>
                                            <td><a class="text-light" href="{{route('message-read',$item->id)}}"> <strong> {{$item->name}}</strong></a></td>
                                            <td><a class="text-light" href="{{route('message-read',$item->id)}}"> <strong> {{$item->subject}}</strong> - <span style="color:#B4B3B2"> {{Str::limit($item->message,40,' ...')}}</span></a></td> 
                                        </tr>
                                    @else 
                                        <tr style="background:#403D3A">
                                            <td class="text-center"><a href="{{route('message-delete',$item->id)}}" onclick="return confirm('Are You Sure to delete ?')" class="fa fa-trash-alt text-danger" title="Delete"></a></td>
                                            <td><a class="text-light" href="{{route('message-read',$item->id)}}"> <span style="color:#B4B3B2"> {{$item->name}} </span></a></td>
                                            <td><a class="text-light" href="{{route('message-read',$item->id)}}"> <span style="color:#B4B3B2" >{{$item->subject}}</span> - <span style="color:#B4B3B2" > {{Str::limit($item->message,40,' ...')}}</span></a></td> 
                                        </tr>
                                    @endif                                    
                                    
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



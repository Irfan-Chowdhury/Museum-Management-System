@extends('admin.layouts.admin-master')

@section('title','Visit Entry List')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                  <h2 class="text-secondary">Visit Entry List</h2>
                  <a href="{{route('visit-entry-create')}}" class="ml-auto btn btn-primary">+ Add New Entry</a>
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
                                <th>Identity No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Quantity</th>
                                <th>Total Tk</th>
                                <th>Entry Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($visit_entries as $key => $item)                                    
                                    <tr class="text-center">
                                        <td>{{$key+1}}</td>
                                                                    
                                        <!-- Identity No -->
                                        <td>
                                            @if ($item->visitor_id!=NULL)
                                                {{$item->visitor->visitor_id_no}}  <!-- Visitor Id No -->

                                            @elseif($item->user_id!=NULL)    
                                                {{$item->user->user_id_no}}     <!-- User Id No -->
                                            @endif
                                        </td>

                                        <!-- Name -->
                                        <td>
                                            @if ($item->visitor_id!=NULL)
                                                {{$item->visitor->visitor_name}} <!-- Visitor Name  -->

                                            @elseif($item->user_id!=NULL)    
                                                {{$item->user->name}}    <!-- User Name -->
                                            @endif
                                        </td>

                                        <!-- Phone -->
                                        <td>
                                            @if ($item->visitor_id!=NULL)
                                                {{$item->visitor->visitor_phone}}   <!-- Visitor Phone -->

                                            @elseif($item->user_id!=NULL)    
                                                {{$item->user->phone}}       <!-- User Phone -->
                                            @endif
                                        </td>
                                        
                            
                                        <td>{{$item->quantity}}</td> 
                                        <td>{{$item->total_taka}}</td> 
                                        <td>{{date('d-m-Y', strtotime($item->created_at))}}</td> <!-- 07-04-2020 -->                                        
                                        <td class="text-center">{{date('h:i A',strtotime($item->created_at))}}</td>
                                        <td><a href="{{route('visit-entry-delete',$item->id)}}" onclick="return confirm('Are You Sure to delete ?')" class="btn btn-danger fa fa-trash-alt" title="Delete"></a></td>
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



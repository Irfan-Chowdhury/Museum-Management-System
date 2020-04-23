@extends('admin.layouts.admin-master')

@section('title','All Donation List')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
       
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">All Donation Info</h2>
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
                                <th>Donar Name</th>
                                <th>UserID</th>
                                <th>Item Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($donations as $key => $donation)                                    
                                    <tr>
                                        <td class="text-center">{{$key+1}}</td>
                                        <td class="text-center">{{$donation->user->name}}</td>
                                        <td class="text-center">{{$donation->user->user_id_no}}</td>
                                        <td>{{Str::limit($donation->item_name,20,' ...')}}</td> <!--String Limit type-1 [can't convert html to string]-->
                                        <td>{{Str::limit($donation->description,35,' ...')}}</td> 
                                        <td class="text-center text-bold">
                                            @if($donation->status=='pending')  <span class="text-warning">New</span> 
                                            @elseif($donation->status=="reject") <span class="text-danger">Rejected</span> 
                                            @elseif($donation->status=="accept") <span class="text-success">Accepted</span> 
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="m-1 btn btn-warning fa fa-eye" title="View" data-toggle="modal" data-target="#Donation-{{$key+1}}"></button>
                                                @include('admin.pages.donation.view-donation')
                                            
                                            @if($donation->status!='reject' && $donation->status!='accept') 
                                                <a href="{{route('donation-reject',$donation->id)}}" onclick="return confirm('Are You Sure to Reject this item ?')" class="btn btn-danger fas fa-thumbs-down" title="Reject"></a>
                                                <a href="{{route('donation-accept',$donation->id)}}" class="btn btn-success fas fa-thumbs-up" title="Accept"></a>
                                            @endif
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



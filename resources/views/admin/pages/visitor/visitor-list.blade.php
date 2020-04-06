@extends('admin.layouts.admin-master')

@section('title','Visitors List')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                  <h2 class="text-secondary">Visitor List</h2>
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
                                <th>Visitor ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($visitors as $key => $visitor)                                    
                                    <tr class="text-center">
                                        <td>{{$key+1}}</td>
                                        <td>{{$visitor->visitor_id_no}}</td> 
                                        
                                        {{-- <td>{{ $visitor->created_at->format('d M, Y') }}</td>  <!-- Time Formate --> --}}
                                        
                                        <td>{{$visitor->name}}</td>

                                        <td>
                                            @if($visitor->email==NULL)  
                                                <strong class="text-danger">X</strong>
                                            @else
                                                {{$visitor->email}}
                                            @endif
                                        </td>

                                        <td>+88{{$visitor->phone}}</td>
                                        <td>{{Str::limit($visitor->address,20,' ...')}}</td>
                                        <td>
                                             <button type="button" title="Edit" class="m-1 btn btn-info fa fa-edit" data-toggle="modal" data-target="#exampleModal-{{$visitor->id}}"></button>
                                                @include('admin.pages.visitor.visitor-edit')

                                            <a href="{{route('visitor-delete',$visitor->id)}}" onclick="return confirm('Are You Sure to delete ?')" class="btn btn-danger fa fa-trash-alt" title="Delete"></a>
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



@extends('admin.layouts.admin-master')

@section('title','Schedule Manage')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
       
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">Schedule Manage</h2>
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
                                <th>Day</th>
                                <th>Starting Time</th>
                                <th>Ending Time</th>
                                <th>Half Day</th>
                                <th>Holiday</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedule as $key=> $item)               
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td class="text-center">{{$item->day}}</td> 


                                    @if(($item->starting_time && $item->ending_time) != NULL)
                                        {{-- <td class="text-center">{{$item->starting_time}}</td>  --}}
                                        <td class="text-center">{{date('h:i A',strtotime($item->starting_time))}}</td> <!--Time Formate like- '12:00 AM' -->
                                        <td class="text-center">{{date('h:i A',strtotime($item->ending_time))}}</td> 
                                    @else
                                        <td class="text-center text-danger text-bold">X</td>
                                        <td class="text-center text-danger text-bold">X</td>
                                    @endif

                                    

                                    @if($item->half_day!= NULL)
                                        <td class="text-center text-primary text-bold">{{$item->half_day}}</td>
                                    @else
                                        <td class="text-center text-danger text-bold">X</td>
                                    @endif

                                    
                                    @if($item->holiday!= NULL)
                                        <td class="text-center text-success text-bold">{{$item->holiday}}</td>
                                    @else
                                        <td class="text-center text-danger text-bold">X</td>
                                    @endif
                                        
                                        
                                    <td>
                                        <a href="{{route('schedule-edit',$item->id)}}" class="m-1 btn btn-info fa fa-edit" title="Edit"></a>
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



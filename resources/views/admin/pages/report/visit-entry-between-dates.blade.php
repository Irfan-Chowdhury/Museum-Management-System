@extends('admin.layouts.admin-master')

@section('title','Report Visit Entry')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">View visit entry of visitors between dates</h2>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="{{route('visit-entry-between-dates-show')}}" method="get">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">From Date</label> 
                                    <div class="col-sm-9">
                                        <input type="date" name="from_date" class="form-control">
                                        @error('from_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">To Date</label> 
                                    <div class="col-sm-9">
                                        <input type="date" name="to_date" class="form-control">
                                        @error('to_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="d-flex justify-content-end">
                                    <a href="{{route('visit-entry-between-dates')}}" class="mr-1 btn btn-dark">Refresh</a>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>

                <!--   ========================================================   -->
                @if(isset($visit_entries) && isset($from) && isset($to))    
                    <div class="card-body">
                        <table id="tableId" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center table-primary">
                                    <th>SL</th>
                                    <th>Identity No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Quantity</th>
                                    <th>Total Tk</th>
                                    <th>Entry Operator</th>
                                    <th>Entry Date</th>
                                    <th>Time</th>
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

                                            <!-- Email -->
                                            <td>
                                                @if ($item->visitor_id!=NULL)
                                                    @if($item->visitor->email)
                                                        {{$item->visitor->email}} <!-- Visitor Email  -->
                                                    @else 
                                                        <span class="font-italic">N / A</span>
                                                    @endif

                                                @elseif($item->user_id!=NULL)    
                                                    {{$item->user->email}}    <!-- User Email -->
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
                                            
                                            <!-- Address -->
                                            <td>
                                                @if ($item->visitor_id!=NULL)
                                                    {{$item->visitor->visitor_address}} <!-- Visitor Address  -->

                                                @elseif($item->user_id!=NULL)    
                                                    {{$item->user->address}}    <!-- User Address -->
                                                @endif
                                            </td>
                                
                                            <td>{{$item->quantity}}</td> 
                                            <td>{{$item->total_taka}}</td> 
                                            <td>{{$item->entry_operator}}</td> <!--update-2-->
                                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td> <!-- 07-04-2020 -->                                        
                                            <td class="text-center">{{date('h:i A',strtotime($item->created_at))}}</td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-header">
                        <form action="{{route('downloadPDF-visit-entry')}}" method="get">
                            <input type="hidden" name="from_date" value="{{$from}}">
                            <input type="hidden" name="to_date"   value="{{$to}}">

                            <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf">  Print as PDF</i></button>
                        </form>
                    </div>
                @endif
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>

{{-- <i class="fas fa-arrow-circle-up"></i> --}}
@endsection



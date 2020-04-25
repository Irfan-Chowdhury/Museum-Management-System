@extends('admin.layouts.admin-master')

@section('title','Invoice Report')
    
@section('admin-content')

<style>
    table, th, td {
          border: 1px solid #D3D4D7;
          text-align: center;
    }
</style>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">View invoice between dates</h2>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="{{route('invoice-between-dates-show')}}" method="get">

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
                                    <a href="{{route('invoice-between-dates')}}" class="mr-1 btn btn-dark">Refresh</a>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>          
                
            @if(isset($visit_entries) && isset($total_ticket) && isset($from) && isset($to))    
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <table class="table">
                                  <tr>
                                    <th style="width:50%">Total Visit Register :</th>
                                    <td>{{count($visit_entries)}}</td>
                                  </tr>
                                  <tr>
                                    <th>Total Ticket Cell :</th>
                                    <td>{{$total_ticket}}</td>                                    
                                  </tr>
                                  <tr>
                                    <th>Per Ticket Price :</th>
                                    <td>৳ 10.00</td>
                                  </tr>
                                  <tr>
                                    <th>Total Sell :</th>
                                    <td>৳ {{$total_ticket*10}}</td>
                                  </tr>
                                </table>
                              </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>

                <div class="card-header">
                    <form action="{{route('downloadPDF-invoice-between-dates')}}" method="get">
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



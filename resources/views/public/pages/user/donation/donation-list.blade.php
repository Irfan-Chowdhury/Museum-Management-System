@extends('public.layouts.public-master')

@section('front_title','Donation Info List')

@section('public-content')

<style>

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
</style>


<section id="inner-headline">
    <div class="container">
        <div class="row">
        <div class="span8">
            <div class="inner-heading">
            <h2><strong>Your Total Donation</strong></h2>
            </div>
        </div>
        <div class="span4">
            <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
            <li><a href="#">Donation</a><i class="icon-angle-right"></i></li>
            <li class="active">Donation Info List</li>
            </ul>
        </div>
        </div>
    </div>
</section>


<section id="content">
    <div class="container">
        <div class="row">
            {{-- <div class="span2"></div> --}}

            <div class="span12">
                
                {{-- Session Success Message --}}
                @if (session()->has('message'))  
                    <h6 style="color:red;margin-bottom:3px;"><strong> {{ session('message') }} </strong></h6>
                @endif

                <table id="customers">
                    <tr>
                        <th>#SL</th>
                        <th>Item Name</th>
                        <th>Item Details</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                    @foreach ($donations as $key => $item)
                        <tr>
                            <td style="text-align:center">{{$key+1}}</td>
                            <td>{{$item->item_name}}</td>
                            <td>{{Str::limit($item->description,50,' ...')}}</td>
                            <td style="text-align:center"> 
                                @if ($item->status=='pending') Pending 
                                @elseif($item->status=='reject') Sorry
                                @elseif($item->status=='accept') Accepted
                                @endif
                            </td>
                            <td style="text-align:center">
                                <a title="Edit" target="_blank" href="{{route('donation-edit',$item->id)}}" class="btn btn-warning">Edit</a>
                            </td>
                            <td style="text-align:center">
                                <a href="{{route('donation-delete',$item->id)}}" title="Delete" onclick="return confirm('Are You Sure to delete ?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
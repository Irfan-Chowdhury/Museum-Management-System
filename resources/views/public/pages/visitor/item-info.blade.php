@extends('public.layouts.public-master')

@section('front_title','Item Info')

@section('public-content')

<style>
.customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

.customers td, .customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

.customers tr:nth-child(even){background-color: #f2f2f2;}

.customers tr:hover {background-color: #ddd;}

.customers th {
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
            <h2><strong>Museum</strong> item info with direction</h2>
            </div>
        </div>
        <div class="span4">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                <li>Item Info<i class="active d-inlineicon-angle-right"></i></li>
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
          
                <table id="table_id" class="customers">
                    <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Item Name</th>
                            <th>Category</th>
                            <th>Direction (Room)</th>
                        </tr>
                    </thead>
                    <tbody>

                       @foreach ($items as $key => $item)
                            <tr>
                                <td style="text-align:center">{{$key+1}}</td>
                                <td style="text-align:center">{{$item->item_name}}</td>
                                {{-- <td style="text-align:center">{{$item->category->category_name}}</td> --}}
                                <td style="text-align:center">{{$item->category_name}}</td>
                                {{-- <td style="text-align:center">{{$item->category->store_direction}}</td> --}}
                                <td style="text-align:center">{{$item->store_direction}}</td>
                            </tr>
                       @endforeach 

                    </tbody>
                </table>
                
                <!--  Pagination -->
                <div class="pagination"> {{ $items->links() }}</div>
                
            </div>
        </div>
    </div>
</section>
@endsection
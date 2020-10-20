@extends('public.layouts.public-master')

@section('front_title','Item Info')

@section('public-content')

<section id="inner-headline">
    <div class="container">
        <div class="row">
        <div class="span4">
            <div class="inner-heading">
            <h2><strong>Item info Details</strong></h2>
            </div>
        </div>
        <div class="span8">
            <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
            <li>Details<i class="icon-angle-right"></i></li>
            <li class="active"></li>
            </ul>
        </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
      <div class="row">


        <div class="span2"></div>
        <div class="span8">
            <article>
                <div class="row">
                @foreach ($item as $data)
                    <div class="span8">
                        <div class="post-image">
                            <div class="post-heading">
                                <h3><a href="#">{{$data->item_name}}</a></h3>
                            </div>

                            @if (count($donation_accept) != 0 || Auth::user()->role=="super-admin" || Auth::user()->role=="sub-admin")    
                                @if (isset($data->photo))
                                    <img src="{{asset($data->photo)}}" alt=""/>
                                @endif
                            @else
                                <div class="row">
                                    <div class="span2">
                                        <img src="https://vcunited.club/wp-content/uploads/2020/01/No-image-available-2.jpg" width="150px" height="150px" alt=""/>
                                    </div>
                                    <div class="span3" style="margin-top:70px;color:red">
                                        <p>(Only doners can see photo)</p>
                                    </div>
                                </div>
                                
                            @endif
                        </div>
{{-- @php
    $donation = DB::table('donations')->get();
@endphp --}}

                        @if (count($donation_accept) == 0) {{-- at least one donation must be accepted --}}
                            <p>{{substr(strip_tags($data->description), 0, 300)}} <b>. . . . .</b></p> 
                        @else
                            <p>{{substr(strip_tags($data->description), 0)}} </p>
                        @endif
                        {{-- <p>{{substr(strip_tags($data->description), 0)}}</p> --}}
                        <div class="bottom-article">
                            <ul class="meta-post">
                                <li><strong>Category :</strong> {{$data->category_name}}</li><br>
                                <li><strong>Direction (Room) :</strong> {{$data->store_direction}}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
                </div>
            </article>
        </div>
        <div class="span2"></div>
      </div>
    </div>
  </section>
@endsection
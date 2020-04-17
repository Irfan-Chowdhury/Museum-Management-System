@extends('public.layouts.public-master')

@section('front_title','About Us')

@section('public-content')

<section id="inner-headline">
    <div class="container">
      <div class="row">
        <div class="span4">
          <div class="inner-heading">
            <h2>About Us</h2>
          </div>
        </div>
        <div class="span8">
          <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
            <li class="active">About Us</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section id="content">
    <div class="container">
      <div class="row">
            <div class="span6">
                <h2>Welcome to <strong>{{$museum->museum_name}}</strong></h2>
                <p>
                    {{substr(strip_tags($museum->description), 0)}}
                </p>
            </div>

            <div class="span6">
                <!-- start flexslider -->
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($photos as $item)
                            <li>
                                <img src="{{asset($item->photo)}}" alt="" />
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- end flexslider -->
            </div>

      </div>
      <!-- divider -->
      <div class="row">
        <div class="span12">
          <div class="solidline">
          </div>
        </div>
      </div>
      <!-- end divider -->
    </div>
  </section>

@endsection

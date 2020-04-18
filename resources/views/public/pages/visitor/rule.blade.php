@extends('public.layouts.public-master')

@section('front_title','Rules')

@section('public-content')

<section id="inner-headline">
    <div class="container">
        <div class="row">
        <div class="span4">
            <div class="inner-heading">
            <h2><strong>Rules</strong></h2>
            </div>
        </div>
        <div class="span8">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                <li>Rules<i class="active d-inlineicon-angle-right"></i></li>
            </ul>
        </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
      <div class="row">
        <div class="span1"></div>
        <div class="span8">

            <div class="accordion" id="accordion2">

                @foreach ($reules as $key => $rule)
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <h3><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{$key}}">#{{$key+1}} {{$rule->title}}</a></h3>
                        </div>
                        <div id="collapse{{$key}}" class="accordion-body collapse ">
                            <div class="accordion-inner">
                                    <h5>{{$rule->description}}</h5>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

        </div>


      </div>
    </div>
</section>



@endsection
@extends('public.layouts.public-master')

@section('front_title',$notice->title)

@section('public-content')

<section id="inner-headline">
    <div class="container">
        <div class="row">
        <div class="span4">
            <div class="inner-heading">
            <h2><strong>Notice</strong></h2>
            </div>
        </div>
        <div class="span8">
            <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
            <li>Notice<i class="icon-angle-right"></i></li>
            <li class="active">{{$notice->title}} </li>
            </ul>
        </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
      <div class="row">


        <div class="span8">
            <article>
                <div class="row">
                <div class="span8">
                    <div class="post-image">
                        <div class="post-heading">
                            <h3><a href="#">{{$notice->title}}</a></h3>
                        </div>

                        @if (isset($notice->photo))
                            <img src="{{asset($notice->photo)}}" alt="" />
                        @endif 

                    </div>
                    <p>{{substr(strip_tags($notice->description), 0,)}}</p>

                    <div class="bottom-article">
                        <ul class="meta-post">
                            <li><i class="icon-calendar"></i><a href="#"> <strong>Published :</strong> {{date('d M, Y', strtotime($notice->created_at))}}</a></li>
                        </ul>
                    </div>
                </div>
                </div>
            </article>
        </div>

        <div class="span4">
          <aside class="right-sidebar">
        
            <div class="widget">
              <h5 class="widgetheading">Latest Notice</h5>
              <ul class="recent">
                @foreach ($notices as $notice)
                    <li>
                        @if (isset($notice->photo)) <img src="{{asset($notice->photo)}}" class="pull-left" width="65px" height="65px" alt="" /> @endif
                        <p><strong><a href="{{route('notice.read',$notice->id)}}">{{$notice->title}}</a></strong></p>
                        <p>{{substr(strip_tags($notice->description), 0,100)}}...</p>
                   </li> <br>
                @endforeach  
              </ul>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </section>
@endsection
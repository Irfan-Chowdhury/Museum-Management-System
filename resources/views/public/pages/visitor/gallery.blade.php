@extends('public.layouts.public-master')

@section('front_title','Gallery')

@section('public-content')

<section id="inner-headline">
    <div class="container">
        <div class="row">
        <div class="span4">
            <div class="inner-heading">
            <h2>Photo <strong>Gallery</strong></h2>
            </div>
        </div>
        <div class="span8">
            <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
            <li class="active">Gallery</li>
            </ul>
        </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
      <div class="row">
        <div class="span12">
          <ul class="portfolio-categ filter">
            <li class="all active"><a href="#">All</a></li>
            <li class="web"><a href="#" title="">General</a></li>
            <li class="icon"><a href="#" title="">Slider</a></li>
            <li class="graphic"><a href="#" title="">About</a></li>
          </ul>
          <div class="clearfix">
          </div>
          <div class="row">
            <section id="projects">
              <ul id="thumbs" class="portfolio">


                @foreach ($photos as $key => $item)
                    @if ($item->type=="general")

                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span3 design" data-id="id-{{$key}}" data-type="web">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="@if(isset($item->title)) {{$item->title}} @else Title @endif" href="{{asset('/admin/images/photo_gallery/front_gallery_large/'.$item->photo)}}">
                                    <span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="{{asset('/admin/images/photo_gallery/'.$item->photo)}}" style="width:270px;height:189px"  alt="@if(isset($item->description)) {{$item->description}} @else Your Description : Lorem Ispum consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis. @endif">
                            </li>
                            <!-- End Item Project -->

                    @elseif ($item->type=="slider")
                        
                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span3 design" data-id="id-{{$key}}" data-type="icon">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="@if(isset($item->title)) {{$item->title}} @else Title @endif" href="{{'/admin/images/photo_gallery/front_gallery_large/'.$item->photo}}" style="width:900px;height:632px">
                                    <span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="{{'/admin/images/photo_gallery/'.$item->photo}}" style="width:270px;height:189px"  alt="@if(isset($item->description)) {{$item->description}} @else Your Description : Lorem Ispum consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis. @endif">
                            </li>
                            <!-- End Item Project -->

                    @elseif ($item->type=="about")

                            <!-- Item Project and Filter Name -->
                            <li class="item-thumbs span3 design" data-id="id-{{$key}}" data-type="graphic">
                                <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                                <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="@if(isset($item->title)) {{$item->title}} @else Title @endif" href="{{'/admin/images/photo_gallery/front_gallery_large/'.$item->photo}}" style="width:900px;height:632px">
                                    <span class="overlay-img"></span>
                                    <span class="overlay-img-thumb font-icon-plus"></span>
                                </a>
                                <!-- Thumb Image and Description -->
                                <img src="{{'/admin/images/photo_gallery/'.$item->photo}}" style="width:270px;height:189px"  alt="@if(isset($item->description)) {{$item->description}} @else Your Description : Lorem Ispum consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis. @endif">
                            </li>
                            <!-- End Item Project -->

                    @endif


                    {{-- <!-- Item Project and Filter Name -->
                    <li class="item-thumbs span3 design" data-id="id-1" data-type="slider">
                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="id-1 web" href="{{$item->photo}}" style="width:900px;height:632px">
                            <span class="overlay-img"></span>
                            <span class="overlay-img-thumb font-icon-plus"></span>
                        </a>
                        <!-- Thumb Image and Description -->
                        <img src="{{$item->photo}}" style="width:270px;height:189px"  alt="BCSIR Laboratory High School, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                    </li>
                    <!-- End Item Project --> --}}

                @endforeach




                    {{-- <!-- Item Project and Filter Name -->
                    <li class="item-thumbs span3 design" data-id="id-1" data-type="slider">
                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="id-1 web" href="{{asset('public/img/works/full/image-01-full.jpg')}}">
                            <span class="overlay-img"></span>
                            <span class="overlay-img-thumb font-icon-plus"></span>
                        </a>
                        <!-- Thumb Image and Description -->
                        <img src="{{asset('public/img/works/thumbs/image-01.jpg')}}" alt="BCSIR Laboratory High School, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                    </li>
                    <!-- End Item Project -->


                    <!-- Item Project and Filter Name -->
                    <li class="item-thumbs span3 design" data-id="id-1" data-type="icon">
                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="id-1 icon" href="{{asset('public/img/works/full/image-02-full.jpg')}}">
                            <span class="overlay-img"></span>
                            <span class="overlay-img-thumb font-icon-plus"></span>
                        </a>
                        <!-- Thumb Image and Description -->
                        <img src="{{asset('public/img/works/thumbs/image-02.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                    </li>
                    <!-- End Item Project -->


                    <!-- Item Project and Filter Name -->
                        <li class="item-thumbs span3 photography" data-id="id-2" data-type="graphic">
                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="id-2 graphic" href="{{asset('public/img/works/full/image-03-full.jpg')}}">
                            <span class="overlay-img"></span>
                            <span class="overlay-img-thumb font-icon-plus"></span>
                        </a>
                        <!-- Thumb Image and Description -->
                        <img src="{{asset('public/img/works/thumbs/image-03.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                    </li>
                    <!-- End Item Project -->


                    <!-- Item Project and Filter Name -->
                    <li class="item-thumbs span3 design" data-id="id-2" data-type="slider">
                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="id-2 web" href="{{asset('public/img/works/full/image-04-full.jpg')}}">
                            <span class="overlay-img"></span>
                            <span class="overlay-img-thumb font-icon-plus"></span>
                        </a>
                        <!-- Thumb Image and Description -->
                        <img src="{{asset('public/img/works/thumbs/image-04.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                    </li>
                    <!-- End Item Project -->


                    <!-- Item Project and Filter Name -->
                    <li class="item-thumbs span3 photography" data-id="id-3" data-type="slider">
                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="id-3 web" href="{{asset('public/img/works/full/image-05-full.jpg')}}">
                            <span class="overlay-img"></span>
                            <span class="overlay-img-thumb font-icon-plus"></span>
                        </a>
                        <!-- Thumb Image and Description -->
                        <img src="{{asset('public/img/works/thumbs/image-05.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                    </li>
                    <!-- End Item Project -->


                    <!-- Item Project and Filter Name -->
                    <li class="item-thumbs span3 photography" data-id="id-5" data-type="icon">
                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="id-5 icon" href="{{asset('public/img/works/full/image-06-full.jpg')}}">
                            <span class="overlay-img"></span>
                            <span class="overlay-img-thumb font-icon-plus"></span>
                        </a>
                        <!-- Thumb Image and Description -->
                        <img src="{{asset('public/img/works/thumbs/image-06.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                    </li>
                    <!-- End Item Project -->


                    <li class="item-thumbs span3 design" data-id="id-4" data-type="slider">
                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="id-4 web" href="{{asset('public/img/works/full/image-07-full.jpg')}}">
                            <span class="overlay-img"></span>
                            <span class="overlay-img-thumb font-icon-plus"></span>
                        </a>
                        <!-- Thumb Image and Description -->
                        <img src="{{asset('public/img/works/thumbs/image-07.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                    </li>
                    <!-- End Item Project -->


                    <!-- Item Project and Filter Name -->
                    <li class="item-thumbs span3 design" data-id="id-0" data-type="graphic">
                        <!-- Fancybox - Gallery Enabled - Title - Full Image -->
                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title="id-0 graphic" href="{{asset('public/img/works/full/image-08-full.jpg')}}">
                            <span class="overlay-img"></span>
                            <span class="overlay-img-thumb font-icon-plus"></span>
                        </a>
                        <!-- Thumb Image and Description -->
                        <img src="{{asset('public/img/works/thumbs/image-08.jpg')}}" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                    </li>
                    <!-- End Item Project --> --}}
              </ul>
            </section>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
@extends('public.layouts.public-master')

@section('front_title','Schedule')

@section('public-content')

<section id="inner-headline">
    <div class="container">
        <div class="row">
        <div class="span8">
            <div class="inner-heading">
            <h2><strong>Schedule</strong> of Museum</h2>
            </div>
        </div>
        <div class="span4">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                <li>Schedule<i class="active d-inlineicon-angle-right"></i></li>
            </ul>
        </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
      <div class="row">
        <div class="span3"></div>
        <div class="span6">
            <table class="table table-bordered">
                <thead>
                  <tr style="background-color: #D5D8DC;">
                    <th style="text-align:center;"><h5><strong>Day</strong></h5></th>
                    <th style="text-align:center;"><h5><strong>Starting Time</strong></h5></th>
                    <th style="text-align:center;"><h5><strong>Ending Time</strong></h5></th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($schedules as $key => $item)
                  <tr class="@if($key%2==0) error @else warning @endif">
                    <td style="text-align:center" class="text-info"><strong>{{$item->day}}</strong></td>
                    @if (!isset($item->holiday))
                        <td style="text-align:center"><strong>{{date('h:i A',strtotime($item->starting_time))}}</strong></td>
                        <td style="text-align:center"><strong>{{date('h:i A',strtotime($item->ending_time))}}</strong></td>
                    @else
                        <td style="text-align:center;color:red"><strong>CLOSED</strong></td>
                        <td></td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>

        </div>
      </div>
    </div>
</section>

@endsection
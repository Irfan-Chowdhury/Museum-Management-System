@extends('public.layouts.public-master')

@section('front_title','Profile')

@section('public-content')

<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td{
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(odd){background-color:#e0ebeb;}
    #customers tr:nth-child(even){background-color: #ffe6e6;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #4CAF50;
        color: white;
    }
    #image img{
        height: 265px;
        margin-top:25px;

    }
    #image h6{
        margin-left:30px;
        font-style: italic;
    }

    
    #edit a{
        /* width: 100%; */
        background-color: #4CAF50;
        color: white;
        /* padding: 14px 20px; */
        padding: 10px 518px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    #edit a:hover {
        background-color: #45a049;
    }
</style>

<section id="inner-headline">
    <div class="container">
        <div class="row">
        <div class="span4">
            <div class="inner-heading">
            <h2><strong>Profile</strong></h2>
            </div>
        </div>
        <div class="span8">
            <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
            <li class="active">Profile</li>
            </ul>
        </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">

            <section id="content">
                <div class="container">
                    <div class="row">

                        <div class="span1"></div>
                        <div class="span4">
                            <ul class="thumbnails">
                                <li class="span4">
                                    <div class="thumbnail" id="image">
                                        <img src="{{asset("$user->photo")}}">
                                        <h6><strong>{{$user->name}}</strong></h6>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="span7">
                            <table id="customers">
                                <tbody>
                                    <tr>
                                        <td><h6><strong>Full Name</strong></h6></td>
                                        <td><h6>{{$user->name}}</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6><strong>Email</strong></h6></td>
                                        <td><h6>{{$user->email}}</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6><strong>Phone</strong></h6></td>
                                        <td><h6>{{$user->phone}}</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6><strong>Address</strong></h6></td>
                                        <td><h6>{{$user->address}}</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6><strong>Identity No</strong></h6></td>
                                        @if ($user->role=='super-admin' || $user->role=='admin')
                                            <td><h6>Admin</h6></td>
                                        @else
                                            <td><h6>{{$user->user_id_no}}</h6></td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>   
                        </div>
                    </div>

                    <div class="row">
                        <div class="span1"></div>
                        <div class="span11">
                            <div id="edit">
                                <h6><a href="{{route('user-profile-edit')}}">Edit</a></h6>
                            </div>
                            {{-- <input type="submit" value="Edit"> --}}
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="span8">
            </div>
        </div>
    </div>
</section>

@endsection
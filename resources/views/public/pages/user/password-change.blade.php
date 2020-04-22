@extends('public.layouts.public-master')

@section('front_title','Change Password')


@section('public-content')

<style>

    #donation label {
        padding: 12px 12px 12px 0;
        display: inline-block;
        font-size: 20px;
    }

    #donation input[type=password] {
        width: 100%;
        padding: 20px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }


    #donation input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    #donation input[type=submit]:hover {
        background-color: #45a049;
    }

    #donation div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
</style>



<section id="inner-headline">
    <div class="container">
        <div class="row">
        <div class="span8">
            <div class="inner-heading">
            <h2><strong>Password Change</strong></h2>
            </div>
        </div>
        <div class="span4">
            <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
            <li class="active">Paswword Change</li>
            </ul>
        </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="span2"></div>
            <div class="span7">

                <div id="donation">
                    <h2>Password Change</h2>

                    {{-- Session Success?Error Message --}}
                    @if (session()->has('success_password'))  
                        <h6 style="color:green"><strong>Congratulation !!</strong> {{ session('message') }}</h6>
                    @elseif (session()->has('error_password'))  
                        <h6 style="color:red"><strong>Opps !!</strong> {{ session('message') }}</h6>
                    @endif
                    
                    
                    <form action="{{route('password-change-update')}}" method="POST">
                        @csrf
                        
                        <label for="fname">Old Password</label> <br>
                        <input type="password" id="fname" name="old_password" placeholder="Type Current Password" required> <br>
                        @error('old_password')
                            <span style="color:red">{{ $message }}</span><br>
                        @enderror


                        <label for="fname">New Password</label> <br>
                        <input type="password" id="fname" name="new_password" placeholder="Type New Password" required> <br>
                        @error('new_password')
                            <span style="color:red">{{ $message }}</span><br>
                        @enderror


                        <label for="fname">Confirm Password</label> <br>
                        <input type="password" id="fname" name="password_confirmation" placeholder="Confirm Password" required> <br>
                        @error('password_confirmation')
                            <span style="color:red">{{ $message }}</span><br>
                        @enderror


                        <input type="submit" value="Submit">
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
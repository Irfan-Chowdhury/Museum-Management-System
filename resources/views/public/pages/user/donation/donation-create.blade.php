@extends('public.layouts.public-master')

@section('front_title','Donation Create')


@section('public-content')

<style>
#donation label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-size: 20px;
}

#donation input[type=text] ,input[type=file], textarea {
  width: 100%;
  padding: 20px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

#donation input[type=file]{
  width: 100%;
  padding: 5px 0px 35px 20px;
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
            <h2><strong>Donation </strong>for Museum</h2>
            </div>
        </div>
        <div class="span4">
            <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
            <li><a href="#">Donation</a><i class="icon-angle-right"></i></li>
            <li class="active">Add New Donation</li>
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
                    <h2>Donation Form</h2>

                    {{-- Session Success Message --}}
                    @if (session()->has('message'))  
                        <h6 style="color:green"><strong>Congratulation !!</strong> {{ session('message') }}</h6>
                    @endif
                    
                    <form action="{{route('donation-save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <label for="fname">Item Name</label> <br>
                        <input type="text" id="fname" name="item_name" placeholder="Type Item Name" required> <br>
                        @error('item_name')
                            <span style="color:red">{{ $message }}</span><br>
                        @enderror
                        {{-- @error('description') is-invalid @enderror --}}


                        <label for="lname">Item Details</label> <br>
                        <textarea name="description" rows="5"></textarea required> <br>
                        @error('description')
                            <span style="color:red">{{ $message }}</span><br>
                        @enderror


                        <label for="lname">Upload Image</label> <span>[ Single or Multiple Image ]</span> <br>
                        <input type="file" multiple name="donation_image[]" id="" required> 
                        @error('donation_image')
                            <span style="color:red">{{ $message }}</span>
                        @enderror


                        <input type="submit" value="Submit">
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>




{{-- <section id="content">
    <div class="container">
        <div class="row">

            <div class="span2"></div>

            <div class="span7">
                <form class="form-horizontal">


                    <div class="control-group">
                        <h6 class="control-label"><b>Item Name</b></h6>
                        <div class="controls">
                            <input type="text" name="item_name" placeholder="Type Item Name">
                        </div>
                    </div>

                    <div class="control-group">
                        <h6 class="control-label"> <b>Item Details</b> </h6>
                        <div class="controls">
                            <textarea name="description" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <h6 class="control-label"><b>Item Photos</b></h6>
                        <div class="controls">
                            <input type="file" multiple name="photo">
                        </div>
                        @error('photo')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            </label>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </div>
                </form>
        
            </div>            
        </div>        
    </div>
</section> --}}
@endsection
@extends('public.layouts.public-master')

@section('front_title','Profile Edit')


@section('public-content')

<style>

/* For Donation Data Info */

#donation label , #image label {
  padding: 12px 12px 12px 0;
  display: inline-block;
  font-size: 20px;
}

#donation input[type=text] , textarea {
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


/* For Multiple Image */
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers a {
    background-color: #EE4A36;
    color: white;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #5F7C7B;
  color: white;
}

/* For Multiple Image Save*/

#image input[type=file]{
  width: 100%;
  padding: 5px 0px 35px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;

}

#image input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#image input[type=submit]:hover {
  background-color: #5F7C7B;
}

input[type=file]{
  width: 100%;
  padding: 5px 0px 35px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

</style>



<section id="inner-headline">
    <div class="container">
        <div class="row">
        <div class="span8">
            <div class="inner-heading">
            <h2><strong>Edit</strong> Profile Info</h2>
            </div>
        </div>
        <div class="span4">
            <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
            <li><a href="#">Profile</a><i class="icon-angle-right"></i></li>
            <li class="active">Profile Edit</li>
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
                    <h2>Profile Edit Form</h2>

                    {{-- Session Success Message --}}
                    @if (session()->has('success_profile'))  
                        <h6 style="color:green"><strong>Congratulation !!</strong> {{ session('message') }}</h6>
                    @endif
                    
                    <form action="{{route('user-profile-update',$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <label for="fname">Full Name</label> <br>
                        <input type="text" id="fname" name="name" value="{{$user->name}}" required> <br>
                        @error('name')
                            <span style="color:red">{{ $message }}</span><br>
                        @enderror
                        
                        <label for="fname">Phone</label> <br>
                        <input type="text" id="fname" name="phone" value="{{$user->phone}}" required> <br>
                        @error('phone')
                            <span style="color:red">{{ $message }}</span><br>
                        @enderror


                        <label for="lname">Address</label> <br>
                        <textarea name="address" rows="3">{{$user->address}}</textarea required><br><br>
                        @error('address')
                            <span style="color:red">{{ $message }}</span><br>
                        @enderror

                        <label for="lname">Upload New Image</label> <br>
                        <img src="{{asset($user->photo)}}" id="user_photo" height="200px" width="200px"><br>
                        <input type="file" name="photo" onchange="showImage(this,'user_photo')">
                        @error('photo')
                            <span style="color:red">{{ $message }}</span><br>
                        @enderror

                        <input type="submit" value="Update"><br><br>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>

<script>

//Image Show Before Upload Start
$(document).ready(function(){
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        if (fileName){
            $('#fileLabel').html(fileName);
        }
    });
});

function showImage(data, imgId){
    if(data.files && data.files[0]){
        var obj = new FileReader();

        obj.onload = function(d){
            var image = document.getElementById(imgId);
            image.src = d.target.result;
        }
        obj.readAsDataURL(data.files[0]);
    }
}
//Image Show Before Upload End

</script>
@endsection
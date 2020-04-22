@extends('public.layouts.public-master')

@section('front_title','Donation Edit')


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
</style>



<section id="inner-headline">
    <div class="container">
        <div class="row">
        <div class="span8">
            <div class="inner-heading">
            <h2><strong>Edit</strong> Donation Info</h2>
            </div>
        </div>
        <div class="span4">
            <ul class="breadcrumb">
            <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
            <li><a href="#">Donation</a><i class="icon-angle-right"></i></li>
            <li class="active">Donation Edit</li>
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
                    <h2>Donation Edit Form</h2>

                    {{-- Session Success Message --}}
                    @if (session()->has('message'))  
                        <h6 style="color:green"><strong>Congratulation !!</strong> {{ session('message') }}</h6>
                    @endif
                    
                    <form action="{{route('donation-update',$donation->id)}}" method="POST">
                        @csrf
                        
                        <label for="fname">Item Name</label> <br>
                        <input type="text" id="fname" name="item_name" value="{{$donation->item_name}}" required> <br>
                        @error('item_name')
                            <span style="color:red">{{ $message }}</span><br>
                        @enderror
                        {{-- @error('description') is-invalid @enderror --}}


                        <label for="lname">Item Details</label> <br>
                        <textarea name="description" rows="5">{{$donation->description}}</textarea required><br>
                        @error('description')
                            <span style="color:red">{{ $message }}</span><br>
                        @enderror

                        <input type="submit" value="Update"><br><br>
                    </form>
                </div>

                <hr>

                <!-- ========================== Images Show In Table =================== -->

                <h2>The Photos of Item</h2>

                <table id="customers">
                    <tr>
                        <th>#SL</th>
                        <th>IMAGES</th>
                        <th>ACTION</th>
                    </tr>
                    @foreach ($donation_images as $key => $item)
                        <tr>
                            <td style="text-align:center">{{$key+1}}</td>
                            <td style="text-align:center">
                                <img src="{{asset('public/images/donation/'.$item->photo)}}" alt="" srcset="" height="50%" width="50%">
                            </td>
                            <td style="text-align:center">
                                <a href="{{route('donation-image-delete',$item->id)}}" title="Delete" onclick="return confirm('Are You Sure to delete ?')" class="btn btn-danger">Delete</a>
                                                                    <!-- $item->id means = DonationImage's id -->
                            </td>
                        </tr>
                    @endforeach
                </table> <br><br>
                
                <div id="image">
                    <form action="{{route('donation-image-save',$donation->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf           <!-- New Image save into DonationImage  where donation_id = Donation's id -->

                        <label for="lname">Add More Image</label> <span>[ Single or Multiple Image ]</span>
                        <input type="file" multiple name="donation_image[]" id="" required> 
                        @error('donation_image')
                            <span style="color:red">{{ $message }}</span>
                        @enderror 

                        <input type="submit" value="A D D"><br><br>

                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>

@endsection
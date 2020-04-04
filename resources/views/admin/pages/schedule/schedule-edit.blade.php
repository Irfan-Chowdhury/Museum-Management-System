@extends('admin.layouts.admin-master')

@section('title','Schedule Edit')
    
@section('admin-content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Schedule</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Schedule</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content -->
  


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                     <!-- general form elements -->
                    <div class="card card-info">
                        <div>
                            @include('admin.includes.session_message')  <!--Success Message-->
                        </div>
                        <div class="card-header">
                            <h4 class="text-center">Edit Schedule</h4>
                        </div>
                        <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('schedule-update',$specific_schedule->id)}}">
                                @csrf
                                <div class="card-body">
                                    {{-- <div class="form-group"> --}}

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Day</label>
                                            <div class="col-sm-9">
                                                <select name="day" class="form-control">
                                                    <option value=""> -- Select Day --</option>
                                                    @foreach ($all_days as $item)
                                                        <option value="{{$item->day}}" {{ $item->day == $specific_schedule->day ? 'selected="selected"' : '' }}>{{$item->day}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Starting Time</label>
                                            <div class="col-sm-9">
                                              <input type="time" name="starting_time" class="form-control" value="{{$specific_schedule->starting_time}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Ending Time</label>
                                            <div class="col-sm-9">
                                              <input type="time" name="ending_time" class="form-control" value="{{$specific_schedule->ending_time}}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Half Day</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-check">
                                                                <input name="half_day" class="form-check-input" type="radio" value="Half-Day" {{($specific_schedule->half_day=="Half-Day")? "checked" : ""}}>Yes
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-check">
                                                                <input name="half_day" class="form-check-input" type="radio" value="" {{($specific_schedule->half_day==NULL)? "checked" : ""}}>No
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Holiday</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-check">
                                                                <input name="holiday" class="form-check-input" type="radio" value="Holiday" {{($specific_schedule->holiday=="Holiday")? "checked" : ""}}>Yes
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-check">
                                                                <input name="holiday" class="form-check-input" type="radio" value="" {{($specific_schedule->holiday==NULL)? "checked" : ""}}>No
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                <button type="submit" class="btn btn-block btn-outline-info btn-lg">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
@endsection
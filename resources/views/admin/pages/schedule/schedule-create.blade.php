@extends('admin.layouts.admin-master')

@section('title','Schedule Create')
    
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
                <li class="breadcrumb-item active">Create</li>
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
                            <h4 class="text-center">Add New Schedule</h4>
                        </div>

                        @if (count($schedule)==7)
                            <h1 class="text-danger">7 days already have been taken</h1>
                        @else
                            
                        <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{route('schedule-save')}}">
                                @csrf
                                <div class="card-body">
                                    {{-- <div class="form-group"> --}}

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Day</label>
                                            <div class="col-sm-9">
                                                <select name="day" class="form-control @error('day') is-invalid @enderror">
                                                    <option value=""> -- Select Day --</option>
                                                    <option value="Saturday">Saturday</option>
                                                    <option value="Sunday">Sunday</option>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                </select>
                                            </div>
                                            @error('day')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Starting Time</label>
                                            <div class="col-sm-9">
                                              <input type="time" name="starting_time" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Ending Time</label>
                                            <div class="col-sm-9">
                                              <input type="time" name="ending_time" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-3 col-form-label">Half Day</label>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-check">
                                                                <input name="half_day" class="form-check-input" type="radio" value="Half-Day">Yes
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-check">
                                                                <input name="half_day" class="form-check-input" type="radio" value="" checked>No
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
                                                                <input name="holiday" class="form-check-input" type="radio" value="Holiday">Yes
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-check">
                                                                <input name="holiday" class="form-check-input" type="radio" value="" checked>No
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                <button type="submit" class="btn btn-block btn-outline-info btn-lg">Submit</button>
                                </div>
                            </form>
                        
                        
                        @endif
                            
                        </div>
                        <!-- /.card -->
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
@endsection
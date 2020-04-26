@extends('admin.layouts.admin-master')

@section('title','Home')
    
@section('admin-content')
<style>
  #overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color:white;
    z-index: 2;
    cursor: pointer;
  }
  </style>


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
  

  
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">

      <section class="col-lg-7 connectedSortable">
          <div class="row">

            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{count($items)}}</h3>
                  <p>Total Items</p>
                </div>
                <div class="icon">
                  <i class="fas fa-store"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{count($users)}}</h3>
                  <p>Total Registered Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                  {{-- <i class="fas fa-file-pdf"></i> --}}
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{count($visitors)}}</h3>
                  <p>Total Registered Visitors</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{count($donations)}}</sup></h3>
                  <p>New Donation Request</p>
                </div>
                <div class="icon">
                  <i class="fas fa-hand-holding-usd"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-6">
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3>{{count($user_messages)}}</h3>
                  <p>New Messages (User)</p>
                </div>
                <div class="icon">
                  <i class="far fa-envelope"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            
            <div class="col-lg-4 col-6">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{count($visitor_messages)}}</h3>
                  <p>New Messages (General)</p>
                </div>
                <div class="icon">
                  <i class="far fa-envelope"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

          </div>
          <!-- /.row -->

      </section>


      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-5 connectedSortable">
        <!-- Calendar -->
        <div class="card bg-gradient-success">
            <div class="card-header border-0">
              <h3 class="card-title"><i class="far fa-calendar-alt"></i>Calendar</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                  </button>
                </div>
            </div>
            <div class="card-body pt-0">
                <div id="calendar" style="width: 100%"></div>
            </div>
          </div>
          <!-- /.card -->

          <div id="overlay">
              <div style="color:#F4F6F9">
                  <div class="row">
                      <div class="col-4 text-center">
                        <div id="sparkline-1"></div>
                      </div>
                      <div class="col-4 text-center">
                        <div id="sparkline-2"></div>
                      </div>
                      <div class="col-4 text-center">
                        <div id="sparkline-3"></div>
                      </div>
                  </div>
              </div>
          </div>
            
      </section>
    </div>

  </div>
</section>
  
  

@endsection
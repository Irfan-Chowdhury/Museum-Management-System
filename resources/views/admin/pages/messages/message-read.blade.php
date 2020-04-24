@extends('admin.layouts.admin-master')

@section('title','User Messages')
    
@section('admin-content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Inbox</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inbox</a></li>
            <li class="breadcrumb-item active">Read</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>



<section class="content">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Read Message</h3>

            <div class="card-tools">
              <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
              <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="mailbox-read-info">
              <h4>{{$messageInfo->subject}}</h4> <br>
              <h6> <strong> @if($messageInfo->user_id) {{$messageInfo->user->name}} @else {{$messageInfo->name}} @endif</strong> @if($messageInfo->user_id) < {{$messageInfo->user->email}} @else {{$messageInfo->email}} @endif >
                <span class="mailbox-read-time float-right">{{date('d M, Y | h:i A', strtotime($messageInfo->created_at))}}</span></h6>
            </div>
            <div class="mailbox-read-message">

              <p>{{$messageInfo->message}}</p>

            </div>
            <!-- /.mailbox-read-message -->
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->



@endsection
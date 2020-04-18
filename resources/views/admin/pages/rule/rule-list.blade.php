@extends('admin.layouts.admin-master')

@section('title','Rule List')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
       
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">Rule List</h2>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        @include('admin.includes.session_message') <!--Session Message-->
                    </div>
                    <div class="col-md-3"></div>
                </div>
                {{-- <div>
                    @include('admin.includes.session_message')
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tableId" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center table-primary">
                                <th>SL</th>
                                <th>Rule Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($rules as $key => $rule)                                    
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{Str::limit($rule->title,20,' ...')}}</td> <!--String Limit type-1 [can't convert html to string]-->
                                        <td>{{Str::limit($rule->description,35,' ...')}}</td> 
                                        {{-- <td>{{substr(strip_tags($rule->description), 0, 35)}} ...</td> <!--String Limit type-2 [it can convert html to string]--> --}}
                                        <td>{{$rule->status}}</td>
                                        <td>
                                            @if ($rule->status == 'published')
                                                <a href="{{route('rule-unpublished',$rule->id)}}" class="btn btn-warning fa fa-arrow-alt-circle-down" title="Unpublish"></a>
                                            @else
                                                <a href="{{route('rule-published',$rule->id)}}" class="btn btn-success fa fa fa-arrow-alt-circle-up" title="Published"></a>
                                            @endif
                                            <a href="{{route('rule-edit',$rule->id)}}" class="m-1 btn btn-info fa fa-edit" title="Edit"></a>
                                            <a href="{{route('rule-delete',$rule->id)}}" onclick="return confirm('Are You Sure to delete ?')" class="btn btn-danger fa fa-trash-alt" title="Delete"></a>
                                        </td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>
    </div>
</section>

{{-- <i class="fas fa-arrow-circle-up"></i> --}}
@endsection



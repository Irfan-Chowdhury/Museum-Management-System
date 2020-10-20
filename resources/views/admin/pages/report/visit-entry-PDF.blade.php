<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table, th, td {
          border: 1px solid black;
        }
        th{
            text-align: center
        }
    </style>
  </head>
  <body>

    <section>
        <div class="container">
            <h4 class="text-secondary">View visit entry of visitors between dates</h4> <br>

            <div class="form-group row">
                <label class="col"> <b>From Date :</b> <span style="margin-left:10px;">{{date('d/m/Y', strtotime($from))}} </span></label>
            </div>
            <div class="form-group row">
                <label class="col"> <b>To Date :</b> <span style="margin-left:30px;">{{date('d/m/Y', strtotime($to))}} </span> </label>  
            </div>
        </div>
    </section>

    <section>
        <table>
            <thead>
                <tr>
                    <th>SL</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Quantity</th>
                    <th>Operator</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($visit_entries as $key => $item)                                    
                        <tr>
                            <td style="text-align:center">{{$key+1}}</td>
                                                        
                            <!-- Identity No -->
                            <td>
                                @if ($item->visitor_id!=NULL)
                                    {{$item->visitor->visitor_id_no}}  <!-- Visitor Id No -->

                                @elseif($item->user_id!=NULL)    
                                    {{$item->user->user_id_no}}     <!-- User Id No -->
                                @endif
                            </td>

                            <!-- Name -->
                            <td>
                                @if ($item->visitor_id!=NULL)
                                    {{$item->visitor->visitor_name}} <!-- Visitor Name  -->

                                @elseif($item->user_id!=NULL)    
                                    {{$item->user->name}}    <!-- User Name -->
                                @endif
                            </td>

                            <!-- Phone -->
                            <td>
                                @if ($item->visitor_id!=NULL)
                                    {{$item->visitor->visitor_phone}}   <!-- Visitor Phone -->

                                @elseif($item->user_id!=NULL)    
                                    {{$item->user->phone}}       <!-- User Phone -->
                                @endif
                            </td>
                            
                            <!-- Address -->
                            <td>
                                @if ($item->visitor_id!=NULL)
                                    {{$item->visitor->visitor_address}} <!-- Visitor Address  -->

                                @elseif($item->user_id!=NULL)    
                                    {{$item->user->address}}    <!-- User Address -->
                                @endif
                            </td>
                
                            <td style="text-align:center">{{$item->quantity}}</td> 
                            <td style="text-align:center">{{$item->entry_operator}}</td> <!--update-2-->
                            <td>{{date('d-m-y', strtotime($item->created_at))}}</td> <!-- 07-04-2020 -->                                        
                            <td>{{date('H:i',strtotime($item->created_at))}}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html> 






















{{-- <!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        table, th, td {
          border: 1px solid black;
        }
    </style>
    <!-- Bootstrap CSS -->
  </head>
  <body>
        <table>
            <thead>
                <tr>
                    <th>SL</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Quantity</th>
                    <th>Total Tk</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($visit_entries as $key => $item)                                    
                        <tr>
                            <td style="text-align:center">{{$key+1}}</td>
                                                        
                            <!-- Identity No -->
                            <td>
                                @if ($item->visitor_id!=NULL)
                                    {{$item->visitor->visitor_id_no}}  <!-- Visitor Id No -->

                                @elseif($item->user_id!=NULL)    
                                    {{$item->user->user_id_no}}     <!-- User Id No -->
                                @endif
                            </td>

                            <!-- Name -->
                            <td>
                                @if ($item->visitor_id!=NULL)
                                    {{$item->visitor->visitor_name}} <!-- Visitor Name  -->

                                @elseif($item->user_id!=NULL)    
                                    {{$item->user->name}}    <!-- User Name -->
                                @endif
                            </td>

                            <!-- Email -->
                            <td>
                                @if ($item->visitor_id!=NULL)
                                    @if($item->visitor->email)
                                        {{$item->visitor->email}} <!-- Visitor Email  -->
                                    @else 
                                        <span>NULL</span>
                                    @endif

                                @elseif($item->user_id!=NULL)    
                                    {{$item->user->email}}    <!-- User Email -->
                                @endif
                            </td>

                            <!-- Phone -->
                            <td>
                                @if ($item->visitor_id!=NULL)
                                    {{$item->visitor->visitor_phone}}   <!-- Visitor Phone -->

                                @elseif($item->user_id!=NULL)    
                                    {{$item->user->phone}}       <!-- User Phone -->
                                @endif
                            </td>
                            
                            <!-- Address -->
                            <td>
                                @if ($item->visitor_id!=NULL)
                                    {{$item->visitor->visitor_address}} <!-- Visitor Address  -->

                                @elseif($item->user_id!=NULL)    
                                    {{$item->user->address}}    <!-- User Address -->
                                @endif
                            </td>
                
                            <td style="text-align:center">{{$item->quantity}}</td> 
                            <td style="text-align:center">{{$item->total_taka}}</td> 
                            <td>{{date('d-m-y', strtotime($item->created_at))}}</td> <!-- 07-04-2020 -->                                        
                            <td>{{date('H:i',strtotime($item->created_at))}}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
  </body>
</html> --}}
@extends('admin.layouts.admin-master')

@section('title','Chart Visit Entry')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">Chart of Visit in Museum (Year- {{$Year}})</h2>
                </div>

                <div class="card-body">
                    <!-- Bar Chart -->
                    <div id="top_x_div" style="width: 800px; height: 600px;"></div>
                </div>

            </div>
        </div>
    </div>
</section>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
      var data = new google.visualization.arrayToDataTable([
        ['Move', 'Percentage'],
        ["January", {{count($data[1])}}], //In January 5 people visit 
        ["February", {{count($data[2])}}], //In February 5 people visit
        ["March", {{count($data[3])}}],  //In March 4 people visit
        ["April", {{count($data[4])}}], //In April 9 people visit
        ['May', 23], //Update Later From Here to $data[12]
        ['June', 32],
        ['July', 54],
        ['August', 45],
        ['Septembar', 20],
        ['Octobar', 34],
        ['Novembar', 50],
        ['December', 25],
      ]);

      var options = {
        width: 900,
        legend: { position: 'none' },
        chart: {
          title: 'Bar Chart',
          subtitle: '' },
        axes: {
          x: {
            0: { side: 'top', label: 'White to move'} // Top x-axis.
          }
        },
        bar: { groupWidth: "90%" }
      };

      var chart = new google.charts.Bar(document.getElementById('top_x_div'));
      // Convert the Classic options to Material options.
      chart.draw(data, google.charts.Bar.convertOptions(options));
    };
</script>


@endsection
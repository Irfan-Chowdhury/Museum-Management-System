@extends('admin.layouts.admin-master')

@section('title','Chart Visit Entry')
    
@section('admin-content')


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h2 class="text-secondary">Chart of Visiting in Museum</h2>
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
        ["January", {{count($data[1])}}],
        ["February", {{count($data[2])}}],
        ["March", {{count($data[3])}}],
        ["April", {{count($data[4])}}],
        ['May', 23], //Update Later From Here to $data[12]
        ['June', 42],
        ['July', 14],
        ['August', 43],
        ['Septembar', 6],
        ['Octobar', 30],
        ['Novembar', 20],
        ['Decembar', 6],
      ]);

      var options = {
        width: 800,
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
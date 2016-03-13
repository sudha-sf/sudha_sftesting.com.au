<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Gender Breakdown</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-8">
        <div class="chart-responsive">
          <canvas id="pieChartGender" height="240" width="385" style="width: 257px; height: 160px;"></canvas>
        </div>
        <!-- ./chart-responsive -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <ul class="chart-legend clearfix">
          <li><i class="fa fa-circle-o text-red"></i> Women</li>
          <li><i class="fa fa-circle-o text-green"></i> Men</li>
        </ul>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
  <!-- /.footer -->
</div>


<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Age Group Breakdown</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-8">
        <div class="chart-responsive">
          <canvas id="pieChartAge" height="240" width="385" style="width: 257px; height: 160px;"></canvas>
        </div>
        <!-- ./chart-responsive -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <ul class="chart-legend clearfix">
          <li><i class="fa fa-circle-o text-red"></i> 20-35</li>
          <li><i class="fa fa-circle-o text-green"></i> 35-50</li>
          <li><i class="fa fa-circle-o text-aqua"></i> 50+</li>
        </ul>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
  <!-- /.footer -->
</div>


<script>
 $(function () {
    //-------------
    //- PIE CHART -
    //-------------


        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };

    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvasGender = $("#pieChartGender").get(0).getContext("2d");
    var pieChartGender = new Chart(pieChartCanvasGender);

    var PieDataGender = [
      { value: 5, color: "#f56954", highlight: "#f56954", label: "Women" },
      { value: 3, color: "#00a65a", highlight: "#00a65a",   label: "Men" }
    ];

    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChartGender.Doughnut(PieDataGender, pieOptions);

    var pieChartCanvasAge = $("#pieChartAge").get(0).getContext("2d");
    var pieChartAge = new Chart(pieChartCanvasAge);
    var PieDataAge = [
      { value: 2, color: "#f56954", highlight: "#f56954", label: "20-35" },
      { value: 3, color: "#00a65a", highlight: "#00a65a",   label: "35-50" },
      { value: 3, color: "#00c0ef", highlight: "#00c0ef",   label: "50+" },
    ];
    pieChartAge.Doughnut(PieDataAge, pieOptions);
  });
</script>

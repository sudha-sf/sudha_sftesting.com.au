<div class="col-md-9">
  <div class="box box-primary">
    <div class="box-body no-padding">
      <!-- THE CALENDAR -->
      <div id="calendar"></div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /. box -->
</div>
  <link rel="stylesheet" href="https://almsaeedstudio.com/themes/AdminLTE/plugins/fullcalendar/fullcalendar.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/fullcalendar/fullcalendar.min.js"></script>
<script>
$(function () {
  var date = new Date();
  var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();
  $('#calendar').fullCalendar({
    header: {      left: 'prev,next today',      center: 'title',      right: 'month,agendaWeek'    },
    buttonText: {      today: 'today',      month: 'month',       week: 'week',       day: 'day'    },
    //Random default events
    events: [

      <?php
      $events = "";
      $counter = 0;
      foreach($projectsList as $project){
        $statusColor = $colours[$counter];
        $url = "/projects/".$project['code'];
        $counter++;
        if($project->assets != null){
          foreach($project->assets as $asset){


            $events .="{ title: '". $asset['name']. "',
               url: '$url',
               start: new Date( ".date('Y', strtotime($asset['uploadDate'])).", ".date('m', strtotime($asset['uploadDate'])).", ".date('d', strtotime($asset['uploadDate']))."),
               backgroundColor: '". $statusColor."',
               borderColor: '". $statusColor."'},";
          }
        }
      }
      echo $events;
      ?>

    ],
    editable: false,
    droppable: false, // this allows things to be dropped onto the calendar !!!
  });
});
</script>

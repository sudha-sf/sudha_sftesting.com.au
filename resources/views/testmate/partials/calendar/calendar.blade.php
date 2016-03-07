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
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek'
    },
    buttonText: {
      today: 'today',
      month: 'month',
      week: 'week',
      day: 'day'
    },
    //Random default events
    events: [
      {
        title: 'All Day Event',
        start: new Date(y, m, 1),
        backgroundColor: "#f56954", //red
        borderColor: "#f56954" //red
      },
      {
        title: 'Long Event',
        start: new Date(y, m, d - 5),
        end: new Date(y, m, d - 2),
        backgroundColor: "#f39c12", //yellow
        borderColor: "#f39c12" //yellow
      },
      {
        title: 'Meeting',
        start: new Date(y, m, d, 10, 30),
        allDay: false,
        backgroundColor: "#0073b7", //Blue
        borderColor: "#0073b7" //Blue
      },
      {
        title: 'Lunch',
        start: new Date(y, m, d, 12, 0),
        end: new Date(y, m, d, 14, 0),
        allDay: false,
        backgroundColor: "#00c0ef", //Info (aqua)
        borderColor: "#00c0ef" //Info (aqua)
      },
      {
        title: 'Birthday Party',
        start: new Date(y, m, d + 1, 19, 0),
        end: new Date(y, m, d + 1, 22, 30),
        allDay: false,
        backgroundColor: "#00a65a", //Success (green)
        borderColor: "#00a65a" //Success (green)
      },
      {
        title: 'Click for Google',
        start: new Date(y, m, 28),
        end: new Date(y, m, 29),
        url: 'http://google.com/',
        backgroundColor: "#3c8dbc", //Primary (light-blue)
        borderColor: "#3c8dbc" //Primary (light-blue)
      }
    ],
    editable: false,
    droppable: false, // this allows things to be dropped onto the calendar !!!
  });
});
</script>

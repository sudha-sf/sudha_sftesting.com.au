<?php
$counter = 0;
?>

<div class="box box-solid">
  <div class="box-header with-border">
    <h4 class="box-title">Projects</h4>
  </div>
  <div class="box-body">
    <!-- the events -->
    <div id="external-events">

        @foreach($projectsList as $project)
          <?php
          $statusColor = $colours[$counter];
          $counter++;
          ?>
          <div class="external-event bg-{{$statusColor}} " style="position: relative;">{{ $project['code'] }} - {{ $project['name'] }}</div>
        @endforeach
    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /. box -->

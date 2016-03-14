<div class='row'>
  <div class="col-md-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$project->testersAmount}}</h3>

        <p>Users Tests</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{date("d/m/Y", strtotime($project->lastUpdateDate))}}</h3>

        <p>Last Update</p>
      </div>
      <div class="icon">
        <i class="ion ion-calendar"></i>
      </div>
    </div>
  </div>
</div>

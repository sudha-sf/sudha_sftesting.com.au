<div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Latest Projects</h3>

    </div>
    <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
          <table class="table no-margin">
            <thead>
            <tr>
              <th>Project</th>
              <th>Last Update</th>
              <th>Status</th>
              <th>Testers Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projectsList as $project)
              <tr id="{{ $project['code'] }}" class="project-row">
                <td><a href="/projects/{{ $project['code'] }}">{{ $project['code'] }}</a></td>
                <td>{{ $project['lastUpdateDate'] }}</td>
                @if($project['status'] == 'COMPLETED')
                  <?php $statusColor = 'label label-info' ?>
                  @elseif($project['status'] == 'IN PROGRESS')
                  <?php $statusColor = 'label label-success' ?>
                  @elseif($project['status'] == 'APPROVAL PENDING')
                  <?php $statusColor = 'label label-warning' ?>
                  @elseif($project['status'] == 'DELAYED')
                  <?php $statusColor = 'label label-danger' ?>
                  @else
                  <?php $statusColor = 'label label-info' ?>
                  @endif
                <td><span class="{{$statusColor}}">{{ $project['status'] }}</span></td>
                <td>{{ $project['testersAmount'] }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.box-body -->
            </div>

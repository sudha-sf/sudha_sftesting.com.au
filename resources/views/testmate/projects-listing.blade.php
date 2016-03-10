@extends('shared.main-template')

@section('content')
<div class="col-xs-12">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="projects-table">
          <tbody><tr>
            <th>Code</th>
            <th>Project</th>
            <th>Status</th>
            <th>Last Update</th>
            <th>Description</th>
          </tr>
          @foreach($projectsList as $project)
              <tr id="{{ $project['code'] }}" class="project-row">
                <td>{{ $project['code'] }}</td>
                <td>{{ $project['name'] }}</td>
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
                <td>{{ $project['lastUpdateDate'] }}</td>
                <td>{{ $project['description'] }}</td>
              </tr>
          @endforeach
          <!--
            <td><span class="label label-success">Approved</span></td>
            <td><span class="label label-warning">Pending</span></td>
            <td><span class="label label-primary">Approved</span></td>
            <td><span class="label label-danger">Denied</span></td>
          -->
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <script>
  $(document).ready(function() {
    $("#projects-table .project-row").on('click', function(event) {
        $(location).attr('href', 'projects/'+$(this).attr("id"));
    });
  });

  </script>

@endsection

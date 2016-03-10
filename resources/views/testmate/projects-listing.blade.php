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
                <td><span class="label label-success">{{ $project['status'] }}</span></td>
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

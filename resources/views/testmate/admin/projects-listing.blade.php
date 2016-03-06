@extends('shared.main-template')

@section('content')
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-header">
          <h3 class="box-title"><a href="/project-admin/create" class="btn btn-default">New Project</a></h3>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="projects-table">
          <tbody><tr>
            <th>Company</th>
            <th>Code</th>
            <th>Project</th>
            <th>Status</th>
            <th>Last Update</th>
            <th>Edit</th>
            <th>Edit Assets</th>
          </tr>

          @foreach($projectsList as $project)
              <tr class="project-row">
                <td>{{ $project['companyObject']['name'] }}</td>
                <td><a href="../projects/{{ $project['code'] }}">{{ $project['code'] }}</a></td>
                <td>{{ $project['name'] }}</td>
                <td><span class="label label-success">{{ $project['status'] }}</span></td>
                <td>{{ $project['lastUpdateDate'] }}</td>
                <td><a href="project/{{ $project['code'] }}">EDIT</a></td>
                <td><a href="assets/{{ $project['code'] }}">EDIT ASSETS</a></td>
              </tr>
          @endforeach
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
@endsection

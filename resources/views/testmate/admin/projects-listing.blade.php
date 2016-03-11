@extends('shared.main-template')

@section('content')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-header">
          <h3 class="box-title"><a href="javascript:;" class="btn btn-default create_project">New Project</a></h3>
        </div>
      </div>
      <!-- Create Form -->
      @include('testmate.partials.project-page.modal-project-form')
      <!-- /Create Fom-->
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="projects-table">
          <tbody><tr>
            <th>Company</th>
            <th>Code</th>
            <th>Project</th>
            <th>Status</th>
            <th>Last Update</th>
            <th>Testers Amount</th>
            <th>Edit</th>
            <th>Edit Assets</th>
          </tr>
          @foreach($projectsList as $project)
            <tr class="project-row">
              <td>{{ $project['companyObject']['name'] }}</td>
              <td><a href="../projects/{{ $project['code'] }}">{{ $project['code'] }}</a></td>
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
              <td>{{ $project['testersAmount'] }}</td>
              <td><a href="javascript:;" id="edit_project" onclick="return UpdateProject('{{$project['projectID']}}');">EDIT</a></td>
              <td><a href="{{ url('admin/assets/'.$project['code']) }}">EDIT ASSETS</a></td>
            </tr>
          @endforeach
          </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <script type="text/javascript" src="/testmate/js/project-page.js"></script>
@endsection

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
              <th>Testers</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projectsList as $project)
              <tr id="{{ $project['code'] }}" class="project-row">
                <td><a href="/projects/{{ $project['code'] }}">{{ $project['code'] }}</a></td>
                <td>{{ $project['lastUpdateDate'] }}</td>
                <td><span class="label label-success">{{ $project['status'] }}</span></td>
                <td>8</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.box-body -->
            </div>

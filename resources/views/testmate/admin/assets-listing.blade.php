@extends('shared.main-template')

@section('content')
<div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><a href="/admin/assets/{{ $project['code'] }}/create" class="btn btn-default">New Asset</a></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="assets-table">
          <tbody><tr>
            <th>Name</th>
            <th>Type</th>
            <th>Upload Update</th>
            <th>Status</th>
            <th>Url</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>

          @foreach($assetsList as $asset)
              <tr id="{{ $asset['id'] }}" class="asset-row">
                <td>{{ $asset['name'] }}</td>
                <td>{{ $asset['assetType'] }}</td>
                <td><?php if ($asset['uploadDate']) echo date('m/d/Y', strtotime($asset['uploadDate'])); ?></td>
                <td><span class="label label-success">{{ $asset['status'] }}</span></td>
                <td>{{ $asset['url'] }}</td>
                <td>{{ $asset['description'] }}</td>
                <td><a href="/admin/assets/{{ $project['code'] }}/{{ $asset['assetID'] }}/edit">edit</a></td>
                <td><a href="/admin/assets/{{ $project['code'] }}/{{ $asset['assetID'] }}/delete">delete</a></td>
              </tr>
          @endforeach
        </tbody></table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

@endsection

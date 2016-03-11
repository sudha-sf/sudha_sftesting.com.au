@extends('shared.main-template')

@section('content')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-header">
          <h3 class="box-title"><a href="javascript:;" class="btn btn-default create_user">New User</a></h3>
        </div>
      </div>
      <!-- Create Form -->

      <!-- /Create Fom-->
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="projects-table">
          <tbody><tr>
            <th>User Fullname</th>
            <th>Email</th>
            <th colspan="2">Action</th>
          </tr>
          @foreach($usersList as $user)
            <tr class="project-row">
              <td><a href="{{url('admin/users/'.$user->userID)}}">{{ $user->firstName }} {{ $user->lastName }}</a></td>
              <td>{{ $user->email }}</td>
              <td><a href="#">EDIT</a></td>
              <td><a href="#">Delete</a></td>
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

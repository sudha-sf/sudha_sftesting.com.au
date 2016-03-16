@extends('shared.main-template')

@section('content')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-header">
          <h3 class="box-title"><a href="{{url('admin/users/create/')}}" class="btn btn-default create_user">Create New
                  User</a></h3>
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
            <th>Company</th>
            <th colspan="2">Action</th>
          </tr>
          @foreach($usersList as $user)
            <tr class="project-row">
              <td><a href="{{url('admin/users/'.$user->userID)}}">{{ $user->firstName }} {{ $user->lastName }}</a></td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->company->name }}</td>
              <td><a href="{{url('admin/users/'.$user->userID.'/edit')}}">EDIT</a></td>
                @if($user->isCompanyAdmin !=1)
                    <td class=""><a href="{{url('admin/users/'.$user->userID.'/delete')}}" disabled>Delete</a></td>
                @endif
                @if($user->isCompanyAdmin == 1)
                    <td class="user-disable"><a href="#" disabled>Delete</a></td>
                @endif
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

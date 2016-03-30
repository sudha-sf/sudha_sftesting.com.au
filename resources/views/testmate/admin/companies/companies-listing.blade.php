@extends('shared.main-template')

@section('content')
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-header">
          <h3 class="box-title"><a href="{{url('admin/companies/create/')}}" class="btn btn-default create_company">New Company</a></h3>
        </div>
      </div>
      <!-- Create Form -->

      <!-- /Create Fom-->
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover" id="projects-table">
          <tbody><tr>
            <th>Company Name</th>
            <th>Company Logo</th>
            <th>Other</th>
            <th colspan="2">Action</th>
          </tr>
          @foreach($companies as $company)
            <tr class="project-row">
              <td><a href="{{url('admin/companies/'.$company->companyID)}}">{{ $company->name }}</a></td>
              <td><img class="image logo" src="/testmate/images/{{ $company->logo }}"></td>
              <td><a href="{{url('admin/companies/'.$company->companyID).'/users'}}">View Users</a></td>
              <td><a href="{{url('admin/companies/'.$company->companyID).'/edit'}}">EDIT</a></td>
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

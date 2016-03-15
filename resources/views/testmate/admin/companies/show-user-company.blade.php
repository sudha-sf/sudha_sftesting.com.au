@extends('shared.main-template')

@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header row">
                <div class="box-header col-md-6">
                    <h3 class="box-title">List User of <b>{{$company->name}}</b> Company</h3>
                </div>
                <div class="col-md-6">
                    <a href="/admin/companies" class="btn btn-primary  pull-right"> Back To List Company</a>
                </div>
            </div>
            <!-- Create Form -->

            <!-- /Create Fom-->
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover" id="projects-table">
                    <tbody><tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company Admin</th>
                        <th>Other</th>
                    </tr>
                    @foreach($users as $user)
                        <tr class="project-row">
                            <td><a href="#">{{ $user->firstName.' '.$user->lastName }}</a></td>
                            <td><a href="#">{{ $user->email }}</a></td>
                            <th>
                                <?php if($user->isCompanyAdmin){ ?>
                                    <button type="button" class="btn btn-success">Admin</button>
                                 <?php }else { ?>

                                <?php } ?>
                            </th>
                            <th>
                                <a href="#">View Detail</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection

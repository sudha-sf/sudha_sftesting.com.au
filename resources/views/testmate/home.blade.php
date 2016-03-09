@extends('shared.main-template')

@section('content')
    <div class="row">
      @include('testmate.partials.home.project-boxes')
    </div>

    <div class='row'>
        <div class='col-md-6'>
            @include('testmate.partials.home.latest-projects', array('projectsList' => $projectsList))
        </div><!-- /.col -->
        <div class='col-md-6'>
          @include('testmate.partials.home.latest-uploads', array('assetList'=>$assetList))
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
      <div class='col-lg-12'>
        @include('testmate.partials.home.testers-sus')
      </div>
    </div>
<script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/chartjs/Chart.min.js"></script>
<script type="text/javascript" src="/testmate/js/homepage.js"></script>


@endsection

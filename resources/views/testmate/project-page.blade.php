@extends('shared.main-template')

@section('content')
<div class='row'>
  <div class="col-md-6">
      @include('testmate.partials.project-page.project-status', array('project'=>$project))
      @include('testmate.partials.project-page.project-assets')
    </div>
    <div class="col-md-6">
      @include('testmate.partials.project-page.project-users', array('userTest'=>$userTest))
      @include('testmate.partials.project-page.timeline')
      @include('testmate.partials.project-page.piechart')
    </div>
</div>
<div class="col-md-6">

</div>
@include('testmate.partials.project-page.modal-box')


<iframe id="downloaderFrame" style="display:none;"></iframe>

<script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/chartjs/Chart.min.js"></script>
<script type="text/javascript" src="/testmate/js/project-page.js"></script>


@endsection

@extends('shared.main-template')

@section('content')

<?php  $colours = array("blue", "green", "orange", "lime", "purple",  "teal", "light-blue",  "green", "fuchsia", "muted", "navy", "yellow", "red"); ?>

<div class='row'>
  <div class="col-md-3">
      @include('testmate.partials.calendar.projects', array('colours'=>$colours))
    </div>
    <div class="col-md-9">

      @include('testmate.partials.calendar.calendar', array('colours'=>$colours))
    </div>
</div>


@endsection

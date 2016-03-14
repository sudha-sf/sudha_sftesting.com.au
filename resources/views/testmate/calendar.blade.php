@extends('shared.main-template')

@section('content')

<?php  $colours = array("blue", "green", "yellow", "red", "teal", "light-blue", "orange", "green", "lime", "purple", "fuchsia", "muted", "navy"); ?>

<div class='row'>
  <div class="col-md-3">
      @include('testmate.partials.calendar.projects', array('colours'=>$colours))
    </div>
    <div class="col-md-9">

      @include('testmate.partials.calendar.calendar', array('colours'=>$colours))
    </div>
</div>


@endsection

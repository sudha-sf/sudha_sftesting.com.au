@extends('shared.main-template')

@section('content')
<div class='row'>
  <div class="col-md-3">
      @include('testmate.partials.calendar.projects')
    </div>
    <div class="col-md-9">

      @include('testmate.partials.calendar.calendar')
    </div>
</div>


@endsection

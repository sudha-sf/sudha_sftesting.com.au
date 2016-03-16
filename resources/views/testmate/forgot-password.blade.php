@extends('shared.not-logged-template')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <img src="testmate/images/octopus.png">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Recover your password here</p>

    <form method="POST" action="">
       {!! csrf_field() !!}
      @if($message != null)
        <p class="error">{{$message}}</p>
      @endif
      <div class="form-group has-feedback">
        <input type="email" name="email" value="{{ old('email') }}"  class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary">Recover pasword</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection

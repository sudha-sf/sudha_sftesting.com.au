@extends('shared.not-logged-template')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <img src="testmate/images/octopus.png">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="POST" action="/auth/login">
       {!! csrf_field() !!}
      <div class="form-group has-feedback">
        <input type="email" name="email" value="{{ old('email') }}"  class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <div class="checkbox icheck"> Remember Me</div>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="row">
      <div class="col-xs-8">
        <strong><a href="{{url("/forgot-pasword")}}">I forgot my pasword</a></strong>
      </div>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection

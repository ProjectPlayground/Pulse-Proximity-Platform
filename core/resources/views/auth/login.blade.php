@extends('layouts.app')

@section('content')
<div class="wrapper-page">
  <div class="text-center"> <a href="{{ url('/') }}" class="logo logo-lg"><img src="{{ \Platform\Controllers\Core\Reseller::get()->logo_square }}" style="height: 128px; margin: 2rem" alt="{{ \Platform\Controllers\Core\Reseller::get()->name }}"></a> </div>
  <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
<?php
$email = (old('email') != '') ? old('email') : '';
$password = ''; 
if(config('app.demo'))
{
	if($email == '') $email = 'info@example.com';
	$password = 'welcome'; 

	echo '<div class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ' . trans('global.login_demo_mode') . '</div>';
}
?>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <div class="col-xs-12">
        <input id="email" type="email" class="form-control" name="email" value="{{ $email }}" placeholder="{{ trans('global.email') }}" required autofocus>
        <i class="material-icons form-control-feedback l-h-34">&#xE0BE;</i> @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <div class="col-md-12">
        <input id="password" type="password" class="form-control" name="password" value="{{ $password }}" placeholder="{{ trans('global.password') }}" required>
        <i class="material-icons form-control-feedback l-h-34">&#xE0DA;</i> @if ($errors->has('password')) <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif </div>
    </div>
    <div class="form-group">
      <div class="col-xs-12">
        <div class="checkbox checkbox-primary">
          <input name="remember" id="remember" type="checkbox" value="1">
          <label for="remember"> {{ trans('global.remember_me') }}</label>
        </div>
      </div>
    </div>
    <div class="form-group text-right m-t-20">
      <div class="col-xs-12">
        <button class="btn btn-primary btn-custom w-md waves-effect waves-light" type="submit">{{ trans('global.log_in') }}</button>
      </div>
    </div>
    <div class="form-group m-t-30">
      <div class="col-sm-7"> <a href="{{ url('/password/reset') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i> {{ trans('global.forgot_password') }}</a> </div>
<?php if (\Config::get('auth.allow_registration', true)) { ?>
      <div class="col-sm-5 text-right"> <a href="{{ url('/register') }}" class="text-muted">{{ trans('global.create_account') }}</a> </div>
<?php } ?>
    </div>
  </form>
</div>
@endsection 
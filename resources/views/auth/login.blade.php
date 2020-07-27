@extends('layouts.auth')

@section('page-title', __('page.log_in'))

@section('content')
 @validation

 {{ Form::open(['route' => 'login']) }}

 <div class="form-group mb-3">
  <label for="email">@lang('label.email_address')</label>

  <input type="email" id="email" class="form-control" name="email" placeholder="{{ __('placeholder.enter_your_email') }}" value="{{ old('email') }}">
 </div>

 <div class="form-group mb-3">
  <label for="password">@lang('label.password')</label>

  <div class="input-group input-group-merge">
   <input type="password" id="password" class="form-control" name="password" placeholder="{{ __('placeholder.enter_your_password') }}">

   <div class="input-group-append" data-password="false">
    <div class="input-group-text">
     <span class="password-eye"></span>
    </div>
   </div>
  </div>
 </div>

 <div class="form-group mb-3">
  <div class="custom-control custom-checkbox">
   <input type="checkbox" id="remember" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}>

   <label class="custom-control-label" for="remember">@lang('label.remember_me')</label>
  </div>
 </div>

 <div class="form-group mb-0 text-center">
  <button class="btn btn-primary btn-block" type="submit">@lang('common.login')</button>
 </div>

 {{ Form::close() }}
@endsection

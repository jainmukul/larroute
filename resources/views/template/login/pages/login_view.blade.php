@extends('template.login.layout.master')

@section('content')
<!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
      <div class="form-group has-feedback">
       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
       <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

        @if ($errors->has('email'))
           
            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
        @endif
      </div>
      </div>
       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <div class="form-group has-feedback">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            @if ($errors->has('password'))
                 <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
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
  
    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
    <a href="{{url('register')}}" class="text-center">Register a new membership</a>

  </div>
  @endsection
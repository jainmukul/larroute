@extends('template.login.layout.master')
@section('content')
<div class="register-box">
  

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

     <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <div class="">
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
      </div>
      </div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <div class="">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
          </div>
      </div>
       <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <div class="">
             <input id="password" type="password" class="form-control" name="password" placeholder="Password">
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
      </div>
      <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <div class="">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
              @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
               @endif
        </div>
      </div>
      
      <div class="row">
    
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div> -->

    <a href="{{url('admin_path')}}" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
@endsection

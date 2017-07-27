@extends('layouts.app')
@section('content')

<div id="login-container" class="valign-wrapper">
  <div class="container">
    <div class="row ">
      <div class="col s12 m6 push-m3 push-l4 l4">
        <div class="card-panel">
          <center>
          <img width="250px" src="{{url('/images/logo.png')}}" title="AMPUERO S.A.C.">
          </center>         

          <div class="divider"></div>

          <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

            <div class="section">
              <div class="input-field">
                <input id="login-user" type="text" class="validate" name="email" value="{{ old('email') }}" required autofocus>
                <label for="login-user">Usuario</label>
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>

              <div class="input-field">
                <input id="login-password" type="password" class="validate" name="password" required>
                <label for="login-password">Contraseña</label>
                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>

              <p>
                <input type="checkbox" id="login-remenber-me" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                <label for="login-remenber-me">recordarme</label>
              </p>

              <div class="form-group">
                 <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn waves-effect waves-light col s12">
                    Ingresar
                  </button>
                </div>
              </div>    
            </div>
          </form>
          <div class="copy-right right-align">
            <label>Developed by: <a href="" title="Toyz &#8482;">Jessica Moreno &#8482;</a></label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('title')
    Login
@endsection
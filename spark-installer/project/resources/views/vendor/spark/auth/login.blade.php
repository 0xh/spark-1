@extends('spark::layouts.app')

@section('content')
<div class="container com-box-se">
    <div class="row justify-content-center ">
        <div class="col-md-6 col-md-offset-3">
            <div class="card card-default">
                @include('spark::shared.errors')
                <div class="blue-box">
                    <form role="form" method="POST" action="/login">
                        {{ csrf_field() }}
                        <div class="com-tit">
                            <h2>{{__('Login')}}</h2>
                        </div>
                        <div class="form-group">                    
                            <label>{{__('E-Mail')}}</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                        </div>

                        <div class="form-group">                    
                            <label>{{__('Password')}}</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label class="cust-cbox">{{__('Remember Me')}}
                              <input type="checkbox" name="remember" class="form-check-input">
                              <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="lo-btn-bx">
                            <button type="submit" class="btn btn-primary">
                                {{__('Login')}}
                            </button>
                        </div>
                        <div class="for-link">
                            <a class="" href="{{ url('/password/reset') }}">{{__('Forgot Your Password?')}}</a>
                        </div>
                        <div class="new-user">
                            <a href="/register">New user</a>
                        </div>
                        <div class="lo-btn-bx">
                            <a href="/register">SIGN up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

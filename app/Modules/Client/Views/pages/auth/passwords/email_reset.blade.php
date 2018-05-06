@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Quên Mật Khẩu")

@section('content')
    @include("Client::layouts.banner")

    <section class="section user-template">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="login-wrapper">
                        <h3 class="title-login-page">{!! trans('auth.forgot_pass') !!}</h3>
                        @if($errors->error_reset->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->error_reset->all() as $error)
                                    <p>{!! $error !!}</p>
                                @endforeach
                            </div>
                        @endif
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                <p>{!! session('status') !!}</p>
                            </div>
                        @endif
                        {!! Form::open(['route'=> 'client.password.email.post', 'class' => 'login-form']) !!}
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                </div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="{!! trans('auth.input_email') !!}" autocomplete="off" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="submit" class="btn btn-primary" value="{!! trans('auth.send_pass') !!}">
                            </div>
                            <div class="col text-right">
                                <a href="{!! route('client.auth.login') !!}" class="forget_password">{!! trans('auth.login') !!}</a>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="line-break d-flex justify-content-center"></div>
                </div>
                <div class="col-md-4">
                    <div class="register-wrapper" data-aos="slide-left">
                        <h3>{!! trans('auth.your_info') !!}</h3>
                        @if($errors->register_error->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->register_error->all() as $error)
                                    <p>{!! $error !!}</p>
                                @endforeach
                            </div>
                        @endif
                        {!! Form::open(['route'=>'client.auth.register.post', 'class' => 'form-register']) !!}
                        <div class="form-group">
                            <label for="fullname">{!! trans('auth.fullname') !!}</label>
                            {!! Form::text('fullname', old('fullname'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            {!! Form::text('email', old('email'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="phone">{!! trans('auth.phone') !!}</label>
                            {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="username">{!! trans('auth.username') !!}</label>
                            {!! Form::text('username', old('username'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="password">{!! trans('auth.password') !!}</label>
                            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">{!! trans('auth.confirm_password') !!}</label>
                            {!! Form::password('password_confirmation',  ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-user-template btn-submit">{!! trans('auth.register') !!}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section("script")

@stop
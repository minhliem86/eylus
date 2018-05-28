@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Đăng Nhập")

@section('content')
    @include("Client::layouts.banner")

    <section class="section user-template">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="login-wrapper" data-aos="slide-right">
                        <h3>{!! trans('auth.your_acc') !!}</h3>
                        @if($errors->login->first('error_login'))
                        <div class="alert alert-danger" role="alert">
                            <p>{!! $errors->login->first('error_login') !!}</p>
                        </div>
                        @endif
                        {!! Form::open(['route'=>'client.auth.login', 'class' => 'form-login']) !!}
                            <div class="form-group">
                                <label for="login">Username/Email</label>
                                {!! Form::text('usernameOrEmail', old('usernameOrEmail'), ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label for="password">{!! trans('auth.password') !!}</label>
                                {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn-user-template btn-submit">{!! trans('auth.login') !!}</button>
                        </div>
                        {!! Form::close() !!}

                        <div class="forget-wrapper">
                            <a href="{!! route('client.password.reset.getForm') !!}">{!! trans('auth.forgot_pass') !!}</a>
                        </div>
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
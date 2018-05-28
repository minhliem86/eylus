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
                        <h3 class="title-login-page">{!! trans('auth.fill_info') !!}</h3>
                        @if($errors->error_reset->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->error_reset->all() as $error)
                                    <p>{!! $error !!}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="reset-wrapper">
                            {!! Form::open(['route' => 'client.passwords.resetPost', 'class' =>'form']) !!}
                                {!! Form::hidden('token',$token) !!}

                                <div class="form-group">
                                    <label for="email" class="control-label">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control {!! $errors->has('email') ? 'is-invalid' : null !!}" name="email" value="{!! $email or old('email') !!}">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{!! $errors->first('email') !!}</strong>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label">New Password</label>
                                    <input id="password" type="password" class="form-control {!! $errors->has('password') ? 'is-invalid' : null !!}" name="password" required>

                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{!! $errors->first('password') !!}</strong>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="control-label">Confirmation New Password</label>
                                    <input id="password-confirm" type="password" class="form-control {!! $errors->has('password_confirmation') ? 'is-invalid' : null !!}" name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            <strong>{!! $errors->first('password_confirmation') !!}</strong>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-refresh"></i> {!! trans('auth.send_pass') !!}
                                    </button>
                                </div>
                            {!! Form::close() !!}

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
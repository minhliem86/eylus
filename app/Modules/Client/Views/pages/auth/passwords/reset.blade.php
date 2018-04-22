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
                        <h3 class="title-login-page">Vui lòng điền đầy đủ thông tin </h3>
                        @if($errors->error_forget->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->error_forget->all() as $error)
                                    <p>{!! $error !!}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="reset-wrapper">
                            {!! Form::open(['url'=>'/password/reset']) !!}
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
                                    <label for="password" class="control-label">Password</label>
                                    <input id="password" type="password" class="form-control {!! $errors->has('password') ? 'is-invalid' : null !!}" name="password">

                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{!! $errors->first('password') !!}</strong>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="control-label">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control {!! $errors->has('password_confirmation') ? 'is-invalid' : null !!}" name="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback">
                                            <strong>{!! $errors->first('password_confirmation') !!}</strong>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-refresh"></i> Reset Password
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
                    <div class="register-wrapper">
                        <h3>Vui lòng điền đầy đủ thông tin </h3>
                        @if($errors->register_error->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->register_error->all() as $error)
                                    <p>{!! $error !!}</p>
                                @endforeach
                            </div>
                        @endif
                        {!! Form::open(['route'=>'client.auth.register.post', 'class' => 'form-register']) !!}
                        <div class="form-group">
                            <label for="fullname">Họ và Tên khách hàng</label>
                            {!! Form::text('fullname', old('fullname'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            {!! Form::text('email', old('email'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="username">Tên đăng nhập</label>
                            {!! Form::text('username', old('username'), ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Nhập lại mật khẩu</label>
                            {!! Form::password('password_confirmation',  ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-user-template btn-submit">Đăng ký</button>
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
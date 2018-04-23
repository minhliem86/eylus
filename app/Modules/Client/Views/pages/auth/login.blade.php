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
                    <div class="login-wrapper">
                        <h3>Tài khoản của bạn</h3>
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
                                <label for="password">Mật khẩu</label>
                                {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn-user-template btn-submit">Đăng Nhập</button>
                        </div>
                        {!! Form::close() !!}

                        <div class="forget-wrapper">
                            <a href="{!! route('client.password.reset.getForm') !!}">Bạn không nhớ mật khẩu ?</a>
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
@extends("Client::layouts.main")

@section("meta")

@stop

@section("title","Tin Tức")

@section('content')
    @include("Client::layouts.banner")

    <section class="section contact">
        <div class="container ">
            <div class="row">
                <div class="col-md-6">
                    <div class="map-wrapper">
                        <div id="input-director">
                            <div class="input-group">
                                <input type="text" name="from_gmap" class="form-control">                               <div class="input-group-append">
                                    <button type="button" class="btn btn-director">Tìm Đường</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info">
                    </div>
                    <div class="form-contact-wrapper">
                        {!! Form::open(['route'=>'client.contact.post']) !!}
                        <div class="form-group">
                            <label for="fullname">Họ và tên</label>
                            {!! Form::text('fullname', old('fullname'), ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại</label>
                            {!! Form::text('phone', old('phone'), ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            {!! Form::text('email', old('email'), ['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="email">Nội dung</label>
                            {!! Form::textarea('messages', old('message'), ['class'=>'form-control', 'rows'=>10]) !!}
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Gửi</button>
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
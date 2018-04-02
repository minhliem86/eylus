@extends('Admin::layouts.default')

@section('title','Subscribe')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="wrap-title justify-content-center">
                            <strong>SUBSCRIBE</strong>
                        </div>
                        <div class="wrap-center">
                            <a href="{!! route('admin.subscribe.download') !!}" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Tải về</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>
                        @if(!$email->isEmpty())
                        <tbody>
                            @foreach($email as $item)
                                <tr>
                                    <td>{!! $item->email !!}</td>
                                    <td>{!! \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                    <div class="paginator-container">
                        @include('Admin::paginator.right',['paginator' => $email])
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
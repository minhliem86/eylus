@extends('Admin::layouts.default')
@section('title','KHÁCH HÀNG')

@section('content')
    @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissable">
            <p>{{Session::get('error')}}</p>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="wrap-title">
                            <strong>KHÁCH HÀNG</strong>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-responsive-sm  table-striped table-sm"></table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('/public/assets/admin')}}/js/bootstrap.min.js"></script>
    <!-- DATA TABLE -->
    <link rel="stylesheet" href="{{asset('/public/assets/admin')}}/js/plugins/datatables/jquery.dataTables.min.css">
    <script src="{{asset('/public/assets/admin')}}/js/plugins/datatables/jquery.dataTables.min.js"></script>

    <!-- ALERTIFY -->
    <link rel="stylesheet" href="{{asset('/public/assets/admin')}}/js/plugins/alertify/alertify.css">
    <link rel="stylesheet" href="{{asset('/public/assets/admin')}}/js/plugins/alertify/bootstrap.min.css">
    <script type="text/javascript" src="{{asset('/public/assets/admin')}}/js/plugins/alertify/alertify.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>

    <script id="details-template" type="text/x-handlebars-template">
         @include("Admin::datatables.orderOfCustomer")
    </script>

    <script>
        $(document).ready(function(){
            hideAlert('.alert');
            // REMOVE ALL

            var template = Handlebars.compile($("#details-template").html());

            var table = $('table').DataTable({
                processing: true,
                serverSide: true,
                ajax:{
                    url:  '{!! route('admin.customer.index') !!}',
                    data: function(d){
                        d.name = $('input[type="search"]').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id', 'orderable': false, title: '#', visible: false},
                    {data: 'name', name: 'name', title: 'Tên Khách Hàng'},
                    {data: 'email', name: 'email', title: 'Email'},
                    {data: 'phone', name: 'phone',title: 'Điện thoại', 'orderable': false},
                    {data: 'created_at', name: 'created_at', title: 'Ngày tham gia'},
                    {
                        "className":      'details-control',
                        "orderable":      false,
                        "searchable":     false,
                        "data":           '',
                        'title':            'Đơn hàng',
                        "defaultContent": '<button class="btn btn-success btn-sm">show</button> '
                    },
                    {data: 'action', name: 'action', 'orderable': false}
                ],
                initComplete: function(){
                    var table_api = this.api();
                    var data = [];
                    var data_order = {};
                    $('#btn-remove-all').click( function () {
                        var rows = table_api.rows('.selected').data();
                        rows.each(function(index, e){
                            data.push(index.id);
                        })
                        alertify.confirm('You can not undo this action. Are you sure ?', function(e){
                            if(e){
                                $.ajax({
                                    'url':"{!!route('admin.customer.deleteAll')!!}",
                                    'data' : {arr: data},
                                    'type': "POST",
                                    'success':function(result){
                                        if(result.msg = 'ok'){
                                            table.rows('.selected').remove();
                                            table.draw();
                                            alertify.success('The data is removed!');
                                            location.reload();
                                        }
                                    }
                                });
                            }
                        })
                    })

                    $('#btn-updateOrder').click(function(){
                        var rows_order = table_api.rows().data();
                        var data_order = {};
                        $('input[name="order"]').each(function(index){
                            var id = $(this).data('id');
                            var va = $(this).val();
                            data_order[id] = va;
                        });
                        $.ajax({
                            url: '{{route("admin.customer.postAjaxUpdateOrder")}}',
                            type:'POST',
                            data: {data: data_order },
                            success: function(rs){
                                if(rs.code == 200){
                                    location.reload(true);
                                }
                            }
                        })
                    })
                    $('table.table').on('change','input[name=status]', function(){
                        var value = 0;
                        if($(this).is(':checked')){
                            value = 1;
                        }
                        const id_item = $(this).data('id');
                        console.log(id_item);
                        $.ajax({
                            url: "{{route('admin.customer.updateStatus')}}",
                            type : 'POST',
                            data: {value: value, id: id_item},
                            success: function(data){
                                if(!data.error){
                                    alertify.success('Status changed !');
                                }else{
                                    alertify.error('Fail changed !');
                                }
                            }
                        })
                    })
                }
            });

            $('table tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );
                var tableId = 'order-' + row.data().id;
                console.log(tableId);

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child(template(row.data())).show();
                    initTable(tableId, row.data());
                    tr.addClass('shown');
                    tr.next().find('td').addClass('no-padding bg-gray');
                }
            });
            /*SELECT ROW*/
            $('table tbody').on('click','tr',function(){
                $(this).toggleClass('selected');
            })
        });

        function initTable(tableId, data) {
            $('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                bFilter: false,
                lengthChange: false,
                ajax: data.order_url,
                columns: [
                    { data: 'id', name: 'id', title: '#', visible: false },
                    { data: 'name', name: 'name', title: 'Mã Đơn Hàng', orderable: false },
                    { data: 'total', name: 'total' , title: 'Thành Tiền', orderable: false },
                    { data: 'created_at', name: 'created_at' , title: 'Ngày mua hàng', orderable: false },
                    { data: 'action', name: 'action' }
                ]
            })
        }


        function confirm_remove(a){
            alertify.confirm('You can not undo this action. Are you sure ?', function(e){
                if(e){
                    a.parentElement.submit();
                }
            });
        }

        function hideAlert(a){
            setTimeout(function(){
                $(a).fadeOut();
            },2000)
        }
    </script>
@stop

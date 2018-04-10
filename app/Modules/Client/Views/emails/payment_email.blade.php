<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Internal_email-29</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style type="text/css">
        * {
            -ms-text-size-adjust:100%;
            -webkit-text-size-adjust:none;
            -webkit-text-resize:100%;
            text-resize:100%;
        }
        a{
            outline:none;
            color:#40aceb;
            text-decoration:underline;
        }
        a:hover{text-decoration:none !important;}
        .nav a:hover{text-decoration:underline !important;}
        .title a:hover{text-decoration:underline !important;}
        .title-2 a:hover{text-decoration:underline !important;}
        .btn:hover{opacity:0.8;}
        .btn a:hover{text-decoration:none !important;}
        .btn{
            -webkit-transition:all 0.3s ease;
            -moz-transition:all 0.3s ease;
            -ms-transition:all 0.3s ease;
            transition:all 0.3s ease;
        }
        table td {border-collapse: collapse !important;}
        .ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div{line-height:inherit;}
        @media only screen and (max-width:500px) {
            table[class="flexible"]{width:100% !important;}
            table[class="center"]{
                float:none !important;
                margin:0 auto !important;
            }
            *[class="hide"]{
                display:none !important;
                width:0 !important;
                height:0 !important;
                padding:0 !important;
                font-size:0 !important;
                line-height:0 !important;
            }
            td[class="img-flex"] img{
                width:100% !important;
                height:auto !important;
            }
            td[class="aligncenter"]{text-align:center !important;}
            th[class="flex"]{
                display:block !important;
                width:100% !important;
            }
            td[class="wrapper"]{padding:0 !important;}
            td[class="holder"]{padding:30px 15px 20px !important;}
            td[class="nav"]{
                padding:20px 0 0 !important;
                text-align:center !important;
            }
            td[class="h-auto"]{height:auto !important;}
            td[class="description"]{padding:30px 20px !important;}
            td[class="i-120"] img{
                width:120px !important;
                height:auto !important;
            }
            td[class="footer"]{padding:5px 20px 20px !important;}
            td[class="footer"] td[class="aligncenter"]{
                line-height:25px !important;
                padding:20px 0 0 !important;
            }
            tr[class="table-holder"]{
                display:table !important;
                width:100% !important;
            }
            th[class="thead"]{display:table-header-group !important; width:100% !important;}
            th[class="tfoot"]{display:table-footer-group !important; width:100% !important;}
        }
    </style>
</head>
<body style="margin:0; padding:0;" bgcolor="#eaeced">
<table style="min-width:320px;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#eaeced">
    <!-- fix for gmail -->
    <tr>
        <td class="hide">
            <table width="600" cellpadding="0" cellspacing="0" style="width:600px !important;">
                <tr>
                    <td style="min-width:600px; font-size:0; line-height:0;">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="wrapper" style="padding:0 10px;">

            <!-- module 2 -->
            <table data-module="module-2" width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td data-bgcolor="bg-module" bgcolor="#eaeced">
                        <table class="flexible" width="600" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="img-flex"><img src="{!! asset('public/assets/client/images/banner-email.jpg') !!}" style="vertical-align:top;" width="600" height="300" alt="" /></td>
                            </tr>
                            <tr>
                                <td data-bgcolor="bg-block" class="holder" style="padding:58px 60px 52px;" bgcolor="#f9f9f9">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:35px/38px Arial, Helvetica, sans-serif; color:#c71568; padding:0 0 24px;">
                                                ĐƠN HÀNG CHI TIẾT
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" style="font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
                                                Xin chào {!! $customer->firstname !!},
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" style="font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
                                                Bạn vừa đặt hàng tại website TIGERD, đơn hàng gồm:
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" style="font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
                                                <table border="1" width="100%">
                                                    <thead>
                                                    <tr style="background-color: #565656">
                                                        <th align="left" style="color:white">SẢN PHẨM</th>
                                                        <th style="color:white">SÔ LƯỢNG</th>
                                                        <th align="right" style="color:white">ĐƠN GIÁ</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(!$cart->isEmpty())
                                                            @foreach($cart as $item_cart)
                                                        <tr>
                                                            <td>{!! $item_cart->name !!}</td>
                                                            <td align="center">{!! $item_cart->quantity !!}</td>
                                                            <td align="right">{!! number_format($item_cart->price) !!} VND</td>
                                                        </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" style="font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
                                                Đơn hàng của bạn đang được xử lý. Nhân viên TIGERD sẽ liên lạc với bạn trong thời gian sớm nhất.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" style="font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
                                                Cảm ơn bạn !
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0 0 20px;">
                                                <table width="134" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td data-bgcolor="bg-button" data-size="size button" data-min="10" data-max="16" class="btn" align="center" style="font:12px/14px Arial, Helvetica, sans-serif; color:#f8f9fb; text-transform:uppercase; mso-padding-alt:12px 10px 10px; border-radius:2px;" bgcolor="#7bb84f">
                                                            <a target="_blank" style="text-decoration:none; color:#f8f9fb; display:block; padding:12px 10px 10px;" href="{!! route('client.home') !!}">XEM THÊM SẢN PHẨM</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr><td height="28"></td></tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- fix for gmail -->
    <tr>
        <td style="line-height:0;"><div style="display:none; white-space:nowrap; font:15px/1px courier;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td>
    </tr>
</table>
</body>
</html>
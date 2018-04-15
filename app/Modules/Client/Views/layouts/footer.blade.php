<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-container">
                    <ul class="list-footer">
                        <li class="header">About Eylux</li>
                        <li class="item-footer"><a href="#">Trang chủ</a></li>
                        <li class="item-footer"><a href="#">Giới thiệu</a></li>
                        <li class="item-footer"><a href="#">Khuyến mãi</a></li>
                        <li class="item-footer"><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-container">
                    <ul class="list-footer">
                        <li class="header">Hướng Dẫn</li>
                        <li class="item-footer"><a href="#">Hướng dẫn mưa hàng</a></li>
                        <li class="item-footer"><a href="#">Hướng dẫn thanh toán</a></li>
                        <li class="item-footer"><a href="#">Hướng dẫn</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-container">
                    <ul class="list-footer">
                        <li class="header">Sản Phẩm</li>
                        <li class="item-footer"><a href="#">Product 01</a></li>
                        <li class="item-footer"><a href="#">Product 02</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-container">
                    <div class="title-wrapper  mb-1">
                        <h3 class="title-footer">ĐĂNG KÝ THÔNG TIN</h3>
                        <sup>Đăng ký để nhận thông tin.</sup>
                    </div>
                    <div class="form-wrapper mb-4">
                        {!! Form::open(['route' => 'client.home', 'class' => 'form']) !!}
                        <div class="input-group">
                            <input type="text" name="subscribe" class="form-control" placeholder="Your Email ..." ria-describedby="inputAppend" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn-submit input-group-text"><i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="icon-footer d-flex justify-content-start">
                        <a href="#" class="ic-wrapper ic-fb"><i class="fa fa-facebook-square"></i></a>
                        <a href="#" class="ic-wrapper ic-yt"><i class="fa fa-youtube-square"></i></a>
                        <a href="#" class="ic-wrapper ic-tw"><i class="fa fa-twitter-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{!! route('admin.dashboard') !!}"><i class="icon-speedometer"></i> Dashboard </a>
            </li>

            <li class="nav-title">
                Quản Lý Sản Phẩm
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.category.index') !!}" class="nav-link {!! LP_lib::setActive('2','category') !!}"><i class="fa fa-server"></i> Danh Mục Sản Phẩm</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.brand.index') !!}" class="nav-link {!! LP_lib::setActive('2','brand') !!}"><i class="fa fa-archive"></i> Thương Hiệu</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.product.index') !!}" class="nav-link {!! LP_lib::setActive('2','product') !!}"><i class="fa fa-file"></i> Sản Phẩm</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.promotioncode.index') !!}" class="nav-link {!! LP_lib::setActive('2','promotioncode') !!}"><i class="icon-drop"></i> Mã Khuyến Mãi</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.ship-cost.index') !!}" class="nav-link {!! LP_lib::setActive('2','ship-cost') !!}"><i class="fa fa-shipping-fast"></i> Giá Ship</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.order.index') !!}" class="nav-link {!! LP_lib::setActive('2','order') !!}"><i class="fa fa-shopping-cart"></i> Quản Lý Đơn Hàng</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.exchange.index') !!}" class="nav-link {!! LP_lib::setActive('2','exchange') !!}"><i class="fa fa-money-bill-alt"></i> Tỷ giá quy đổi</a>
            </li>
            <li class="divider"></li>

            <li class="nav-title">
                Quản Lý Bài Viết
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.news.index') !!}" class="nav-link {!! LP_lib::setActive('2','news') !!}"><i class="fa fa-newspaper"></i> Tin Tức</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.promotion.index') !!}" class="nav-link {!! LP_lib::setActive('2','promotion') !!}"><i class="fa fa-plus-square"></i> Tin Khuyến Mãi</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.page.index') !!}" class="nav-link {!! LP_lib::setActive('2','page') !!}"><i class="fa fa-columns"></i> Trang Đơn</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.video.index') !!}" class="nav-link {!! LP_lib::setActive('2','video') !!}"><i class="fa fa-video"></i> Video</a>
            </li>
            <li class="divider"></li>

            <li class="nav-title">
                Quản Lý Người Dùng
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.customer.index') !!}" class="nav-link {!! LP_lib::setActive('2','customer') !!}"><i class="fa fa-users"></i> Quản Lý Khách Hàng</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.subscribe') !!}" class="nav-link {!! LP_lib::setActive('2','subscribe') !!}"><i class="fa fa-envelope-square"></i> Subscribes</a>
            </li>
            <li class="divider"></li>

            <li class="nav-title">
                Thông tin Chung
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.company.index') !!}" class="nav-link {!! LP_lib::setActive('2','subscribe') !!}"><i class="fa fa-info  "></i> Thông tin cửa hàng</a>
            </li>

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
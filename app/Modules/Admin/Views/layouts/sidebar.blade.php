<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.html"><i class="icon-speedometer"></i> Dashboard </a>
            </li>

            <li class="nav-title">
                Chức Năng
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.news.index') !!}" class="nav-link {!! LP_lib::setActive('2','news') !!}"><i class="icon-drop"></i> Tin Tức</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.promotion.index') !!}" class="nav-link {!! LP_lib::setActive('2','promotion') !!}"><i class="icon-drop"></i> Tin Khuyến Mãi</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.page.index') !!}" class="nav-link {!! LP_lib::setActive('2','page') !!}"><i class="icon-drop"></i> Trang Đơn</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.subscribe') !!}" class="nav-link {!! LP_lib::setActive('2','subscribe') !!}"><i class="icon-drop"></i> Subscribes</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.ship-cost.index') !!}" class="nav-link {!! LP_lib::setActive('2','ship-cost') !!}"><i class="icon-drop"></i> Giá Ship</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.category.index') !!}" class="nav-link {!! LP_lib::setActive('2','category') !!}"><i class="icon-drop"></i> Danh Mục Sản Phẩm</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.brand.index') !!}" class="nav-link {!! LP_lib::setActive('2','brand') !!}"><i class="icon-drop"></i> Thương Hiệu</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.product.index') !!}" class="nav-link {!! LP_lib::setActive('2','product') !!}"><i class="icon-drop"></i> Sản Phẩm</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.promotioncode.index') !!}" class="nav-link {!! LP_lib::setActive('2','promotioncode') !!}"><i class="icon-drop"></i> Mã Khuyến Mãi</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.order.index') !!}" class="nav-link {!! LP_lib::setActive('2','order') !!}"><i class="icon-drop"></i> Quản Lý Đơn Hàng</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.customer.index') !!}" class="nav-link {!! LP_lib::setActive('2','customer') !!}"><i class="icon-drop"></i> Quản Lý Khách Hàng</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.video.index') !!}" class="nav-link {!! LP_lib::setActive('2','video') !!}"><i class="icon-drop"></i> Video</a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bell"></i> Notifications</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="notifications-alerts.html"><i class="icon-bell"></i> Alerts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notifications-badge.html"><i class="icon-bell"></i> Badge</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notifications-modals.html"><i class="icon-bell"></i> Modals</a>
                    </li>
                </ul>
            </li>
            <li class="divider"></li>
            <li class="nav-title">
                Extras
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="icon-star"></i> Pages</a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
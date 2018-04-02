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
                <a href="{!! route('admin.news.index') !!}" class="nav-link {!! LP_lib::setActive('1','news') !!}"><i class="icon-drop"></i> Tin Tức</a>
            </li>
            <li class="nav-item ">
                <a href="{!! route('admin.promotion.index') !!}" class="nav-link {!! LP_lib::setActive('1','promotion') !!}"><i class="icon-drop"></i> Tin Khuyến Mãi</a>
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
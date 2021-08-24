<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{ asset('admin/img/admin-icon.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p>کاربر {{ \Illuminate\Support\Facades\Auth::user()->user_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="جستجو">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">منو</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>مدیریت کاربران</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('users') }}"><i class="fa fa-circle-o"></i>کاربران</a></li>
                    <li><a href="{{ route('roles') }}"><i class="fa fa-circle-o"></i>نقش ها</a></li>
                    <li><a href="{{ route('listUsers') }}"><i class="fa fa-circle-o"></i>تخصیص نقش ها</a></li>
                    <li><a href="{{ route('perms') }}"><i class="fa fa-circle-o"></i>مجوزها</a></li>
                    <li><a href="{{ route('listRoles') }}"><i class="fa fa-circle-o"></i>تخصیص مجوزها</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i> <span>دسته بندی ها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('listCategories') }}"><i class="fa fa-circle-o"></i>مدیریت دسته بندی ها</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i><span>دوره های آموزشی</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/course/index"><i class="fa fa-circle-o"></i>لیست دوره ها</a></li>
                    <li><a href="/admin/course/create"><i class="fa fa-circle-o"></i>ایجاد</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>ویرایش</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-basket"></i><span>فروشگاه</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>لیست محصولات</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>مدیریت محصولات</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-credit-card"></i><span>مدیریت سفارشات</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>سفارشات پرداخت شده</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>سفارشات لغو شده</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i><span>مقالات</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>لیست مقالات</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>ایجاد</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>ویرایش</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-paint-brush"></i> <span>نمونه کار</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/sample/index"><i class="fa fa-circle-o"></i>لیست نمونه کارها</a></li>
                    <li><a href="/admin/sample/create"><i class="fa fa-circle-o"></i>اضافه کردن نمونه کار</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-lightbulb-o"></i> <span>نکات طلایی</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/tip/index"><i class="fa fa-circle-o"></i>لیست نکات طلایی</a></li>
<!--                    <li><a href="#"><i class="fa fa-circle-o"></i>مدیریت نکات طلایی</a></li>-->
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-comment"></i> <span>نظرات</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>لیست نظرات</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>نظرات تایید شده</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>ایمیل ها</span>
                    <span class="pull-left-container">
              <small class="label pull-left bg-yellow">۱۲</small>
              <small class="label pull-left bg-green">۱۶</small>
              <small class="label pull-left bg-red">۵</small>
            </span>
                </a>
            </li>

            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>اطلاعات</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{url('img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="" class="simple-text logo-normal">
            Quản lý trường
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{isActiveRoute('dashboard')}}">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{isActiveRoute('admin.thongke.index')}}">
                <a class="nav-link" href="{{route('admin.thongke.index', ['year' => date('Y')])}}">
                    <i class="material-icons">person</i>
                    <p>Thống kê dữ liệu các trường</p>
                </a>
            </li>
            <li class="nav-item {{isActiveRoute('admin.user.index')}}">
                <a class="nav-link" href="{{route('admin.user.index')}}">
                    <i class="material-icons">person</i>
                    <p>Quản lý tài khoản</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="">
                    <i class="material-icons">content_paste</i>
                    <p>Phân quyền</p>
                </a>
            </li>
        </ul>
    </div>
</div>
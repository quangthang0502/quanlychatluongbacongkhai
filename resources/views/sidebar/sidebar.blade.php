<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{url('img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        @if(getUser()->type == 0)
            <a href="{{route('dashboard')}}" class="simple-text logo-normal">
                Quản lý trường
            </a>
        @else
            <a href="{{route('dashboard.university', $slug)}}" class="simple-text logo-normal">
                Quản lý trường
            </a>
        @endif
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{isActiveRoute('dashboard.university')}}">
                <a class="nav-link" href="{{route('dashboard.university', $slug)}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{isActiveRoute('university.leaders.index')}}">
                <a class="nav-link" href="{{route('university.leaders.index', ['slug'=>$slug, 'year'=> date('Y')])}}">
                    <i class="material-icons">person</i>
                    <p>Cán bộ chủ chốt</p>
                </a>
            </li>

            <li class="nav-item {{isActiveRoute('university.training.index')}}">
                <a class="nav-link" href="{{route('university.training.index', ['slug'=>$slug, 'year'=> date('Y')])}}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Đào tạo</p>
                </a>
            </li>

            <li class="nav-item {{isActiveRoute('university.teacher.index')}}">
                <a class="nav-link" href="{{route('university.teacher.index', ['slug'=>$slug, 'year'=> date('Y')])}}">
                    <i class="material-icons">local_library</i>
                    <p>Giảng viên</p>
                </a>
            </li>

            <li class="nav-item {{isActiveRoute('university.student.index')}}">
                <a class="nav-link" href="{{route('university.student.index', ['slug'=>$slug, 'year'=> date('Y')])}}">
                    <i class="material-icons">assignment_ind</i>
                    <p>Học viên</p>
                </a>
            </li>

            <li class="nav-item {{isActiveRoute('university.intro.index')}}">
                <a class="nav-link" href="{{route('university.intro.index', $slug)}}">
                    <i class="material-icons">description</i>
                    <p>Giới thiệu</p>
                </a>
            </li>

            <li class="nav-item {{isActiveRoute('university.user.index')}}">
                <a class="nav-link" href="{{route('university.user.index', $slug)}}">
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
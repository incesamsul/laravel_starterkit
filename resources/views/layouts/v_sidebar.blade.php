<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">based</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">

            {{-- MENU PENGGUNA --}}
            {{-- SEMUA PENGGUNA / USER MEMPUNYAI MENU INI --}}
            <li class="menu-header">Pengguna</li>
            <li class="" id="liDashboard"><a class="nav-link" href="{{ URL::to('/dashboard') }}"><i
                        class="far fa-chart-bar"></i> <span>Dashboard</span></a></li>
            <li class="" id="liProfile"><a class="nav-link" href="{{ URL::to('/profile') }}"><i
                        class="far fa-user-circle "></i>
                    <span>Profile</span></a></li>
            <li class="" id="liBantuan"><a class="nav-link" href="{{ URL::to('/bantuan') }}"><i
                        class="far fa-question-circle"></i> <span>Bantuan</span></a></li>



            @if (auth()->user()->role_id == '1')
            {{-- MENU ADMIN --}}
            <li class="menu-header">Admin</li>




            <li class="" id="liRole"><a class="nav-link" href="{{ URL::to('/admin/role') }}"><i class="far fa-user"></i>
                    <span>Role</span></a></li>

            <li class="" id="liMenu"><a class="nav-link" href="{{ URL::to('/admin/menu') }}"><i
                        class="far fa-list-alt"></i>
                    <span>Menu</span></a></li>


            <li class="" id="liManajemenPengguna"><a class="nav-link" href="{{ URL::to('/admin/pengguna') }}"><i
                        class="far fa-user"></i> <span>Pengguna</span></a></li>
            <li class="" id="liRoleMenu"><a class="nav-link" href="{{ URL::to('/admin/role_menu') }}"><i
                        class="far fa-list-alt"></i>
                    <span>Role Menu</span></a></li>
            {{-- END OF MENU ADMIN --}}
            @endif







        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ URL::to('/logout') }}" class="btn bg-main text-white btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>
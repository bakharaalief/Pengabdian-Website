<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link ml-2">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Sistem Absensi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <!-- dashboard button -->
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-lg fa-tachometer-alt mr-2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- user button -->
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-lg fa-user mr-3"></i>
                        <p>User</p>
                    </a>
                </li>

                <!-- murid button -->
                <li class="nav-item">
                    <a href="{{ route('student.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-lg fa-users mr-2"></i>
                        <p>Murid</p>
                    </a>
                </li>

                <!-- kelas button -->
                <li class="nav-item">
                    <a href="{{ route('class.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-lg fa-graduation-cap mr-2"></i>
                        <p>Kelas</p>
                    </a>
                </li>

                <!-- absensi button -->
                <li class="nav-item">
                    <a href="{{ route('attendance.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-lg fa-calendar mr-3"></i>
                        <p>Absensi</p>
                    </a>
                </li>
            </nav>
        </ul>
    </div>
    
</aside>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true" data-img="{{ asset('back/images/backgrounds/02.jpg') }}">
    <div class="navbar-header">
        <ul class="flex-row nav navbar-nav">
            <li class="mr-auto nav-item">
                <a class="navbar-brand" href="{{ url('dashboard/index') }}">
                    <img class="brand-logo" alt="admin logo" src="{{ asset('back/images/logo/ihbs-logo.png') }}" />

                    <h3 class="brand-text">SIMSE IHBS</h3>
                </a>
            </li>
            <li class="nav-item d-md-none">
                <a class="nav-link close-navbar"><i class="ft-x"></i></a>
            </li>
        </ul>
    </div>

    <div class="navigation-background"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ request()->is('dashboard/index*') ? 'active' : '' }}">
                <a class="menu-item" href="{{ url('dashboard/index') }}">
                    <i class="ft-file"></i>
                    <span class="menu-title" data-i18n="">Dashboard</span>
                    <span class="float-right badge badge-pill badge-warning">1.2</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('apps*') ? 'active' : '' }}">
                <a href="#"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Master Data</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->is('dashboard/classrooms') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/classrooms') }}">Data Kelas</a>
                    </li>
                    <li class="{{ request()->is('dashboard/teachers') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/teachers') }}">Data Guru</a>
                    </li>
                    <li class="{{ request()->is('dashboard/mapels') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/mapels') }}">Data Mapel</a>
                    </li>
                    <li class="{{ request()->is('dashboard/teachings') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/teachings') }}">Jadwal Guru</a>
                    </li>
                    <li class="{{ request()->is('dashboard/students') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/students') }}">Data Siswa</a>
                    </li>
                    <li class="{{ request()->is('dashboard/announcements') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/announcements') }}">Data Pengumuman</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item {{ request()->is('dashboard/categories*') || request()->is('dashboard/vendors*') || request()->is('dashboard/inventories*')  ? 'active' : '' }}"><a href="#"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">Master Barang</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->is('dashboard/categories') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/categories') }}">Data Kategori</a>
                    </li>
                    <li class="{{ request()->is('dashboard/vendors') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/vendors') }}">Data Vendor</a>
                    </li>
                    <li class="{{ request()->is('dashboard/inventories') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/inventories') }}">Data inventories</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item {{ request()->is('dashboard/violations*') || request()->is('dashboard/sanction-types*')|| request()->is('dashboard/violation-types*')  ? 'active' : '' }}"><a href="#"><i class="ft-aperture"></i><span class="menu-title" data-i18n="">Data Pelanggaran</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->is('dashboard/violations') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/violations') }}">Data Pelanggaran</a>
                    </li>
                    <li class="{{ request()->is('dashboard/violation-types') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/violation-types') }}">Jenis Pelanggaran</a>
                    </li>
                    <li class="{{ request()->is('dashboard/sanction-types') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/sanction-types') }}">Jenis Sanksi</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item {{ request()->is('dashboard/achievements*') || request()->is('dashboard/achievement-types*')|| request()->is('dashboard/achievement-awards*')  ? 'active' : '' }}"><a href="#"><i class="ft-bookmark"></i><span class="menu-title" data-i18n="">Data Prestasi</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->is('dashboard/achievements') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/achievements') }}">Data Prestasi</a>
                    </li>
                    <li class="{{ request()->is('dashboard/achievement-types') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/achievement-types') }}">Jenis Prestasi</a>
                    </li>
                    <li class="{{ request()->is('dashboard/achievement-awards') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/achievement-awards') }}">Jenis Penghargaan</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item {{ request()->is('dashboard/curriculums*') || request()->is('dashboard/silabuses*') ? 'active' : '' }}"><a href="#"><i class="ft-grid"></i><span class="menu-title" data-i18n="">Data Pendidikan</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->is('dashboard/curriculums') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/curriculums') }}">Data Kurikulum</a>
                    </li>
                    <li class="{{ request()->is('dashboard/silabuses') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/silabuses') }}">Data Silabus</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item {{ request()->is('dashboard/exams*') || request()->is('dashboard/questions*') ? 'active' : '' }}"><a href="#"><i class="ft-command"></i><span class="menu-title" data-i18n="">Data Ujian</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->is('dashboard/exams') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/exams') }}">Data Ujian</a>
                    </li>
                    <li class="{{ request()->is('dashboard/questions') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/questions') }}">Soal Ujian</a>
                    </li>
                    <li class="{{ request()->is('dashboard/tests') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/tests') }}">Daftar Ujian</a>
                    </li>
                    <li class="{{ request()->is('dashboard/hasilujian') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('dashboard/hasilujian') }}">Hasil Ujian</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->is('dashboard/edit_profile*') ? 'active' : '' }}">
                <a class="menu-item" href="{{ url('dashboard/edit_profile') }}">
                    <i class="ft-user"></i>
                    <span class="menu-title" data-i18n="">Update Profile</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('dashboard/configs*') ? 'active' : '' }}">
                <a class="menu-item" href="{{ url('dashboard/configs') }}">
                    <i class="ft-settings"></i>
                    <span class="menu-title" data-i18n="">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>

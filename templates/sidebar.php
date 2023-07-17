<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">



            <ul id="sidebarnav">
                <li class="sidebar-header small mb-2 d-md-none d-lg-block">Dashboard</li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="../view_admin/dashboard.php" aria-expanded="false"><i
                            class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                <?php if ($user["role_id"] == 1): ?>
                    <li class="sidebar-header small mb-2 d-md-none d-lg-block">Data Pegawai</li>

                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="../view_pegawai/jabatan.php" aria-expanded="false"><i
                                class="mdi mdi-clipboard-check"></i><span class="hide-menu">Jabatan</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="../view_pegawai/pegawai.php" aria-expanded="false"><i
                                class="mdi mdi-clipboard-account"></i><span class="hide-menu">Pegawai</span></a></li>
                <?php endif; ?>

                <li class="sidebar-header small mb-2 d-md-none d-lg-block">Data Penilaian</li>

                <?php if ($user["role_id"] == 1): ?>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="../view_penilaian/periode.php" aria-expanded="false"><i
                                class="mdi mdi-timetable"></i><span class="hide-menu">Periode</span></a></li>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="../view_penilaian/kriteria.php" aria-expanded="false"><i
                                class="mdi mdi-view-list"></i><span class="hide-menu">Kriteria Penilaian</span></a></li>
                <?php endif; ?>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="../view_penilaian/penilaian.php" aria-expanded="false"><i
                            class="mdi mdi-bookmark-check"></i><span class="hide-menu">Penilaian</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="../view_penilaian/ranking.php" aria-expanded="false"><i
                            class="mdi mdi-chart-areaspline"></i><span class="hide-menu">Ranking</span></a></li>

                <li class="sidebar-header small mb-2 d-md-none d-lg-block">Data Pengguna</li>

                <?php if ($user["role_id"] == 1): ?>
                    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="../view_user/pengguna.php" aria-expanded="false"><i
                                class="mdi mdi-account-multiple"></i><span class="hide-menu">Pengguna</span></a></li>
                <?php endif; ?>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="../view_user/profile.php" aria-expanded="false"><i
                            class="mdi mdi-account-card-details"></i><span class="hide-menu">Profile</span></a></li>


                <li class="text-center p-40 upgrade-btn">
                    <a href="../logout.php" class="btn d-block w-100 btn-danger text-white">Logout</a>
                </li>
            </ul>

        </nav>
    </div>
</aside>
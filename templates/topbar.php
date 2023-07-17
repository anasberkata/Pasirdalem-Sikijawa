<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                </b>

                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo text -->
                    <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                </span>
            </a>

            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="mdi mdi-menu"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-start">
                <li class="nav-item">
                    <a class="nav-link" href="../view_pegawai/pegawai.php">
                        <h6>
                            <i class="mdi mdi-clipboard-account"></i>
                            Pegawai
                        </h6>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view_penilaian/penilaian.php">
                        <h6>
                            <i class="mdi mdi-bookmark-check"></i>
                            Penilaian
                        </h6>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav float-end ms-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <h6>
                            <i class="mdi mdi-account"></i>
                            <?= $user["nama"] ?>
                        </h6>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../view_user/profile.php"><i
                                class="mdi mdi-account m-r-5 m-l-5"></i>
                            Profile Saya</a>
                        <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-logout m-r-5 m-l-5"></i>
                            Logout</a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
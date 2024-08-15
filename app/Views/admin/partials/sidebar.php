<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a class="d-block"><?php echo session()->get('nama'); ?></a>
                <a class="d-block">
                    <?php 
                    switch (session()->get('level')) {
                        case 1:
                            echo "ADMIN"; 
                            break;
                        case 2:
                            echo "Karyawan"; 
                            break;
                    }
                    ?>
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <?php
                function renderMenuItem($url, $icon, $label) {
                    echo "<li class='nav-item'>
                            <a href='" . base_url($url) . "' class='nav-link'>
                                <i class='nav-icon fas $icon'></i>
                                <p>$label</p>
                            </a>
                          </li>";
                }
                if (session()->get('level') == 1 || session()->get('level') == 2) {
                    renderMenuItem('dashboard/berita', 'fa-file-alt', 'Berita');
                    renderMenuItem('dashboard/profil', 'fa-id-card', 'Profil');
                    renderMenuItem('dashboard/kependudukan', 'fa-users', 'Kependudukan');
                    renderMenuItem('dashboard/kontak', 'fa-envelope', 'Kontak');
                    renderMenuItem('dashboard/pemberitahuan', 'fa-bell', 'Pemberitahuan');
                }
                if (session()->get('level') == 1) {
                    renderMenuItem('dashboard/user', 'fa-user', 'List User');
                }
                renderMenuItem('logout', 'fa-sign-out-alt', 'Log Out');
                ?>
            </ul>
        </nav>
    </div>
</aside>

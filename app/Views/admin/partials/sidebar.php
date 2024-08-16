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
                function renderMenuItem($url, $icon, $label, $isSubMenu = false) {
                    $class = $isSubMenu ? 'nav-item' : 'nav-item';
                    $linkClass = $isSubMenu ? 'nav-link' : 'nav-link';
                    echo "<li class='$class'>
                            <a href='" . base_url($url) . "' class='$linkClass'>
                                <i class='nav-icon fas $icon'></i>
                                <p>$label</p>
                            </a>
                          </li>";
                }

                function renderParentMenuItem($url, $icon, $label, $subMenuItems = []) {
                    echo "<li class='nav-item has-treeview'>
                            <a href='" . base_url($url) . "' class='nav-link'>
                                <i class='nav-icon fas $icon'></i>
                                <p>$label
                                    <i class='right fas fa-angle-left'></i>
                                </p>
                            </a>
                            <ul class='nav nav-treeview'>";
                    foreach ($subMenuItems as $item) {
                        renderMenuItem($item['url'], $item['icon'], $item['label'], true);
                    }
                    echo "  </ul>
                          </li>";
                }

                if (session()->get('level') == 1 || session()->get('level') == 2) {
                    renderMenuItem('dashboard/berita', 'fa-file-alt', 'Berita');
                    renderMenuItem('dashboard/profil', 'fa-id-card', 'Profil');
                    $kependudukanSubMenu = [
                        ['url' => 'dashboard/kependudukan/chart', 'icon' => 'fa-chart-bar', 'label' => 'Grafik Kependudukan'],
                        ['url' => 'dashboard/kependudukan', 'icon' => 'fa-chart-bar', 'label' => 'Data Kependudukan']
                    ];
                    renderParentMenuItem('dashboard/kependudukan', 'fa-users', 'Kependudukan', $kependudukanSubMenu);
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

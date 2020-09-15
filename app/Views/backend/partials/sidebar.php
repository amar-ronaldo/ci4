<?php
$menuModel = model('MenuModel');
?>
<div class="content-side content-side-full">
    <ul class="nav-main">
        <?php foreach ($menuModel->childMenu() as $keyMenu => $menu) { ?>

            <?php if (!empty($menu['child'])) { ?>
                <li class="nav-main-item">

                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="nav-main-link-icon <?= $menu['icon'] ?>"></i>
                        <span class="nav-main-link-name"><?= $menu['name'] ?></span>
                    </a>
                    <ul class="nav-main-submenu">
                        <?php foreach ($menu['child'] as $childMenu) { ?>
                            <?php if (!empty($childMenu['child'])) { ?>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                                        <i class="nav-main-link-icon <?= $childMenu['icon'] ?>"></i>
                                        <span class="nav-main-link-name"><?= $childMenu['name'] ?></span>
                                    </a>
                                    <ul class="nav-main-submenu">
                                        <?php foreach ($childMenu['child'] as $childMenu2) { ?>
                                        <?php $menuUrl = site_url() . 'backend/' . $childMenu2['controller'] ?>

                                            <li class="nav-main-item">
                                                <a class="nav-main-link <?= $menuUrl == current_url() ? 'active' : '' ?>" href="<?= $menuUrl ?>">
                                                      <i class="nav-main-link-icon <?= $childMenu2['icon'] ?>"></i>
                                                    <span class="nav-main-link-name"><?= $childMenu2['name'] ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <?php $menuUrl = site_url() . 'backend/' . $childMenu['controller'] ?>

                                <li class="nav-main-item">
                                    <a class="nav-main-link <?= $menuUrl == current_url() ? 'active' : '' ?>" href="<?= $menuUrl ?>">
                                        <i class="nav-main-link-icon <?= $childMenu['icon'] ?>"></i>
                                        <span class="nav-main-link-name"><?= $childMenu['name'] ?></span>
                                    </a>
                                </li>
                            <?php } ?>

                        <?php } ?>
                    </ul>
                </li>

            <?php } else { ?>
                <!-- single -->
                <?php $menuUrl = site_url() . 'backend/' . $menu['controller'] ?>
                <li class="nav-main-item">
                    <a class="nav-main-link <?= $menuUrl == current_url() ? 'active' : '' ?>" href="<?= $menuUrl ?>">
                        <i class="nav-main-link-icon <?= $menu['icon'] ?>"></i>
                        <span class="nav-main-link-name"><?= $menu['name'] ?></span>
                    </a>
                </li>
            <?php } ?>

        <?php } ?>
        <!-- <li class="nav-main-heading">Heading</li> -->
        <!-- <li class="nav-main-item">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                <i class="nav-main-link-icon si si-puzzle"></i>
                <span class="nav-main-link-name">Dropdown</span>
            </a>
            <ul class="nav-main-submenu">
                <li class="nav-main-item">
                    <a class="nav-main-link" href="javascript:void(0)">
                        <span class="nav-main-link-name">Link #1</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="javascript:void(0)">
                        <span class="nav-main-link-name">Link #2</span>
                    </a>
                </li>
            </ul>
        </li> -->
    </ul>
</div>
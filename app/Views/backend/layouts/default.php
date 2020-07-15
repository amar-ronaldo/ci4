<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <?php helper('inflector'); ?>
    <title><?= $_ENV['project.name'] . ' - ' . $title ?></title>

    <meta name="description" content="<?= $_ENV['project.name'] . ' - ' . $title ?>">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="<?= $_ENV['project.name'] . ' - ' . $title ?>">
    <meta property="og:site_name" content="<?= $_ENV['project.name'] ?>">
    <meta property="og:description" content="<?= $_ENV['project.name'] ?> - Aplikasi Pengelola Data Player">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= base_url('assets/media/favicons/favicon.png"') ?>">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('assets/media/favicons/favicon-192x192.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/media/favicons/apple-touch-icon-180x180.png') ?>">
    <!-- END Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/js/plugins/sweetalert2/sweetalert2.min.css') ?>">

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="<?= base_url('assets/css/oneui.min.css') ?>">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="<?= base_url('assets/css/themes/amethyst.min.css') ?>"> -->
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Page Container -->
    <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Light themed Header
            'page-header-dark'                          Dark themed Header

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
        <!-- Side Overlay-->
        <aside id="side-overlay" class="font-size-sm">
            <!-- Side Header -->
            <div class="content-header border-bottom">
                <!-- User Avatar -->
                <a class="img-link mr-1" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32" src="<?= base_url('assets/media/avatars/avatar10.jpg') ?>" alt="">
                </a>
                <!-- END User Avatar -->

                <!-- User Info -->
                <div class="ml-2">
                    <a class="link-fx text-dark font-w600" href="javascript:void(0)">Administrator</a>
                </div>
                <!-- END User Info -->

                <!-- Close Side Overlay -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="ml-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                    <i class="fa fa-fw fa-times"></i>
                </a>
                <!-- END Close Side Overlay -->
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="content-side">
                <!-- Side Overlay Tabs -->
                <div class="block block-transparent pull-x pull-t">
                    <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#so-section1">
                                <i class="fa fa-fw fa-link text-gray mr-1"></i> Section 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#so-section2">
                                <i class="fa fa-fw fa-link text-gray mr-1"></i> Section 2
                            </a>
                        </li>
                    </ul>
                    <div class="block-content tab-content overflow-hidden">
                        <!-- Section 1 -->
                        <div class="tab-pane pull-x fade fade-left show active" id="so-section1" role="tabpanel">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Section 1</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <p>
                                        ...
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- END Section 1 -->

                        <!-- Section 2 -->
                        <div class="tab-pane pull-x fade fade-right" id="so-section2" role="tabpanel">
                            <div class="block">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Section 2</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <p>
                                        ...
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- END Section 2 -->
                    </div>
                </div>
                <!-- END Side Overlay Tabs -->
            </div>
            <!-- END Side Content -->
        </aside>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="content-header bg-white-5">
                <!-- Logo -->
                <a class="font-w600 text-dual" href="">
                    <i class="fa fa-circle-notch text-primary"></i>
                    <span class="smini-hide">
                        <span class="font-w700 font-size-h5"><?= $_ENV['project.name'] ?></span>
                    </span>
                </a>
                <!-- END Logo -->

                <!-- Options -->
                <div hidden>
                    <!-- Color Variations -->
                    <div class="dropdown d-inline-block ml-3 hide">
                        <a class="text-dual font-size-sm" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="si si-drop"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0" aria-labelledby="sidebar-themes-dropdown">
                            <!-- Color Themes -->
                            <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="default" href="#">
                                <span>Default</span>
                                <i class="fa fa-circle text-default"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="<?= base_url('assets/css/themes/amethyst.min.css') ?>" href="#">
                                <span>Amethyst</span>
                                <i class="fa fa-circle text-amethyst"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="<?= base_url('assets/css/themes/city.min.css') ?>" href="#">
                                <span>City</span>
                                <i class="fa fa-circle text-city"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="<?= base_url('assets/css/themes/flat.min.css') ?>" href="#">
                                <span>Flat</span>
                                <i class="fa fa-circle text-flat"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="<?= base_url('assets/css/themes/modern.min.css') ?>" href="#">
                                <span>Modern</span>
                                <i class="fa fa-circle text-modern"></i>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" data-toggle="theme" data-theme="<?= base_url('assets/css/themes/smooth.min.css') ?>" href="#">
                                <span>Smooth</span>
                                <i class="fa fa-circle text-smooth"></i>
                            </a>
                            <!-- END Color Themes -->

                            <div class="dropdown-divider"></div>

                            <!-- Sidebar Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_light" href="#">
                                <span>Sidebar Light</span>
                            </a>
                            <a class="dropdown-item" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                                <span>Sidebar Dark</span>
                            </a>
                            <!-- Sidebar Styles -->

                            <div class="dropdown-divider"></div>

                            <!-- Header Styles -->
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <a class="dropdown-item" data-toggle="layout" data-action="header_style_light" href="#">
                                <span>Header Light</span>
                            </a>
                            <a class="dropdown-item" data-toggle="layout" data-action="header_style_dark" href="#">
                                <span>Header Dark</span>
                            </a>
                            <!-- Header Styles -->
                        </div>
                    </div>
                    <!-- END Themes -->

                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-times"></i>
                    </a>
                    <!-- END Close Sidebar -->
                </div>
                <!-- END Options -->
            </div>
            <!-- END Side Header -->

            <!-- Side Navigation -->
            <?= view_cell('\App\Libraries\Backend\Theme::sidebar', '', 3600, 'backend_sidebar') ?>
            <!-- END Side Navigation -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <?= view_cell('\App\Libraries\Backend\Theme::header', '', 3600, 'backend_header') ?>

        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <?= $this->renderSection('content') ?>

            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->
        <?= view_cell('\App\Libraries\Backend\Theme::footer', '', 3600, 'backend_footer') ?>

        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!-- OneUI JS -->
    <script src="<?= base_url('assets/js/oneui.core.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/oneui.app.min.js') ?>"></script>
    
    <script src="<?= base_url('assets/js/plugins/select2/js/select2.full.min.js')?>"></script>
    <script src="<?= base_url('assets/js/plugins/jquery-validation/jquery.validate.min.js')?>"></script>
    <script src="<?= base_url('assets/js/plugins/jquery-validation/additional-methods.js')?>"></script>

    <script src="<?= base_url('assets/js/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

    <!-- Page JS Helpers (BS Notify Plugin) -->
    <script>
        jQuery(function() {
            One.helpers('notify');
            One.helpers('select2');
            One.helpers('validation');
        });
    </script>

    <script src="<?= base_url('custom/js/backend.js') ?>"></script>
    <?= $this->renderSection('js') ?>
</body>

</html>
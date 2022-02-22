<!DOCTYPE html>
<html>

<!-- Mirrored from themesground.com/nexus-admin/template3/HTML/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Mar 2021 14:42:54 GMT -->

<head>
    <meta charset="UTF-8">
    <title>Dashboard | Nexus - Responsive Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="">
    <meta name="keywords" content="Nexus bootstrap template, Nexus admin, bootstrap,admin template, bootstrap admin,">
    <meta name="author" content="ThemesGround">
    <!-- <base href="{{asset('admin_html')}}/" /> -->
    <!-- Base Css Files -->
    <link href="/admin_html/assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
    <link href="/admin_html/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/admin_html/assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/admin_html/assets/libs/fontello/css/fontello.css" rel="stylesheet" />
    <link href="/admin_html/assets/libs/animate-css/animate.min.css" rel="stylesheet" />
    <link href="/admin_html/assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
    <link href="/admin_html/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" />
    <link href="/admin_html/assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" />
    <link href="/admin_html/assets/libs/pace/pace.css" rel="stylesheet" />
    <link href="/admin_html/assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
    <link href="/admin_html/assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
    <link href="/admin_html/assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
    <!-- Code Highlighter for Demo -->
    <link href="/admin_html/assets/libs/prettify/github.css" rel="stylesheet" />

    <!-- Extra CSS Libraries Start -->
    <!-- jvectormap -->
    <link rel="stylesheet" href="/admin_html/assets/libs/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/admin_html/assets/libs/bootstrap-datepicker/css/datepicker.css">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/admin_html/assets/libs/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Extra CSS Libraries Start -->
    <link href="/admin_html/assets/libs/summernote/summernote.css" rel="stylesheet" type="text/css" />
    <link href="/admin_html/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/admin_html/assets/css/main.css" rel="stylesheet" type="text/css" />
    <!-- Extra CSS Libraries End -->
    <link href="/admin_html/assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->


    <link rel="apple-touch-icon" href="/admin_html/assets/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="/admin_html/assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/admin_html/assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/admin_html/assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/admin_html/assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/admin_html/assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/admin_html/assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="/admin_html/assets/img/apple-touch-icon-152x152.png" />
    <?= $this->fetch('css') ?>
</head>

<body class="fixed-left">
    <!-- Modal Start -->
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">
            <div class="topbar-left">
                <div class="logo">
                    <h1><a href="index-2.html">Nexus</a></h1>
                </div>

            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar" role="navigation">

                <div class="container">

                    <div class="navbar-collapse2">
                        <button class="button-menu-mobile open-left">
                            <i class="fa fa-bars"></i>
                        </button>
                        <h1 class="title">Form Validation</h1> 
                        <ul class="nav navbar-nav navbar-right top-navbar">
                            <li>
                                <!-- Search form -->
                                <form role="search" class="navbar-form">
                                    <div class="form-group">
                                        <input type="text" placeholder="Search here..." class="form-control">
                                        <button type="submit" class="btn search-button"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </li>
                            <li class="dropdown notifications-menu hide-phone">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                        class="fa fa-bell"></i><span class="label label-blue absolute">4</span></a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <div class="slimScrollDiv">
                                            <ul class="menu">
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-pencil"></i> 5 new customers joined today
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-warning text-yellow"></i> Very long description
                                                        here that may not fit into the page and may cause design
                                                        problems
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-pencil"></i> 5 new customers joined
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-user text-red"></i> You changed your username
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="slimScrollBar"
                                                style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 200px; background: rgb(0, 0, 0);">
                                            </div>
                                            <div class="slimScrollRail"
                                                style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>

                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="label label-danger absolute">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 5 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <div class="slimScrollDiv"
                                            style="position: relative; overflow: hidden; width: auto; height: 200px;">
                                            <ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                                <li>
                                                    <!-- Task item -->
                                                    <a href="#">
                                                        <h3>
                                                            Update software
                                                            <small class="pull-right">47%</small>
                                                        </h3>
                                                        <div class="progress xs">
                                                            <div class="progress-bar progress-bar-aqua"
                                                                style="width: 20%" role="progressbar" aria-valuenow="20"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">20% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li><!-- end task item -->
                                                <li>
                                                    <!-- Task item -->
                                                    <a href="#">
                                                        <h3>
                                                            iphone Design
                                                            <small class="pull-right">40%</small>
                                                        </h3>
                                                        <div class="progress xs">
                                                            <div class="progress-bar progress-bar-green"
                                                                style="width: 40%" role="progressbar" aria-valuenow="20"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">40% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li><!-- end task item -->
                                                <li>
                                                    <!-- Task item -->
                                                    <a href="#">
                                                        <h3>
                                                            Fix all bugs
                                                            <small class="pull-right">60%</small>
                                                        </h3>
                                                        <div class="progress xs">
                                                            <div class="progress-bar progress-bar-red"
                                                                style="width: 60%" role="progressbar" aria-valuenow="20"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">60% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li><!-- end task item -->
                                                <!-- end task item -->
                                            </ul>
                                            <div class="slimScrollBar"
                                                style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);">
                                            </div>
                                            <div class="slimScrollRail"
                                                style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown topbar-profile">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                        class="rounded-image topbar-profile-image"><img
                                            src="/admin_html/images/users/user3-128x128.jpg"></span> Sahara Smith </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">My Profile</a></li>
                                    <li><a href="#">Change Password</a></li>
                                    <li><a href="#">Account Setting</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-help-2"></i> Help</a></li>
                                    <li><a href="lockscreen.html"><i class="icon-lock-1"></i> Lock me</a></li>
                                    <li><a class="md-trigger" data-modal="logout-modal" href="/admin//logout"><i
                                                class="icon-logout-1"></i> Logout</a></li>
                                </ul>
                            </li>
                            <li class="right-opener">
                                <a href="{{ route('logout') }}" class=""><i class="fa fa-power-off"
                                        aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->
        <!-- Left Sidebar Start -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
                <!--- Profile -->


                <div id="sidebar-menu">
                    <ul>
                        <li><a href=''><i class="fa fa-home"></i> <span>Dashboard</span> </a>


                        <li class='has_sub'><a href='javascript:void(0);'><i class="fa fa-check-square-o"></i>
                                <span>User</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <li><a href='/admin/users'><span>List User</span></a></li>
                            </ul>
                        </li>

                       

                        <li class='has_sub'><a href='javascript:void(0);'><i class="fa fa-th"></i> <span>Blog</span>
                                <span class="pull-right"><i class="fa fa-angle-down"></i></span> </a>
                            <ul>
                                <li><a href='{{route("get_list_blog")}}'><span>List Blog</span></a></li>
                            </ul>
                        </li>

                        <li class='has_sub'><a href='javascript:void(0);'><i class="fa fa-check-square-o"></i> <span>Product</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                              <li><a href='/admin/products'><span>List Product</span></a></li>
                                <li><a href='/admin/attribute'><span>List Attribute</span></a></li>
                                <li><a href='/admin/category'><span>List Category</span></a></li>
                                <li><a href='/admin/orders'><span>List Order</span></a></li>
                            </ul>
                          </li>

                    </ul>

                </div>


                <div class="sidebar-plan">
                    Bandwidth<a href="#" class="link">60%</a>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                            aria-valuemax="100" style="width: 60%;">
                        </div>
                    </div>

                </div>



            </div>

        </div>
        <!-- Left Sidebar End -->
        <!-- Start right content -->
        <div class="content-page">
            <!-- ============================================================== -->
            <!-- Start Content here -->
            <!-- ============================================================== -->
            <?= $this->fetch('content') ?>
            <!-- ============================================================== -->
            <!-- End content here -->
            <!-- ============================================================== -->

        </div>
        <!-- End right content -->

    </div>
    <!-- End of page -->
    <!-- the overlay modal element -->
    <div class="md-overlay"></div>
    <!-- End of eoverlay modal -->
    <div class="md-overlay"></div>
    <!-- End of eoverlay modal -->
    <script>
        var resizefunc = [];

    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/admin_html/assets/libs/jquery/jquery-1.11.1.min.js"></script>
    <script src="/admin_html/assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin_html/assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="/admin_html/assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>

    <script src="/admin_html/assets/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
    <script src="/admin_html/assets/libs/ios7-switch/ios7.switch.js"></script>
    <script src="/admin_html/assets/libs/fastclick/js/fastclick.js"></script>
    <script src="/admin_html/assets/libs/jquery-blockui/jquery.blockUI.js"></script>
    <script src="/admin_html/assets/libs/bootstrap-bootbox/bootbox.min.js"></script>
    <script src="/admin_html/assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="/admin_html/assets/libs/jquery-sparkline/jquery-sparkline.js"></script>
    <script src="/admin_html/assets/libs/nifty-modal/js/classie.js"></script>
    <script src="/admin_html/assets/libs/nifty-modal/js/modalEffects.js"></script>
    <script src="/admin_html/assets/libs/sortable/sortable.min.js"></script>
    <script src="/admin_html/assets/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
    <script src="/admin_html/assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="/admin_html/assets/libs/bootstrap-select2/select2.min.js"></script>
    <script src="/admin_html/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="/admin_html/assets/libs/pace/pace.min.js"></script>
    <script src="/admin_html/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="/admin_html/assets/libs/jquery-icheck/icheck.min.js"></script>

    <!-- Demo Specific JS Libraries -->
    <script src="/admin_html/assets/libs/prettify/prettify.js"></script>

    <script src="/admin_html/assets/js/init.js"></script>
    <!-- Page Specific JS Libraries -->
    <script src="/admin_html/assets/libs/summernote/summernote.js"></script>
    <script src="/admin_html/assets/js/pages/new-message.js"></script>

    <?= $this->fetch('script') ?>
</body>

<!-- Mirrored from themesground.com/nexus-admin/template3/HTML/form-validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Mar 2021 14:42:55 GMT -->

</html>

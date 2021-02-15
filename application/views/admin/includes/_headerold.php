<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My languagepro<?php // echo html_escape($title); ?>  <?php // echo html_escape($settings->site_title); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" type="image/png" href="<?php //echo get_favicon($vsettings);?>"/>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/AdminLTE.min.css">
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/_all-skins.min.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables_themeroller.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/icheck/square/purple.css">

    <!-- Tags Input -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/tagsinput/bootstrap-tagsinput.css">

    <!-- Bootstrap Toggle  css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-toggle.min.css">

    <!-- Color Picker css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/colorpicker/bootstrap-colorpicker.min.css">

    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/custom.css">
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';
        var csfr_token = '<?php echo $this->security->get_csrf_hash(); ?>';
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <style>
        .upload_attachmentfile {
    /*position: absolute;*/
    opacity: 0;
    /*right: 0;*/
    width: 10px;
    height: 10px;
    /*top: 0;*/
}
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>dashboard" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>I</b>n</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <b><?php echo html_escape($settings->application_name); ?></b>
            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a> -->
            <div class="navbar-custom-menu">
          <?php  if(user()->role == "teacher"){  ?>
                <a href="#" class="btn btn-sm btn-success pull-left btn-site-prev">Find Teacher</a>
                <a class="btn btn-sm btn-success pull-left btn-site-prev" 
                   href="<?php echo base_url(); ?>message">Message</a>
          <?php }
          else if(user()->role == "student"){ ?>
                    <a href="<?php echo base_url('find-teachers')?>" class="btn btn-sm btn-success pull-left btn-site-prev">Find Teacher</a>
                <a class="btn btn-sm btn-success pull-left btn-site-prev" 
                   href="<?php echo base_url(); ?>message">Message</a>
          <?php  }?>
                <!-- <ul class="nav navbar-nav">
                     User Account: style can be found in dropdown.less 
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url(); ?>assets/admin/img/user.jpg" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs"><?php echo html_escape(user()->username); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="<?php echo base_url(); ?>assets/admin/img/user.jpg" class="img-circle"
                                     alt="User Image">
                                <p>
                                    <?php echo html_escape(user()->username); ?>
                                </p>
                            </li>
                            <li class="user-body">
                            </li>
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat">
                                        <i class="fa fa-sign-out"></i>&nbsp;
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul> -->
                <div class="dropdown" style="float:right;">
                <button class="dropbtn"> <img src="<?php echo html_escape(get_user_avatar(user())) ?>" alt="<?php echo html_escape(user()->username); ?>"></button>
                <div class="dropdown-content">
                <section class="sidebar">
                <ul class="sidebar-menu">
                <?php if (is_admin()): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-leaf"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/add-page">
                                <i class="fa fa-circle-o"></i> Add Page
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/pages">
                                <i class="fa fa-circle-o"></i> Pages
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/add-post"> <i class="fa fa-circle-o"></i> Add Post</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/posts"><i class="fa fa-circle-o"></i> Posts</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/featured-posts"><i class="fa fa-circle-o"></i> Featured Posts</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/featured-slider-posts"><i class="fa fa-circle-o"></i> Featured Slider Posts</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/breaking-news"><i class="fa fa-circle-o"></i> Breaking News</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/recommended-posts"><i class="fa fa-circle-o"></i> Recommended Posts</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/pending-posts"><i class="fa fa-circle-o"></i> Pending Posts</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-youtube-play"></i> <span>Videos</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/add-video">
                                <i class="fa fa-circle-o"></i> Add Video
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/videos"><i class="fa fa-circle-o"></i> Videos </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/pending-videos"><i class="fa fa-circle-o"></i> Pending Videos </a>
                        </li>
                    </ul>
                </li>


                <!-- <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder-open"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/categories">
                                <i class="fa fa-circle-o"></i> Categories
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/subcategories"><i class="fa fa-circle-o"></i> Subcategories
                            </a>
                        </li>
                    </ul>
                </li> -->

                <!-- <li class="treeview">
                    <a href="#">
                        <i class="fa fa-th"></i> <span>Widgets</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/add-widget">
                                <i class="fa fa-circle-o"></i> Add Widget
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/widgets">
                                <i class="fa fa-circle-o"></i> Widgets
                            </a>
                        </li>
                    </ul>
                </li> -->
<!-- 
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list"></i> <span>Polls</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/add-poll">
                                <i class="fa fa-circle-o"></i> Add Poll
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/polls">
                                <i class="fa fa-circle-o"></i> Polls
                            </a>
                        </li>
                    </ul>
                </li> -->

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-image"></i> <span>Gallery</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>admin/gallery-categories">
                                <i class="fa fa-circle-o"></i> Categories
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/gallery">
                                <i class="fa fa-circle-o"></i> Images
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo base_url(); ?>admin/contact-messages">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <span>Contact Messages</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="<?php echo base_url(); ?>admin/comments">
                        <i class="fa fa-comments"></i>
                        <span>Comments</span>
                    </a>
                </li> -->

                <!-- <li>
                    <a href="<?php echo base_url(); ?>admin/newsletter">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>Newsletter</span>
                    </a>
                </li> -->

                <!-- <li>
                    <a href="<?php echo base_url(); ?>admin/ads">
                        <i class="fa fa-dollar" aria-hidden="true"></i>
                        <span>Ad Spaces</span>
                    </a>
                </li> -->
                <li>
                    <a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/update-profile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Update Profile</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="<?php echo base_url(); ?>admin/font-options"><i class="fa fa-font" aria-hidden="true"></i>
                        <span>Font Options</span>
                    </a>
                </li> -->
                <!-- <li>
                    <a href="<?php echo base_url(); ?>admin/seo-tools"><i class="fa fa-wrench"></i>
                        <span>Seo Tools</span>
                    </a>
                </li> -->
                <li>
                    <a href="<?php echo base_url(); ?>admin/social-login-configuration"><i class="fa fa-share-alt"></i>
                        <span>Social Login Configuration</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/visual-settings">
                        <i class="fa fa-paint-brush"></i>
                        <span>Visual Settings</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/settings">
                        <i class="fa fa-cogs"></i>
                        <span>Settings</span>
                    </a>
                </li>

                <?php endif; ?>

                <?php if (is_author()): ?>
                <li><a href= "">My Lessons</a></li>
                <li><a href="<?php echo base_url('teacher/my_student');?>">My Student</a></li>
                <li><a href= "">My Wallets</a></li>
                <li><a href= "">My Teacher Profile</a></li>
                <li><a href= "">My Account Setting</a></li>
                <li><a href= "">Support</a></li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/add-post"> <i class="fa fa-circle-o"></i> Add Post</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/author-posts"><i class="fa fa-circle-o"></i> Posts</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/pending-posts"><i class="fa fa-circle-o"></i> Pending Posts</a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-youtube-play"></i> <span>Videos</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/add-video">
                                <i class="fa fa-circle-o"></i> Add Video
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/videos"><i class="fa fa-circle-o"></i> Videos </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>admin/pending-videos"><i class="fa fa-circle-o"></i> Pending Videos </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/update-profile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span>Update Profile</span>
                    </a>
                </li>

                <?php endif; ?>
                <li> <a href="<?php echo base_url(); ?>logout">Logout</a> </li>
                    </ul>
                </section>
                </div>
                </div>
            </div>
        </nav>
    </header>
    <style>
button.dropbtn {
    border-radius: 50%;
    background: #ccc;
    width: 45px;
    display: inline-block;
    position: relative;
    height: 45px;
    top: 4px;
    box-shadow: 0 2px 8px 0 rgba(0,0,0,.25);
    border: 1px solid #fff;
}
.dropbtn img {
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    border-radius: 50%;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
    width: 320px;
    margin: 0;
    padding: 0;
    border-left: 1px solid #eee;
    position: fixed;
    top: 49px;
    right: 250px;
    bottom: 0;
    background-color: #fff;
    overflow-y: auto;
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
    z-index: 999;

  display: none;
  /* position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1; */
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>






































    <!-- Left side column. contains the logo and sidebar -->
    <!-- <aside class="main-sidebar">
       
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url(); ?>assets/admin/img/user.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo html_escape(user()->username); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?php echo base_url(); ?>admin">
                        <i class="fa fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>

                <?php if (is_admin()): ?>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-leaf"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-page">
                                    <i class="fa fa-circle-o"></i> Add Page
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/pages">
                                    <i class="fa fa-circle-o"></i> Pages
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-post"> <i class="fa fa-circle-o"></i> Add Post</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/posts"><i class="fa fa-circle-o"></i> Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/featured-posts"><i class="fa fa-circle-o"></i> Featured Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/featured-slider-posts"><i class="fa fa-circle-o"></i> Featured Slider Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/breaking-news"><i class="fa fa-circle-o"></i> Breaking News</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/recommended-posts"><i class="fa fa-circle-o"></i> Recommended Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/pending-posts"><i class="fa fa-circle-o"></i> Pending Posts</a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-youtube-play"></i> <span>Videos</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-video">
                                    <i class="fa fa-circle-o"></i> Add Video
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/videos"><i class="fa fa-circle-o"></i> Videos </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/pending-videos"><i class="fa fa-circle-o"></i> Pending Videos </a>
                            </li>
                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder-open"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/categories">
                                    <i class="fa fa-circle-o"></i> Categories
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/subcategories"><i class="fa fa-circle-o"></i> Subcategories
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-th"></i> <span>Widgets</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-widget">
                                    <i class="fa fa-circle-o"></i> Add Widget
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/widgets">
                                    <i class="fa fa-circle-o"></i> Widgets
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list"></i> <span>Polls</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-poll">
                                    <i class="fa fa-circle-o"></i> Add Poll
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/polls">
                                    <i class="fa fa-circle-o"></i> Polls
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-image"></i> <span>Gallery</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/gallery-categories">
                                    <i class="fa fa-circle-o"></i> Categories
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/gallery">
                                    <i class="fa fa-circle-o"></i> Images
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>admin/contact-messages">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            <span>Contact Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/comments">
                            <i class="fa fa-comments"></i>
                            <span>Comments</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>admin/newsletter">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>Newsletter</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>admin/ads">
                            <i class="fa fa-dollar" aria-hidden="true"></i>
                            <span>Ad Spaces</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-users"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/update-profile">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Update Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/font-options"><i class="fa fa-font" aria-hidden="true"></i>
                            <span>Font Options</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/seo-tools"><i class="fa fa-wrench"></i>
                            <span>Seo Tools</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/social-login-configuration"><i class="fa fa-share-alt"></i>
                            <span>Social Login Configuration</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/visual-settings">
                            <i class="fa fa-paint-brush"></i>
                            <span>Visual Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/settings">
                            <i class="fa fa-cogs"></i>
                            <span>Settings</span>
                        </a>
                    </li>

                <?php endif; ?>

                <?php if (is_author()): ?>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-post"> <i class="fa fa-circle-o"></i> Add Post</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/author-posts"><i class="fa fa-circle-o"></i> Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/pending-posts"><i class="fa fa-circle-o"></i> Pending Posts</a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-youtube-play"></i> <span>Videos</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-video">
                                    <i class="fa fa-circle-o"></i> Add Video
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/videos"><i class="fa fa-circle-o"></i> Videos </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>admin/pending-videos"><i class="fa fa-circle-o"></i> Pending Videos </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/update-profile">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Update Profile</span>
                        </a>
                    </li>

                <?php endif; ?>
            </ul>
        </section> -->
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

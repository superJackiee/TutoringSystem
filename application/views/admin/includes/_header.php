<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Tutoring Pro<?php // echo html_escape($title); ?>  <?php // echo html_escape($settings->site_title); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" type="image/png" href="<?php echo get_favicon($vsettings);?>"/>

    <!-- Bootstrap 3.3.7 -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css"> -->
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
    <link href='<?php //echo base_url();?>Cassets/css/fullcalendar.css' rel='stylesheet' />
    <link href="<?php echo base_url();?>Cassets/css/bootstrapValidator.min.css" rel="stylesheet" />        
    <script src='<?php echo base_url();?>Cassets/js/moment.min.js'></script>
    <script src='<?php echo base_url();?>Cassets/js/bootstrap-timepicker.min.js'></script>
    <script src="<?php echo base_url();?>Cassets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>Cassets/js/bootstrapValidator.min.js"></script>
    <script src="<?php echo base_url();?>Cassets/js/fullcalendar.min.js"></script>
    <script src='<?php echo base_url();?>Cassets/js/main.js'></script>
    <script>
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>
    <script>
        var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';
        var csfr_token = '<?php echo $this->security->get_csrf_hash(); ?>';
        var base_url = '<?php echo base_url(); ?>';
    </script>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/all.min.css"/>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css" type="text/css"/>
    
        
   </head>
   <body >
      <!------------ header start here ---------------->
      <header>
         <div class="header_sec">
            <nav class="navbar navbar-expand-lg navbar-light">
            <?php if(is_admin() or is_author()){ if(user()->role == "admin"){ ?>
               <a class="navbar-brand" href="<?php echo base_url('dashboard')?>"><b>My Tutoring Pro</b></a>
            <?php } else if(user()->role == "student"){ ?>
                <a class="navbar-brand" href="<?php echo base_url('student')?>"><b>My Tutoring Pro</b></a>
            <?php } else if(user()->role == "teacher"){ ?>
                <a class="navbar-brand" href="<?php echo base_url('teacher')?>"><b>My Tutoring Pro</b></a>
            <?php }}else{
                echo '<a class="navbar-brand" href="'.base_url().'"><b>My Tutoring Pro</b></a>';
            } 
            ?>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse flex-end navmarg" id="navbarSupportedContent">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>">Home </a>
                     </li>
                  <?php if(is_admin() or is_author()){if(user()->role == "teacher" && $mode == 'teacher'){?>     
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('teacher/console?id='.user()->id);?>">Teacher Settings </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('teacher/calender?id='.user()->id);?>">My Schedule </a>
                     </li>
                     <li class="nav-item msg_relative">
                        <a class="nav-link" href="<?php echo base_url(); ?>message">Messages </a>
                        <!-- <div class="msg_reddot"></div> -->
                     </li>
                  <?php }else if(user()->role == "student" || $mode == "student"){?>
                        <li class="nav-item">
                        <a class="nav-link fteachmarg" href="<?php echo base_url('find-teachers')?>">Find Teacher </a>
                        </li>
                        <li class="nav-item msg_relative">
                            <a class="nav-link" href="<?php echo base_url(); ?>message">Messages </a>
                            <!-- <div class="msg_reddot"></div> -->
                        </li>
                     <?php }?>
                     <li class="hover">
                     <div class="profile_image dashboard_login_pro">
                       <img src="<?php echo base_url(user()->avatar) ?>" alt="Profile">

    <div class="hover_nav_sec">
      <ul>
           <?php if(user()->role == "admin"){?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-leaf"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/add-page">
                                <i class="fa fa-circle"></i> Add Page
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?php echo base_url(); ?>admin/pages">
                                <i class="fa fa-circle"></i> Pages
                            </a>
                        </li>
                    </ul>
                </li>
                <!--<li class="treeview">-->
                <!--    <a href="#">-->
                <!--        <i class="fa fa-file"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i>-->
                <!--    </a>-->
                <!--    <ul class="treeview-menu">-->
                <!--        <li class="active">-->
                <!--            <a href="<?php echo base_url(); ?>admin/add-post"> <i class="fa fa-circle-o"></i> Add Post</a>-->
                <!--        </li>-->
                <!--        <li>-->
                <!--            <a href="<?php echo base_url(); ?>admin/posts"><i class="fa fa-circle-o"></i> Posts</a>-->
                <!--        </li>-->
                <!--        <li>-->
                <!--            <a href="<?php echo base_url(); ?>admin/featured-posts"><i class="fa fa-circle-o"></i> Featured Posts</a>-->
                <!--        </li>-->
                <!--        <li>-->
                <!--            <a href="<?php echo base_url(); ?>admin/featured-slider-posts"><i class="fa fa-circle-o"></i> Featured Slider Posts</a>-->
                <!--        </li>-->
                        <!-- <li> -->
                            <!-- <a href="<?php echo base_url(); ?>admin/breaking-news"><i class="fa fa-circle-o"></i> Breaking News</a>
                      </li>-->
                <!--        <li>-->
                <!--            <a href="<?php echo base_url(); ?>admin/recommended-posts"><i class="fa fa-circle-o"></i> Recommended Posts</a>-->
                <!--        </li> -->
                <!--        <li>-->
                <!--            <a href="<?php echo base_url(); ?>admin/pending-posts"><i class="fa fa-circle-o"></i> Pending Posts</a>-->
                <!--        </li>-->
                <!--    </ul>-->
                <!--</li>-->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i> <span>Section</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>home/add_section">
                                <i class="fa fa-circle-o"></i> Add Section
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>home/view_section"><i class="fa fa-circle-o"></i>View Section</a>
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
                            <a href="<?php echo base_url(); ?>admin/gallery">
                                <i class="fa fa-circle-o"></i> Images
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>admin/gallery-categories">
                                <i class="fa fa-circle-o"></i> Categories
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-image"></i> <span>Slider</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                         <li>
                            <a href="<?php echo base_url(); ?>gallery/slider">
                                <i class="fa fa-circle-o"></i> Slider
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i> <span>Testimonial</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active">
                            <a href="<?php echo base_url(); ?>home/testimonial">
                                <i class="fa fa-circle-o"></i> Add Testimonial
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>home/view_testimonial"><i class="fa fa-circle-o"></i>View Testimonail</a>
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
                    <a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/update-profile">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2.5C6.75253 2.5 2.49927 6.75257 2.49927 12C2.49927 17.2466 6.75255 21.4999 12 21.4999C17.2467 21.4999 21.5 17.2466 21.5 12C21.5 6.75255 17.2467 2.5 12 2.5ZM1.49927 12C1.49927 6.20019 6.20034 1.5 12 1.5C17.7989 1.5 22.5 6.20021 22.5 12C22.5 17.7989 17.7989 22.4999 12 22.4999C6.20032 22.4999 1.49927 17.7989 1.49927 12Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M12.0016 7.63525C10.6807 7.63525 9.6106 8.70592 9.6106 10.0263C9.6106 11.3466 10.6807 12.4173 12.0016 12.4173C13.321 12.4173 14.3918 11.3466 14.3918 10.0263C14.3918 8.70592 13.321 7.63525 12.0016 7.63525ZM8.6106 10.0263C8.6106 8.15381 10.1282 6.63525 12.0016 6.63525C13.8734 6.63525 15.3918 8.15381 15.3918 10.0263C15.3918 11.8987 13.8734 13.4173 12.0016 13.4173C10.1282 13.4173 8.6106 11.8987 8.6106 10.0263Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M7.71795 15.5242C8.94227 14.7993 10.471 14.6465 11.9997 14.6465C12.2759 14.6465 12.4997 14.8703 12.4997 15.1465C12.4997 15.4226 12.2759 15.6465 11.9997 15.6465C10.502 15.6465 9.20662 15.8049 8.22743 16.3847C7.2852 16.9426 6.55899 17.9391 6.30256 19.8105C6.26507 20.0841 6.0129 20.2755 5.73931 20.238C5.46573 20.2005 5.27433 19.9483 5.31182 19.6748C5.59987 17.5725 6.45666 16.271 7.71795 15.5242Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M11.5032 15.1465C11.5032 14.8703 11.727 14.6465 12.0032 14.6465C13.5319 14.6465 15.0606 14.7993 16.285 15.5242C17.5463 16.271 18.403 17.5725 18.6911 19.6748C18.7286 19.9483 18.5372 20.2005 18.2636 20.238C17.99 20.2755 17.7378 20.0841 17.7004 19.8105C17.4439 17.9391 16.7177 16.9426 15.7755 16.3847C14.7963 15.8049 13.5009 15.6465 12.0032 15.6465C11.727 15.6465 11.5032 15.4226 11.5032 15.1465Z" fill="#333333"></path></svg>
                    <span>Update Profile</span>
                    </a>
                </li>
                <!--<li>-->
                <!--    <a href="<?php echo base_url(); ?>admin/social-login-configuration"><i class="fa fa-share-alt"></i>-->
                <!--        <span>Social Login Configuration</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li>
                    <a href="<?php echo base_url(); ?>admin/visual-settings">
                        <i class="fa fa-paint-brush"></i>
                        <span>Visual Settings</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/settings">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.44238 15.7427C8.44238 16.0188 8.66624 16.2427 8.94238 16.2427H21C21.2762 16.2427 21.5 16.0188 21.5 15.7427C21.5 15.4665 21.2762 15.2427 21 15.2427L8.94238 15.2427C8.66624 15.2427 8.44238 15.4665 8.44238 15.7427Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M5.90223 18.1836C4.5546 18.1836 3.46191 17.0905 3.46191 15.7426C3.46191 14.3949 4.55446 13.3023 5.90223 13.3023C7.25 13.3023 8.34254 14.3949 8.34254 15.7426C8.34254 17.0905 7.24985 18.1836 5.90223 18.1836ZM2.46191 15.7426C2.46191 17.6425 4.00203 19.1836 5.90223 19.1836C7.80242 19.1836 9.34254 17.6425 9.34254 15.7426C9.34254 13.8426 7.80228 12.3023 5.90223 12.3023C4.00217 12.3023 2.46191 13.8426 2.46191 15.7426Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 9C2.5 8.72386 2.72386 8.5 3 8.5H11C11.2761 8.5 11.5 8.72386 11.5 9C11.5 9.27614 11.2761 9.5 11 9.5H3C2.72386 9.5 2.5 9.27614 2.5 9Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M17 9C17 8.72386 17.2239 8.5 17.5 8.5L21 8.5C21.2761 8.5 21.5 8.72386 21.5 9C21.5 9.27614 21.2761 9.5 21 9.5L17.5 9.5C17.2239 9.5 17 9.27614 17 9Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14.243 6.229C12.8945 6.229 11.802 7.32162 11.802 8.66932C11.802 10.0172 12.8946 11.1103 14.243 11.1103C15.5906 11.1103 16.6833 10.0172 16.6833 8.66932C16.6833 7.32155 15.5907 6.229 14.243 6.229ZM10.802 8.66932C10.802 6.76919 12.3423 5.229 14.243 5.229C16.143 5.229 17.6833 6.76926 17.6833 8.66932C17.6833 10.5692 16.1432 12.1103 14.243 12.1103C12.3422 12.1103 10.802 10.5693 10.802 8.66932Z" fill="#333333"></path></svg>
                    <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>logout">
                    <svg width="24" height="24" viewBox="0 0 24 24"fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.016 4.5C6.86938 4.5 3.5 7.89332 3.5 12.0884C3.5 16.2839 6.86936 19.6767 11.016 19.6767C12.2827 19.6767 13.4756 19.3604 14.5221 18.8026C14.7658 18.6727 15.0686 18.765 15.1985 19.0087C15.3284 19.2524 15.2361 19.5552 14.9925 19.6851C13.8052 20.3179 12.4512 20.6767 11.016 20.6767C6.30866 20.6767 2.5 16.8278 2.5 12.0884C2.5 7.34953 6.30864 3.5 11.016 3.5C12.7798 3.5 14.4196 4.04184 15.7795 4.96827C16.0077 5.12374 16.0666 5.43479 15.9112 5.663C15.7557 5.89122 15.4447 5.95019 15.2164 5.79471C14.0166 4.97729 12.5718 4.5 11.016 4.5Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.28906 12.0889C8.28906 11.8127 8.51292 11.5889 8.78906 11.5889H20.7243C21.0004 11.5889 21.2243 11.8127 21.2243 12.0889C21.2243 12.365 21.0004 12.5889 20.7243 12.5889H8.78906C8.51292 12.5889 8.28906 12.365 8.28906 12.0889Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M21.0763 11.7337C21.2724 11.9281 21.2739 12.2447 21.0795 12.4408L17.1672 16.3885C16.9728 16.5846 16.6562 16.586 16.4601 16.3917C16.2639 16.1973 16.2625 15.8807 16.4569 15.6846L20.3692 11.7369C20.5636 11.5408 20.8802 11.5393 21.0763 11.7337Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M16.46 7.78649C16.6562 7.59209 16.9727 7.59349 17.1671 7.78962L21.0794 11.7367C21.2738 11.9329 21.2724 12.2494 21.0763 12.4438C20.8802 12.6382 20.5636 12.6368 20.3692 12.4407L16.4569 8.49359C16.2625 8.29746 16.2639 7.98088 16.46 7.78649Z" fill="#333333"></path></svg>
                    Logout
                    </a>
                </li>
                
           <?php }
           else if(user()->role == "student" || $mode == "student") {?>
            <li>
            <a href="<?php echo base_url('student/lesson'); ?>">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.8897 20.1049H2.3168C2.14193 20.1049 2 19.963 2 19.7881V3.31436C2 3.13949 2.14193 2.99756 2.3168 2.99756H16.8897C17.0646 2.99756 17.2065 3.13949 17.2065 3.31436V19.7881C17.2065 19.963 17.0646 20.1049 16.8897 20.1049Z" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.416 12.3472L22 13.9312" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M13.0881 4.32248C13.0881 4.46187 12.974 4.57592 12.8346 4.57592H6.37185C6.23246 4.57592 6.11841 4.46187 6.11841 4.32248V2.29495C6.11841 2.15555 6.23246 2.0415 6.37185 2.0415H12.8346C12.974 2.0415 13.0881 2.15555 13.0881 2.29495V4.32248Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M13.0881 4.32248C13.0881 4.46188 12.974 4.57592 12.8346 4.57592H6.37185C6.23246 4.57592 6.11841 4.46188 6.11841 4.32248V2.29495C6.11841 2.15555 6.23246 2.0415 6.37185 2.0415H12.8346C12.974 2.0415 13.0881 2.15555 13.0881 2.29495V4.32248Z" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M21.1664 17.5646C21.1664 20.0141 19.1807 21.9999 16.7311 21.9999C14.2816 21.9999 12.2959 20.0141 12.2959 17.5646C12.2959 15.1151 14.2816 13.1294 16.7311 13.1294C19.1807 13.1294 21.1664 15.1151 21.1664 17.5646Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M21.1664 17.5646C21.1664 20.0141 19.1807 21.9999 16.7311 21.9999C14.2816 21.9999 12.2959 20.0141 12.2959 17.5646C12.2959 15.1151 14.2816 13.1294 16.7311 13.1294C19.1807 13.1294 21.1664 15.1151 21.1664 17.5646Z" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            My Lessons</a>
            </li>
            <li>
            <a href="<?php echo base_url('student/teacher'); ?>">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.1429 4.56981L2.3683 9.9188L12.1429 15.2672L21.9174 9.9188L12.1429 4.56981ZM11.708 3.66785C11.9789 3.51957 12.3068 3.51957 12.5777 3.66785L22.5484 9.12413C23.1764 9.46781 23.1764 10.3698 22.5483 10.7135L12.5777 16.1692C12.3068 16.3175 11.979 16.3175 11.708 16.1692L1.7374 10.7135C1.10936 10.3698 1.10934 9.46781 1.73737 9.12413L11.708 3.66785Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M5.03003 16.2875V12.2656H6.03003V16.2875C6.03003 17.1551 6.61119 18.0232 7.72645 18.7008C8.8327 19.3729 10.393 19.8049 12.1431 19.8049C13.8927 19.8049 15.4526 19.3729 16.5587 18.7008C17.6738 18.0232 18.255 17.1551 18.255 16.2875V12.2656H19.255V16.2875C19.255 17.6382 18.3559 18.7788 17.078 19.5554C15.791 20.3374 14.045 20.8049 12.1431 20.8049C10.2407 20.8049 8.49436 20.3374 7.20722 19.5554C5.92909 18.7788 5.03003 17.6382 5.03003 16.2875Z" fill="#333333"></path></svg>
            My Teachers
            </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>teacher/Wallet">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2.5" y="3.5" width="19" height="17" rx="1.5" stroke="#333333"></rect><path d="M14.5 11C14.5 10.1716 15.1716 9.5 16 9.5H21.5V14.5H16C15.1716 14.5 14.5 13.8284 14.5 13V11Z" stroke="#333333"></path></svg>
                My Wallet</a>
            </li>
            <li>
            <a href="<?php echo base_url('student/profile'); ?>">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2.5C6.75253 2.5 2.49927 6.75257 2.49927 12C2.49927 17.2466 6.75255 21.4999 12 21.4999C17.2467 21.4999 21.5 17.2466 21.5 12C21.5 6.75255 17.2467 2.5 12 2.5ZM1.49927 12C1.49927 6.20019 6.20034 1.5 12 1.5C17.7989 1.5 22.5 6.20021 22.5 12C22.5 17.7989 17.7989 22.4999 12 22.4999C6.20032 22.4999 1.49927 17.7989 1.49927 12Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M12.0016 7.63525C10.6807 7.63525 9.6106 8.70592 9.6106 10.0263C9.6106 11.3466 10.6807 12.4173 12.0016 12.4173C13.321 12.4173 14.3918 11.3466 14.3918 10.0263C14.3918 8.70592 13.321 7.63525 12.0016 7.63525ZM8.6106 10.0263C8.6106 8.15381 10.1282 6.63525 12.0016 6.63525C13.8734 6.63525 15.3918 8.15381 15.3918 10.0263C15.3918 11.8987 13.8734 13.4173 12.0016 13.4173C10.1282 13.4173 8.6106 11.8987 8.6106 10.0263Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M7.71795 15.5242C8.94227 14.7993 10.471 14.6465 11.9997 14.6465C12.2759 14.6465 12.4997 14.8703 12.4997 15.1465C12.4997 15.4226 12.2759 15.6465 11.9997 15.6465C10.502 15.6465 9.20662 15.8049 8.22743 16.3847C7.2852 16.9426 6.55899 17.9391 6.30256 19.8105C6.26507 20.0841 6.0129 20.2755 5.73931 20.238C5.46573 20.2005 5.27433 19.9483 5.31182 19.6748C5.59987 17.5725 6.45666 16.271 7.71795 15.5242Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M11.5032 15.1465C11.5032 14.8703 11.727 14.6465 12.0032 14.6465C13.5319 14.6465 15.0606 14.7993 16.285 15.5242C17.5463 16.271 18.403 17.5725 18.6911 19.6748C18.7286 19.9483 18.5372 20.2005 18.2636 20.238C17.99 20.2755 17.7378 20.0841 17.7004 19.8105C17.4439 17.9391 16.7177 16.9426 15.7755 16.3847C14.7963 15.8049 13.5009 15.6465 12.0032 15.6465C11.727 15.6465 11.5032 15.4226 11.5032 15.1465Z" fill="#333333"></path></svg>
            Profile
         </a>
         </li>
            <?php 
                if (user()->role == 'teacher'){
            ?>
            <li>
                <a href="<?php echo base_url('teacher/index'); ?>">
                <svg class="svg-icon" width="24" height="24" viewBox="0 0 20 20"><path d="M12.546,4.6h-5.2C4.398,4.6,2,7.022,2,10c0,2.978,2.398,5.4,5.346,5.4h5.2C15.552,15.4,18,12.978,18,10C18,7.022,15.552,4.6,12.546,4.6 M12.546,14.6h-5.2C4.838,14.6,2.8,12.536,2.8,10s2.038-4.6,4.546-4.6h5.2c2.522,0,4.654,2.106,4.654,4.6S15.068,14.6,12.546,14.6 M12.562,6.2C10.488,6.2,8.8,7.904,8.8,10c0,2.096,1.688,3.8,3.763,3.8c2.115,0,3.838-1.706,3.838-3.8C16.4,7.904,14.678,6.2,12.562,6.2 M12.562,13C10.93,13,9.6,11.654,9.6,10c0-1.654,1.33-3,2.962-3C14.21,7,15.6,8.374,15.6,10S14.208,13,12.562,13"></path></svg>
                Switching to teacher mode
                </a>
            </li>
            <?php
                }
            ?>         
         <li>
            <a href="<?php echo base_url('teacher/account')?>">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.44238 15.7427C8.44238 16.0188 8.66624 16.2427 8.94238 16.2427H21C21.2762 16.2427 21.5 16.0188 21.5 15.7427C21.5 15.4665 21.2762 15.2427 21 15.2427L8.94238 15.2427C8.66624 15.2427 8.44238 15.4665 8.44238 15.7427Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M5.90223 18.1836C4.5546 18.1836 3.46191 17.0905 3.46191 15.7426C3.46191 14.3949 4.55446 13.3023 5.90223 13.3023C7.25 13.3023 8.34254 14.3949 8.34254 15.7426C8.34254 17.0905 7.24985 18.1836 5.90223 18.1836ZM2.46191 15.7426C2.46191 17.6425 4.00203 19.1836 5.90223 19.1836C7.80242 19.1836 9.34254 17.6425 9.34254 15.7426C9.34254 13.8426 7.80228 12.3023 5.90223 12.3023C4.00217 12.3023 2.46191 13.8426 2.46191 15.7426Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 9C2.5 8.72386 2.72386 8.5 3 8.5H11C11.2761 8.5 11.5 8.72386 11.5 9C11.5 9.27614 11.2761 9.5 11 9.5H3C2.72386 9.5 2.5 9.27614 2.5 9Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M17 9C17 8.72386 17.2239 8.5 17.5 8.5L21 8.5C21.2761 8.5 21.5 8.72386 21.5 9C21.5 9.27614 21.2761 9.5 21 9.5L17.5 9.5C17.2239 9.5 17 9.27614 17 9Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14.243 6.229C12.8945 6.229 11.802 7.32162 11.802 8.66932C11.802 10.0172 12.8946 11.1103 14.243 11.1103C15.5906 11.1103 16.6833 10.0172 16.6833 8.66932C16.6833 7.32155 15.5907 6.229 14.243 6.229ZM10.802 8.66932C10.802 6.76919 12.3423 5.229 14.243 5.229C16.143 5.229 17.6833 6.76926 17.6833 8.66932C17.6833 10.5692 16.1432 12.1103 14.243 12.1103C12.3422 12.1103 10.802 10.5693 10.802 8.66932Z" fill="#333333"></path></svg>
            Settings
         </a>
         </li>
         <li>
            <a href="<?php echo base_url('student/referral')?>">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.65 6H4.35C4.10147 6 3.9 6.22386 3.9 6.5V8.5C3.9 8.77614 4.10147 9 4.35 9H19.65C19.8985 9 20.1 8.77614 20.1 8.5V6.5C20.1 6.22386 19.8985 6 19.65 6ZM4.35 5C3.60442 5 3 5.67157 3 6.5V8.5C3 9.32843 3.60442 10 4.35 10H19.65C20.3956 10 21 9.32843 21 8.5V6.5C21 5.67157 20.3956 5 19.65 5H4.35Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M19.1111 10H4.88889V19C4.88889 19.5523 5.28686 20 5.77778 20H18.2222C18.7131 20 19.1111 19.5523 19.1111 19V10ZM4 9V19C4 20.1046 4.79594 21 5.77778 21H18.2222C19.2041 21 20 20.1046 20 19V9H4Z" fill="#333333"></path><path d="M11.5 5H12.5V20H11.5V5Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14.4751 4.70711L14.4741 4.70759C14.4633 4.71508 14.3809 4.77222 14.1516 4.81997C13.9151 4.86923 13.6216 4.88808 13.3115 4.88397C13.1694 4.88209 13.0308 4.87551 12.9015 4.86647C12.8925 4.73721 12.8859 4.59856 12.884 4.45643C12.8799 4.14637 12.8987 3.85288 12.948 3.61638C12.9958 3.3871 13.0529 3.30465 13.0604 3.29386L13.0609 3.29289C13.4514 2.90237 14.0846 2.90237 14.4751 3.29289C14.8656 3.68342 14.8656 4.31658 14.4751 4.70711ZM15.1822 5.41421C14.4011 6.19526 12.0002 5.76777 12.0002 5.76777C12.0002 5.76777 12.0002 5.76776 12.0002 5.76774C12.0002 5.76777 12.0002 5.76778 12.0002 5.76778C12.0002 5.76778 9.59926 6.19528 8.81821 5.41423C8.03716 4.63318 8.03716 3.36685 8.81821 2.5858C9.59926 1.80475 10.8656 1.80475 11.6466 2.5858C11.8154 2.75459 11.9278 2.99904 12.0002 3.27855C12.0726 2.99903 12.185 2.75458 12.3538 2.58579C13.1348 1.80474 14.4011 1.80474 15.1822 2.58579C15.9632 3.36683 15.9632 4.63316 15.1822 5.41421ZM10.9395 3.29291L10.94 3.29387C10.9475 3.30467 11.0046 3.38712 11.0524 3.61639C11.1016 3.85289 11.1205 4.14638 11.1164 4.45644C11.1145 4.59858 11.1079 4.73722 11.0989 4.86649C10.9696 4.87553 10.831 4.8821 10.6888 4.88399C10.3788 4.88809 10.0853 4.86924 9.8488 4.81998C9.61952 4.77223 9.53707 4.71509 9.52628 4.70761L9.52532 4.70712C9.13479 4.3166 9.13479 3.68343 9.52532 3.29291C9.91584 2.90238 10.549 2.90238 10.9395 3.29291Z" fill="#333333"></path></svg>
            Refer a Friend
         </a>
         </li>
         <li>
            <a href="<?php echo base_url(); ?>logout">
            <svg width="24" height="24" viewBox="0 0 24 24"fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.016 4.5C6.86938 4.5 3.5 7.89332 3.5 12.0884C3.5 16.2839 6.86936 19.6767 11.016 19.6767C12.2827 19.6767 13.4756 19.3604 14.5221 18.8026C14.7658 18.6727 15.0686 18.765 15.1985 19.0087C15.3284 19.2524 15.2361 19.5552 14.9925 19.6851C13.8052 20.3179 12.4512 20.6767 11.016 20.6767C6.30866 20.6767 2.5 16.8278 2.5 12.0884C2.5 7.34953 6.30864 3.5 11.016 3.5C12.7798 3.5 14.4196 4.04184 15.7795 4.96827C16.0077 5.12374 16.0666 5.43479 15.9112 5.663C15.7557 5.89122 15.4447 5.95019 15.2164 5.79471C14.0166 4.97729 12.5718 4.5 11.016 4.5Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.28906 12.0889C8.28906 11.8127 8.51292 11.5889 8.78906 11.5889H20.7243C21.0004 11.5889 21.2243 11.8127 21.2243 12.0889C21.2243 12.365 21.0004 12.5889 20.7243 12.5889H8.78906C8.51292 12.5889 8.28906 12.365 8.28906 12.0889Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M21.0763 11.7337C21.2724 11.9281 21.2739 12.2447 21.0795 12.4408L17.1672 16.3885C16.9728 16.5846 16.6562 16.586 16.4601 16.3917C16.2639 16.1973 16.2625 15.8807 16.4569 15.6846L20.3692 11.7369C20.5636 11.5408 20.8802 11.5393 21.0763 11.7337Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M16.46 7.78649C16.6562 7.59209 16.9727 7.59349 17.1671 7.78962L21.0794 11.7367C21.2738 11.9329 21.2724 12.2494 21.0763 12.4438C20.8802 12.6382 20.5636 12.6368 20.3692 12.4407L16.4569 8.49359C16.2625 8.29746 16.2639 7.98088 16.46 7.78649Z" fill="#333333"></path></svg>
            Logout
            </a>
        </li>
         <?php }else if(user()->role == "teacher"){ ?>
            <li><a href="<?php echo base_url('teacher/lessons'); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16.8897 20.1049H2.3168C2.14193 20.1049 2 19.963 2 19.7881V3.31436C2 3.13949 2.14193 2.99756 2.3168 2.99756H16.8897C17.0646 2.99756 17.2065 3.13949 17.2065 3.31436V19.7881C17.2065 19.963 17.0646 20.1049 16.8897 20.1049Z" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"></path><path d="M20.416 12.3472L22 13.9312" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M13.0881 4.32248C13.0881 4.46187 12.974 4.57592 12.8346 4.57592H6.37185C6.23246 4.57592 6.11841 4.46187 6.11841 4.32248V2.29495C6.11841 2.15555 6.23246 2.0415 6.37185 2.0415H12.8346C12.974 2.0415 13.0881 2.15555 13.0881 2.29495V4.32248Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M13.0881 4.32248C13.0881 4.46188 12.974 4.57592 12.8346 4.57592H6.37185C6.23246 4.57592 6.11841 4.46188 6.11841 4.32248V2.29495C6.11841 2.15555 6.23246 2.0415 6.37185 2.0415H12.8346C12.974 2.0415 13.0881 2.15555 13.0881 2.29495V4.32248Z" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M21.1664 17.5646C21.1664 20.0141 19.1807 21.9999 16.7311 21.9999C14.2816 21.9999 12.2959 20.0141 12.2959 17.5646C12.2959 15.1151 14.2816 13.1294 16.7311 13.1294C19.1807 13.1294 21.1664 15.1151 21.1664 17.5646Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M21.1664 17.5646C21.1664 20.0141 19.1807 21.9999 16.7311 21.9999C14.2816 21.9999 12.2959 20.0141 12.2959 17.5646C12.2959 15.1151 14.2816 13.1294 16.7311 13.1294C19.1807 13.1294 21.1664 15.1151 21.1664 17.5646Z" stroke="#333333" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            My Lessons</a></li>
            <li>
            <a href="<?php echo base_url(); ?>teacher/my_student">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12.1429 4.56981L2.3683 9.9188L12.1429 15.2672L21.9174 9.9188L12.1429 4.56981ZM11.708 3.66785C11.9789 3.51957 12.3068 3.51957 12.5777 3.66785L22.5484 9.12413C23.1764 9.46781 23.1764 10.3698 22.5483 10.7135L12.5777 16.1692C12.3068 16.3175 11.979 16.3175 11.708 16.1692L1.7374 10.7135C1.10936 10.3698 1.10934 9.46781 1.73737 9.12413L11.708 3.66785Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M5.03003 16.2875V12.2656H6.03003V16.2875C6.03003 17.1551 6.61119 18.0232 7.72645 18.7008C8.8327 19.3729 10.393 19.8049 12.1431 19.8049C13.8927 19.8049 15.4526 19.3729 16.5587 18.7008C17.6738 18.0232 18.255 17.1551 18.255 16.2875V12.2656H19.255V16.2875C19.255 17.6382 18.3559 18.7788 17.078 19.5554C15.791 20.3374 14.045 20.8049 12.1431 20.8049C10.2407 20.8049 8.49436 20.3374 7.20722 19.5554C5.92909 18.7788 5.03003 17.6382 5.03003 16.2875Z" fill="#333333"></path></svg>
            My Students
            </a>
         </li>
         <li>
            <a href="<?php echo base_url(); ?>teacher/Wallet">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2.5" y="3.5" width="19" height="17" rx="1.5" stroke="#333333"></rect><path d="M14.5 11C14.5 10.1716 15.1716 9.5 16 9.5H21.5V14.5H16C15.1716 14.5 14.5 13.8284 14.5 13V11Z" stroke="#333333"></path></svg>
            My Wallet</a>
         </li>
         <li>
            <a href="<?php echo base_url('teacher/profile?id='.user()->id); ?>">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2.5C6.75253 2.5 2.49927 6.75257 2.49927 12C2.49927 17.2466 6.75255 21.4999 12 21.4999C17.2467 21.4999 21.5 17.2466 21.5 12C21.5 6.75255 17.2467 2.5 12 2.5ZM1.49927 12C1.49927 6.20019 6.20034 1.5 12 1.5C17.7989 1.5 22.5 6.20021 22.5 12C22.5 17.7989 17.7989 22.4999 12 22.4999C6.20032 22.4999 1.49927 17.7989 1.49927 12Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M12.0016 7.63525C10.6807 7.63525 9.6106 8.70592 9.6106 10.0263C9.6106 11.3466 10.6807 12.4173 12.0016 12.4173C13.321 12.4173 14.3918 11.3466 14.3918 10.0263C14.3918 8.70592 13.321 7.63525 12.0016 7.63525ZM8.6106 10.0263C8.6106 8.15381 10.1282 6.63525 12.0016 6.63525C13.8734 6.63525 15.3918 8.15381 15.3918 10.0263C15.3918 11.8987 13.8734 13.4173 12.0016 13.4173C10.1282 13.4173 8.6106 11.8987 8.6106 10.0263Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M7.71795 15.5242C8.94227 14.7993 10.471 14.6465 11.9997 14.6465C12.2759 14.6465 12.4997 14.8703 12.4997 15.1465C12.4997 15.4226 12.2759 15.6465 11.9997 15.6465C10.502 15.6465 9.20662 15.8049 8.22743 16.3847C7.2852 16.9426 6.55899 17.9391 6.30256 19.8105C6.26507 20.0841 6.0129 20.2755 5.73931 20.238C5.46573 20.2005 5.27433 19.9483 5.31182 19.6748C5.59987 17.5725 6.45666 16.271 7.71795 15.5242Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M11.5032 15.1465C11.5032 14.8703 11.727 14.6465 12.0032 14.6465C13.5319 14.6465 15.0606 14.7993 16.285 15.5242C17.5463 16.271 18.403 17.5725 18.6911 19.6748C18.7286 19.9483 18.5372 20.2005 18.2636 20.238C17.99 20.2755 17.7378 20.0841 17.7004 19.8105C17.4439 17.9391 16.7177 16.9426 15.7755 16.3847C14.7963 15.8049 13.5009 15.6465 12.0032 15.6465C11.727 15.6465 11.5032 15.4226 11.5032 15.1465Z" fill="#333333"></path></svg>
            Profile
         </a>
         </li>
         <li>
            <a href="<?php echo base_url('student/index'); ?>">
            <svg class="svg-icon" width="24" height="24" viewBox="0 0 20 20"><path d="M12.546,4.6h-5.2C4.398,4.6,2,7.022,2,10c0,2.978,2.398,5.4,5.346,5.4h5.2C15.552,15.4,18,12.978,18,10C18,7.022,15.552,4.6,12.546,4.6 M12.546,14.6h-5.2C4.838,14.6,2.8,12.536,2.8,10s2.038-4.6,4.546-4.6h5.2c2.522,0,4.654,2.106,4.654,4.6S15.068,14.6,12.546,14.6 M12.562,6.2C10.488,6.2,8.8,7.904,8.8,10c0,2.096,1.688,3.8,3.763,3.8c2.115,0,3.838-1.706,3.838-3.8C16.4,7.904,14.678,6.2,12.562,6.2 M12.562,13C10.93,13,9.6,11.654,9.6,10c0-1.654,1.33-3,2.962-3C14.21,7,15.6,8.374,15.6,10S14.208,13,12.562,13"></path></svg>
            Switching to learning mode
            </a>
         </li>
         <li>
            <a href="<?php echo base_url('teacher/account')?>">
               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.44238 15.7427C8.44238 16.0188 8.66624 16.2427 8.94238 16.2427H21C21.2762 16.2427 21.5 16.0188 21.5 15.7427C21.5 15.4665 21.2762 15.2427 21 15.2427L8.94238 15.2427C8.66624 15.2427 8.44238 15.4665 8.44238 15.7427Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M5.90223 18.1836C4.5546 18.1836 3.46191 17.0905 3.46191 15.7426C3.46191 14.3949 4.55446 13.3023 5.90223 13.3023C7.25 13.3023 8.34254 14.3949 8.34254 15.7426C8.34254 17.0905 7.24985 18.1836 5.90223 18.1836ZM2.46191 15.7426C2.46191 17.6425 4.00203 19.1836 5.90223 19.1836C7.80242 19.1836 9.34254 17.6425 9.34254 15.7426C9.34254 13.8426 7.80228 12.3023 5.90223 12.3023C4.00217 12.3023 2.46191 13.8426 2.46191 15.7426Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 9C2.5 8.72386 2.72386 8.5 3 8.5H11C11.2761 8.5 11.5 8.72386 11.5 9C11.5 9.27614 11.2761 9.5 11 9.5H3C2.72386 9.5 2.5 9.27614 2.5 9Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M17 9C17 8.72386 17.2239 8.5 17.5 8.5L21 8.5C21.2761 8.5 21.5 8.72386 21.5 9C21.5 9.27614 21.2761 9.5 21 9.5L17.5 9.5C17.2239 9.5 17 9.27614 17 9Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14.243 6.229C12.8945 6.229 11.802 7.32162 11.802 8.66932C11.802 10.0172 12.8946 11.1103 14.243 11.1103C15.5906 11.1103 16.6833 10.0172 16.6833 8.66932C16.6833 7.32155 15.5907 6.229 14.243 6.229ZM10.802 8.66932C10.802 6.76919 12.3423 5.229 14.243 5.229C16.143 5.229 17.6833 6.76926 17.6833 8.66932C17.6833 10.5692 16.1432 12.1103 14.243 12.1103C12.3422 12.1103 10.802 10.5693 10.802 8.66932Z" fill="#333333"></path></svg>
            Settings
            </a>
         </li>
         <li>
            <a href="<?php echo base_url(); ?>logout">
                <svg width="24" height="24" viewBox="0 0 24 24"fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.016 4.5C6.86938 4.5 3.5 7.89332 3.5 12.0884C3.5 16.2839 6.86936 19.6767 11.016 19.6767C12.2827 19.6767 13.4756 19.3604 14.5221 18.8026C14.7658 18.6727 15.0686 18.765 15.1985 19.0087C15.3284 19.2524 15.2361 19.5552 14.9925 19.6851C13.8052 20.3179 12.4512 20.6767 11.016 20.6767C6.30866 20.6767 2.5 16.8278 2.5 12.0884C2.5 7.34953 6.30864 3.5 11.016 3.5C12.7798 3.5 14.4196 4.04184 15.7795 4.96827C16.0077 5.12374 16.0666 5.43479 15.9112 5.663C15.7557 5.89122 15.4447 5.95019 15.2164 5.79471C14.0166 4.97729 12.5718 4.5 11.016 4.5Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.28906 12.0889C8.28906 11.8127 8.51292 11.5889 8.78906 11.5889H20.7243C21.0004 11.5889 21.2243 11.8127 21.2243 12.0889C21.2243 12.365 21.0004 12.5889 20.7243 12.5889H8.78906C8.51292 12.5889 8.28906 12.365 8.28906 12.0889Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M21.0763 11.7337C21.2724 11.9281 21.2739 12.2447 21.0795 12.4408L17.1672 16.3885C16.9728 16.5846 16.6562 16.586 16.4601 16.3917C16.2639 16.1973 16.2625 15.8807 16.4569 15.6846L20.3692 11.7369C20.5636 11.5408 20.8802 11.5393 21.0763 11.7337Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M16.46 7.78649C16.6562 7.59209 16.9727 7.59349 17.1671 7.78962L21.0794 11.7367C21.2738 11.9329 21.2724 12.2494 21.0763 12.4438C20.8802 12.6382 20.5636 12.6368 20.3692 12.4407L16.4569 8.49359C16.2625 8.29746 16.2639 7.98088 16.46 7.78649Z" fill="#333333"></path></svg>
            Logout
         </a>
         </li>
       
         <?php } }else{?>
            <form class="form-inline my-2 my-lg-0">
                <a class="home_b sub_btn" href="<?php echo base_url();?>login" >
                Login</a>
                <a class="sub_btn" href="<?php echo base_url();?>Auth/student_register" >
                Become a Student
                </a>
                <a class="sub_btn" href="<?php echo base_url();?>Auth/teacher_acknowlegment">
                Become a Tutor
                </a>
            </form>           
        <?php  }?>
         
       
         
         <!-- <li>
            <a href="javascript:void(0);">

               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16 7H8C5.23858 7 3 9.23858 3 12C3 14.7614 5.23858 17 8 17H16C18.7614 17 21 14.7614 21 12C21 9.23858 18.7614 7 16 7ZM8 6C4.68629 6 2 8.68629 2 12C2 15.3137 4.68629 18 8 18H16C19.3137 18 22 15.3137 22 12C22 8.68629 19.3137 6 16 6H8Z" fill="#333333"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8 15C9.65685 15 11 13.6569 11 12C11 10.3431 9.65685 9 8 9C6.34315 9 5 10.3431 5 12C5 13.6569 6.34315 15 8 15ZM8 16C10.2091 16 12 14.2091 12 12C12 9.79086 10.2091 8 8 8C5.79086 8 4 9.79086 4 12C4 14.2091 5.79086 16 8 16Z" fill="#333333"></path></svg>
            Switch to Teacher Mode
         </a>
         </li> -->
        
      </ul>
   </div>

                        </div>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </header>
      <!--------------------------- header end here ---------------------------->
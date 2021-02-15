<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo html_escape($title); ?> - <?php echo html_escape($settings->site_title); ?></title>
		<meta name="description" content="<?php echo html_escape($description); ?>"/>
        <meta name="keywords" content="<?php echo html_escape($keywords); ?>"/>
        <meta name="author" content="EkamSoftwares"/>
        <meta name="robots" content="all"/>
        <meta name="revisit-after" content="1 Days"/>
        <meta property=og:locale content=en_US/>
        <meta property=og:site_name content="<?php echo $settings->application_name; ?>"/>
<?php if (isset($page_type)): ?>
        <meta property="og:type" content="<?php echo $og_type; ?>"/>
        <meta property="og:title" content="<?php echo html_escape($post->title); ?>"/>
        <meta property="og:description" content="<?php echo html_escape($post->summary); ?>"/>
        <meta property="og:url" content="<?php echo $og_url; ?>"/>
        <meta property="og:image" content="<?php echo $og_image; ?>"/>
        <meta property="og:image:width" content="750" />
        <meta property="og:image:height" content="500" />
        <meta name=twitter:card content=summary/>
        <meta name=twitter:title content="<?php echo html_escape($post->title); ?>"/>
        <meta name=twitter:description content="<?php echo html_escape($post->summary); ?>"/>
        <meta name=twitter:image content="<?php echo $og_image; ?>"/>
<?php else: ?>
        <meta property=og:type content=website/>
        <meta property=og:title content="<?php echo html_escape($title); ?> - <?php echo html_escape($settings->site_title); ?>"/>
        <meta property=og:description content="<?php echo html_escape($description); ?>"/>
        <meta property=og:url content="<?php echo base_url(); ?>"/>
        <meta name=twitter:card content=summary/>
        <meta name=twitter:title content="<?php echo html_escape($title); ?> - <?php echo html_escape($settings->site_title); ?>"/>
        <meta name=twitter:description content="<?php echo html_escape($description); ?>"/>
<?php endif; ?>

	 
	   <link rel="shortcut icon" type="image/png" href="<?php echo get_favicon($vsettings); ?>"/>

        <!-- Font-awesome CSS -->
        <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

        <!-- Simple-line-icons CSS -->
        <link href="<?php echo base_url(); ?>assets/vendor/simple-line-icons/css/simple-line-icons.css"
              rel="stylesheet"/>

        <!-- Ionicons CSS -->
        <link href="<?php echo base_url(); ?>assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.min.css"/>
	  
	    <?php echo $primary_font_url; ?>
        <?php echo $secondary_font_url; ?>
        <?php echo $tertiary_font_url; ?>
		
		<!-- Owl Carousel -->
        <link href="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.carousel.min.css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.theme.default.min.css" rel="stylesheet"/>
		
		<!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/icheck/minimal/green.css"/>

        <!-- Jquery Confirm CSS -->
        <link href="<?php echo base_url(); ?>assets/vendor/jquery-confirm/jquery-confirm.min.css" rel="stylesheet"/>

        <!-- Magnific Popup-->
        <link href="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet"/>
		<!-- Color CSS -->
        <?php if ($vsettings->site_color == '') : ?>
            <link href="<?php echo base_url(); ?>assets/css/colors/default.css" rel="stylesheet"/>
        <?php else : ?>
            <link href="<?php echo base_url(); ?>assets/css/colors/<?php echo html_escape($vsettings->site_color); ?>.css"
                  rel="stylesheet"/>
        <?php endif; ?>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css"/>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url();?>asset/new/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="<?php echo base_url();?>asset/new/css/all.min.css"/>
      <link rel="stylesheet" href="<?php echo base_url();?>asset/new/css/style.css" type="text/css"/>
      <link rel="stylesheet" href="<?php echo base_url();?>asset/new/css/responsive.css" type="text/css"/>
      <!-- <link rel="stylesheet" href="<?php echo base_url();?>asset/css/style.css" type="text/css"/> -->
      

   </head>
   <body>
      <!------------------------------ header start here ------------------------------------>
      <div class="header">
         <div class="header_sec">
            <nav class="navbar navbar-expand-lg navbar-light  ">
               <a class="navbar-brand" href="#"><h3>My Tutoring Pro</h3></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse flex-end" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url()?>" style="margin-left:27px;">Home </a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('about')?>">About </a>
                     </li>
                     <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Careers </a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Press </a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Blog </a>
                     </li> -->
                     <li class="nav-item active" hidden>
                        <a class="nav-link" href="<?php echo base_url('support')?>">Support </a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('legal')?>">Legal </a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('privacy')?>">Privacy </a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url('contact')?>">Contact </a>
                     </li >
                     <?php if(is_admin() or is_author()){?>
                     <li class="dropdown profile-dropdown">
                     <a  class="dropdown-toggle a-profile" data-toggle="dropdown">
                     <!-- <img src="<?php echo html_escape(get_user_avatar(user())); ?>"/>  -->
                     <?php echo html_escape(user()->username); ?>
                     </a>
                        <ul class="dropdown-menu pull-right">
                           <li>
                           <?php if(user()->role == "student"){?>
                              <a href="<?php echo base_url('student');?>">
                                  Dashboard
                              </a>
                           <?php }else if(user()->role == "teacher"){?>
                              <a href="<?php echo base_url('teacher');?>">
                              Dashboard
                              </a>
                           <?php }else if(user()->role == "admin"){?>
                              <a href="<?php echo base_url('dashboard');?>">
                              Dashboard
                              </a>
                           <?php }?>

                           </li>  
                           <li>
                              <a href="<?php echo base_url(); ?>logout">
                              Logout
                              </a>
                           </li>
                           
                        </ul>
                     </li>
                  <?php }else{?>
                  </ul>
                     <form class="form-inline my-2 my-lg-0">
                     <a class="home_b sub_btn" href="#" data-toggle="modal" data-target="#modal-login" id='login_button'>
                     Login</a>
                     <a class="sub_btn" href="<?php echo base_url();?>Auth/student_register" >
                     Become a Student
                     </a>
                     <a class="sub_btn" href="<?php echo base_url();?>Auth/teacher_acknowlegment">
                     Become a Tutor
                     </a>
                     </form>
                  <?php }?>
               </div>
            </nav>
         </div>
      </div>
<!--Include modals-->
<?php $this->load->view('partials/_modals'); ?>
<style>
/* a.dropdown-toggle.a-profile {
    border-radius: 50%;
    background: #ccc;
    width: 45px;
    display: inline-block;
    height: 45px;
    box-shadow: 0 2px 8px 0 rgba(0,0,0,.25);
    border: 1px solid #fff;
}
a.dropdown-toggle.a-profile img {
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    border-radius: 50%; */
}
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_404';
$route['translate_uri_dashes'] = FALSE;
$route['index'] = 'home/index';
$route['error-404'] = 'home/error_404';

$route['posts'] = 'home/posts';
$route['post/(:any)/(:num)'] = 'home/post/$1/$2';
$route['video/(:any)/(:num)'] = 'home/video/$1/$2';

$route['videos'] = 'home/videos';
$route['video/(:any)/(:num)'] = 'home/video/$1/$2';

$route['profile/(:any)'] = 'home/profile/$1';
$route['gallery'] = 'home/gallery';
$route['contact'] = 'home/contact';
$route['category/(:any)/(:num)'] = 'home/category/$1/$2';
$route['tag/(:any)'] = 'home/tag/$1';
$route['reading-list'] = 'home/reading_list';
$route['search'] = 'home/search';

//rss routes
$route['rss-channels'] = 'home/rss_channels';
$route['rss/posts'] = 'rss/rss_all_posts';
$route['rss/popular-posts'] = 'rss/rss_popular_posts';
$route['rss/latest-posts'] = 'rss/rss_latest_posts';
$route['rss/posts/(:any)/(:num)'] = 'rss/rss_by_category/$1/$2';
$route['rss/videos'] = 'rss/rss_videos';

//auth routes
$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['update-profile'] = 'auth/update_profile';
$route['change-password'] = 'auth/change_password';
$route['reset-password'] = 'auth/reset_password';
$route['logout'] = 'auth/logout';
$route['admin/users'] = 'auth/users';
$route['admin/teacher'] = 'auth/teacher';
$route['admin/student'] = 'auth/student';


$route['login-with-facebook'] = 'auth/login_with_facebook';
$route['login-with-google'] = 'auth/login_with_google';


/*
| -------------------------------------------------------------------------
| CHAT ROUTES START
| -------------------------------------------------------------------------
*/
$route['message'] = 'message/index';
$route['send-message'] = 'Message/send_text_message';
$route['chat-attachment/upload'] = 'Message/send_text_message';
$route['get-chat-history-vendor'] = 'Message/get_chat_history_by_vendor';
$route['chat-clear'] = 'Message/ChatController/chat_clear_client_cs';

/*
| -------------------------------------------------------------------------
| CHAT ROUTES ENDS
| -------------------------------------------------------------------------
*/

/*
| -------------------------------------------------------------------------
| Student Routes Start
| -------------------------------------------------------------------------
*/
$route['student'] = 'student/index';
$route['find-teachers'] ='student/teacher_search';
$route['find-teacher'] ='student/teacher_search_by_lang';
$route['teacher-detail'] ='student/teacher_detail';
$route['student/teacher'] ='student/teacher_fav';
// update book route added
// $route['student/update_book'] = 'Student/update_book'; 
$route['StripeController/stripePost'] = 'StripeController/stripePost';
/*
| -------------------------------------------------------------------------
| Student Routes End
| -------------------------------------------------------------------------
*/


/*
| -------------------------------------------------------------------------
| Teacher Routes Start
| -------------------------------------------------------------------------
*/
$route['teacher'] = 'teacher/index';
$route['user'] = 'teacher/user';
$route['teacher/my_student'] = 'teacher/student';
$route['teacher/console'] ='teacher/console';

$route['teacher/Withdraw'] = 'teacher/Withdraw';
$route['teacher/confirm_withdraw'] = 'teacher/confirm_withdraw';

/*
| -------------------------------------------------------------------------
| Teacher Routes End
| -------------------------------------------------------------------------
*/

/*
| -------------------------------------------------------------------------
| Stripe Routes Start
| -------------------------------------------------------------------------
*/
$route['my-stripe'] = "StripeController";
$route['stripePost']['post'] = "StripeController/stripePost";

/*
| -------------------------------------------------------------------------
| Stripe Routes End
| -------------------------------------------------------------------------
*/


/*
| -------------------------------------------------------------------------
| ADMIN ROUTES
| -------------------------------------------------------------------------
*/

$route['dashboard'] = 'admin/index';


//page
$route['admin/add-page'] = 'page/add_page';
$route['admin/pages'] = 'page/pages';
$route['admin/update-page/(:num)'] = 'page/update_page/$1';

//poll
$route['admin/add-poll'] = 'poll/add_poll';
$route['admin/polls'] = 'poll/polls';
$route['admin/update-poll/(:num)'] = 'poll/update_poll/$1';

//widget
$route['admin/add-widget'] = 'widget/add_widget';
$route['admin/widgets'] = 'widget/widgets';
$route['admin/update-widget/(:num)'] = 'widget/update_widget/$1';

//post
$route['admin/add-post'] = 'post/add_post';
$route['admin/posts'] = 'post/posts';
$route['admin/pending-posts'] = 'post/pending_posts';
$route['admin/author-posts'] = 'post/author_posts';
$route['admin/recommended-posts'] = 'post/recommended_posts';
$route['admin/featured-posts'] = 'post/featured_posts';
$route['admin/featured-slider-posts'] = 'post/featured_slider_posts';
$route['admin/update-post/(:num)'] = 'post/update_post/$1';
$route['admin/breaking-news'] = 'post/breaking_news';

//video
$route['admin/add-video'] = 'video/add_video';
$route['admin/videos'] = 'video/videos';
$route['admin/pending-videos'] = 'video/pending_videos';
$route['admin/update-video/(:num)'] = 'video/update_video/$1';

//category
$route['admin/categories'] = 'category/categories';
$route['admin/update-category/(:num)'] = 'category/update_category/$1';
$route['admin/subcategories'] = 'category/subcategories';
$route['admin/update-subcategory/(:num)'] = 'category/update_subcategory/$1';

//gallery-category
$route['admin/gallery-categories'] = 'category/gallery_categories';
$route['admin/update-gallery-category/(:num)'] = 'category/update_gallery_category/$1';
$route['admin/delete-gallery-category-post'] = '';

//gallery
$route['admin/gallery'] = 'gallery/index';
$route['admin/update-gallery-image/(:num)'] = 'gallery/update_gallery_image/$1';

//comments
$route['admin/comments'] = 'admin/comments';

//contact messages
$route['admin/contact-messages'] = 'admin/contact_messages';

//ads
$route['admin/ads'] = 'admin/ads';

//newsletter
$route['admin/newsletter'] = 'admin/newsletter';

//update profile
$route['admin/update-profile'] = 'admin/update_profile';

//settings
$route['admin/settings'] = 'admin/settings';
$route['admin/visual-settings'] = 'admin/visual_settings';

//seo tools
$route['admin/seo-tools'] = 'admin/seo_tools';

//social login configuration
$route['admin/social-login-configuration'] = 'admin/social_login_configuration';

//font options
$route['admin/font-options'] = 'admin/font_options';


$route['(:any)'] = 'home/page/$1';

//api app

$route['webapi/app/(:any)/?(:any)/?(:any)/?(:any)'] = 'api/index';


$route['webtools/(:any)/?(:any)'] = 'tools/index';




